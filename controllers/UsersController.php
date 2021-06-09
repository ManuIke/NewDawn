<?php

namespace app\controllers;

use app\models\Pending;
use Yii;
use app\models\Users;
use app\models\UsersSearch;
use Http\Discovery\Exception\NotFoundException;
use yii\bootstrap4\Html;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;

/**
 * UsersController implements the CRUD actions for Users model.
 */
class UsersController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Users models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UsersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Users model.
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
     * Creates a new Users model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Users(['scenario' => Users::SCENARIO_CREATE]);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $pending = new Pending([
                'id' => $model->id,
                'token' => Yii::$app->security->generateRandomString(),
            ]);
            $pending->save();
            $body = 'To validate user press here: '
                . Html::a(
                    'Activate user',
                    Url::to([
                        'users/activate',
                        'id' => $model->id,
                        'token' => $pending->token
                    ], true)
                );
            Yii::$app->mailer->compose()
                ->setTo($model->email)
                ->setFrom(Yii::$app->params['smtpUsername'])
                ->setSubject('Activate user')
                ->setHtmlBody($body)
                ->send();
            Yii::$app->session->setFlash(
                'success',
                'You must validate the user to activate the account'
            );
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionActivate($id, $token)
    {
        $user = $this->findModel($id);
        if ($user->pending === null) {
            return $this->goHome();
        }
        if ($user->pending->token === $token) {
            $user->pending->delete();
            Yii::$app->session->setFlash('success', 'User validated correctly');
            return $this->redirect(Yii::$app->user->loginUrl);
        }
        Yii::$app->session->setFlash('error', 'Incorrect token');
        return $this->goHome();
    }

    /**
     * Updates an existing Users model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->scenario = Users::SCENARIO_UPDATE;
        $model->password = '';
        $roles = ['User' =>'User',
        'Editor' =>'Editor',
        'Moderator' =>'Moderator',
        'Admin' =>'Admin'];

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'roles' => $roles,
        ]);
    }

    /**
     * Deletes an existing Users model.
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
     * Finds the Users model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Users the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Users::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
