<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo_libro".
 *
 * @property integer $id
 * @property string $descripcion
 *
 * @property Libros[] $libros
 */
class TipoLibro extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo_libro';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion'], 'required'],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLibros()
    {
        return $this->hasMany(Libros::className(), ['tipo_libro_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return TipoLibroQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TipoLibroQuery(get_called_class());
    }
}
