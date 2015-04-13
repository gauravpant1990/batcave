<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Personaldetail */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Personaldetail',
]) . ' ' . $model->idpersonalDetail;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Personaldetails'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idpersonalDetail, 'url' => ['view', 'id' => $model->idpersonalDetail]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="personaldetail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
