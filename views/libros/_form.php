<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\Autor;
use app\models\TipoLibro;
/**
 * @var yii\web\View $this
 * @var app\models\Libros $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="libros-form">

    <?php $form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]); ?>
    
    <?= $form->errorSummary($model) ?>

            <?= $form->field($model, 'titulo')->textInput() ?>
            <?= $form->field($model,'autor_ids')->widget(Select2::classname(),[
            		'model' => $model,
            		'attribute' => 'autor_ids',
            		'data'=>ArrayHelper::map(Autor::find()->all(),'nombre','nombre'),
            		'pluginOptions'=>['allowClear'=>true],
            		'options'=>[
            						'multiple' => true,
            						'placeholder'=>'Seleccione el autor...'
            						],
					  ]) ?>
				
            <?= $form->field($model,'nro_libro')-> textInput() ?>

            <?= $form->field($model,'ano')-> textInput() ?>
            
				<?= $form->field($model, 'tipo_libro_id')->widget(Select2::classname(),[
						'model' => $model,
						'attribute' => 'tipo_libro_id',
						'data' =>ArrayHelper::map(TipoLibro::find()->all(),'tipo_tipo_libro_id','descripcion'),
						'pluginOptions' => ['allowClear'=>true],
						'options' => [
											'placeholder' =>'Seleccione uno...'
										 ],
						]);?>

            <?= $form->field($model,'edicion')->textInput() ?>

           <?= $form->field($model,'editorial')->textInput() ?>


    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'),
        ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'] 
    ) ?>
<?php  ActiveForm::end(); ?>

</div>
