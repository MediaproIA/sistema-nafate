<?php
namespace backend\dao;
use backend\models\Doctores;
use yii\helpers\ArrayHelper;
use Yii;
use yii\helpers\Url;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class DoctorDao
{
    static function findModel($id)
    {
        $model = Doctores::findOne($id);
        return $model;
    }
    
     static function finddoctor($id)
    {
        $doctor= Doctores::find()->where(['usuario_asignado'=>$id])->one();
        return $doctor;  
    }
    
   static function getList($sEcho,$iDisplayStart,$iDisplayLength,$sSearch,$iSortCol_0, $sSortDir_0)
   {
       $families = Doctores::find();
        $array = array('doctor_id','nombre','apellidos','cedula_professional','telefono','id');
        $ordenar=$array[$iSortCol_0];
        $arrayFamilies = $families->select('doctor_id,nombre,apellidos,cedula_professional,telefono')
                          ->where(($sSearch != "" ? ['like', 'nombre', $sSearch] : "1"))
                          ->orWhere(($sSearch != "" ? ['like', 'apellidos', $sSearch] : "1"))
                          ->orWhere(($sSearch != "" ? ['like', 'cedula_professional', $sSearch] : "1"))
                          ->orWhere(($sSearch != "" ? ['like', 'telefono', $sSearch] : "1"))
                          ->orWhere(($sSearch != "" ? ['like', 'doctor_id', $sSearch] : "1"))
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
                              $urlupdate= Url::to(['doctores/update', 'id' => $element['doctor_id']]);  
                              $boton='<a href="'.$urlupdate.'" class="btn btn-primary"><i class="fa fa-edit"></i></a>'; 
                              $boton.='&nbsp;<a class="btn btn-danger" onclick="deleteitem('.$element['doctor_id'].')"><i class="flaticon-delete"></i></a>';
                              return [$element['doctor_id'],$element['nombre'],$element['apellidos'],$element['cedula_professional'],$element['telefono'],$boton,$element];
                          })
                ];
                          
        return $data;
   }
   
 
    
    
}



