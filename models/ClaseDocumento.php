<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clase_documento".
 *
 * @property integer $id
 * @property string $descripcion_documento
 *
 * @property Lectores[] $lectores
 */
class ClaseDocumento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'clase_documento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion_documento'], 'required'],
            [['descripcion_documento'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'descripcion_documento' => Yii::t('app', 'Descripcion Documento'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLectores()
    {
        return $this->hasMany(Lectores::className(), ['clase_documento_id' => 'id']);
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
