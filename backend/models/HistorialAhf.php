<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "historial_ahf".
 *
 * @property string $paciente_id
 * @property string $antecendente
 * @property int $usuario_creacion
 * @property int $usuario_modificacion
 * @property string $fecha_creacion
 * @property string $fecha_modificacion
 */
class HistorialAhf extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'historial_ahf';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['paciente_id', 'antecendente', 'usuario_creacion', 'usuario_modificacion', 'fecha_creacion', 'fecha_modificacion'], 'required'],
            [['antecendente'], 'string'],
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
            'antecendente' => 'Antecendente',
            'usuario_creacion' => 'Usuario Creacion',
            'usuario_modificacion' => 'Usuario Modificacion',
            'fecha_creacion' => 'Fecha Creacion',
            'fecha_modificacion' => 'Fecha Modificacion',
        ];
    }
}
