<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "copias".
 *
 * @property integer $copias_id
 * @property integer $estado_id
 * @property integer $libros_id
 * @property integer $nro_copia
 * @property integer $deposito_id
 *
 * @property Deposito $deposito
 * @property Estado $estado
 * @property Libros $libros
 * @property Prestamos[] $prestamos
 */
class Copias extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'copias';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['estado_id', 'libros_id', 'nro_copia', 'deposito_id'], 'required'],
            [['estado_id', 'libros_id', 'nro_copia', 'deposito_id'], 'integer'],
            [['deposito_id'], 'exist', 'skipOnError' => true, 'targetClass' => Deposito::className(), 'targetAttribute' => ['deposito_id' => 'deposito_deposito_id']],
            [['estado_id'], 'exist', 'skipOnError' => true, 'targetClass' => Estado::className(), 'targetAttribute' => ['estado_id' => 'estado_id']],
            [['libros_id'], 'exist', 'skipOnError' => true, 'targetClass' => Libros::className(), 'targetAttribute' => ['libros_id' => 'libros_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'copias_id' => Yii::t('app', 'Copias ID'),
            'estado_id' => Yii::t('app', 'Estado'),
            'libros_id' => Yii::t('app', 'Libros ID'),
            'nro_copia' => Yii::t('app', 'Nro Ejemplar'),
            'deposito_id' => Yii::t('app', 'Depósito'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDeposito()
    {
        return $this->hasOne(Deposito::className(), ['deposito_deposito_id' => 'deposito_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstado()
    {
        return $this->hasOne(Estado::className(), ['estado_id' => 'estado_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLibros()
    {
        return $this->hasOne(Libros::className(), ['libros_id' => 'libros_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrestamos()
    {
        return $this->hasMany(Prestamos::className(), ['copias_id' => 'copias_id']);
    }

    /**
     * @inheritdoc
     * @return CopiasQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CopiasQuery(get_called_class());
    }
}
