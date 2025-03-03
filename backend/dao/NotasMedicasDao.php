<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace backend\dao;
use Yii;
use backend\models\NotasMedicas;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
/**
 * Description of UserDao
 *
 * @author harley.medina
 */
class NotasMedicasDao {
    
    static function GetNota ($pacientes_id,$nota_id)
    {
        $model = NotasMedicas::find()->where(['paciente_id'=>$pacientes_id,'id'=>$nota_id])->one();
        return $model;
    }
    
     static function findModel ($pacientes_id,$nota_id)
    {
        $model = NotasMedicas::find()->where(['paciente_id'=>$pacientes_id,'id'=>$nota_id])->one();
        return  $model==null ? new NotasMedicas():$model;
    }
    
    static function getAll($sEcho,$iDisplayStart,$iDisplayLength,$sSearch,$iSortCol_0, $sSortDir_0,$paciente_id)
    {

        $families = NotasMedicas::find();
        $array = array('notas_medicas.id','notas_medicas.fecha_creacion','notas_medicas.hora','notas_medicas.id');
        $ordenar=$array[$iSortCol_0];
        $query = $families->select('notas_medicas.id,fecha,hora')->where(['paciente_id'=>$paciente_id]);
        
       
         
         
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
                               
                              $boton='<a class="btn btn-primary" onclick="showNota('.$element['id'].')"><i class="flaticon-medical"></i></a>'; 
                              $boton.='&nbsp;<a class="btn btn-danger" onclick="deleteNotas('.$element['id'].')"><i class="flaticon-delete"></i></a>'; 
                              return [$element['id'],$fecha,$element['hora'],$boton,$element];
                          })
                ];
                          
        return $data;
    }
    
    static function getNotasAll($product_id)
    {
          
           $families = NotasMedicas::find()
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
