<?php

namespace frontend\controllers;

use Yii;
use common\models\Paper;
use frontend\models\PaperSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\User;
/**
 * PaperController implements the CRUD actions for Paper model.
 */
class PaperController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Paper models.
     * @return mixed
     */
    public function actionIndex()
    {
        
            $searchModel = new PaperSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        //if(\Yii::$app->user->can('view-paper')){
       if(Yii::$app->user->can('view-paper')){

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                ]);
        }
    }

    /**
     * Displays a single Paper model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        if(Yii::$app->user->can('view-paper')){
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    }


    /**
     * Displays a single Paper model.
     * @param integer $id
     * @return mixed
     */
    public function actionMypaper()
    {

        $searchModel = new PaperSearch();
        $dataProvider = $searchModel->mysearch(Yii::$app->request->queryParams);
       if(Yii::$app->user->can('view-paper')){

            return $this->render('mypaper', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                ]);
        }
    }

    /**
     * Creates a new Paper model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Paper();
    if(Yii::$app->user->can('create-paper')){
            $model->createdbyid=Yii::$app->user->getId();
            $model->created_at=$model->updated_at=date("Y-m-d");

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    }

    /**
     * Updates an existing Paper model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
    if(Yii::$app->user->can('update-paper')&&$model->createdbyid==Yii::$app->user->getId()){


        if ($model->load(Yii::$app->request->post()) ) {
            $model->updated_at=date("Y-m-d");
            if($model->save())
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    }

    /**
     * Deletes an existing Paper model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model=$this->findModel($id);
        if(Yii::$app->user->can('delete-paper')&&$model->createdbyid==Yii::$app->user->getId())
          $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Paper model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Paper the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Paper::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
