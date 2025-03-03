<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace backend\dao;
use backend\models\Files;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use Yii;
/**
 * Description of UserDao
 *
 * @author harley.medina
 */
class FilesDao {
    
    static function findModel($id)
    {
        $model = Files::findOne($id);
        return $model;
    }
    
    
   
   
    static function DameFiles($paciente_id,$objeto_id)
    {
        $lstSecundarias= Files::find()->where(['id_objeto'=>$objeto_id,'paciente_id'=>$paciente_id])->orderBy('orden','desc')->all();
        return $lstSecundarias;    
    }
    
     static function DameFilesByType($paciente_id,$tipo)
    {
        $lstSecundarias= Files::find()->where(['tipo'=>$tipo,'paciente_id'=>$paciente_id])->orderBy('orden','desc')->all();
        return $lstSecundarias;    
    }
    
    public function delete($id)
    {
        $this->findModel($id)->delete();    
    }

}
