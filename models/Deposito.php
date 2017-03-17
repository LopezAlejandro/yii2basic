<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "deposito".
 *
 * @property integer $deposito_deposito_id
 * @property string $descripcion_deposito
 *
 * @property Copias[] $copias
 */
class Deposito extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'deposito';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['deposito_deposito_id', 'descripcion_deposito'], 'required'],
            [['deposito_deposito_id'], 'integer'],
            [['descripcion_deposito'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'deposito_deposito_id' => Yii::t('app', 'Deposito Deposito ID'),
            'descripcion_deposito' => Yii::t('app', 'Descripcion Deposito'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCopias()
    {
        return $this->hasMany(Copias::className(), ['deposito_id' => 'deposito_deposito_id']);
    }

    /**
     * @inheritdoc
     * @return DepositoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DepositoQuery(get_called_class());
    }
}
