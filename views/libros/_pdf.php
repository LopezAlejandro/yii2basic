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
            <h2><?= Yii::t('app', 'Libros').' '. Html::encode($this->title) ?></h2>
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
                'attribute' => 'tipoLibro.tipo_tipo_libro_id',
                'label' => Yii::t('app', 'Tipo Libro')
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
        'copias_id',
        [
                'attribute' => 'estado.estado_id',
                'label' => Yii::t('app', 'Estado')
            ],
        ['attribute' => 'libros_id', 'visible' => false],
        'nro_copia',
        [
                'attribute' => 'deposito.deposito_deposito_id',
                'label' => Yii::t('app', 'Deposito')
            ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerCopias,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode(Yii::t('app', 'Copias')),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
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
                'attribute' => 'autorAutor.autor_id',
                'label' => Yii::t('app', 'Autor Autor')
            ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerLibrosHasAutor,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode(Yii::t('app', 'Libros Has Autor')),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
        'columns' => $gridColumnLibrosHasAutor
    ]);
}
?>
    </div>
</div>