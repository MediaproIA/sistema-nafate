<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "historial_apnp".
 *
 * @property string $paciente_id
 * @property string|null $lugar_origen
 * @property string|null $lugar_residencia
 * @property string|null $ocupacion
 * @property string|null $estado_civil
 * @property string|null $religion
 * @property string|null $escolaridad
 * @property string|null $grupo_sanguineo
 * @property string|null $alcolismo
 * @property int|null $tabaco
 * @property string|null $drogas
 * @property string|null $activiad_fisica
 * @property string|null $inmunizaciones
 * @property string|null $nombre_pareja
 * @property int|null $edad_pareja
 * @property string|null $comentarios
 * @property int $usuario_creacion
 * @property int $usuario_modificacion
 * @property string $fecha_creacion
 * @property string $fecha_modificacion
 */
class HistorialApnp extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'historial_apnp';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['paciente_id', 'usuario_creacion', 'usuario_modificacion', 'fecha_creacion', 'fecha_modificacion'], 'required'],
            [['tabaco', 'edad_pareja', 'usuario_creacion', 'usuario_modificacion'], 'integer'],
            [['activiad_fisica', 'comentarios'], 'string'],
            [['fecha_creacion', 'fecha_modificacion'], 'safe'],
            [['paciente_id'], 'string', 'max' => 36],
            [['lugar_origen', 'lugar_residencia', 'ocupacion', 'religion', 'escolaridad', 'grupo_sanguineo', 'nombre_pareja'], 'string', 'max' => 250],
            [['estado_civil'], 'string', 'max' => 20],
            [['alcolismo'], 'string', 'max' => 100],
            [['drogas', 'inmunizaciones'], 'string', 'max' => 300],
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
            'lugar_origen' => 'Lugar Origen',
            'lugar_residencia' => 'Lugar Residencia',
            'ocupacion' => 'Ocupacion',
            'estado_civil' => 'Estado Civil',
            'religion' => 'Religion',
            'escolaridad' => 'Escolaridad',
            'grupo_sanguineo' => 'Grupo Sanguineo',
            'alcolismo' => 'Alcolismo',
            'tabaco' => 'Tabaco',
            'drogas' => 'Drogas',
            'activiad_fisica' => 'Activiad Fisica',
            'inmunizaciones' => 'Inmunizaciones',
            'nombre_pareja' => 'Nombre Pareja',
            'edad_pareja' => 'Edad Pareja',
            'comentarios' => 'Comentarios',
            'usuario_creacion' => 'Usuario Creacion',
            'usuario_modificacion' => 'Usuario Modificacion',
            'fecha_creacion' => 'Fecha Creacion',
            'fecha_modificacion' => 'Fecha Modificacion',
        ];
    }
}
