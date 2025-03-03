<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "entidad".
 *
 * @property string $cve_ent
 * @property string $nom_ent
 * @property string $nom_abr
 * @property string $fechaModificacion
 * @property string $id_pais
 */
class Entidad extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'entidad';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cve_ent', 'nom_ent', 'nom_abr', 'id_pais'], 'required'],
            [['fechaModificacion'], 'safe'],
            [['cve_ent', 'id_pais'], 'string', 'max' => 2],
            [['nom_ent'], 'string', 'max' => 50],
            [['nom_abr'], 'string', 'max' => 10],
            [['cve_ent'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cve_ent' => 'Cve Ent',
            'nom_ent' => 'Nom Ent',
            'nom_abr' => 'Nom Abr',
            'fechaModificacion' => 'Fecha Modificacion',
            'id_pais' => 'Id Pais',
        ];
    }
}
