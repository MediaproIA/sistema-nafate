<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "documentos".
 *
 * @property int $id
 * @property string $nombre
 * @property string $paciente_id
 * @property string $contenido
 * @property int $formato_id
 * @property int $usuario_creacion
 * @property int $usuario_modificacion
 * @property string $fecha_creacion
 * @property string $hora_creacion
 * @property string $fecha_modificacion
 */
class Documentos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'documentos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'paciente_id', 'contenido', 'formato_id', 'usuario_creacion', 'usuario_modificacion', 'fecha_creacion', 'hora_creacion', 'fecha_modificacion'], 'required'],
            [['contenido'], 'string'],
            [['formato_id', 'usuario_creacion', 'usuario_modificacion'], 'integer'],
            [['fecha_creacion', 'hora_creacion', 'fecha_modificacion'], 'safe'],
            [['nombre'], 'string', 'max' => 200],
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
            'nombre' => 'Nombre',
            'paciente_id' => 'Paciente ID',
            'contenido' => 'Contenido',
            'formato_id' => 'Formato ID',
            'usuario_creacion' => 'Usuario Creacion',
            'usuario_modificacion' => 'Usuario Modificacion',
            'fecha_creacion' => 'Fecha Creacion',
            'hora_creacion' => 'Hora Creacion',
            'fecha_modificacion' => 'Fecha Modificacion',
        ];
    }
}
