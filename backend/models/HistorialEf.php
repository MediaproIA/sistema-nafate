<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "historial_ef".
 *
 * @property string $paciente_id
 * @property string|null $TA
 * @property string|null $TA_2
 * @property string|null $FC
 * @property string|null $FR
 * @property string|null $Peso
 * @property string|null $Talla
 * @property string|null $IMC
 * @property string|null $Temp
 * @property string|null $exploracion_fisica
 * @property string|null $estudios
 * @property string|null $diagnostico
 * @property string|null $tratamiento
 * @property int $usuario_creacion
 * @property int $usuario_modificacion
 * @property string $fecha_creacion
 * @property string $fecha_modificacion
 */
class HistorialEf extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'historial_ef';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['paciente_id', 'usuario_creacion', 'usuario_modificacion', 'fecha_creacion', 'fecha_modificacion'], 'required'],
            [['exploracion_fisica', 'estudios', 'diagnostico', 'tratamiento'], 'string'],
            [['usuario_creacion', 'usuario_modificacion'], 'integer'],
            [['fecha_creacion', 'fecha_modificacion'], 'safe'],
            [['paciente_id'], 'string', 'max' => 36],
            [['TA', 'TA_2', 'FC', 'FR', 'Peso', 'Talla', 'IMC', 'Temp'], 'string', 'max' => 5],
            [['paciente_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'paciente_id' => 'Paciente ID',
            'TA' => 'Ta',
            'TA_2' => 'Ta 2',
            'FC' => 'Fc',
            'FR' => 'Fr',
            'Peso' => 'Peso',
            'Talla' => 'Talla',
            'IMC' => 'Imc',
            'Temp' => 'Temp',
            'exploracion_fisica' => 'Exploracion Fisica',
            'estudios' => 'Estudios',
            'diagnostico' => 'Diagnostico',
            'tratamiento' => 'Tratamiento',
            'usuario_creacion' => 'Usuario Creacion',
            'usuario_modificacion' => 'Usuario Modificacion',
            'fecha_creacion' => 'Fecha Creacion',
            'fecha_modificacion' => 'Fecha Modificacion',
        ];
    }
}
