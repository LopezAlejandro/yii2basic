<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use app\models\TipoLibro;
use app\models\Autor;
use app\models\CopiasSearch;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\LibrosSearch $searchModel
 */

$this->title = Yii::t('app', 'Libros');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="libros-index">

<!--    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php /* echo Html::a(Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Libros',
]), ['create'], ['class' => 'btn btn-success'])*/  ?>
    </p>
-->

    <?php Pjax::begin(); 
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'libros_id',
            'titulo',
    			[
					'label' => 'Autor',
					'format' => 'ntext',
					'attribute' => 'autorname',
					'value' => function($models) {
					
								foreach ($models->autorAutors as $autor) {
									$autorNames[] = $autor->nombre;
								}
								return implode("\n",$autorNames);
					},
    			],
    			
    			[
    				'class'=>'kartik\grid\ExpandRowColumn',
    				'width'=>'50px',
    				'value'=>function ($model, $key, $index, $column) {
        				return GridView::ROW_COLLAPSED;
    				},
 //   				'detail'=>function ($model, $key, $index, $column) {
 //       				return Yii::$app->controller->renderPartial('_expand-row-details', ['model'=>$model]);
 //   				},
    				
    				'detail' => function ($model, $key, $index, $column){
                $searchModel =new CopiasSearch();
                $searchModel->libros_id=$model->libros_id;   // [b]here is the problem [/b]
                 $dataProvider=$searchModel->search(yii::$app->request->queryParams);
                 return Yii::$app->controller->renderPartial('_expand-row-details',[
                    'searchModel'=>$searchModel,
                    'dataProvider'=>$dataProvider,
                    ]);
                    },
    				
    				
    				'headerOptions'=>['class'=>'kartik-sheet-style'], 
    				'expandOneOnly'=>true
				],
    
            'editorial',
            'ano',
//            'tipo_libro_id',
				 
             [
		               'attribute'=>'tipo_libro_id',
		                'value' => function($models) {
		                              $tipolibro = TipoLibro::findOne($models->tipo_libro_id);
		                              return $tipolibro->descripcion;
		                      },
		                'filterType'=>GridView::FILTER_SELECT2,     
		                'filter' => ArrayHelper::map(TipoLibro::find()->all(),'tipo_tipo_libro_id','descripcion'),
		                'filterWidgetOptions'=>[
		               'pluginOptions'=>['allowClear'=>true],
		                   ],
		                   'filterInputOptions'=>['placeholder'=>'Tipo de Libro'],
		                   'format'=>'raw'
		        ],  
            'nro_libro', 
            'edicion', 

            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'update' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>',
                            Yii::$app->urlManager->createUrl(['libros/update', 'id' => $model->libros_id, 'edit' => 't']),
                            ['title' => Yii::t('yii', 'Edit'),]
                        );
                    }
                ],
            ],
        ],
        'responsive' => true,
        'hover' => true,
        'condensed' => true,
        'floatHeader' => true,

			'toolbar'=> [
            ['content'=>
                Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'], ['class' => 'btn btn-success','title'=>Yii::t('app', 'Crear Libros') ]).' '.
                Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], ['data-pjax'=>0, 'class'=>'btn btn-default', 'title'=>Yii::t('kvgrid', 'Reset Grid')])
            ],
           '{toggleData}',
           '{export}',
        ],

        'panel' => [
            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-th-list"></i> '.Html::encode($this->title).' </h3>',
            'type' => 'primary',
            'footer' => false
        ],
    ]); Pjax::end(); ?>

</div>
