<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the base model class for table "prestamos_has_multas".
 *
 * @property integer $prestamos_prestamos_id
 * @property integer $prestamos_multas_id
 *
 * @property \app\models\Multas $prestamosMultas
 * @property \app\models\Prestamos $prestamosPrestamos
 */
class PrestamosHasMultas extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['prestamos_prestamos_id', 'prestamos_multas_id'], 'required'],
            [['prestamos_prestamos_id', 'prestamos_multas_id'], 'integer']
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prestamos_has_multas';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'prestamos_prestamos_id' => Yii::t('app', 'Prestamos Prestamos ID'),
            'prestamos_multas_id' => Yii::t('app', 'Prestamos Multas ID'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrestamosMultas()
    {
        return $this->hasOne(\app\models\Multas::className(), ['multas_id' => 'prestamos_multas_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrestamosPrestamos()
    {
        return $this->hasOne(\app\models\Prestamos::className(), ['prestamos_id' => 'prestamos_prestamos_id']);
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
     * @return \app\models\PrestamosHasMultasQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\PrestamosHasMultasQuery(get_called_class());
    }
}
