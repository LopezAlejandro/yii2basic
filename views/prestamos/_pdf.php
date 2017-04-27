<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Prestamos */

$this->title = $model->prestamos_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Prestamos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prestamos-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Prestamos').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'prestamos_id', 'visible' => false],
        'extension',
        'fecha_devolucion',
        [
                'attribute' => 'lectoresIdl.lectores_id',
                'label' => Yii::t('app', 'Lectores Idl')
            ],
        [
                'attribute' => 'copias.copias_id',
                'label' => Yii::t('app', 'Copias')
            ],
        'activo',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
if($providerPrestamosHasMultas->totalCount){
    $gridColumnPrestamosHasMultas = [
        ['class' => 'yii\grid\SerialColumn'],
                [
                'attribute' => 'prestamosMultas.multas_id',
                'label' => Yii::t('app', 'Prestamos Multas')
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
