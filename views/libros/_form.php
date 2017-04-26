<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\Autor;

/* @var $this yii\web\View */
/* @var $model app\models\Libros */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Copias', 
        'relID' => 'copias', 
        'value' => \yii\helpers\Json::encode($model->copias),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'LibrosHasAutor', 
        'relID' => 'libros-has-autor', 
        'value' => \yii\helpers\Json::encode($model->librosHasAutors),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="libros-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'libros_id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'titulo')->textInput(['maxlength' => true, 'placeholder' => 'Título']) ?>

	 <?= $form->field($model,'autor_ids')->widget(\kartik\widgets\Select2::className(),[
                        'model' => $model,
                        'attribute' => 'autor_ids',
                        'showToggleAll'=> false,
                        'data'=>ArrayHelper::map(Autor::find()->all(),'nombre','nombre'),
                        'pluginOptions'=>['allowClear'=>true],
                        'options'=>[
                                                        'multiple' => true,
                                                        'placeholder'=>'Seleccione el autor...'
                                                        ],
                                          ]) ?>
        
    <?= $form->field($model, 'editorial')->textInput(['maxlength' => true, 'placeholder' => 'Editorial']) ?>

    <?= $form->field($model, 'ano')->textInput(['placeholder' => 'Año']) ?>

    <?= $form->field($model, 'tipo_libro_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\TipoLibro::find()->orderBy('tipo_tipo_libro_id')->asArray()->all(), 'tipo_tipo_libro_id', 'descripcion'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Tipo libro')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'nro_libro')->textInput(['placeholder' => 'Nro de libro']) ?>

    <?= $form->field($model, 'edicion')->textInput(['placeholder' => 'Edición']) ?>

    <?php
    $forms = [
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('app', 'Copias')),
            'content' => $this->render('_formCopias', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->copias),
            ]),
        ],
//        [
//            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('app', 'LibrosHasAutor')),
//            'content' => $this->render('_formLibrosHasAutor', [
//                'row' => \yii\helpers\ArrayHelper::toArray($model->librosHasAutors),
//            ]),
//        ],
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
