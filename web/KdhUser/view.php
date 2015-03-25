<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\KdhUser */

$this->title = $model->iduser;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Kdh Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kdh-user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'iduser' => $model->iduser, 'idpersonalDetails' => $model->idpersonalDetails], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'iduser' => $model->iduser, 'idpersonalDetails' => $model->idpersonalDetails], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'iduser',
            'firstName',
            'lastName',
            'linkedInID',
            'profileURL:url',
            'numConnections',
            'signUpTime',
            'idpersonalDetails',
        ],
    ]) ?>

</div>
