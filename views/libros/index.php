<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use app\models\TipoLibro;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\LibrosSearch $searchModel
 */

$this->title = Yii::t('app', 'Libros');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="libros-index">
<!--    
    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
--!>    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php /* echo Html::a(Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Libros',
]), ['create'], ['class' => 'btn btn-success'])*/  ?>
    </p>

    <?php Pjax::begin(); echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn',
            'header'=>'',
            ],

//            'libros_id',
            'titulo',
            'editorial',
            'ano',
            [
            	'attribute'=>'tipo_libro_id',
		         'value' => function($model) {
		                       $tipolibro = TipoLibro::findOne($model->tipo_libro_id);
		                       return $tipolibro->descripcion;
		               },
		         'filter' => ArrayHelper::map(TipoLibro::find()->all(),'tipo_tipo_libro_id','descripcion'),
		      ],
            'nro_libro', 
            'edicion', 

            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'update' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>',
                            Yii::$app->urlManager->createUrl(['libros/view', 'id' => $model->libros_id, 'edit' => 't']),
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
		               Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'], ['class' => 'btn btn-success','title'=>Yii::t('app', 'Create Lectores') ]).' '. 
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
