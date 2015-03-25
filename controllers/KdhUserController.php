<?php

namespace app\controllers;

use Yii;
use app\models\KdhUser;
use app\models\KdhUserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * KdhUserController implements the CRUD actions for KdhUser model.
 */
class KdhUserController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
					'index',
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all KdhUser models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new KdhUserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single KdhUser model.
     * @param integer $iduser
     * @param integer $idpersonalDetails
     * @return mixed
     */
    public function actionView($iduser, $idpersonalDetails)
    {
        return $this->render('view', [
            'model' => $this->findModel($iduser, $idpersonalDetails),
        ]);
    }

    /**
     * Creates a new KdhUser model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new KdhUser();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'iduser' => $model->iduser, 'idpersonalDetails' => $model->idpersonalDetails]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing KdhUser model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $iduser
     * @param integer $idpersonalDetails
     * @return mixed
     */
    public function actionUpdate($iduser, $idpersonalDetails)
    {
        $model = $this->findModel($iduser, $idpersonalDetails);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'iduser' => $model->iduser, 'idpersonalDetails' => $model->idpersonalDetails]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing KdhUser model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $iduser
     * @param integer $idpersonalDetails
     * @return mixed
     */
    public function actionDelete($iduser, $idpersonalDetails)
    {
        $this->findModel($iduser, $idpersonalDetails)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the KdhUser model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $iduser
     * @param integer $idpersonalDetails
     * @return KdhUser the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($iduser, $idpersonalDetails)
    {
        if (($model = KdhUser::findOne(['iduser' => $iduser, 'idpersonalDetails' => $idpersonalDetails])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
