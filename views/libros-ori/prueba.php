<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Libros */
/* @var $form ActiveForm */
?>
<div class="libros-prueba">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'titulo') ?>
        <?= $form->field($model, 'nro_libro') ?>
        <?= $form->field($model, 'autor_ids') ?>
        <?= $form->field($model, 'ano') ?>
        <?= $form->field($model, 'tipo_libro_id') ?>
        <?= $form->field($model, 'edicion') ?>
        <?= $form->field($model, 'editorial') ?>
    
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- libros-prueba -->
