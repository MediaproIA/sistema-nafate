<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\Tblseoobjeto;
use backend\models\Tblgalerias;
use backend\dao\GaleriaDao;
use backend\models\Tblvideos;

/**
 * Site controller
 */
class GenericoController extends Controller
{
    public $cEstatus  = '';
    public $cMensaje  =  '';
    public $cError  =  '';
    public $grid  =  '';
    public $enableCsrfValidation = false;
    public $redireccion="";
    public $cUrl  =  '';
       
    public function actionUploader()
    {
        $target_path="";
    try
        {

        $trozos = explode(".",$_FILES['file']['name']);
        $tipo=$_FILES['file']['type'];
        $extension = end($trozos);
        $peso=$_FILES['file']['size'];
               
             
        if ($extension=='png' || $extension=='jpg' || $extension=='jpeg'|| $extension=='svg' && $extension=='PNG' || $extension=='JPG' || $extension=='JPEG'|| $extension=='SVG' && $peso < 512000)
if ($extension=='png' || $extension=='jpg' || $extension=='jpeg'|| $extension=='svg' && $peso < 512000)
        {         
            $this->cEstatus = 'OK';
            $this->cMensaje="La Foto se han guardado correctamente";
            $cNameImagen=$_FILES['file']['name'];
            $basePhysical = Yii::getAlias('@webroot');
            $target_path="imagenes/big";
            $target_path=$basePhysical.'/'.$target_path;
            $target_path = $target_path .'/'. basename($cNameImagen);
            if(!move_uploaded_file($_FILES['file']['tmp_name'], $target_path))
            {
                $this->cEstatus  =  'ERROR';
                $this->cMensaje="La Foto no se han guardado correctamente, ya que el peso excede lo maximo que es de 500 kb";
            }
            else
            {
                       
               $this->cEstatus = 'OK';
               $this->cMensaje="La Foto se han guardado correctamente"; 
               $target_path="http://www.owlwalk.com/backend/web/imagenes/big/".$cNameImagen;
               $this->grid=$target_path;
            
            }
          
            
        
          
            
        }
        else 
            {
                $this->cEstatus = 'ERROR';
               $this->cMensaje="La Foto solo puede ser png o jpg"; 
            }
        
       
        
    
        }
        catch (Exception $ex) 
        {
             $this->cEstatus  =  'ERROR';
             $this->cMensaje  =  $ex->getMessage();
        }
        $Resultaado   =   ['Estatus' => $this->cEstatus, 'Mensaje' => $this->cMensaje, 'grid'=>$this->grid];
        return $target_path;
        
        
    }
    
     public function dameSeo($iIdObjeto,$iTipoObjeto)
    {
        if (($model= Tblseoobjeto::findone(['iIdObjeto'=>$iIdObjeto,'iIdTipoObjeto'=>$iTipoObjeto])) != null)
        {
             return $model;
        }
        else
        {
            $model=new Tblseoobjeto();
            return $model;
        }
        
    }
    
     public function DameGaleria($iIdPropiedad,$iTipoObjeto)
    {
        $Lista = GaleriaDao::getListaByObjeto($iTipoObjeto, $iIdPropiedad); 
        return GenericoController::GeneraVistaGaleria($Lista,$iTipoObjeto);
        
    }
    
      public function GeneraVistaGaleria($arrayGaleria,$iTipoObjeto)
    {
             $bandera = false;
             $cCadenaRetorna = "<table class=\"table table-bordered table-hover\">";
             $cCadenaRetorna .= "<thead>";
             $cCadenaRetorna .= "<tr role=\"row\" class=\"heading\">";
             $cCadenaRetorna .= "<th width=\"8%\">Image</th>";
             $cCadenaRetorna .= "<th width=\"10%\">Nombre</th>";
             $cCadenaRetorna .= "<th width=\"10%\">¿Frond?</th>";
              $cCadenaRetorna .= "<th width=\"10%\">¿Banner?</th>";
             if ($iTipoObjeto==2)
             {
                 $cCadenaRetorna .= "<th width=\"10%\">¿Logo?</th>";
             }
             $cCadenaRetorna .= "<th width=\"10%\">Acciones</th>";
             $cCadenaRetorna .= "</tr>";
             $cCadenaRetorna .= "</thead>";
             $cCadenaRetorna .= "<tbody>";
              $basePhysical = Yii::getAlias('@webroot');
          $target_path="../imagenes/big/";
        //  $target_path=$basePhysical.'/'.$target_path;
             
               foreach ($arrayGaleria as $value)                            
               {
                $cNombre=isset($value['cTitulo'])?'N/A':$value['cTitulo'];
                $bandera = true;
                $cCheckedRadio = $value['lSmall']==1?" checked=\"checked\"":"";
                $cCheckedLogo = $value['lLogo']==1?" checked=\"checked\"":"";
                $cCheckedBanner = $value['lBanner']==1?" checked=\"checked\"":"";
                $cCadenaRetorna .="<tr><td>";
                $cCadenaRetorna .="<a href=\"".$target_path.$value['iIdGaleria'].".".$value['cExtencion']."\" class=\"fancybox-button\" data-rel=\"fancybox-button\">";
                $cCadenaRetorna .="<img class=\"img-responsive\" src=\"".$target_path.$value['iIdGaleria'] . ".".$value['cExtencion']."\" title=\"" . $cNombre  . "\" alt=\"" . $cNombre . "\"  style=\"width:100%\" />";
                $cCadenaRetorna .="</a>" ;
                $cCadenaRetorna .="</td>" ;
                $cCadenaRetorna .="<td>" . $cNombre . "</td>" ;
                $cCadenaRetorna .="<td><label><input type=\"radio\" name=\"galeria\" value=\"".$value['iIdGaleria']."\" id=\"smallRadio-" . $value['iIdGaleria']. "\" class=\"radio\"  ".$cCheckedRadio."></label></td>" ;
                 $cCadenaRetorna .="<td><label><input type=\"radio\" name=\"banner\" value=\"".$value['iIdGaleria']."\" id=\"BannerRadio-" . $value['iIdGaleria']. "\" class=\"banner\"  ".$cCheckedBanner."></label></td>" ;
                if ($iTipoObjeto==2)
                {
                 $cCadenaRetorna .="<td><label><input type=\"radio\" name=\"logo\" value=\"".$value['iIdGaleria']."\" id=\"logoRadio-" . $value['iIdGaleria']. "\" class=\"radioLogo\"  ".$cCheckedLogo."></label></td>" ;
                }
                
                $cCadenaRetorna .="<td><a class=\"btn green\" href=\"javascript:EliminaFoto(" . $value['iIdGaleria'] . ");\">Eliminar Foto</a></td>" ;
                $cCadenaRetorna .="</tr>";
            }
            $cCadenaRetorna .= "</tbody>";
            $cCadenaRetorna .= "</table>";
            if ($bandera == false)
            {
               $cCadenaRetorna .= "<tr><td colspan='5'>Sin Registros</td></tr>";
            }
        
           return $cCadenaRetorna;      
    }
    
      public function actionSmall($iId,$iIdGaleria,$iTipoObjeto)
    {
       try 
       {
          Tblgalerias::updateAll(['lSmall' => 0],['iIdObjeto' => $iId,'iTipoObjeto' => $iTipoObjeto]  );
          $model = Tblgalerias::findOne($iIdGaleria);
          $model->lSmall=1;
          $model->save();
          $this->cEstatus = 'OK';
          $this->cMensaje="La Foto se ha actualizado correctamente";
           $this->grid=$this->DameGaleria($iId, $iTipoObjeto);
       }
        catch (Exception $ex) 
        {
             $this->cEstatus  =  'ERROR';
             $this->cMensaje  =  $ex->getMessage();
        }
        $Resultaado   =   ['Estatus' => $this->cEstatus, 'Mensaje' => $this->cMensaje, 'grid'=>$this->grid];
        return json_encode($Resultaado);
    } 
    
      public function actionBanner($iId,$iIdGaleria,$iTipoObjeto)
    {
       try 
       {
          Tblgalerias::updateAll(['lBanner' => 0],['iIdObjeto' => $iId,'iTipoObjeto' => $iTipoObjeto] );
          $model = Tblgalerias::findOne($iIdGaleria);
          $model->lBanner=1;
          $model->save();
          $this->cEstatus = 'OK';
          $this->cMensaje="La Foto se ha actualizado correctamente";
           $this->grid=GenericoController::DameGaleria($iId, $iTipoObjeto);
       }
        catch (Exception $ex) 
        {
             $this->cEstatus  =  'ERROR';
             $this->cMensaje  =  $ex->getMessage();
        }
        $Resultaado   =   ['Estatus' => $this->cEstatus, 'Mensaje' => $this->cMensaje, 'grid'=>$this->grid];
        return json_encode($Resultaado);
    }
    
    public function actionDel($id,$iTipoObjeto,$iIdObjeto)
    {
        try
        {
           Tblgalerias::findOne($id)->delete();
            $this->cEstatus = 'OK';
            $this->cMensaje="La foto se ha eliminado correctamente";
            $this->grid=GenericoController::DameGaleria($iIdObjeto,$iTipoObjeto);
        }
        catch (Exception $ex)
        {
            $this->cEstatus  =  'ERROR';
             $this->cMensaje  =  $ex->getMessage();
        }
        $Resultaado   =   ['Estatus' => $this->cEstatus, 'Mensaje' => $this->cMensaje, 'grid'=>$this->grid];
        return json_encode($Resultaado);
    }
    
     public function GeneraVistaGaleriaVideo($arrayGaleria)
    {
             $bandera = false;
             $cCadenaRetorna = "<table class=\"table table-bordered table-hover\">";
             $cCadenaRetorna .= "<thead>";
             $cCadenaRetorna .= "<tr role=\"row\" class=\"heading\">";
             $cCadenaRetorna .= "<th width=\"8%\">Video</th>";
             $cCadenaRetorna .= "<th width=\"10%\">Nombre</th>";
         
             $cCadenaRetorna .= "<th width=\"10%\">Acciones</th>";
             $cCadenaRetorna .= "</tr>";
             $cCadenaRetorna .= "</thead>";
             $cCadenaRetorna .= "<tbody>";
              
        //  $target_path=$basePhysical.'/'.$target_path;
          
               foreach ($arrayGaleria as $value)                            
               {
                $bandera = true;
                
                $cCadenaRetorna .="<tr><td>";
                $cCadenaRetorna .="<a href=\"https://www.youtube.com/".$value['cUrl']."\" class=\"fancybox-button\" data-rel=\"fancybox-button\">";
                $cCadenaRetorna .="<div align=\"center\" class=\"embed-responsive embed-responsive-16by9\"><iframe title=\"YouTube video player\"  src=\"https://www.youtube.com/embed/".$value['cUrl']."\" frameborder=\"0\"></iframe></div>";
                $cCadenaRetorna .="</a>" ;
                $cCadenaRetorna .="</td>" ;
                $cCadenaRetorna .="<td>" . $value['cNombreVideo'] . "</td>" ;
                $cCadenaRetorna .="<td><a class=\"btn green\" href=\"javascript:EliminaV(" . $value['iIdVideo'] . ");\">Eliminar Video</a></td>" ;
                $cCadenaRetorna .="</tr>";
            }
            $cCadenaRetorna .= "</tbody>";
            $cCadenaRetorna .= "</table>";
            if ($bandera == false)
            {
               $cCadenaRetorna .= "<tr><td colspan='5'>Sin Registros</td></tr>";
            }
        
           return $cCadenaRetorna;      
    }
    
    public function actionDelvid($id,$iTipoObjeto,$iIdObjeto)
    {
        try
        {
           Tblvideos::findOne($id)->delete();
            $this->cEstatus = 'OK';
            $this->cMensaje="El video se ha eliminado correctamente";
            $this->grid=GenericoController::DameVideos($iIdObjeto, $iTipoObjeto);
        }
        catch (Exception $ex)
        {
            $this->cEstatus  =  'ERROR';
             $this->cMensaje  =  $ex->getMessage();
        }
        $Resultaado   =   ['Estatus' => $this->cEstatus, 'Mensaje' => $this->cMensaje, 'grid'=>$this->grid];
        return json_encode($Resultaado);
    }
    
    public function actionGuardarvid($id,$iTipoObjeto)
    {
        $cUrl='';
        try
        {
            $model = new Tblvideos();
            $model->cNombreVideo= (isset($_POST['tituloVideo']))?$_POST['tituloVideo']:"";
            $model->iIdObjeto=$id;
            $model->iTipoObjeto=$iTipoObjeto;
            $model->cUrl=(isset($_POST['urlvideo']))?$_POST['urlvideo']:"";;
            $model->lActivo=1;
         
            if ($model->save())
            {
            $this->cEstatus  =  'OK';
            $this->cMensaje  =  'El video se ha guardado correctamente.';
             $this->grid=  GenericoController::DameVideos($id, $iTipoObjeto);                  
            
            
            }
            else
            {
               $this->cEstatus  =  'ERROR';
               $this->cMensaje  =  $model->getErrors();      
            }
                
         
        
                }
        catch (Exception $ex)
        {
               $this->cEstatus  =  'ERROR';
               $this->cMensaje  =  $ex->getMessage();
        }
         $Resultaado   =   ['Estatus' => $this->cEstatus, 'Mensaje' => $this->cMensaje,'grid'=>$this->grid];
        return json_encode($Resultaado);
    }
    
    public function DameVideos($iIdPropiedad,$iTipoObjeto)
    {
        $tblObjeto = Tblvideos::find();
        $query=$tblObjeto->select('iIdVideo,cNombreVideo as cNombreVideo,cUrl')->where(['iTipoObjeto'=>$iTipoObjeto,'iIdObjeto'=>$iIdPropiedad]);
                        
        $command = $query->createCommand();
        $Lista = $command->queryAll(); 
        return GenericoController::GeneraVistaGaleriaVideo($Lista);
        
    }
    
        public function actionUpload($id,$iTipoObjeto,$iIdGaleria,$cTitulo,$cDescripcion)
    {
        try
        {
        foreach ($_FILES['foto']['name'] as $name => $value){
        $trozos = explode(".",$_FILES['foto']['name'][$name]);
        $tipo=$_FILES['foto']['type'][$name];
        $extension = end($trozos);
        $peso=$_FILES['foto']['size'][$name];
               
             
        if ($extension=='png' || $extension=='jpg' || $extension=='jpeg' && $extension=='PNG' || $extension=='JPG' || $extension=='JPEG' && $peso < 512000)
        {
        $modeloGal=new Tblgalerias();
        $modeloGal->cExtencion=$extension;
        $modeloGal->iIdObjeto=$id;
        $modeloGal->iTipoObjeto=$iTipoObjeto;
        $modeloGal->cTituloImage=$cTitulo;
        $modeloGal->cAltImage=$cDescripcion;
        $modeloGal->lActivo=1;
        $modeloGal->lSmall=0;
            if (!$modeloGal->save())
            {
            $ex=$modeloGal->getErrors();
            throw new Exception($modeloGal->getErrors());
            }                  
            $this->cEstatus = 'OK';
            $this->cMensaje="La Foto se han guardado correctamente";
            $cNameImagen=$_FILES['foto']['name'][$name];
            $basePhysical = Yii::getAlias('@webroot');
            $target_path="imagenes/big";
            $target_path=$basePhysical.'/'.$target_path;
            $target_path = $target_path .'/'. basename($modeloGal->iIdGaleria);
            if(!move_uploaded_file($_FILES['foto']['tmp_name'][$name], $target_path.'.'.$extension))
            {
                $this->cEstatus  =  'ERROR';
                $this->cMensaje="La Foto no se han guardado correctamente, ya que el peso excede lo maximo que es de 500 kb";
                 Tblgalerias::findOne($modeloGal->iIdGaleria)->delete();
                 
            }
            else
            {
            $tempo=0;  
             $file=$_FILES['foto']['tmp_name'][$name];
            
             $origen = $target_path.'.'.$extension;
            
            $destino=$basePhysical."/imagenes/small/". $modeloGal->iIdGaleria.".".$extension;         
            $this->grid= GenericoController::DameGaleria($id, $iTipoObjeto);
            GenericoController::resize(262,195,$origen,$tipo,$destino);
            $destino=$basePhysical."/imagenes/extrasmall/". $modeloGal->iIdGaleria.".".$extension;;
            GenericoController::resize(50,50,$origen,$tipo,$destino);
            $destino=$basePhysical."/imagenes/medium/". $modeloGal->iIdGaleria.".".$extension;;
            GenericoController::resize(483,360,$origen,$tipo,$destino);
            
               $this->cEstatus = 'OK';
               $this->cMensaje="La Foto se han guardado correctamente"; 
            
            }
          
            
        }
        else 
            {
                $this->cEstatus = 'ERROR';
               $this->cMensaje="La Foto solo puede ser png o jpg"; 
            }
        
       
        }
    
        }
        catch (Exception $ex) 
        {
             $this->cEstatus  =  'ERROR';
             $this->cMensaje  =  $ex->getMessage();
        }
        $Resultaado   =   ['Estatus' => $this->cEstatus, 'Mensaje' => $this->cMensaje, 'grid'=>$this->grid];
        return json_encode($Resultaado);
   
    }
    
    function resize($width, $height,$archivo,$tipo,$path){

  list($w, $h) = getimagesize($archivo);

  $ratio = max($width/$w, $height/$h);
  $h = ceil($height / $ratio);
  $x = ($w - $width / $ratio) / 2;
  $w = ceil($width / $ratio);
  $imgString = file_get_contents($archivo);
  $image = imagecreatefromstring($imgString);
  $tmp = imagecreatetruecolor($width, $height);
  imagecopyresampled($tmp, $image,0, 0,0, 0,$width, $height,$w, $h);

  switch ($tipo) {
    case 'image/jpeg':
      imagejpeg($tmp, $path, 100);
      break;
    case 'image/png':
      imagepng($tmp, $path, 0);
      break;
    case 'image/gif':
      imagegif($tmp, $path);
      break;
    default:
      exit;
      break;
  }
  return "";
  /* cleanup memory */
  imagedestroy($image);
  imagedestroy($tmp);
}

 public function actionCreaseo($iIdSeo)
    {
        try 
        {
            $rIdCrm=0;
            if ($iIdSeo==0)
            {
            $model =new Tblseoobjeto();
            }
            else
            {
              $model= Tblseoobjeto::findone($iIdSeo);
            }
            if ($model->load(Yii::$app->request->post())) {
           
                         if ($model->save())
                         {

                         $this->cEstatus  =  'OK';
                         $this->cMensaje  =  'El registro se ha Actualizado correctamente';
                         $rIdCrm=$model->iIdSeo;
                         }
                         else
                         {
                            $this->cEstatus  =  'ERROR';
                            $this->cMensaje  = 'El sistema No puede Actualizar los datos ya que no se encuentran correctos';
                         }
            
         } 
        else
        {
            throw new Exception($model->getErrors());
        }
        }
        catch (Exception $ex)
        {
           $this->cEstatus  =  'ERROR';
               $this->cMensaje  =  $ex->getMessage();
        }
        $Resultaado   =   ['Estatus' => $this->cEstatus, 'Mensaje' => $this->cMensaje,'iIdCrm'=>$rIdCrm];
        return json_encode($Resultaado);
  
    } 
    
        public function slug($string) {		
	$characters = array(
		"Á" => "A", "Ç" => "c", "É" => "e", "Í" => "i", "Ñ" => "n", "Ó" => "o", "Ú" => "u", 
		"á" => "a", "ç" => "c", "é" => "e", "í" => "i", "ñ" => "n", "ó" => "o", "ú" => "u",
		"à" => "a", "è" => "e", "ì" => "i", "ò" => "o", "ù" => "u"
	);
 
	$string = strtr($string, $characters); 
	$string = strtolower(trim($string));
	$string = preg_replace("/[^a-z0-9-]/", "-", $string);
	$string = preg_replace("/-+/", "-", $string);
 
	if(substr($string, strlen($string) - 1, strlen($string)) === "-") {
		$string = substr($string, 0, strlen($string) - 1);
	}
 
	return $string;
}
  
public static  function  UploadGenerico($File,$basePhysical,$iIdObjeto,$cNombreObjeto,$path,$errorTexto)
{
    $error="";
    $trozos = explode(".",$File[$cNombreObjeto]['name']);
    $extension = end($trozos);
    $target_path="imagenes/".$path;
    $target_path=$basePhysical.'/'.$target_path;
    $target_path = $target_path .'/'. basename($iIdObjeto);
    if(!move_uploaded_file($File[$cNombreObjeto]['tmp_name'], $target_path.'.'.$extension))
    {
      $error=$errorTexto;
    }
    return $error;
    
}

static function   encriptar($cadena){
    $key='X1m3n4Jr.25';  // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
    $encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $cadena, MCRYPT_MODE_CBC, md5(md5($key))));
    return $encrypted; //Devuelve el string encriptado
 
}
 
static function  desencriptar($cadena){
      $key='X1m3n4Jr.25';   // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
     $decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($cadena), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
    return $decrypted;  //Devuelve el string desencriptado
}

    }



