<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Prestamos */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'PrestamosHasMultas', 
        'relID' => 'prestamos-has-multas', 
        'value' => \yii\helpers\Json::encode($model->prestamosHasMultas),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'LectoresIdl', 
        'relID' => 'lectores-idl', 
        'value' => \yii\helpers\Json::encode($model->lectoresIdl),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);

?>

<div class="prestamos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>
    
    
    <?= $form->field($model, 'lectores_idl')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Lectores::find()->orderBy('lectores_id')->asArray()->all(), 'lectores_id', 'nombre'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Lectores')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'prestamos_id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'extension')->checkbox() ?>
    <?php $model->fecha_devolucion = '15-05-2017'; ?>
    <?= $form->field($model, 'fecha_devolucion')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'displayFormat' => 'php:d-m-Y', 
		  'value' => '15-02-2017',        
        'ajaxConversion' => true,
        'options' => [
        		
            'pluginOptions' => [
                'placeholder' => Yii::t('app', 'Choose Fecha Devolucion'),
                'autoclose' => true,
                'format' => 'php:d-m-Y',
                'todayHighlight' => true
            ]
        ],
    ]); ?>

    

    <?= $form->field($model, 'copias_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Copias::find()->orderBy('copias_id')->asArray()->all(), 'copias_id', 'copias_id'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Copias')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'activo')->checkbox() ?>

    <?php
    $forms = [
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('app', 'PrestamosHasMultas')),
            'content' => $this->render('_formPrestamosHasMultas', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->prestamosHasMultas),
            ]),
        ],
        
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('app', 'LectoresIdl')),
            'content' => $this->render('_formPrestamosHasMultas', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->lectoresIdl),
            ]),
        ],
    ];
    echo kartik\tabs\TabsX::widget([
        'items' => $forms,
        'position' => kartik\tabs\TabsX::POS_ABOVE,
        'encodeLabels' => false,
        'pluginOptions' => [
            'bordered' => true,
            'sideways' => true,
            'enableCache' => false,
        ],
    ]);
    ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer , ['class'=> 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
