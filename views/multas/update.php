<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Multas */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Multas',
]) . ' ' . $model->multas_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Multas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->multas_id, 'url' => ['view', 'id' => $model->multas_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="multas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
