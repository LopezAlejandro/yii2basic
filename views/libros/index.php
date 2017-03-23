<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use app\models\TipoLibro;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use kartik\grid\GridView;
use kartik\datecontrol\Module;
use kartik\datecontrol\DateControl;
/* @var $this yii\web\View */
/* @var $searchModel app\models\LibrosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Libros');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="libros-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<!--
    <p>
        <?= Html::a(Yii::t('app', 'Create Libros'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
-->    
<?php $gridColumns = [
			[
    			'class'=>'kartik\grid\SerialColumn',
    			'contentOptions'=>['class'=>'kartik-sheet-style'],
    			'width'=>'36px',
    			'header'=>'',
    			'headerOptions'=>['class'=>'kartik-sheet-style']
			],
			[
    			'attribute'=>'nro_libro',
    			'vAlign'=>'middle',
    		//	'width'=>'210px',
			],
			[
				'attribute' =>'titulo'
			],
			[
				'attribute' =>'editorial'
			],
			[
				'attribute' =>'ano'
			],
			[
				 'class'=>'kartik\grid\EditableColumn',
				 'attribute'=>'ano',    
				 'hAlign'=>'center',
				 'vAlign'=>'middle',
				 'width'=>'9%',
				 'format'=>'date',
				 'xlFormat'=>"yyyy",
				 'headerOptions'=>['class'=>'kv-sticky-column'],
				 'contentOptions'=>['class'=>'kv-sticky-column'],
			 
				 'editableOptions'=>[
				     'header'=>'Publish Date', 
				     'size'=>'md',
				     'inputType'=>\kartik\editable\Editable::INPUT_WIDGET,
				     'widgetClass'=> 'kartik\datecontrol\DateControl',
				     'options'=>[
				         'type'=>\kartik\datecontrol\DateControl::FORMAT_DATE,
				         'displayFormat'=>'dd.MM.yyyy',
				         'saveFormat'=>'php:Y',
				         'options'=>[
				             'pluginOptions'=>[
				                 'autoclose'=>true
				             ]
				         ]
				     ]
				 ],
			],
			[
            'attribute' => 'tipo_libro_id',
            'value' => function($model) {
                        $tipolibro = TipoLibro::findOne($model->tipo_libro_id);
                        return $tipolibro->descripcion;
                },
            'filter' => ArrayHelper::map(TipoLibro::find()->all(),'tipo_libro_id','descripcion'),
          ],

			
			[
            'attribute' => 'edicion',
         ],
			[
    			'class'=>'kartik\grid\ActionColumn',
    			'template' => '{view}',
    			'viewOptions'=>['title'=>'Ver detalles del libro', 'data-toggle'=>'tooltip'],
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
    	  'pjax'=>true, 
        // set your toolbar
        'toolbar'=> [
            ['content'=>
                Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'], ['class' => 'btn btn-success','title'=>Yii::t('app', 'Create Lectores') ]).' '.
                Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], ['data-pjax'=>0, 'class'=>'btn btn-default', 'title'=>Yii::t('kvgrid', 'Reset Grid')])
            ],
           '{toggleData}',
           '{export}',
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
            'heading'=>'<h2 class="panel-title"><i class="glyphicon glyphicon-book"></i><b>  Libros</b></h2>',
            'footer'=>false, 
       ],
       'persistResize'=>false,
       'exportConfig'=>true,
		]);
	?> 



</div>
