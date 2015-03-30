<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DataSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Datas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Data'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'iddata',
            'idcompany',
            'datacol',
            'iddesignation',
            'ctc',
            // 'exp',
            // 'passYear',
            // 'ideducation',
            // 'eduText:ntext',
            // 'skillText:ntext',
            // 'updated',
            // 'active',
            // 'gender:ntext',
            // 'metaData:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
