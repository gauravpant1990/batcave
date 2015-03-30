<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\KdhUser */

$this->title = Yii::t('app', 'Create Kdh User');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Kdh Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kdh-user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
