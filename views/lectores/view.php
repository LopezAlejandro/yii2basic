<?php

use yii\helpers\Html;
//use yii\widgets\DetailView;
use app\models\ClaseLector;
use app\models\ClaseDocumento;
use yii\helpers\ArrayHelper;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Lectores */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Lectores'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lectores-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->lectores_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->lectores_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>
<!--
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nombre',
            [
                'attribute'=>'clase_documento_id',
                'value'=>ClaseDocumento::findOne($model->clase_documento_id)->descripcion_documento
            ],
            'documento',
            [
                'attribute'=>'clase_lector_id',
                'value'=>ClaseLector::findOne($model->clase_lector_id)->descripcion
            ],
            'direccion',
            'telefono',
            'mail',
        ],
    ]) ?>
--!> 
<?php    
    echo DetailView::widget([
    'model'=>$model,
    'condensed'=>true,
    'hover'=>true,
    'mode'=>DetailView::MODE_VIEW,
    'panel'=>[
        'heading'=>'Lector # ' . $model->lectores_id,
        'type'=>DetailView::TYPE_INFO,
    ],
    'attributes'=>[
        [
    			'attribute'=>'nombre',
    			'vAlign'=>'middle',
    		//	'width'=>'210px',
			],
			[
            'attribute' => 'clase_documento_id',
            'value' => ArrayHelper::map(ClaseDocumento::findOne($model->clase_documento_id),'clase_documento_id','descripcion_documento')[0][2],
            'type'=> DetailView::INPUT_SELECT2,
            'widgetOptions'=>[
                    'data'=>ArrayHelper::map(ClaseDocumento::find()->orderBy('descripcion_documento')->asArray()->all(), 'clase_documento_id', 'descripcion_documento'),
                    'options' => ['placeholder' => 'Select ...'],
                    'pluginOptions' => ['allowClear'=>true, 'width'=>'100%'],
          	],
          ],
          
          
			[
				'attribute' =>'documento'
			],
			[
            'attribute' => 'clase_lector_id',
            
         ],
        
    ]
]);
?>
    

</div>
