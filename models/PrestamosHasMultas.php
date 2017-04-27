<?php

namespace app\models;

use \app\models\base\PrestamosHasMultas as BasePrestamosHasMultas;

/**
 * This is the model class for table "prestamos_has_multas".
 */
class PrestamosHasMultas extends BasePrestamosHasMultas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['prestamos_prestamos_id', 'prestamos_multas_id'], 'required'],
            [['prestamos_prestamos_id', 'prestamos_multas_id'], 'integer']
        ]);
    }
	
    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return [
            'prestamos_prestamos_id' => Yii::t('app', 'Prestamos Prestamos ID'),
            'prestamos_multas_id' => Yii::t('app', 'Prestamos Multas ID'),
        ];
    }
}
