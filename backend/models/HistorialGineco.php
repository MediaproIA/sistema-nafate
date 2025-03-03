<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "historial_gineco".
 *
 * @property string $paciente_id
 * @property string|null $ultima_regla
 * @property int $embarazada
 * @property string|null $fecha_parto
 * @property string|null $monarca
 * @property string|null $menupaucia
 * @property string|null $embarazos
 * @property string|null $partos
 * @property string|null $cesareas
 * @property string|null $abortos
 * @property string|null $hijos
 * @property string|null $comentarios
 */
class HistorialGineco extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'historial_gineco';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['paciente_id', 'embarazada'], 'required'],
            [['ultima_regla', 'fecha_parto'], 'safe'],
            [['embarazada'], 'integer'],
            [['monarca', 'menupaucia', 'comentarios'], 'string'],
            [['paciente_id'], 'string', 'max' => 36],
            [['embarazos', 'partos', 'cesareas', 'abortos', 'hijos'], 'string', 'max' => 100],
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
            'ultima_regla' => 'Ultima Regla',
            'embarazada' => 'Embarazada',
            'fecha_parto' => 'Fecha Parto',
            'monarca' => 'Monarca',
            'menupaucia' => 'Menupaucia',
            'embarazos' => 'Embarazos',
            'partos' => 'Partos',
            'cesareas' => 'Cesareas',
            'abortos' => 'Abortos',
            'hijos' => 'Hijos',
            'comentarios' => 'Comentarios',
        ];
    }
}
