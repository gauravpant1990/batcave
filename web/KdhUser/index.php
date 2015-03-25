<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KdhUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Kdh Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kdh-user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Kdh User'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'iduser',
            'firstName',
            'lastName',
            'linkedInID',
            'profileURL:url',
            // 'numConnections',
            // 'signUpTime',
            // 'idpersonalDetails',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
