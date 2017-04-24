<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "libros_has_autor".
 *
 * @property integer $libros_libros_id
 * @property integer $autor_autor_id
 *
 * @property Autor $autorAutor
 * @property Libros $librosLibros
 */
class LibrosHasAutor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'libros_has_autor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['libros_libros_id', 'autor_autor_id'], 'required'],
            [['libros_libros_id', 'autor_autor_id'], 'integer'],
            [['autor_autor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Autor::className(), 'targetAttribute' => ['autor_autor_id' => 'autor_id']],
            [['libros_libros_id'], 'exist', 'skipOnError' => true, 'targetClass' => Libros::className(), 'targetAttribute' => ['libros_libros_id' => 'libros_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'libros_libros_id' => Yii::t('app', 'Libros Libros ID'),
            'autor_autor_id' => Yii::t('app', 'Autor Autor ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAutorAutor()
    {
        return $this->hasOne(Autor::className(), ['autor_id' => 'autor_autor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLibrosLibros()
    {
        return $this->hasOne(Libros::className(), ['libros_id' => 'libros_libros_id']);
    }

    /**
     * @inheritdoc
     * @return LibrosHasAutorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LibrosHasAutorQuery(get_called_class());
    }
}
