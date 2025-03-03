<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "notas_medicas".
 *
 * @property int $id
 * @property string $paciente_id
 * @property string $nota
 * @property int $usuario_creacion
 * @property int $usuario_modificacion
 * @property string $fecha_creacion
 * @property string $fecha_modificacion
 * @property string $fecha
 * @property string $hora
 */
class NotasMedicas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'notas_medicas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['paciente_id', 'nota', 'usuario_creacion', 'usuario_modificacion', 'fecha_creacion', 'fecha_modificacion', 'fecha', 'hora'], 'required'],
            [['nota'], 'string'],
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
            'nota' => 'Nota',
            'usuario_creacion' => 'Usuario Creacion',
            'usuario_modificacion' => 'Usuario Modificacion',
            'fecha_creacion' => 'Fecha Creacion',
            'fecha_modificacion' => 'Fecha Modificacion',
            'fecha' => 'Fecha',
            'hora' => 'Hora',
        ];
    }
}
