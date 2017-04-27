<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Prestamos */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Prestamos',
]) . ' ' . $model->prestamos_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Prestamos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->prestamos_id, 'url' => ['view', 'id' => $model->prestamos_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="prestamos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
