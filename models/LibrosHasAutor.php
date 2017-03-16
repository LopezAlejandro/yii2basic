<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "libros_has_autor".
 *
 * @property integer $libros_id
 * @property integer $autor_id
 *
 * @property Autor $autor
 * @property Libros $libros
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
            [['libros_id', 'autor_id'], 'required'],
            [['libros_id', 'autor_id'], 'integer'],
            [['autor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Autor::className(), 'targetAttribute' => ['autor_id' => 'id']],
            [['libros_id'], 'exist', 'skipOnError' => true, 'targetClass' => Libros::className(), 'targetAttribute' => ['libros_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'libros_id' => Yii::t('app', 'Libros ID'),
            'autor_id' => Yii::t('app', 'Autor ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAutor()
    {
        return $this->hasOne(Autor::className(), ['id' => 'autor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLibros()
    {
        return $this->hasOne(Libros::className(), ['id' => 'libros_id']);
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
