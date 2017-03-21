<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\ClaseDocumento;
use app\models\ClaseLector;
use yii\helpers\ArrayHelper;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LectoresSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Lectores');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lectores-index">

<!--    <h1><?= Html::encode($this->title) ?></h1>
    <?php  // $this->render('_search', ['model' => $searchModel]); ?>
--!>
	
	<?php $gridColumns = [
			[
    			'class'=>'kartik\grid\SerialColumn',
    			'contentOptions'=>['class'=>'kartik-sheet-style'],
    			'width'=>'36px',
    			'header'=>'',
    			'headerOptions'=>['class'=>'kartik-sheet-style']
			],
			[
    			'class'=>'kartik\grid\RadioColumn',
    			'width'=>'36px',
    			'headerOptions'=>['class'=>'kartik-sheet-style'],
			],
			[
    			'attribute'=>'nombre',
    			'vAlign'=>'middle',
    		//	'width'=>'210px',
			],
			[
            'attribute' => 'clase_documento_id',
            'value' => function($model) {
                        $clasedocumento = ClaseDocumento::findOne($model->clase_documento_id);
                        return $clasedocumento->descripcion_documento;
                },
            'filter' => ArrayHelper::map(ClaseDocumento::find()->all(),'clase_documento_id','descripcion_documento'),
          ],

			[
				'attribute' =>'documento'
			],
			[
            'attribute' => 'clase_lector_id',
            'value' => function($model) {
                        $claselector = ClaseLector::findOne($model->clase_lector_id);
                        return $claselector->descripcion;
                },
            'filter' => ArrayHelper::map(ClaseLector::find()->all(),'clase_lector_id','descripcion'),
         ],
			[
    			'class'=>'kartik\grid\ActionColumn',
    			'template' => '{view} {update} {delete} {mail}',
                'buttons' => [
                        'mail' => function($url ,$model ,$key)
                        {
                                return $model->mail != '' ? HTML::mailto(
                                '<span class="glyphicon glyphicon-envelope"></span>',
                                $model->mail) : '';
                        },
                ],
    			'viewOptions'=>['title'=>'This will launch the book details page. Disabled for this demo!', 'data-toggle'=>'tooltip'],
    			'updateOptions'=>['title'=>'This will launch the book update page. Disabled for this demo!', 'data-toggle'=>'tooltip'],
    			'deleteOptions'=>['title'=>'This will launch the book delete action. Disabled for this demo!', 'data-toggle'=>'tooltip'],
    			'headerOptions'=>['class'=>'kartik-sheet-style'],
			],
		]	
	?>
 
	<?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns'=>$gridColumns,
    	  'containerOptions'=>['style'=>'overflow: auto'], // only set when $responsive = false
    	  'headerRowOptions'=>['class'=>'kartik-sheet-style'],
    	  'filterRowOptions'=>['class'=>'kartik-sheet-style'],
    	  'pjax'=>true, // pjax is set to always true for this demo
        // set your toolbar
        'toolbar'=> [
            ['content'=>
                //Html::button('<i class="glyphicon glyphicon-plus"></i>', ['type'=>'button', 'title'=>Yii::t('app', 'Create Lectores'), 'class'=>'create']),
                Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'], ['class' => 'btn btn-success','title'=>Yii::t('app', 'Create Lectores') ]).' '.
                Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], ['data-pjax'=>0, 'class'=>'btn btn-default', 'title'=>Yii::t('kvgrid', 'Reset Grid')])
            ],
           '{export}',
           '{toggleData}',
        ],
        // set export properties
       'export'=>[
          'fontAwesome'=>true
       ],
       // parameters from the demo form
       'bordered'=>true,
       'striped'=>true,
       'condensed'=>true,
       'responsive'=>true,
       'hover'=>true,
       'showPageSummary'=>false,
       'panel'=>[
            'type'=>GridView::TYPE_PRIMARY,
            'heading'=>'<h2 class="panel-title"><i class="glyphicon glyphicon-user"></i><b>  Lectores</b></h2>',
            'footer'=>false, 
       ],
       'persistResize'=>false,
       'exportConfig'=>true,
		]);
	?> 

</div>
