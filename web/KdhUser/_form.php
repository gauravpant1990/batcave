<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KdhUser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kdh-user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'firstName')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'lastName')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'linkedInID')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'profileURL')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'numConnections')->textInput() ?>

    <?= $form->field($model, 'signUpTime')->textInput() ?>

    <?= $form->field($model, 'idpersonalDetails')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
