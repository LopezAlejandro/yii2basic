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

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  // $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Lectores'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
    <?php $colorPluginOptions =  [
    'showPalette' => true,
    'showPaletteOnly' => true,
    'showSelectionPalette' => true,
    'showAlpha' => false,
    'allowEmpty' => false,
    'preferredFormat' => 'name',
    'palette' => [
        [
            "white", "black", "grey", "silver", "gold", "brown", 
        ],
        [
            "red", "orange", "yellow", "indigo", "maroon", "pink"
        ],
        [
            "blue", "green", "violet", "cyan", "magenta", "purple", 
        ],
    	]
		];?>
		
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
    			'class'=>'kartik\grid\ExpandRowColumn',
    			'width'=>'50px',
    			'value'=>function ($model, $key, $index, $column) {
        				return GridView::ROW_COLLAPSED;
    			},
    			'detail'=>function ($model, $key, $index, $column) {
        				return Yii::$app->controller->renderPartial('_expand-row-details', ['model'=>$model]);
    			},
    			'headerOptions'=>['class'=>'kartik-sheet-style'], 
    			'expandOneOnly'=>true
			],
		]	
			?>
 
		<?php GridView::widget([
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
                Html::button('<i class="glyphicon glyphicon-plus"></i>', ['type'=>'button', 'title'=>Yii::t('kvgrid', 'Add Book'), 'class'=>'btn btn-success', 'onclick'=>'alert("This will launch the book creation form.\n\nDisabled for this demo!");']) . ' '.
                Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['grid-demo'], ['data-pjax'=>0, 'class'=>'btn btn-default', 'title'=>Yii::t('kvgrid', 'Reset Grid')])
            ],
           '{export}',
           '{toggleData}',
        ],
        // set export properties
       'export'=>[
          'fontAwesome'=>true
       ],
       // parameters from the demo form
       'bordered'=>$bordered,
       'striped'=>$striped,
       'condensed'=>$condensed,
       'responsive'=>$responsive,
       'hover'=>$hover,
       'showPageSummary'=>$pageSummary,
       'panel'=>[
            'type'=>GridView::TYPE_PRIMARY,
            'heading'=>$heading,
       ],
       'persistResize'=>false,
       'exportConfig'=>$exportConfig,
]);?> 
        
        
        
        
        
        

</div>
