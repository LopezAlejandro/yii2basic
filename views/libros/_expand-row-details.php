<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;
use kartik\grid\GridView;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\Autor;
use app\models\TipoLibro;
use app\models\Copias;


$this->title = 'Allegatos';
$this->params['breadcrumbs'][] = $this->title;
?>

    <div class="allegato-index">

        <h1><?= Html::encode($this->title) ?></h1>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <p>
            <?= Html::a('Create Allegato', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?php

         GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'copias_id',
                'estado_id',
                'nro_copia',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]);
        
         ?>

    </div>
