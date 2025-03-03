<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace backend\dao;
use backend\models\Receta;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use Yii;
/**
 * Description of UserDao
 *
 * @author harley.medina
 */
class RecetasDao {
    
    static function GetReceta ($pacientes_id,$nota_id)
    {
        $model = Receta::find()->where(['paciente_id'=>$pacientes_id,'id_receta'=>$nota_id])->one();
        return $model;
    }
    
     static function findModel ($pacientes_id,$nota_id)
    {
        $model = Receta::find()->where(['paciente_id'=>$pacientes_id,'id_receta'=>$nota_id])->one();
        return  $model==null ? new Receta():$model;
    }
    
    static function getAll($sEcho,$iDisplayStart,$iDisplayLength,$sSearch,$iSortCol_0, $sSortDir_0,$paciente_id)
    {

        $families = Receta::find();
        $array = array('receta.id_receta','receta.fecha_creacion','receta.hora_creacion','receta.id_receta');
        $ordenar=$array[$iSortCol_0];
        $query = $families->select('receta.id_receta,receta.fecha_creacion as fecha,hora_creacion')->where(['paciente_id'=>$paciente_id]);
        
       
         
         
        if ($sSortDir_0=='asc')
        {
            $query=$query->orderBy([$ordenar =>SORT_ASC]);
        }
        else
        {
            $query=$query->orderBy([$ordenar =>SORT_DESC]);
        }
        
        $query=$query->limit($iDisplayLength)
                       ->offset($iDisplayStart);
        $command = $query->createCommand();
        $arrayFamilies = $command->queryAll();  
        $totalRecors = $families->count();
        $data =self::getData($sEcho, $totalRecors, $arrayFamilies);
        return $data;
    }
    
    
    static function getData($sEcho,$totalRecors,$arrayFamilies)
    {    $contador=0;
         $data = ['sEcho' => $sEcho, 
                'iTotalRecords' => $totalRecors, 
                'iTotalDisplayRecords' => $totalRecors, 
                'aaData' =>ArrayHelper::getColumn($arrayFamilies, function ($element) {
                              
                              $fecha=Yii::$app->formatter->asDate($element['fecha'], 'dd/MM/yyyy');
                              $hora=$element['hora_creacion'] ;
                              $boton='<a class="btn btn-primary" onclick="showReceta('.$element['id_receta'].')"><i class="flaticon-medical"></i></a>'; 
                                $boton.='&nbsp;<a class="btn btn-danger" onclick="deleteRecetas('.$element['id_receta'].')"><i class="flaticon-delete"></i></a>'; 
                              return [$element['id_receta'],$fecha,$hora,$boton,$element];
                          })
                ];
                          
        return $data;
    }
    
    static function getRecetasAll($product_id)
    {
          
           $families = Receta::find()
                               ->select('*')
                               ->where(['in', 'id_receta', $product_id]);
                                
             $command = $families->createCommand();
            $lstNotas=  $command->queryAll();  
           return $lstNotas;
                                 
    }
    
       public function delete($pacientes_id,$nota_id)
    {
        $this->findModel($pacientes_id,$nota_id)->delete();    
    }
}
