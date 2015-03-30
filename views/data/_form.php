<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Data */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="data-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idcompany')->textInput() ?>

    <?= $form->field($model, 'datacol')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'iddesignation')->textInput() ?>

    <?= $form->field($model, 'ctc')->textInput() ?>

    <?= $form->field($model, 'exp')->textInput(['maxlength' => 4]) ?>

    <?= $form->field($model, 'passYear')->textInput(['maxlength' => 4]) ?>

    <?= $form->field($model, 'ideducation')->textInput() ?>

    <?= $form->field($model, 'eduText')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'skillText')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'updated')->textInput() ?>

    <?= $form->field($model, 'active')->textInput() ?>

    <?= $form->field($model, 'gender')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'metaData')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
