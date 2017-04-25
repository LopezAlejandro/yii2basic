<?php
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;

    $dataProvider = new ArrayDataProvider([
        'allModels' => $model->copias,
        'key' => 'copias_id'
    ]);
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        'copias_id',
        [
                'attribute' => 'estado.estado_id',
                'label' => Yii::t('app', 'Estado')
            ],
        'nro_copia',
        [
                'attribute' => 'deposito.deposito_deposito_id',
                'label' => Yii::t('app', 'Deposito')
            ],
        [
            'class' => 'yii\grid\ActionColumn',
            'controller' => 'copias'
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
