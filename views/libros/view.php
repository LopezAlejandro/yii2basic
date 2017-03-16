<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\TipoLibro;

/* @var $this yii\web\View */
/* @var $model app\models\Libros */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Libros'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="libros-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'titulo',
            'editorial',
            'ano',
            'tipo_libro_id',
            [
            	'attribute'=>'tipo_libro_id',
            	'value'=>TipoLibro::findOne($model->id)->descripcion
            	],
        ],
    ]) ?>

</div>
