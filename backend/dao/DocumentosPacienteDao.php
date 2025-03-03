<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace backend\dao;
use backend\models\Documentos;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use Yii;
/**
 * Description of UserDao
 *
 * @author harley.medina
 */
class DocumentosPacienteDao {
    
    static function Getdocumento ($pacientes_id,$nota_id)
    {
        $model = Documentos::find()->where(['paciente_id'=>$pacientes_id,'id'=>$nota_id])->one();
        return $model;
    }
    
     static function findModel ($pacientes_id,$nota_id)
    {
        $model = Documentos::find()->where(['paciente_id'=>$pacientes_id,'id'=>$nota_id])->one();
        return  $model==null ? new Documentos():$model;
    }
    
    static function getAll($sEcho,$iDisplayStart,$iDisplayLength,$sSearch,$iSortCol_0, $sSortDir_0,$paciente_id)
    {

        $families = Documentos::find();
        $array = array('id','fecha_creacion','nombre','id');
        $ordenar=$array[$iSortCol_0];
        $query = $families->select('id,nombre,fecha_creacion as fecha')->where(['paciente_id'=>$paciente_id]);
        
       
         
         
        if ($sSortDir_0=='asc')
        {
            $query=$query->orderBy([$ordenar =>SORT_DESC]);
        }
        else
        {
            $query=$query->orderBy([$ordenar =>SORT_ASC]);
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
                              $hora=Yii::$app->formatter->asTime($element['fecha'], 'H:i:s');
                              $boton='<a class="btn btn-primary" onclick="showDocumento('.$element['id'].')"><i class="flaticon-medical"></i></a>'; 
                              $boton.='&nbsp;<a class="btn btn-danger" onclick="deleteFiles('.$element['id'].')"><i class="flaticon-delete"></i></a>'; 
                              return [$element['id'],$fecha,$element['nombre'],$boton,$element];
                          })
                ];
                          
        return $data;
    }
    
    static function getDocumentosAll($product_id)
    {
          
           $families = Documentos::find()
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
