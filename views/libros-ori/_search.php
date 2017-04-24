<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\LibrosSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="libros-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'libros_id') ?>

    <?= $form->field($model, 'titulo') ?>

    <?= $form->field($model, 'editorial') ?>

    <?= $form->field($model, 'ano') ?>

    <?= $form->field($model, 'tipo_libro_id') ?>

    <?php // echo $form->field($model, 'nro_libro') ?>

    <?php // echo $form->field($model, 'edicion') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
