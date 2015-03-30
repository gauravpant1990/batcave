<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DataSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="data-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'iddata') ?>

    <?= $form->field($model, 'idcompany') ?>

    <?= $form->field($model, 'datacol') ?>

    <?= $form->field($model, 'iddesignation') ?>

    <?= $form->field($model, 'ctc') ?>

    <?php // echo $form->field($model, 'exp') ?>

    <?php // echo $form->field($model, 'passYear') ?>

    <?php // echo $form->field($model, 'ideducation') ?>

    <?php // echo $form->field($model, 'eduText') ?>

    <?php // echo $form->field($model, 'skillText') ?>

    <?php // echo $form->field($model, 'updated') ?>

    <?php // echo $form->field($model, 'active') ?>

    <?php // echo $form->field($model, 'gender') ?>

    <?php // echo $form->field($model, 'metaData') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
