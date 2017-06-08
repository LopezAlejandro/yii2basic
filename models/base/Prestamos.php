<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the base model class for table "prestamos".
 *
 * @property integer $prestamos_id
 * @property integer $extension
 * @property string $fecha_devolucion
 * @property integer $lectores_idl
 * @property integer $copias_id
 * @property integer $activo
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property \app\models\Copias $copias
 * @property \app\models\Lectores $lectoresIdl
 * @property \app\models\PrestamosHasMultas[] $prestamosHasMultas
 * @property \app\models\Multas[] $prestamosMultas
 */
class Prestamos extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['extension', 'lectores_idl', 'copias_id', 'activo'], 'integer'],
            [['fecha_devolucion', 'lectores_idl', 'copias_id', 'activo'], 'required'],
            [['fecha_devolucion', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'safe']
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prestamos';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'prestamos_id' => Yii::t('app', 'Prestamos ID'),
            'extension' => Yii::t('app', 'Extension'),
            'fecha_devolucion' => Yii::t('app', 'Fecha Devolucion'),
            'lectores_idl' => Yii::t('app', 'Lectores Idl'),
            'copias_id' => Yii::t('app', 'Copias ID'),
            'activo' => Yii::t('app', 'Activo'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCopias()
    {
        return $this->hasOne(\app\models\Copias::className(), ['copias_id' => 'copias_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLectoresIdl()
    {
        return $this->hasOne(\app\models\Lectores::className(), ['lectores_id' => 'lectores_idl']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrestamosHasMultas()
    {
        return $this->hasMany(\app\models\PrestamosHasMultas::className(), ['prestamos_prestamos_id' => 'prestamos_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrestamosMultas()
    {
        return $this->hasMany(\app\models\Multas::className(), ['multas_id' => 'prestamos_multas_id'])->viaTable('prestamos_has_multas', ['prestamos_prestamos_id' => 'prestamos_id']);
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
     * @return \app\models\PrestamosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\PrestamosQuery(get_called_class());
    }
}
