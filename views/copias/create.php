<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Copias */

$this->title = Yii::t('app', 'Create Copias');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Copias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="copias-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
