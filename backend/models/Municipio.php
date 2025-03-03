<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "municipio".
 *
 * @property string $cve_mun
 * @property string $nom_mun
 * @property string $cve_cab
 * @property string $nom_cab
 * @property string $fechaModificacion
 * @property string $cve_ent
 */
class Municipio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'municipio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cve_mun', 'nom_mun', 'cve_cab', 'nom_cab', 'cve_ent'], 'required'],
            [['fechaModificacion'], 'safe'],
            [['cve_mun'], 'string', 'max' => 3],
            [['nom_mun', 'nom_cab'], 'string', 'max' => 50],
            [['cve_cab'], 'string', 'max' => 4],
            [['cve_ent'], 'string', 'max' => 2],
            [['cve_mun', 'cve_ent'], 'unique', 'targetAttribute' => ['cve_mun', 'cve_ent'], 'message' => 'The combination of Cve Mun and Cve Ent has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cve_mun' => 'Cve Mun',
            'nom_mun' => 'Nom Mun',
            'cve_cab' => 'Cve Cab',
            'nom_cab' => 'Nom Cab',
            'fechaModificacion' => 'Fecha Modificacion',
            'cve_ent' => 'Cve Ent',
        ];
    }
}
