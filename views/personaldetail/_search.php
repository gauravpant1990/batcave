<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PersonaldetailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="personaldetail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idpersonalDetail') ?>

    <?= $form->field($model, 'iduser') ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'ctc') ?>

    <?= $form->field($model, 'monthlySalary') ?>

    <?php // echo $form->field($model, 'currency') ?>

    <?php // echo $form->field($model, 'phoneNumber') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
