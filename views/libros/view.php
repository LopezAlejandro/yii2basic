<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Libros */

$this->title = $model->titulo;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Libros'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="libros-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Libros').' - '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
<!--
<?=             
             Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> ' . Yii::t('app', 'PDF'), 
                ['pdf', 'id' => $model->libros_id],
                [
                    'class' => 'btn btn-danger',
                    'target' => '_blank',
                    'data-toggle' => 'tooltip',
                    'title' => Yii::t('app', 'Will open the generated PDF file in a new window')
                ]
            )?>
-->            
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->libros_id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->libros_id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ])
            ?>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'libros_id', 'visible' => false],
        'titulo',
        'editorial',
        'ano',
        [
            'attribute' => 'tipoLibro.descripcion',
            'label' => Yii::t('app', 'Tipo de libro'),
        ],
        'nro_libro',
        'edicion',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
if($providerCopias->totalCount){
    $gridColumnCopias = [
        ['class' => 'yii\grid\SerialColumn'],
//        	'copias_id',
				[
                'attribute' => 'estado.descripcion',
                'label' => Yii::t('app', 'Estado')
            ],
            ['attribute' => 'libros_id', 'visible' => false],
            'nro_copia',
            [
                'attribute' => 'deposito.descripcion_deposito',
                'label' => Yii::t('app', 'Deposito')
            ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerCopias,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-copias']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Ejemplares')),
        ],
        'columns' => $gridColumnCopias
    ]);
}
?>
    </div>
    
    <div class="row">
<?php
if($providerLibrosHasAutor->totalCount){
    $gridColumnLibrosHasAutor = [
        ['class' => 'yii\grid\SerialColumn'],
                        [
                'attribute' => 'autorAutor.nombre',
                'label' => Yii::t('app', 'Autor')
            ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerLibrosHasAutor,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-libros-has-autor']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Autores')),
        ],
        'columns' => $gridColumnLibrosHasAutor
    ]);
}
?>
    </div>
</div>
