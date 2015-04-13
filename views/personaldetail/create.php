<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Personaldetail */

$this->title = Yii::t('app', 'Create Personaldetail');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Personaldetails'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personaldetail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
