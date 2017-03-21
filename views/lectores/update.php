<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Lectores */

$this->title = Yii::t('app', 'Update') .' : '. $model->nombre;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Lectores'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nombre, 'url' => ['view', 'id' => $model->lectores_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="lectores-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
