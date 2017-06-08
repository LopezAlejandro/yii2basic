<?php
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;
use yii\helpers\Html;

    $dataProvider = new ArrayDataProvider([
        'allModels' => $model->copias,
        'key' => 'copias_id'
    ]);
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
//        'copias_id',
        [
                'attribute' => 'estado.descripcion',
                'label' => Yii::t('app', 'Estado')
            ],
        'nro_copia',
        [
                'attribute' => 'deposito.descripcion_deposito',
                'label' => Yii::t('app', 'Deposito')
            ],
            
			[
            'class' => 'yii\grid\ActionColumn',
				'header' => Yii::t('app','Prestar'),            
            'visible' => 'estado_id === 1',
            'controller' => 'copias',
            'template' => '{prestar}',
            'buttons' => [
                    'prestar' => function ($url, $model,$key) {
                        return $model->estado_id !== 1 ? '' : Html::a('<span class="glyphicon glyphicon-paste"></span>',
                            Yii::$app->urlManager->createUrl(['prestamos/create', 'id' => $model->libros_id,'cp'=>$model->copias_id]),
                            ['title' => Yii::t('yii', 'Prestar'),]
                        );
                    }],
        ],            
            
        [
            'class' => 'yii\grid\ActionColumn',
            'controller' => 'copias',
        ],
    ];
    
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns,
        'containerOptions' => ['style' => 'overflow: auto'],
        'pjax' => true,
        'beforeHeader' => [
            [
                'options' => ['class' => 'skip-export']
            ]
        ],
        'export' => [
            'fontAwesome' => true
        ],
        'bordered' => true,
        'striped' => true,
        'condensed' => true,
        'responsive' => true,
        'hover' => true,
        'showPageSummary' => false,
        'persistResize' => false,
    ]);
