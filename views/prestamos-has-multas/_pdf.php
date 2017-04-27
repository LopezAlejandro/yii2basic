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
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        [
                'attribute' => 'prestamosPrestamos.prestamos_id',
                'label' => Yii::t('app', 'Prestamos Prestamos')
            ],
        [
                'attribute' => 'prestamosMultas.multas_id',
                'label' => Yii::t('app', 'Prestamos Multas')
            ],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>
