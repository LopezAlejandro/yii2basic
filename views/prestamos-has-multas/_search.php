<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PrestamosHasMultasController */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-prestamos-has-multas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'prestamos_prestamos_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Prestamos::find()->orderBy('prestamos_id')->asArray()->all(), 'prestamos_id', 'prestamos_id'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Prestamos')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'prestamos_multas_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Multas::find()->orderBy('multas_id')->asArray()->all(), 'multas_id', 'multas_id'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Multas')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
