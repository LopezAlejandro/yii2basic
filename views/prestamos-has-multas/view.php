<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\PrestamosHasMultas */

$this->title = $model->prestamos_prestamos_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Prestamos Has Multas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prestamos-has-multas-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Prestamos Has Multas').' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
<?=             
             Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> ' . Yii::t('app', 'PDF'), 
                ['pdf', 'prestamos_prestamos_id' => $model->prestamos_prestamos_id, 'prestamos_multas_id' => $model->prestamos_multas_id],
                [
                    'class' => 'btn btn-danger',
                    'target' => '_blank',
                    'data-toggle' => 'tooltip',
                    'title' => Yii::t('app', 'Will open the generated PDF file in a new window')
                ]
            )?>
            
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'prestamos_prestamos_id' => $model->prestamos_prestamos_id, 'prestamos_multas_id' => $model->prestamos_multas_id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'prestamos_prestamos_id' => $model->prestamos_prestamos_id, 'prestamos_multas_id' => $model->prestamos_multas_id], [
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
        [
            'attribute' => 'prestamosPrestamos.prestamos_id',
            'label' => Yii::t('app', 'Prestamos Prestamos'),
        ],
        [
            'attribute' => 'prestamosMultas.multas_id',
            'label' => Yii::t('app', 'Prestamos Multas'),
        ],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>
