<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Lectores */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lectores-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

	 <?= $form->field($model, 'clase_documento_id')->dropDownList($model->listaClaseDocumento, ['prompt' => 'Seleccione Uno' ]);?>
    
    <?= $form->field($model, 'documento')->textInput(['maxlength' => true]) ?>
 
	 <?= $form->field($model, 'clase_lector_id')->dropDownList($model->listaClaseLector, ['prompt' => 'Seleccione Uno' ]);?>

    <?= $form->field($model, 'direccion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telefono')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mail')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
