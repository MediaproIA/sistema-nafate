<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "formatos".
 *
 * @property int $formato_id
 * @property string $nombre
 * @property string $contenido
 * @property int $activo
 * @property int $usuario_creacion
 * @property int $usuario_modificacion
 * @property string $fecha_creacion
 * @property string $fecha_modificacion
 */
class Formatos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'formatos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'contenido', 'activo', 'usuario_creacion', 'usuario_modificacion', 'fecha_creacion', 'fecha_modificacion'], 'required'],
            [['contenido'], 'string'],
            [['activo', 'usuario_creacion', 'usuario_modificacion'], 'integer'],
            [['fecha_creacion', 'fecha_modificacion'], 'safe'],
            [['nombre'], 'string', 'max' => 300],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'formato_id' => 'Formato ID',
            'nombre' => 'Nombre',
            'contenido' => 'Contenido',
            'activo' => 'Activo',
            'usuario_creacion' => 'Usuario Creacion',
            'usuario_modificacion' => 'Usuario Modificacion',
            'fecha_creacion' => 'Fecha Creacion',
            'fecha_modificacion' => 'Fecha Modificacion',
        ];
    }
}
