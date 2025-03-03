<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace backend\dao;
use common\models\User;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
/**
 * Description of UserDao
 *
 * @author harley.medina
 */
class UserDao {
    
    static function findModel($id)
    {
         $model = User::find()->where(['id' => $id])->one();  
       return $model;
    }
    
    static function getList($sEcho,$iDisplayStart,$iDisplayLength,$sSearch)
    {
        $families =User::find();
        $arrayFamilies = $families->select('id,email,status')
                          ->where(($sSearch != "" ? ['like', 'id', $sSearch] : "1"))
                          ->orWhere(($sSearch != "" ? ['like', 'email', $sSearch] : "1"))
                          ->limit($iDisplayLength)
                          ->offset($iDisplayStart)
                          ->all();
        $totalRecors = $families->count();
        $data = ['sEcho' => $sEcho, 
                'iTotalRecords' => $totalRecors, 
                'iTotalDisplayRecords' => $totalRecors, 
                'aaData' =>ArrayHelper::getColumn($arrayFamilies, function ($element) {
                            $urlupdate= Url::to(['user/update', 'id' => $element['id']]);  
                              $boton='<a href="'.$urlupdate.'" class="btn btn-primary"><i class="fa fa-edit"></i></a>'; 
                              return [$element['id'],$element['email'],$element['status']==10?'<span class="label label-info label-inline mr-2">Activo</span>':'<span class="label label-danger label-inline mr-2">Desactivo</span>',$boton,$element];
                          })
                ];
                          
        return $data;
    

    }
}
