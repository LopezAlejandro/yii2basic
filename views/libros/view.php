<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use kartik\datecontrol\DateControl;
use yii\helpers\ArrayHelper;
use app\models\TipoLibro;
use app\models\Autor;
use app\models\Libros;

/**
 * @var yii\web\View $this
 * @var app\models\Libros $model
 */

$this->title = $model->titulo;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Libros'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="libros-view">
<!--
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
-->

    <?= DetailView::widget([
        'model' => $model,
        'condensed' => false,
        'hover' => true,
        'mode' => Yii::$app->request->get('edit') == 't' ? DetailView::MODE_EDIT : DetailView::MODE_VIEW,
        'panel' => [
            'heading' => $this->title,
            'type' => DetailView::TYPE_PRIMARY,
        ],
        'attributes' => [
            'titulo',
        [
            'attribute' => 'autor_ids',
            'format' => 'raw',		
        		'model' => $model,
				'value' => implode(" , ",ArrayHelper::map($model->autorAutors, 'nombre', 'nombre')),       		
        		
				'type'=> DetailView::INPUT_SELECT2,            		
            'widgetOptions'=>[
				     'data'=>ArrayHelper::map(Autor::find()->all(),'nombre','nombre'),
				      'options'=>[
            						'multiple' => true,
            						'placeholder'=>'Seleccione el autor...',
            						],      
						'showToggleAll'=> false,            		
            		'pluginOptions'=>['allowClear'=>true,
            					'width'=>'100%'],
            		
				],
        ],
    			
            'editorial',
            'ano',
            
            [
            'attribute' => 'tipo_libro_id',
            'value' => $model->tipoLibro->descripcion,
            'type'=> DetailView::INPUT_SELECT2,
            'widgetOptions'=>[
                    'data'=>ArrayHelper::map(TipoLibro::find()->orderBy('descripcion')->asArray()->all(), 'tipo_tipo_libro_id', 'descripcion'),
                    'options' => ['placeholder' => 'Seleccione uno ...'],
                    'pluginOptions' => ['allowClear'=>true, 'width'=>'100%'],
          	],
         ],
            'nro_libro',
            'edicion',
        ],
        'deleteOptions' => [
            'url' => ['delete', 'id' => $model->libros_id],
        ],
        'enableEditMode' => false,
    ]) ?>

</div>
