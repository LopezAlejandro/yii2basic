<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Multas */

?>
<div class="multas-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->multas_id) ?></h2>
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
</div>