<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "libros".
 *
 * @property integer $libros_id
 * @property string $titulo
 * @property string $editorial
 * @property integer $ano
 * @property integer $tipo_libro_id
 * @property integer $nro_libro
 * @property integer $edicion
 *
 * @property Copias[] $copias
 * @property TipoLibro $tipoLibro
 * @property LibrosHasAutor[] $librosHasAutors
 * @property Autor[] $librosAutors
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
            [['titulo', 'nro_libro'], 'required'],
            [['ano', 'tipo_libro_id', 'nro_libro', 'edicion'], 'integer'],
            [['titulo', 'editorial'], 'string', 'max' => 45],
            [['tipo_libro_id'], 'exist', 'skipOnError' => true, 'targetClass' => TipoLibro::className(), 'targetAttribute' => ['tipo_libro_id' => 'tipo_libro_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'libros_id' => Yii::t('app', 'Libros ID'),
            'titulo' => Yii::t('app', 'Titulo'),
            'editorial' => Yii::t('app', 'Editorial'),
            'ano' => Yii::t('app', 'Ano'),
            'tipo_libro_id' => Yii::t('app', 'Tipo Libro ID'),
            'nro_libro' => Yii::t('app', 'Nro Libro'),
            'edicion' => Yii::t('app', 'Edicion'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCopias()
    {
        return $this->hasMany(Copias::className(), ['libros_id' => 'libros_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoLibro()
    {
        return $this->hasOne(TipoLibro::className(), ['tipo_libro_id' => 'tipo_libro_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLibrosHasAutors()
    {
        return $this->hasMany(LibrosHasAutor::className(), ['libros_libros_id' => 'libros_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLibrosAutors()
    {
        return $this->hasMany(Autor::className(), ['autor_id' => 'libros_autor_id'])->viaTable('libros_has_autor', ['libros_libros_id' => 'libros_id']);
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
