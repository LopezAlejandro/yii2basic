<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Copias */

$this->title = $model->copias_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Copias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="copias-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->copias_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->copias_id], [
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
            'copias_id',
            'estado_id',
            'libros_id',
            'nro_copia',
            'deposito_id',
        ],
    ]) ?>

</div>
