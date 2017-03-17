<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clase_lector".
 *
 * @property integer $clase_lector_id
 * @property string $descripcion
 * @property integer $dias_prestamo
 *
 * @property Lectores[] $lectores
 */
class ClaseLector extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'clase_lector';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion'], 'required'],
            [['dias_prestamo'], 'integer'],
            [['descripcion'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'clase_lector_id' => Yii::t('app', 'Clase Lector ID'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'dias_prestamo' => Yii::t('app', 'Dias Prestamo'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLectores()
    {
        return $this->hasMany(Lectores::className(), ['clase_lector_id' => 'clase_lector_id']);
    }

    /**
     * @inheritdoc
     * @return ClaseLectorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ClaseLectorQuery(get_called_class());
    }
}
