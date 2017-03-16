<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "copias".
 *
 * @property integer $id
 * @property integer $estado_id
 * @property integer $libros_id
 *
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
            [['estado_id', 'libros_id'], 'required'],
            [['estado_id', 'libros_id'], 'integer'],
            [['estado_id'], 'exist', 'skipOnError' => true, 'targetClass' => Estado::className(), 'targetAttribute' => ['estado_id' => 'id']],
            [['libros_id'], 'exist', 'skipOnError' => true, 'targetClass' => Libros::className(), 'targetAttribute' => ['libros_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'estado_id' => Yii::t('app', 'Estado ID'),
            'libros_id' => Yii::t('app', 'Libros ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstado()
    {
        return $this->hasOne(Estado::className(), ['id' => 'estado_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLibros()
    {
        return $this->hasOne(Libros::className(), ['id' => 'libros_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrestamos()
    {
        return $this->hasMany(Prestamos::className(), ['copias_id' => 'id']);
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
