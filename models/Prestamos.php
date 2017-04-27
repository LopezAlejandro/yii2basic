<?php

namespace app\models;

use \app\models\base\Prestamos as BasePrestamos;

/**
 * This is the model class for table "prestamos".
 */
class Prestamos extends BasePrestamos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['extension', 'lectores_idl', 'copias_id', 'activo', 'created_by', 'updated_by'], 'integer'],
            [['fecha_devolucion', 'lectores_idl', 'copias_id', 'activo', 'created_at', 'updated_at'], 'required'],
            [['fecha_devolucion', 'created_at', 'updated_at'], 'safe']
        ]);
    }
	
}
