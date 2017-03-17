<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CopiasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="copias-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'copias_id') ?>

    <?= $form->field($model, 'estado_id') ?>

    <?= $form->field($model, 'libros_id') ?>

    <?= $form->field($model, 'nro_copia') ?>

    <?= $form->field($model, 'deposito_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
