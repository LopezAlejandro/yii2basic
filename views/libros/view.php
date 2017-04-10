<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use kartik\datecontrol\DateControl;
use yii\helpers\ArrayHelper;
use app\models\TipoLibro;
use app\models\Libros;
use app\models\Autor;

/**
 * @var yii\web\View $this
 * @var app\models\Libros $model
 */

$this->title = $model->libros_id;
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
                'attribute'=>'autor_ids',
                'format'=>'raw',
                'value'=>Html::a('John Steinbeck', '#', ['class'=>'kv-author-link']),
                'type'=>DetailView::INPUT_SELECT2, 
                'widgetOptions'=>[
                    'data'=>ArrayHelper::map(Autor::find()->orderBy('nombre')->asArray()->all(), 'autor_id', 'nombre'),
                    'options' => ['placeholder' => 'Select ...'],
                    'pluginOptions' => ['allowClear'=>true, 'width'=>'100%'],
                ],
                'valueColOptions'=>['style'=>'width:30%']
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
        'enableEditMode' => true,
    ]) ?>

</div>
