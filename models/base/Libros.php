<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the base model class for table "libros".
 *
 * @property integer $libros_id
 * @property string $titulo
 * @property string $editorial
 * @property integer $ano
 * @property integer $tipo_libro_id
 * @property integer $nro_libro
 * @property integer $edicion
 *
 * @property \app\models\Copias[] $copias
 * @property \app\models\TipoLibro $tipoLibro
 * @property \app\models\LibrosHasAutor[] $librosHasAutors
 * @property \app\models\Autor[] $autorAutors
 */
class Libros extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['titulo', 'nro_libro'], 'required'],
            [['ano', 'tipo_libro_id', 'nro_libro', 'edicion'], 'integer'],
            [['titulo', 'editorial'], 'string', 'max' => 45]
        ];
    }
    
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
        return $this->hasMany(\app\models\Copias::className(), ['libros_id' => 'libros_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoLibro()
    {
        return $this->hasOne(\app\models\TipoLibro::className(), ['tipo_tipo_libro_id' => 'tipo_libro_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLibrosHasAutors()
    {
        return $this->hasMany(\app\models\LibrosHasAutor::className(), ['libros_libros_id' => 'libros_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAutorAutors()
    {
        return $this->hasMany(\app\models\Autor::className(), ['autor_id' => 'autor_autor_id'])->viaTable('libros_has_autor', ['libros_libros_id' => 'libros_id']);
    }
    
/**
     * @inheritdoc
     * @return array mixed
     */ 
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new \yii\db\Expression('NOW()'),
            ],
            'blameable' => [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
            ],
        ];
    }

    /**
     * @inheritdoc
     * @return \app\models\LibrosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\LibrosQuery(get_called_class());
    }
}
