<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Personaldetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="personaldetail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'iduser')->textInput() ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'ctc')->textInput() ?>

    <?= $form->field($model, 'monthlySalary')->textInput() ?>

    <?= $form->field($model, 'currency')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'phoneNumber')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 
			Yii::t('app', 'Create') : 
			Yii::t('app', 'Update'), 
			['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
