<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "prestamos".
 *
 * @property integer $prestamos_id
 * @property integer $extension
 * @property string $fecha_devolucion
 * @property integer $lectores_idl
 * @property integer $copias_id
 *
 * @property Copias $copias
 * @property Lectores $lectoresIdl
 * @property PrestamosHasMultas[] $prestamosHasMultas
 * @property Multas[] $prestamosMultas
 */
class Prestamos extends \yii\db\ActiveRecord
{
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
    public function rules()
    {
        return [
            [['extension', 'lectores_idl', 'copias_id'], 'integer'],
            [['fecha_devolucion', 'lectores_idl', 'copias_id'], 'required'],
            [['fecha_devolucion'], 'safe'],
            [['copias_id'], 'exist', 'skipOnError' => true, 'targetClass' => Copias::className(), 'targetAttribute' => ['copias_id' => 'copias_id']],
            [['lectores_idl'], 'exist', 'skipOnError' => true, 'targetClass' => Lectores::className(), 'targetAttribute' => ['lectores_idl' => 'lectores_id']],
        ];
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCopias()
    {
        return $this->hasOne(Copias::className(), ['copias_id' => 'copias_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLectoresIdl()
    {
        return $this->hasOne(Lectores::className(), ['lectores_id' => 'lectores_idl']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrestamosHasMultas()
    {
        return $this->hasMany(PrestamosHasMultas::className(), ['prestamos_prestamos_id' => 'prestamos_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrestamosMultas()
    {
        return $this->hasMany(Multas::className(), ['multas_id' => 'prestamos_multas_id'])->viaTable('prestamos_has_multas', ['prestamos_prestamos_id' => 'prestamos_id']);
    }

    /**
     * @inheritdoc
     * @return PrestamosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PrestamosQuery(get_called_class());
    }
}
