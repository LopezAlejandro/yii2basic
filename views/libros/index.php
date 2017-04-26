<?php

/* @var $this yii\web\View */
/* @var $searchModel app\models\LibrosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;

$this->title = Yii::t('app', 'Libros');
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="libros-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<!--
    <p>
        <?= Html::a(Yii::t('app', 'Create Libros'), ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Advance Search'), '#', ['class' => 'btn btn-info search-button']) ?>
    </p>
-->
    <div class="search-form" style="display:none">
        <?=  $this->render('_search', ['model' => $searchModel]); ?>
    </div>
    <?php 
    $gridColumn = [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'class' => 'kartik\grid\ExpandRowColumn',
            'width' => '50px',
            'value' => function ($model, $key, $index, $column) {
                return GridView::ROW_COLLAPSED;
            },
            'detail' => function ($model, $key, $index, $column) {
                return Yii::$app->controller->renderPartial('_expand', ['model' => $model]);
            },
            'headerOptions' => ['class' => 'kartik-sheet-style'],
            'expandOneOnly' => true
        ],
        ['attribute' => 'libros_id', 'visible' => false],
        'titulo',
        [
                                        'label' => 'Autor',
                                        'format' => 'ntext',
                                        'attribute' => 'autorname',
                                        'value' => function($model) {

                                                                foreach ($model->autorAutors as $autor) {
                                                                        $autorNames[] = $autor->nombre;
                                                                }
                                                                return implode("\n",$autorNames);
                                        },
        ],

        'editorial',
        'ano',
        [
        'attribute' => 'tipo_libro_id',
		               'label' => Yii::t('app', 'Tipo Libro'),
		               'value' => function($model){
		                   if ($model->tipoLibro)
		                   {return $model->tipoLibro->descripcion;}
		                   else
		                   {return NULL;}
		               },
		               'filterType' => GridView::FILTER_SELECT2,
		               'filter' => \yii\helpers\ArrayHelper::map(\app\models\TipoLibro::find()->asArray()->all(), 'tipo_tipo_libro_id', 'descripcion'),
		               'filterWidgetOptions' => [
		                   'pluginOptions' => ['allowClear' => true],
		               ],
		               'filterInputOptions' => ['placeholder' => 'Tipo de libro', 'id' => 'grid-libros-search-tipo_libro_id']
		           ],
        'nro_libro',
        'edicion',
        [
            'class' => 'yii\grid\ActionColumn',
        ],
    ]; 
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumn,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-libros']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span>  ' . Html::encode($this->title),
        ],
        // your toolbar can include the additional full export menu
        'toolbar' => [
				['content'=>
                Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'], ['class' => 'btn btn-success','title'=>Yii::t('app', 'Crear Libros')]).' '.
                Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], ['data-pjax'=>0, 'class'=>'btn btn-default', 'title'=>Yii::t('kvgrid', 'Reset Grid')])
            ],        
            '{export}',
            ExportMenu::widget([
                'dataProvider' => $dataProvider,
                'columns' => $gridColumn,
                'target' => ExportMenu::TARGET_BLANK,
                'fontAwesome' => true,
                'dropdownOptions' => [
                    'label' => 'Full',
                    'class' => 'btn btn-default',
                    'itemsBefore' => [
                        '<li class="dropdown-header">Export All Data</li>',
                    ],
                ],
            ]) ,
            
        ],
    ]); ?>

</div>
