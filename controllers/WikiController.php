<?php

namespace app\controllers;

use Yii;
use app\models\Wiki;
use app\models\WikiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * WikiController implements the CRUD actions for Wiki model.
 */
class WikiController extends Controller
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
     * Lists all Wiki models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new WikiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Wiki model.
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
     * Creates a new Wiki model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Wiki();

        $categories = ['Ally' =>'Ally',
        'Enemy' =>'Enemy',
        'Human' =>'Human',
        'Corruption' =>'Corruption',
        'Outsider' =>'Outsider',
        'Cityfolk' =>'Cityfolk',
        'Naturefolk' =>'Naturefolk',
        'Elder' =>'Elder'];

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'categories' => $categories,
        ]);
    }

    /**
     * Updates an existing Wiki model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $categories = ['Ally' =>'Ally',
        'Enemy' =>'Enemy',
        'Human' =>'Human',
        'Corruption' =>'Corruption',
        'Outsider' =>'Outsider',
        'Cityfolk' =>'Cityfolk',
        'Naturefolk' =>'Naturefolk',
        'Elder' =>'Elder'];

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'categories' => $categories,
        ]);
    }

    /**
     * Deletes an existing Wiki model.
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
     * Finds the Wiki model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Wiki the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Wiki::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
