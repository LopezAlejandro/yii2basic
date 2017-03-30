<?php
use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;
use kartik\builder\TabularForm;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\TipoLibro;
use kartik\widgets\Select2;
/**
 * @var yii\web\View $this
 * @var app\models\Libros $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="libros-form">

    <?php $form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]); ?>
    <div class="form-group">
        <?= $form->field($model, 'titulo',['labelOptions'=>['class'=>'col-sm-2 col-md-2']]); ?> 
        <?= $form->field($model, 'nro_libro',['labelOptions'=>['class'=>'col-sm-2 col-md-2']])->textInput(); ?>
        <?= $form->field($model, 'ano',['labelOptions'=>['class'=>'col-sm-2 col-md-2']])->textInput(); ?>
        <?= $form->field($model, 'tipo_libro_id', ['labelOptions'=>['class'=>'col-sm-2 col-md-2']])->widget(Select2::classname(), [
            'data'=>ArrayHelper::map(TipoLibro::find()->all(),'tipo_tipo_libro_id','descripcion'),
            'pluginOptions'=>['allowClear'=>true],
            'options' => ['placeholder'=>'Seleccione Uno']
            ]); ?>
        <?= $form->field($model, 'edicion',['labelOptions'=>['class'=>'col-sm-2 col-md-2']])->textInput(); ?>
        <?= $form->field($model, 'editorial',['labelOptions'=>['class'=>'col-sm-2 col-md-2']])->textInput(); ?>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <hr>
            <?php        
                echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'),
                ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']);
            ?>    
        </div>
    </div>
    <?php
        ActiveForm::end(); 
    ?>

</div>