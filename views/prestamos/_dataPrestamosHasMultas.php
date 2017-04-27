<?php
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;

    $dataProvider = new ArrayDataProvider([
        'allModels' => $model->prestamosHasMultas,
        'key' => function($model){
            return ['prestamos_prestamos_id' => $model->prestamos_prestamos_id, 'prestamos_multas_id' => $model->prestamos_multas_id];
        }
    ]);
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        [
                'attribute' => 'prestamosMultas.multas_id',
                'label' => Yii::t('app', 'Prestamos Multas')
            ],
        [
            'class' => 'yii\grid\ActionColumn',
            'controller' => 'prestamos-has-multas'
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
