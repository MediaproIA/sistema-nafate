<?php
namespace backend\dao;
use backend\models\Medicamentos;
use yii\helpers\ArrayHelper;
use Yii;
use yii\helpers\Url;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class MedicamentosDao
{
    static function findModel($id)
    {
        $model = Medicamentos::findOne($id);
        return $model;
    }
    
    
   static function getList($sEcho,$iDisplayStart,$iDisplayLength,$sSearch,$iSortCol_0, $sSortDir_0)
   {
       $families = Medicamentos::find();
        $array = array('id','nombre','activo','id');
        $ordenar=$array[$iSortCol_0];
        $arrayFamilies = $families->select('id,nombre,activo')
                          ->where(($sSearch != "" ? ['like', 'nombre', $sSearch] : "1"))
                          ->orWhere(($sSearch != "" ? ['like', 'id', $sSearch] : "1"))
                         ->limit($iDisplayLength)
                          ->offset($iDisplayStart);
                         
        if ($sSortDir_0=='asc')
        {
            $arrayFamilies=$arrayFamilies->orderBy([$ordenar =>SORT_ASC]);
        }
        else
        {
            $arrayFamilies=$arrayFamilies->orderBy([$ordenar =>SORT_DESC]);
        }
        $arrayFamilies=$arrayFamilies->all();
        $totalRecors = $families->count();
        $data = ['sEcho' => $sEcho, 
                'iTotalRecords' => $totalRecors, 
                'iTotalDisplayRecords' => $totalRecors, 
                'aaData' =>ArrayHelper::getColumn($arrayFamilies, function ($element) {
                              $urlupdate= Url::to(['medicamentos/update', 'id' => $element['id']]);  
                              $boton='<a href="'.$urlupdate.'" class="btn btn-primary"><i class="fa fa-edit"></i></a>';
                              $boton.='&nbsp;<a class="btn btn-danger" onclick="deleteitem('.$element['id'].')"><i class="flaticon-delete"></i></a>';
                              return [$element['id'],$element['nombre'],$element['activo']==true?'<span class="label label-info label-inline mr-2">Activo</span>':'<span class="label label-danger label-inline mr-2">Desactivo</span>',$boton,$element];
                          })
                ];
                          
        return $data;
   }
   
    static function DameMedicamento($clave)
    {
        $lstSecundarias= Medicamentos::find()->where(['like', 'nombre', $clave])->all();
        return $lstSecundarias;    
    }
    
    
}

