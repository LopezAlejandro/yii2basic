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
        <div class="col-sm-3" style="margin-top: 15px">
<?=             
             Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> ' . Yii::t('app', 'PDF'), 
                ['pdf', 'id' => $model->multas_id],
                [
                    'class' => 'btn btn-danger',
                    'target' => '_blank',
                    'data-toggle' => 'tooltip',
                    'title' => Yii::t('app', 'Will open the generated PDF file in a new window')
                ]
            )?>
            
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->multas_id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->multas_id], [
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
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-lectores-has-multas']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Lectores Has Multas')),
        ],
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
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-prestamos-has-multas']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Prestamos Has Multas')),
        ],
        'columns' => $gridColumnPrestamosHasMultas
    ]);
}
?>
    </div>
</div>
