<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "historial_app".
 *
 * @property string $paciente_id
 * @property string|null $enfermedades
 * @property string|null $infecciosos
 * @property string|null $tumorales
 * @property string|null $quirurgicos
 * @property string|null $traumaticos
 * @property string|null $tranfucionales
 * @property string|null $alergicos
 * @property int $usuario_creacion
 * @property int $usuario_modificacion
 * @property string $fecha_creacion
 * @property string $fecha_modificacion
 */
class HistorialApp extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'historial_app';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['paciente_id', 'usuario_creacion', 'usuario_modificacion', 'fecha_creacion', 'fecha_modificacion'], 'required'],
            [['enfermedades', 'infecciosos', 'tumorales', 'quirurgicos', 'traumaticos', 'tranfucionales', 'alergicos'], 'string'],
            [['usuario_creacion', 'usuario_modificacion'], 'integer'],
            [['fecha_creacion', 'fecha_modificacion'], 'safe'],
            [['paciente_id'], 'string', 'max' => 36],
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
            'enfermedades' => 'Enfermedades',
            'infecciosos' => 'Infecciosos',
            'tumorales' => 'Tumorales',
            'quirurgicos' => 'Quirurgicos',
            'traumaticos' => 'Traumaticos',
            'tranfucionales' => 'Tranfucionales',
            'alergicos' => 'Alergicos',
            'usuario_creacion' => 'Usuario Creacion',
            'usuario_modificacion' => 'Usuario Modificacion',
            'fecha_creacion' => 'Fecha Creacion',
            'fecha_modificacion' => 'Fecha Modificacion',
        ];
    }
}
