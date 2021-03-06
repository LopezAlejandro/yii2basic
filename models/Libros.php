<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use app\models\TipoLibro;

/**
 * This is the model class for table "libros".
 *
 * @property integer $id
 * @property string $titulo
 * @property string $editorial
 * @property integer $ano
 * @property integer $tipo_libro_id
 *
 * @property Copias[] $copias
 * @property TipoLibro $tipoLibro
 * @property LibrosHasAutor[] $librosHasAutors
 * @property Autor[] $autors
 */
class Libros extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'libros';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['titulo'], 'required'],
            [['ano', 'tipo_libro_id'], 'integer'],
            [['titulo', 'editorial'], 'string', 'max' => 45],
            [['tipo_libro_id'], 'exist', 'skipOnError' => true, 'targetClass' => TipoLibro::className(), 'targetAttribute' => ['tipo_libro_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'titulo' => Yii::t('app', 'Titulo'),
            'editorial' => Yii::t('app', 'Editorial'),
            'ano' => Yii::t('app', 'Año'),
            'tipo_libro_id' => Yii::t('app', 'Tipo Libro ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCopias()
    {
        return $this->hasMany(Copias::className(), ['libros_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoLibro()
    {
        return $this->hasOne(TipoLibro::className(), ['id' => 'tipo_libro_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLibrosHasAutors()
    {
        return $this->hasMany(LibrosHasAutor::className(), ['libros_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAutors()
    {
        return $this->hasMany(Autor::className(), ['id' => 'autor_id'])->viaTable('libros_has_autor', ['libros_id' => 'id']);
    }
    
    public static function getListaTipoLibro()
	 {
    		$opciones = TipoLibro::find()->asArray()->all();
    		return ArrayHelper::map($opciones, 'id', 'descripcion');
	 }

    /**
     * @inheritdoc
     * @return LibrosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LibrosQuery(get_called_class());
    }
}
