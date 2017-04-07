<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use cornernote\linkall\LinkAllBehavior;
use yii\db\ActiveRecord;

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
 * @property Autor[] $autorAutors
 */
class Libros extends \yii\db\ActiveRecord
{

	 public $autor_ids;
	 
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
            [['titulo', 'nro_libro','autor_ids'], 'required'],
            [['ano', 'tipo_libro_id', 'nro_libro', 'edicion'], 'integer'],
            [['titulo', 'editorial'], 'string', 'max' => 45],
            [['tipo_libro_id'], 'exist', 'skipOnError' => true, 'targetClass' => TipoLibro::className(), 'targetAttribute' => ['tipo_libro_id' => 'tipo_tipo_libro_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'libros_id' => Yii::t('app', 'Libros ID'),
            'titulo' => Yii::t('app', 'Título'),
            'editorial' => Yii::t('app', 'Editorial'),
            'ano' => Yii::t('app', 'Año'),
            'tipo_libro_id' => Yii::t('app', 'Tipo de Libro'),
            'nro_libro' => Yii::t('app', 'Nro de Libro'),
            'edicion' => Yii::t('app', 'Edición'),
            'autor_ids' => Yii::t('app','Autor'),
        ];
    }
    
    public function behaviors()
    {
        return [
            LinkAllBehavior::className(),
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
        return $this->hasOne(TipoLibro::className(), ['tipo_tipo_libro_id' => 'tipo_libro_id']);
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
    public function getAutorAutors()
    {
        return $this->hasMany(Autor::className(), ['autor_id' => 'autor_autor_id'])->viaTable('libros_has_autor', ['libros_libros_id' => 'libros_id'])->orderBy('nombre');
    }
    
    /**
     * @inheritdoc
     * @return LibrosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LibrosQuery(get_called_class());
    }
    
    public function afterSave($insert, $changedAttributes)
    {
        $autores = [];
        foreach ($this->autor_ids as $autor_name) {
            $autor = Autor::getAutorByName($autor_name);
            if ($autor) {
                $autores[] = $autor;
            }
        }
        $this->linkAll('autorAutors', $autores);
        parent::afterSave($insert, $changedAttributes);
    }

    public static function getListaTipoLibro()
	 {
    		$opciones = TipoLibro::find()->asArray()->all();
    		return ArrayHelper::map($opciones, 'tipo_libro_id', 'descripcion');
	 }  
    

}
