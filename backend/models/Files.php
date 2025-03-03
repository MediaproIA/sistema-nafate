<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "files".
 *
 * @property int $id
 * @property string $paciente_id
 * @property int $tipo
 * @property string $nombre
 * @property int $id_objeto
 * @property string $extencion
 * @property int $orden
 */
class Files extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'files';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['paciente_id', 'tipo', 'nombre', 'id_objeto', 'extencion'], 'required'],
            [['tipo', 'id_objeto', 'orden'], 'integer'],
            [['paciente_id'], 'string', 'max' => 36],
            [['nombre'], 'string', 'max' => 250],
            [['extencion'], 'string', 'max' => 5],
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
            'tipo' => 'Tipo',
            'nombre' => 'Nombre',
            'id_objeto' => 'Id Objeto',
            'extencion' => 'Extencion',
            'orden' => 'Orden',
        ];
    }
}
