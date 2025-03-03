<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace backend\dao;
use Yii;
use backend\models\HistorialAhf;
use backend\models\HistorialApp;
use backend\models\HistorialApnp;
use backend\models\HistorialPa;
use backend\models\HistorialEf;
use backend\models\HistorialGineco;
use backend\models\HistorialComentarios;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
/**
 * Description of UserDao
 *
 * @author harley.medina
 */
class HistorialDao {
    
    static function GetAHF ($pacientes_id)
    {
        $model = HistorialAhf::findOne($pacientes_id);
        return $model;
    }
    
     static function findModelAHF ($pacientes_id)
    {
        $model = HistorialAhf::findOne($pacientes_id);
        return  $model==null ? new HistorialAhf():$model;
    }
    
    static function GetAAPP ($pacientes_id)
    {
        $model = HistorialApp::findOne($pacientes_id);
        return $model;
    }
    
     static function findModelAPP ($pacientes_id)
    {
        $model = HistorialApp::findOne($pacientes_id);
        return  $model==null ? new HistorialApp():$model;
    }
    
     static function GetPA ($pacientes_id)
    {
        $model = HistorialPa::findOne($pacientes_id);
        return $model;
    }
    
     static function findModelPA ($pacientes_id)
    {
        $model = HistorialPa::findOne($pacientes_id);
        return  $model==null ? new HistorialPa():$model;
    }
    
    static function GetEF ($pacientes_id)
    {
        $model = HistorialEf::findOne($pacientes_id);
        return $model;
    }
    
     static function findModelEF ($pacientes_id)
    {
        $model = HistorialEf::findOne($pacientes_id);
        return  $model==null ? new HistorialEf():$model;
    }
    
    static function GetHisComentarios ($pacientes_id)
    {
        $model = HistorialComentarios::findOne($pacientes_id);
        return $model;
    }
    
     static function findModelHC ($pacientes_id)
    {
        $model = HistorialComentarios::findOne($pacientes_id);
        return  $model==null ? new HistorialComentarios():$model;
    }
    
    static function GetHisApnp ($pacientes_id)
    {
        $model = HistorialApnp::findOne($pacientes_id);
        return $model;
    }
    
    static function GetHisGineco ($pacientes_id)
    {
        $model = HistorialGineco::findOne($pacientes_id);
      return $model;
    }
    
      static function findModelGineco ($pacientes_id)
    {
        $model = HistorialGineco::findOne($pacientes_id);
         if($model==null )
         {
            $model = new HistorialGineco();
         }
         else
         {
            
            if($model->embarazada==1)
            {
                $model->fecha_parto=Yii::$app->formatter->asDate($model->fecha_parto, 'MM/dd/yyyy'); 
            }
            
            if($model->ultima_regla != null)
            {
                $model->ultima_regla=Yii::$app->formatter->asDate($model->ultima_regla, 'MM/dd/yyyy'); 
            }
         }
        
        return $model;
    }
    
     static function findModelApnp ($pacientes_id)
    {
        $model = HistorialApnp::findOne($pacientes_id);
        return  $model==null ? new HistorialApnp():$model;
    }
}

