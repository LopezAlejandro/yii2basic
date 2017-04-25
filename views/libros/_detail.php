<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Libros */

?>
<div class="libros-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->titulo) ?></h2>
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
            'label' => Yii::t('app', 'Tipo Libro'),
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
</div>