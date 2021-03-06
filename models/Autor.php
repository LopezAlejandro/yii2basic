<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "autor".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $nacionalidad
 * @property string $nacimiento
 *
 * @property LibrosHasAutor[] $librosHasAutors
 * @property Libros[] $libros
 */
class Autor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'autor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nacimiento'], 'safe'],
            [['nombre', 'nacionalidad'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nombre' => Yii::t('app', 'Nombre'),
            'nacionalidad' => Yii::t('app', 'Nacionalidad'),
            'nacimiento' => Yii::t('app', 'Nacimiento'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLibrosHasAutors()
    {
        return $this->hasMany(LibrosHasAutor::className(), ['autor_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLibros()
    {
        return $this->hasMany(Libros::className(), ['id' => 'libros_id'])->viaTable('libros_has_autor', ['autor_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return AutorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AutorQuery(get_called_class());
    }
}
