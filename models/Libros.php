<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use app\models\TipoLibro;
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

	// declare authorsId property
	public $authorIds = [];
   
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
            [['nombre'],'safe'],
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
        return $this->hasMany(Autor::className(), ['autor_id' => 'autor_autor_id'])->viaTable('libros_has_autor', ['libros_libros_id' => 'libros_id']);
    }

    /**
     * @inheritdoc
     * @return LibrosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LibrosQuery(get_called_class());
    }
    
    
    public static function getListaTipoLibro()
	 {
    		$opciones = TipoLibro::find()->asArray()->all();
    		return ArrayHelper::map($opciones, 'tipo_libro_id', 'descripcion');
	 }
	 
	 	// you need a getter for select2 dropdown
	 public function getdropAuthor()
 	 {
    		$data = Autor::find()->asArray()->all();
    		return ArrayHelper::map($data, 'autor_id', 'nombre');
 	 }
 	 
 	 // You will need a getter for the current set o Authors in this Book
	 public function getAuthorIds()
 	 {
   		$this->authorIds = \yii\helpers\ArrayHelper::getColumn(
     		$this->getLibrosHasAutors()->asArray()->all(),
     		'author_id'
   		);
   		return $this->authorIds;
 	 }
 	 
 	 
 	 // You need to save the relations in BookHasAuthor table (adicional code for updates)
	 public function afterSave($insert,$changedAttributes)
 	 {
   		$actualAuthors = [];
   		$authorExists = 0; //for updates
 
   		if (($actualAuthors = LibrosHasAutor::find()
    			->andWhere("libros_libros_id = $this->libros_id")
    			->asArray()
    			->all()) !== null) {
      		$actualAuthors = ArrayHelper::getColumn($actualAuthors, 'autor_id');
      		$authorExists = 1; // if there is authors relations, we will work it latter
   			}
 
   		if (!empty($this->despIds)) { //save the relations
      		foreach ($this->despIds as $id) {
         	$actualAuthors = array_diff($actualAuthors, [$id]); //remove remaining authors from array
     			$r = new LibrosHasAutor();
     			$r->libros_libros_id = $this->id;
     			$r->libros_autor_id = $id;
     			$r->save();
    			}
   		}
 
   		if ($authorExists == 1) { //delete authors tha does not belong anymore to this book
    			foreach ($actualAuthors as $remove) {
      			$r = LibrosHasAutor::findOne(['autor_id' => $remove, 'libros_id' => $this->id]);
      			$r->delete();
    			}
   		}
 
   		parent::afterSave($insert,$changedAttributes); //don't forget this
	}
}
