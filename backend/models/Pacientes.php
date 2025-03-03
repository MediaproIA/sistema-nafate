<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "pacientes".
 *
 * @property string $id
 * @property string $nombres
 * @property string $apellidos
 * @property string $fecha_nacimiento
 * @property int $genero
 * @property string|null $rfc
 * @property string|null $telefono_celular
 * @property string|null $telefono_fijo
 * @property string|null $email
 * @property string|null $direccion
 * @property string|null $extencion
 * @property string $fecha_creacion
 * @property string $fecha_actualizacion
 * @property int $usuario_creacion
 * @property int $usuario_modificacion
 * @property int $estatus
 */
class Pacientes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pacientes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'nombres', 'apellidos', 'fecha_nacimiento', 'genero', 'fecha_creacion', 'fecha_actualizacion', 'usuario_creacion', 'usuario_modificacion', 'estatus'], 'required'],
            [['fecha_nacimiento', 'fecha_creacion', 'fecha_actualizacion'], 'safe'],
            [['genero', 'usuario_creacion', 'usuario_modificacion', 'estatus'], 'integer'],
            [['direccion'], 'string'],
            [['id'], 'string', 'max' => 36],
            [['nombres', 'apellidos'], 'string', 'max' => 150],
            [['rfc'], 'string', 'max' => 20],
            [['telefono_celular', 'telefono_fijo'], 'string', 'max' => 15],
            [['email'], 'string', 'max' => 100],
            [['extencion'], 'string', 'max' => 5],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombres' => 'Nombres',
            'apellidos' => 'Apellidos',
            'fecha_nacimiento' => 'Fecha Nacimiento',
            'genero' => 'Genero',
            'rfc' => 'Rfc',
            'telefono_celular' => 'Telefono Celular',
            'telefono_fijo' => 'Telefono Fijo',
            'email' => 'Email',
            'direccion' => 'Direccion',
            'extencion' => 'Extencion',
            'fecha_creacion' => 'Fecha Creacion',
            'fecha_actualizacion' => 'Fecha Actualizacion',
            'usuario_creacion' => 'Usuario Creacion',
            'usuario_modificacion' => 'Usuario Modificacion',
            'estatus' => 'Estatus',
        ];
    }
}
