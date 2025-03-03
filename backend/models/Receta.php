<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "receta".
 *
 * @property int $id_receta
 * @property string $paciente_id
 * @property string|null $TA
 * @property string|null $TA_2
 * @property string|null $FC
 * @property string|null $FR
 * @property string|null $Peso
 * @property string|null $Talla
 * @property string|null $IMC
 * @property string|null $Temp
 * @property string $receta
 * @property string|null $prox_cita
 * @property string|null $hora
 * @property int $usuario_creacion
 * @property int $usuario_modificacion
 * @property string $fecha_creacion
 * @property string $hora_creacion
 * @property string $fecha_modificacion
 */
class Receta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'receta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['paciente_id', 'receta', 'usuario_creacion', 'usuario_modificacion', 'fecha_creacion', 'hora_creacion', 'fecha_modificacion'], 'required'],
            [['receta'], 'string'],
            [['prox_cita', 'hora', 'fecha_creacion', 'hora_creacion', 'fecha_modificacion'], 'safe'],
            [['usuario_creacion', 'usuario_modificacion'], 'integer'],
            [['paciente_id'], 'string', 'max' => 36],
            [['TA', 'TA_2', 'FC', 'FR', 'Peso', 'Talla', 'IMC', 'Temp'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_receta' => 'Id Receta',
            'paciente_id' => 'Paciente ID',
            'TA' => 'Ta',
            'TA_2' => 'Ta 2',
            'FC' => 'Fc',
            'FR' => 'Fr',
            'Peso' => 'Peso',
            'Talla' => 'Talla',
            'IMC' => 'Imc',
            'Temp' => 'Temp',
            'receta' => 'Receta',
            'prox_cita' => 'Prox Cita',
            'hora' => 'Hora',
            'usuario_creacion' => 'Usuario Creacion',
            'usuario_modificacion' => 'Usuario Modificacion',
            'fecha_creacion' => 'Fecha Creacion',
            'hora_creacion' => 'Hora Creacion',
            'fecha_modificacion' => 'Fecha Modificacion',
        ];
    }
}
