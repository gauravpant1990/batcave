<?php

namespace app\controllers;
use Yii;
use app\models\Advancedsearch;
use yii\web\Controller;

class AdvancedsearchController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
	public function actionSearch()
	{
		$query = $_POST['query'];
		$advancedsearch = new Advancedsearch;
		//$dataProvider = $advancedsearch->search(Yii::$app->request->queryParams);
		$values = $advancedsearch->search($query);
		return $this->renderPartial('index', [
            'data' => $values,
            //'dataProvider' => $dataProvider,
        ]);
	}
}
