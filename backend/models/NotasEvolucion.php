<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "notas_evolucion".
 *
 * @property int $id
 * @property string $paciente_id
 * @property string $nota_evolucion
 * @property int $usuario_creacion
 * @property int $usuario_modificacion
 * @property string $fecha_creacion
 * @property string $fecha_modificacion
 * @property string $fecha
 * @property string $hora
 */
class NotasEvolucion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'notas_evolucion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['paciente_id', 'nota_evolucion', 'usuario_creacion', 'usuario_modificacion', 'fecha_creacion', 'fecha_modificacion', 'fecha', 'hora'], 'required'],
            [['nota_evolucion'], 'string'],
            [['usuario_creacion', 'usuario_modificacion'], 'integer'],
            [['fecha_creacion', 'fecha_modificacion', 'fecha', 'hora'], 'safe'],
            [['paciente_id'], 'string', 'max' => 36],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'paciente_id' => 'Paciente ID',
            'nota_evolucion' => 'Nota Evolucion',
            'usuario_creacion' => 'Usuario Creacion',
            'usuario_modificacion' => 'Usuario Modificacion',
            'fecha_creacion' => 'Fecha Creacion',
            'fecha_modificacion' => 'Fecha Modificacion',
            'fecha' => 'Fecha',
            'hora' => 'Hora',
        ];
    }
}
