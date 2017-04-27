<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\PrestamosHasMultas */

?>
<div class="prestamos-has-multas-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->prestamos_prestamos_id) ?></h2>
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