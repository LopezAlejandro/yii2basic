<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Multas */

$this->title = $model->multas_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Multas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="multas-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Multas').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'multas_id', 'visible' => false],
        'fin_multa',
        'activa',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
if($providerLectoresHasMultas->totalCount){
    $gridColumnLectoresHasMultas = [
        ['class' => 'yii\grid\SerialColumn'],
        [
                'attribute' => 'lectoresLectores.lectores_id',
                'label' => Yii::t('app', 'Lectores Lectores')
            ],
            ];
    echo Gridview::widget([
        'dataProvider' => $providerLectoresHasMultas,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode(Yii::t('app', 'Lectores Has Multas')),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
        'columns' => $gridColumnLectoresHasMultas
    ]);
}
?>
    </div>
    
    <div class="row">
<?php
if($providerPrestamosHasMultas->totalCount){
    $gridColumnPrestamosHasMultas = [
        ['class' => 'yii\grid\SerialColumn'],
        [
                'attribute' => 'prestamosPrestamos.prestamos_id',
                'label' => Yii::t('app', 'Prestamos Prestamos')
            ],
            ];
    echo Gridview::widget([
        'dataProvider' => $providerPrestamosHasMultas,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode(Yii::t('app', 'Prestamos Has Multas')),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
        'columns' => $gridColumnPrestamosHasMultas
    ]);
}
?>
    </div>
</div>
