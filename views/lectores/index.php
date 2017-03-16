<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\LectoresSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Lectores');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lectores-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Lectores'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    
		  <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'usuario_crea_mod',
            //'create_time',
            //'update_time',
            //'id',
            'nombre',
            'documento',
            // 'clase_lector_id',
            // 'clase_documento_id',
            // 'direccion',
            // 'telefono',
             'mail',

            [
            	'class' => 'yii\grid\ActionColumn',
            	'template' => '{view} {update} {delete} {mail}',
            	'buttons' => [
            			'mail' => function($url ,$model ,$key) 
            			{
            				return $model->mail != '' ? HTML::mailto(
            				'<span class="glyphicon glyphicon-envelope"></span>',
            				$model->mail) : '';
            			},
            	],
            ],	
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
