<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "autor".
 *
 * @property integer $autor_id
 * @property string $nombre
 * @property string $nacionalidad
 * @property string $nacimiento
 *
 * @property LibrosHasAutor[] $librosHasAutors
 * @property Libros[] $librosLibros
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
            'autor_id' => Yii::t('app', 'Autor ID'),
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
        return $this->hasMany(LibrosHasAutor::className(), ['autor_autor_id' => 'autor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLibrosLibros()
    {
        return $this->hasMany(Libros::className(), ['libros_id' => 'libros_libros_id'])->viaTable('libros_has_autor', ['autor_autor_id' => 'autor_id']);
    }

    /**
     * @inheritdoc
     * @return AutorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AutorQuery(get_called_class());
    }
    
    /**
 	 * @return array
 	 */
	 public static function getListAutor()
	 {
    	$models = static::find()->orderBy('nombre')->all();

    	return ArrayHelper::map($models, 'autor_id', 'nombre');
	 }
	 
	 
	 public static function getAutorByName($name)
    {
        $autor = Autor::find()->where(['nombre' => $name])->one();
        if (!$autor) {
            $autor = new Autor();
            $autor->nombre = $name;
            $autor->save(false);
        }
        return $autor;
    }
}
