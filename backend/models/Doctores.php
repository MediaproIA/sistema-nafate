<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "doctores".
 *
 * @property int $doctor_id
 * @property string $nombre
 * @property string $apellidos
 * @property string $cedula_professional
 * @property string|null $telefono
 * @property string|null $email
 * @property string $especialidad
 * @property string $direccion
 * @property string $dire_larga
 * @property int $usuario_asignado
 * @property int $usuario_creacion
 * @property int $usuario_modificacion
 * @property string $fecha_creacion
 * @property string $fecha_modificacion
 */
class Doctores extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'doctores';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'apellidos', 'cedula_professional', 'especialidad', 'direccion', 'dire_larga', 'usuario_asignado', 'usuario_creacion', 'usuario_modificacion', 'fecha_creacion', 'fecha_modificacion'], 'required'],
            [['direccion', 'dire_larga'], 'string'],
            [['usuario_asignado', 'usuario_creacion', 'usuario_modificacion'], 'integer'],
            [['fecha_creacion', 'fecha_modificacion'], 'safe'],
            [['nombre', 'apellidos', 'especialidad'], 'string', 'max' => 200],
            [['cedula_professional'], 'string', 'max' => 30],
            [['telefono'], 'string', 'max' => 20],
            [['email'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'doctor_id' => 'Doctor ID',
            'nombre' => 'Nombre',
            'apellidos' => 'Apellidos',
            'cedula_professional' => 'Cedula Professional',
            'telefono' => 'Telefono',
            'email' => 'Email',
            'especialidad' => 'Especialidad',
            'direccion' => 'Direccion',
            'dire_larga' => 'Dire Larga',
            'usuario_asignado' => 'Usuario Asignado',
            'usuario_creacion' => 'Usuario Creacion',
            'usuario_modificacion' => 'Usuario Modificacion',
            'fecha_creacion' => 'Fecha Creacion',
            'fecha_modificacion' => 'Fecha Modificacion',
        ];
    }
}
