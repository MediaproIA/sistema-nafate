<?php
namespace backend\bussines;

use Yii;
use backend\models\Files;
use Exception;
class Generico 
{
    
    public  function saveFiles($files_post,$tipo,$paciente_id,$id_objeto,$folder,$name){
        $basePhysical = Yii::getAlias('@webroot');
         $files=Files::find()->where(['paciente_id'=>$paciente_id,'id_objeto'=>$id_objeto])->count();
        
        $countfiles =isset($files_post['documents']['name'])? count($files_post['documents']['name']):0;
      
       
        if ($countfiles > 0) {
         for($i=0;$i<$countfiles;$i++){
            $files_ent= new Files();
            $filename = $files_post['documents']['name'][$i];
            $trozos = explode(".",$filename);
            $files_ent->extencion = end($trozos);
            $files_ent->paciente_id=$paciente_id;
            $files_ent->id_objeto=$id_objeto;
            $files_ent->tipo=$tipo;
            $files_ent->nombre=$filename;
            $files_ent->orden=$files+($i+1);
            if (  $files_ent->nombre != ''){
            if (!$files_ent->save())
            {
             
                throw new Exception($this->getError($files_ent->getErrors()));
            } 
            $target_path=$folder;
            $target_path=$basePhysical.'/'.$target_path;
            $target_path = $target_path .'/'. basename($files_ent->id);
            if(!move_uploaded_file($files_post['documents']['tmp_name'][$i], $target_path.'.'.$files_ent->extencion))
            {
                throw new Exception($files_post['documents']['error'][$i]);
                Files::findOne($files_ent->id)->delete();

            }
            
            }
        }
         }
    } 
    
     public function Reordena($request,$pacientes_id,$nota_id)
    {
        $files=Files::find()->where(['paciente_id'=>$pacientes_id,'id_objeto'=>$nota_id])->all();
       
        foreach ($files as $file) {
            $value=$request['orden-'.$file['id']];
            $model=Files::findOne($file['id']);
            $model->orden=$value;
            $model->save();
            
        }
    }
    
    public function getError($errors)
    {
        $error="";
        foreach ($errors as $clave) {
             // print_r($clave);
                 $error.="<br/>".$clave[0];
        }
        
        return $error;
    }
    
}

