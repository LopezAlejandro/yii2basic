<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the base model class for table "multas".
 *
 * @property integer $multas_id
 * @property string $fin_multa
 * @property integer $activa
 *
 * @property \app\models\LectoresHasMultas[] $lectoresHasMultas
 * @property \app\models\Lectores[] $lectoresLectores
 * @property \app\models\PrestamosHasMultas[] $prestamosHasMultas
 * @property \app\models\Prestamos[] $prestamosPrestamos
 */
class Multas extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fin_multa'], 'required'],
            [['fin_multa'], 'safe'],
            [['activa'], 'integer']
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'multas';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'multas_id' => Yii::t('app', 'Multas ID'),
            'fin_multa' => Yii::t('app', 'Fin Multa'),
            'activa' => Yii::t('app', 'Activa'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLectoresHasMultas()
    {
        return $this->hasMany(\app\models\LectoresHasMultas::className(), ['lectores_multas_id' => 'multas_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLectoresLectores()
    {
        return $this->hasMany(\app\models\Lectores::className(), ['lectores_id' => 'lectores_lectores_id'])->viaTable('lectores_has_multas', ['lectores_multas_id' => 'multas_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrestamosHasMultas()
    {
        return $this->hasMany(\app\models\PrestamosHasMultas::className(), ['prestamos_multas_id' => 'multas_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrestamosPrestamos()
    {
        return $this->hasMany(\app\models\Prestamos::className(), ['prestamos_id' => 'prestamos_prestamos_id'])->viaTable('prestamos_has_multas', ['prestamos_multas_id' => 'multas_id']);
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
     * @return \app\models\MultasQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\MultasQuery(get_called_class());
    }
}
