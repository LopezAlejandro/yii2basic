<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LectoresSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lectores-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php // $form->field($model, 'usuario_crea_mod') ?>

    <?php // $form->field($model, 'create_time') ?>

    <?php // $form->field($model, 'update_time') ?>

    <?php // $form->field($model, 'id') ?>

    <?php $form->field($model, 'nombre') ?>

    <?php $form->field($model, 'documento') ?>

    <?php // echo $form->field($model, 'clase_lector_id') ?>

    <?php // echo $form->field($model, 'clase_documento_id') ?>

    <?php // echo $form->field($model, 'direccion') ?>

    <?php // echo $form->field($model, 'telefono') ?>

    <?php $form->field($model, 'mail') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
