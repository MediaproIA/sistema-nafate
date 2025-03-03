<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace backend\dao;
use Yii;
use backend\models\Pacientes;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
/**
 * Description of UserDao
 *
 * @author harley.medina
 */
class PacientesDao {
    
    static function findModel ($pacientes_id)
    {
        $model = Pacientes::findOne($pacientes_id);
        return $model;
    }
    
    static function getAll($sEcho,$iDisplayStart,$iDisplayLength,$sSearch,$iSortCol_0, $sSortDir_0)
    {

        $families = Pacientes::find();
        $array = array('pacientes.fecha_creacion','pacientes.nombres','pacientes.apellidos','pacientes.telefono_celular','pacientes.genero','pacientes.email','pacientes.fecha_creacion');
        $ordenar=$array[$iSortCol_0];
        $query = $families->select('pacientes.id,pacientes.nombres as nombres,pacientes.apellidos as apellidos,pacientes.telefono_celular as telefono_celular,pacientes.genero as genero,pacientes.email as email,pacientes.fecha_creacion as fecha_creacion');
         if ($sSearch != '' )
         {
           $query=$query->andWhere(['or',['like', 'pacientes.nombres', $sSearch],['like', 'pacientes.apellidos', $sSearch],['like', 'pacientes.telefono_celular', $sSearch],['like', 'pacientes.genero', $sSearch],['like', 'pacientes.email', $sSearch]]);
         }
       
         
         
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
    {
         $data = ['sEcho' => $sEcho, 
                'iTotalRecords' => $totalRecors, 
                'iTotalDisplayRecords' => $totalRecors, 
                'aaData' =>ArrayHelper::getColumn($arrayFamilies, function ($element) {
                           // $estatus= self::getEstatus($element['estatus']);
                               $urlupdate= Url::to(['pacientes/update', 'id' => $element['id']]);  
                               $boton='<a href="'.$urlupdate.'"><button class="btn btn-primary">Ver Expediente</button></a>'; 
                               $id=$element['id'];
                               $attri="deleteitem('".$id."')";
                               $boton.='&nbsp;<a class="btn btn-danger" onclick="'.$attri.'"><i class="flaticon-delete"></i></a>';
                                $fecha=Yii::$app->formatter->asDate($element['fecha_creacion'], 'dd/MM/yyyy');
                               return [$fecha,strtoupper($element['nombres']),strtoupper($element['apellidos']),$element['telefono_celular'],$element['genero']==1?"MASCULINO":"FEMENINO",$element['email'],$boton,$element];
                          })
                ];
                          
        return $data;
    }
    
    public function delete($pacientes_id)
    {
        $this->findModel($pacientes_id)->delete();    
    }
}
