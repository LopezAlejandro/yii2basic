<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo_libro".
 *
 * @property integer $tipo_libro_id
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
            'tipo_libro_id' => Yii::t('app', 'Tipo Libro ID'),
            'descripcion' => Yii::t('app', 'Descripcion'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLibros()
    {
        return $this->hasMany(Libros::className(), ['tipo_tipo_libro_id' => 'tipo_libro_id']);
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
