<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PrestamosHasMultas */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Prestamos Has Multas',
]) . ' ' . $model->prestamos_prestamos_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Prestamos Has Multas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->prestamos_prestamos_id, 'url' => ['view', 'prestamos_prestamos_id' => $model->prestamos_prestamos_id, 'prestamos_multas_id' => $model->prestamos_multas_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="prestamos-has-multas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
