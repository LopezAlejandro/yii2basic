<?php

namespace app\models;

use Yii;
use \app\models\base\Libros as BaseLibros;

/**
 * This is the model class for table "libros".
 */
class Libros extends BaseLibros
{
	
	 public $autor_ids;
	 
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['titulo', 'nro_libro','autor_ids'], 'required'],
            [['ano', 'tipo_libro_id', 'nro_libro', 'edicion'], 'integer'],
            [['created_at', 'updated_at', 'created_by', 'updated_by', 'deleted_at', 'deleted_by', 'created', 'modified', 'deleted'], 'safe'],
            [['titulo', 'editorial'], 'string', 'max' => 45]
        ]);
    }
	
    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return [
            'libros_id' => Yii::t('app', 'Libros ID'),
            'titulo' => Yii::t('app', 'Título'),
            'editorial' => Yii::t('app', 'Editorial'),
            'ano' => Yii::t('app', 'Año'),
            'tipo_libro_id' => Yii::t('app', 'Tipo de Libro'),
            'nro_libro' => Yii::t('app', 'Nro de Libro'),
            'edicion' => Yii::t('app', 'Edición'),
        ];
    }
}
