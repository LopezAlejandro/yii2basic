<?php
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;

    $dataProvider = new ArrayDataProvider([
        'allModels' => $model->lectoresHasMultas,
        'key' => function($model){
            return ['lectores_lectores_id' => $model->lectores_lectores_id, 'lectores_multas_id' => $model->lectores_multas_id];
        }
    ]);
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        [
                'attribute' => 'lectoresLectores.lectores_id',
                'label' => Yii::t('app', 'Lectores Lectores')
            ],
        [
            'class' => 'yii\grid\ActionColumn',
            'controller' => 'lectores-has-multas'
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
