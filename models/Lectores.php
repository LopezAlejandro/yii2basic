<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lectores".
 *
 * @property string $usuario_crea_mod
 * @property string $create_time
 * @property string $update_time
 * @property integer $lectores_id
 * @property string $nombre
 * @property string $documento
 * @property integer $clase_lector_id
 * @property integer $clase_documento_id
 * @property string $direccion
 * @property string $telefono
 * @property string $mail
 *
 * @property ClaseDocumento $claseDocumento
 * @property ClaseLector $claseLector
 * @property LectoresHasMultas[] $lectoresHasMultas
 * @property Multas[] $lectoresMultas
 * @property Prestamos[] $prestamos
 */
class Lectores extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lectores';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['create_time', 'update_time'], 'safe'],
            [['nombre', 'documento', 'clase_lector_id', 'clase_documento_id', 'direccion', 'telefono', 'mail'], 'required'],
            [['clase_lector_id', 'clase_documento_id'], 'integer'],
            [['usuario_crea_mod'], 'string', 'max' => 255],
            [['nombre', 'documento'], 'string', 'max' => 45],
            [['direccion'], 'string', 'max' => 70],
            [['telefono'], 'string', 'max' => 15],
            [['mail'], 'string', 'max' => 50],
            [['clase_documento_id'], 'exist', 'skipOnError' => true, 'targetClass' => ClaseDocumento::className(), 'targetAttribute' => ['clase_documento_id' => 'clase_documento_id']],
            [['clase_lector_id'], 'exist', 'skipOnError' => true, 'targetClass' => ClaseLector::className(), 'targetAttribute' => ['clase_lector_id' => 'clase_lector_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'usuario_crea_mod' => Yii::t('app', 'Usuario Crea Mod'),
            'create_time' => Yii::t('app', 'Create Time'),
            'update_time' => Yii::t('app', 'Update Time'),
            'lectores_id' => Yii::t('app', 'Lectores ID'),
            'nombre' => Yii::t('app', 'Nombre'),
            'documento' => Yii::t('app', 'Documento'),
            'clase_lector_id' => Yii::t('app', 'Clase Lector ID'),
            'clase_documento_id' => Yii::t('app', 'Clase Documento ID'),
            'direccion' => Yii::t('app', 'Direccion'),
            'telefono' => Yii::t('app', 'Telefono'),
            'mail' => Yii::t('app', 'Mail'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClaseDocumento()
    {
        return $this->hasOne(ClaseDocumento::className(), ['clase_documento_id' => 'clase_documento_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClaseLector()
    {
        return $this->hasOne(ClaseLector::className(), ['clase_lector_id' => 'clase_lector_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLectoresHasMultas()
    {
        return $this->hasMany(LectoresHasMultas::className(), ['lectores_lectores_id' => 'lectores_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLectoresMultas()
    {
        return $this->hasMany(Multas::className(), ['multas_id' => 'lectores_multas_id'])->viaTable('lectores_has_multas', ['lectores_lectores_id' => 'lectores_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrestamos()
    {
        return $this->hasMany(Prestamos::className(), ['lectores_idl' => 'lectores_id']);
    }

    /**
     * @inheritdoc
     * @return LectoresQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LectoresQuery(get_called_class());
    }
}
