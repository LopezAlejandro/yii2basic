<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clase_lector".
 *
 * @property integer $id
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
            'id' => Yii::t('app', 'ID'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'dias_prestamo' => Yii::t('app', 'Dias Prestamo'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLectores()
    {
        return $this->hasMany(Lectores::className(), ['clase_lector_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return ClaseDocumentoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ClaseDocumentoQuery(get_called_class());
    }
}
