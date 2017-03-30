<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use kartik\datecontrol\DateControl;
use yii\helpers\ArrayHelper;
use app\models\TipoLibro;


/**
 * @var yii\web\View $this
 * @var app\models\Libros $model
 */

$this->title = $model->titulo;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Libros'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="libros-view">

<!-- 

    <div class="page-header">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
-->

<?php echo DetailView::widget([

        'model' => $model,
       
        'condensed' => false,
        'hover' => true,
        'mode' => DetailView::MODE_EDIT,
        'panel' => [
            'heading' => $this->title,
            'type' => DetailView::TYPE_PRIMARY,
        ],
        'attributes' => [
            'titulo',
            'editorial',
            'ano',
            [
            'attribute' => 'tipo_libro_id',
            'value' => $model->tipoLibro->descripcion,
            'type'=> DetailView::INPUT_SELECT2,
            'widgetOptions'=>[
                    'data'=>ArrayHelper::map(TipoLibro::find()->all(),'tipo_tipo_libro_id','descripcion'),
                    'options' => ['placeholder' => 'Seleccione uno ...'],
                    'pluginOptions' => ['allowClear'=>true, 'width'=>'100%'],
          	],
         ],

            'nro_libro',
            'edicion',
        ],
        'deleteOptions'=>[
                        'params' => ['custom_param'=>true],
                         'url'=>['delete', 'id' => $model->libros_id],
        ],
        
        'enableEditMode' => true,
    ]) 
?>

</div>
