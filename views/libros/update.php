<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Libros */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Libros',
]) . ' ' . $model->titulo;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Libros'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->titulo, 'url' => ['view', 'id' => $model->libros_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="libros-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
