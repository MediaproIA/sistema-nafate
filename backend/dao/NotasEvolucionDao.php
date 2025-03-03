<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace backend\dao;
use Yii;
use backend\models\NotasEvolucion;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
/**
 * Description of UserDao
 *
 * @author harley.medina
 */
class NotasEvolucionDao {
    
    static function GetNotaEvolucion ($pacientes_id,$nota_id)
    {
        $model = NotasEvolucion::find()->where(['paciente_id'=>$pacientes_id,'id'=>$nota_id])->one();
        return $model;
    }
    
     static function findModel ($pacientes_id,$nota_id)
    {
        $model = NotasEvolucion::find()->where(['paciente_id'=>$pacientes_id,'id'=>$nota_id])->one();
        return  $model==null ? new NotasEvolucion():$model;
    }
    
    static function getAll($sEcho,$iDisplayStart,$iDisplayLength,$sSearch,$iSortCol_0, $sSortDir_0,$paciente_id)
    {

        $families = NotasEvolucion::find();
        $array = array('notas_evolucion.id','notas_evolucion.fecha_creacion','notas_evolucion.hora','notas_evolucion.id');
        $ordenar=$array[$iSortCol_0];
        $query = $families->select('notas_evolucion.id,fecha,hora')->where(['paciente_id'=>$paciente_id]);
        
       
         
         
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
                              
                              $boton='<a class="btn btn-primary" onclick="showNotaEvolucion('.$element['id'].')"><i class="flaticon-medical"></i></a>'; 
                              $boton.='&nbsp;<a class="btn btn-danger" onclick="deleteNotasEvolucion('.$element['id'].')"><i class="flaticon-delete"></i></a>';
                            
                              return [$element['id'],$fecha,$element['hora'],$boton,$element];
                          })
                ];
                          
        return $data;
    }
    
      static function getNotasAll($product_id)
    {
          
           $families = NotasEvolucion::find()
                               ->select('*')
                               ->where(['in', 'id', $product_id]);
                                
             $command = $families->createCommand();
            $lstNotas=  $command->queryAll();  
           return $lstNotas;
                                 
    }
    
    public function delete($pacientes_id,$nota_id)
    {
        $this->findModel($pacientes_id,$nota_id)->delete();    
    }

}