<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PrestamosHasMultas */

$this->title = Yii::t('app', 'Create Prestamos Has Multas');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Prestamos Has Multas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prestamos-has-multas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
