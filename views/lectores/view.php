<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\ClaseLector;
use app\models\ClaseDocumento;

/* @var $this yii\web\View */
/* @var $model app\models\Lectores */

$this->title = $model->lectores_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Lectores'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lectores-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->lectores_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->lectores_id], [
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
            'nombre',
            [
                'attribute'=>'clase_documento_id',
                'value'=>ClaseDocumento::findOne($model->clase_documento_id)->descripcion_documento
            ],
            'documento',
            [
                'attribute'=>'clase_lector_id',
                'value'=>ClaseLector::findOne($model->clase_lector_id)->descripcion
            ],
            'clase_lector_id',
            'direccion',
            'telefono',
            'mail',
        ],
    ]) ?>

</div>
