<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Prestamos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="prestamos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'extension')->textInput() ?>

    <?= $form->field($model, 'fecha_devolucion')->textInput() ?>

    <?= $form->field($model, 'lectores_idl')->textInput() ?>

    <?= $form->field($model, 'copias_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
