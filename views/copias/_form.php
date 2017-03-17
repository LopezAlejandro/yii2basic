<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Copias */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="copias-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'estado_id')->textInput() ?>

    <?= $form->field($model, 'libros_id')->textInput() ?>

    <?= $form->field($model, 'nro_copia')->textInput() ?>

    <?= $form->field($model, 'deposito_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
