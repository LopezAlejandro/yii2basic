<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;
use kartik\builder\TabularForm;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\TipoLibro;
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

            'titulo' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Título...', 'maxlength' => 45]],

            'nro_libro' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Nro de Libro...']],

            'ano' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Año...']],
            
            'tipo_libro_id' => [
            		'type' => TabularForm::INPUT_DROPDOWN_LIST, 
            		'items'=>ArrayHelper::map(tipoLibro::find()->orderBy('descripcion')->asArray()->all(), 'tipo_libro_id', 'descripcion')
        		],

            'edicion' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Edición...']],

            'editorial' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Editorial...', 'maxlength' => 45]],

        ]

    ]);

    echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'),
        ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
    );
    ActiveForm::end(); ?>

</div>
