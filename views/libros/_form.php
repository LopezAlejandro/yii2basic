<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var app\models\Libros $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="libros-form">

    <?php $form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]); echo Form::widget([

        'model' => $model,
        'form' => $form,
        'columns' => 1,
        'attributes' => [

            'titulo' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Titulo...', 'maxlength' => 45]],
			
			$form->field($model, 'autor')->widget(Select2::classname(), [
    		'data' => $data,
    		'options' => ['placeholder' => 'Select a state ...'],
    		'pluginOptions' => [
        	'allowClear' => true
    			],
    		],
            'nro_libro' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Nro Libro...']],

            'ano' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Ano...']],

            'tipo_libro_id' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Tipo Libro ID...']],

            'edicion' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Edicion...']],

            'editorial' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Editorial...', 'maxlength' => 45]],

        ]

    ]);

    echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'),
        ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
    );
    ActiveForm::end(); ?>

</div>
