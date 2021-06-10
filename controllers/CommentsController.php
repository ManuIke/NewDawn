<?php

namespace app\controllers;

use Yii;
use app\models\Comments;
use app\models\CommentsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * CommentsController implements the CRUD actions for Comments model.
 */
class CommentsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
            
                    [
                        'actions' => ['logout', 'index','view','create','update','delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Comments models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CommentsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Comments model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Comments model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($postId)
    {
        $model = new Comments();

        $parentPost = $postId;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $commentCount = (new \yii\db\Query())->select('comments')->from('users')
            ->where('username = :username', [':username'=>Yii::$app->user->identity->username])->scalar();
            $commentCount = $commentCount + 1;
            Yii::$app->db->createCommand('UPDATE users SET comments=:comments WHERE username=:username')
            ->bindValue(':comments', $commentCount)
            ->bindValue(':username', Yii::$app->user->identity->username)-> execute();

            $commentCount2 = (new \yii\db\Query())->select('comments')->from('posts')
            ->where('id = :postId', [':postId'=> $parentPost])->scalar();
            $commentCount2 = $commentCount2 + 1;
            Yii::$app->db->createCommand('UPDATE posts SET comments=:comments WHERE id=:postId')
            ->bindValue(':comments', $commentCount2)
            ->bindValue(':postId', $parentPost)-> execute();
            return $this->redirect(['posts/view', 'id' => $parentPost]);
        }

        return $this->render('create', [
            'model' => $model,
            'parentPost' => $parentPost,
        ]);
    }

    /**
     * Updates an existing Comments model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Comments model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Comments model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Comments the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Comments::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
