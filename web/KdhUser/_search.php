<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KdhUserSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kdh-user-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'iduser') ?>

    <?= $form->field($model, 'firstName') ?>

    <?= $form->field($model, 'lastName') ?>

    <?= $form->field($model, 'linkedInID') ?>

    <?= $form->field($model, 'profileURL') ?>

    <?php // echo $form->field($model, 'numConnections') ?>

    <?php // echo $form->field($model, 'signUpTime') ?>

    <?php // echo $form->field($model, 'idpersonalDetails') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
