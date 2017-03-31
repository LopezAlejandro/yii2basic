<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var app\models\Libros $model
 */

$this->title = $model->libros_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Libros'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="libros-view">
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>


    <?= DetailView::widget([
        'model' => $model,
        'condensed' => false,
        'hover' => true,
        'mode' => Yii::$app->request->get('edit') == 't' ? DetailView::MODE_EDIT : DetailView::MODE_VIEW,
        'panel' => [
            'heading' => $this->title,
            'type' => DetailView::TYPE_INFO,
        ],
        'attributes' => [
            'libros_id',
            'titulo',
            'editorial',
            'ano',
            'tipo_libro_id',
            'nro_libro',
            'edicion',
        ],
        'deleteOptions' => [
            'url' => ['delete', 'id' => $model->libros_id],
        ],
        'enableEditMode' => true,
    ]) ?>

</div>
