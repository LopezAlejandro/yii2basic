<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\ClaseDocumento;
use app\models\ClaseLector;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LectoresSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Lectores');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lectores-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  // $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Lectores'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    
		<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nombre',
            [
            	'attribute' => 'clase_documento_id',
            	'value' => function($model) {
            		$clasedocumento = ClaseDocumento::findOne($model->clase_documento_id);
            		return $clasedocumento->descripcion_documento;
            	},
            	'filter' => ArrayHelper::map(ClaseDocumento::find()->all(),'clase_documento_id','descripcion_documento'),
            ],
				            
            'documento',
            [
            	'attribute' => 'clase_lector_id',
            	'value' => function($model) {
            		$claselector = ClaseLector::findOne($model->clase_lector_id);
            		return $claselector->descripcion;
            	},
            	'filter' => ArrayHelper::map(ClaseLector::find()->all(),'clase_lector_id','descripcion'),
            ],
            'direccion',
            'telefono',
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