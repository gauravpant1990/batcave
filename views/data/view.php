<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Data */

$this->title = $model->iddata;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Datas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->iddata], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->iddata], [
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
            'iddata',
            'idcompany',
            'datacol',
            'iddesignation',
            'ctc',
            'exp',
            'passYear',
            'ideducation',
            'eduText:ntext',
            'skillText:ntext',
            'updated',
            'active',
            'gender:ntext',
            'metaData:ntext',
        ],
    ]) ?>

</div>
