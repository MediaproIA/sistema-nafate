<?php

namespace backend\controllers;

use Yii;
use backend\models\Pacientes;
use backend\models\HistorialAhf;
use backend\models\HistorialApp;
use backend\models\HistorialApnp;
use backend\models\HistorialPa;
use backend\models\HistorialEf;
use backend\models\HistorialGineco;
use backend\models\NotasMedicas;
use backend\models\Documentos;
use backend\models\Files;
use backend\models\Receta;
use backend\models\HistorialComentarios;
use backend\models\NotasEvolucion;
use backend\dao\PacientesDao;
use backend\dao\HistorialDao;
use backend\dao\NotasMedicasDao;
use backend\dao\DoctorDao;
use backend\dao\RecetasDao;
use backend\dao\DocumentosPacienteDao;
use backend\dao\NotasEvolucionDao;
use backend\dao\FilesDao;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use Exception;
/**
 * PacientesController implements the CRUD actions for Pacientes model.
 */
class PacientesController extends Controller
{
    /**
     * {@inheritdoc}
     */
    protected $servicePacientes;
    public $estatus  = '';
    public $mensaje  =  '';
    public $error  =  '';
    public $url  =  '';
    public $enableCsrfValidation = false;
    protected $serviceHistorial;

    public function __construct($id, $module, $config = []) {

        $this->servicePacientes= new PacientesDao();
        $this->serviceHistorial= new HistorialDao();
      
        parent::__construct($id, $module, $config);
    
    }
    public function behaviors()
    {
        return [
                'access' => [
                        'class' => \yii\filters\AccessControl::className(),
                        'only' => ['index','create','update','view','pagina','validacion','validacionpaginacion'],
                        'rules' => [
                            // allow authenticated users
                            [
                                'allow' => true,
                                'roles' => ['@'],
                            ],
                            // everything else is denied
                        ],
                    ],
            
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Pacientes models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Pacientes::find(),
        ]);
        $model= new Pacientes();
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'model'=>$model
        ]);
    }

    /**
     * Displays a single Pacientes model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Pacientes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pacientes();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Pacientes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $notasMedicas=  new NotasMedicas();
        $notasEvolucion=  new NotasEvolucion();
        $lista_files=  Array();
        $recetas=  new Receta();
        $formatos=  new Documentos();
        $fecha_letras=$this->calculaedad($model->fecha_nacimiento);
        $model->fecha_nacimiento=Yii::$app->formatter->asDate($model->fecha_nacimiento, 'dd/MM/yyyy');  
         $model->fecha_creacion=Yii::$app->formatter->asDate($model->fecha_creacion, 'dd/MM/yyyy');  
        $historial_ahf= $this->serviceHistorial->findModelAHF($model->id);
        $historial_app= $this->serviceHistorial->findModelAPP($model->id);
        $historial_pa= $this->serviceHistorial->findModelPA($model->id);
        $historial_ef= $this->serviceHistorial->findModelEF($model->id);
        $historial_comentarios= $this->serviceHistorial->findModelHC($model->id);
        $historial_apnp= $this->serviceHistorial->findModelApnp($model->id);
        $historial_gineco=$this->serviceHistorial->findModelGineco($model->id);
        $list_documents= FilesDao::DameFiles($model->id, 0);
        $list_documents_up= FilesDao::DameFilesByType($model->id, 5);
        $notasMedicas->paciente_id=$model->id;
        $notasMedicas->id=0;
        $notasEvolucion->paciente_id=$model->id;
        $notasEvolucion->id=0;
        $recetas->paciente_id=$model->id;
        $recetas->id_receta=0;
        $formatos->paciente_id=$model->id;
        $formatos->id=0;
        return $this->render('update', [
            'model' => $model,
            'notasMedicas'=>$notasMedicas,
            'historial_ahf'=>$historial_ahf,
            'historial_app'=>$historial_app,
            'historial_pa'=>$historial_pa,
            'historial_ef'=>$historial_ef,
            'recetas'=>$recetas,
            'notasEvolucion'=>$notasEvolucion,
            'historial_comentarios'=>$historial_comentarios,
            'historial_apnp'=>$historial_apnp,
            'formatos'=>$formatos,
            'lista_files'=>$lista_files,
            'historial_gineco'=>$historial_gineco,
            'list_documents'=>$list_documents,
            'list_documents_up'=>$list_documents_up,
            'fecha_letras'=>$fecha_letras
        ]);
    }

    /**
     * Deletes an existing Pacientes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */

    /**
     * Finds the Pacientes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Pacientes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pacientes::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
    public function actionPagina($sEcho,$iDisplayStart,$iDisplayLength,$sSearch,$iSortCol_0, $sSortDir_0)
    {
        
        $data= PacientesDao::getAll($sEcho, $iDisplayStart, $iDisplayLength, $sSearch, $iSortCol_0, $sSortDir_0);              
        return json_encode($data);
   
    }
    
    public function actionGuardar()
    {
          $cUrl='';
        try
        {
             $cIdioma="es_ES";
        setlocale(LC_TIME, $cIdioma);
            $model = new Pacientes();
            if ($model->load(Yii::$app->request->post())) 
            {    $model->id=$this->gen_uuid();
                $model->estatus=1;
                $model->usuario_creacion=YII::$app->user->identity->id;
                $model->usuario_modificacion=YII::$app->user->identity->id;
                $model->fecha_creacion=date("Y-m-d H:i:s");
                $model->fecha_actualizacion=date("Y-m-d H:i:s");
                $model->fecha_nacimiento=Yii::$app->formatter->asDate(str_replace("/","-",$model->fecha_nacimiento), 'yyyy-MM-dd');                 
                    if ($model->save())
                    {
                       $this->url=Url::to(['pacientes/update', 'id' => $model->id]);   
                        $this->estatus  =  'OK';
                        $this->mensaje  =  'El registrose ha guardado correctamente';
                    }
                    else
                    {
                       $this->estatus  =  'ERROR';
                       $this->mensaje  =  $model->getErrors();      
                    }
                
            }
        else
        {
            $this->estatus  =  'ERROR';
             $this->mensaje  =  $model->getErrors();     
        
        }  
        }
        catch (Exception $ex)
        {
               $this->estatus  =  'ERROR';
               $this->mensaje  =  $ex->getMessage();
        }
         $Resultaado   =   ['Estatus' => $this->estatus, 'Mensaje' => $this->mensaje,'cUrl'=>$this->url];
        return json_encode($Resultaado);
    }
    
    
    
     public function actionUpdatehistorialahf($paciente_id)
    {
        
        try
        {
             $cIdioma="es_ES";
        setlocale(LC_TIME, $cIdioma);
             $model = HistorialDao::GetAHF($paciente_id);
             
             if($model == null){
                $model= new HistorialAhf();
                $model->paciente_id=$paciente_id;
                $model->usuario_creacion=YII::$app->user->identity->id;
                $model->fecha_creacion=date("Y-m-d H:i:s");
             }
             
             
        if ($model->load(Yii::$app->request->post())){    
                $model->usuario_modificacion=YII::$app->user->identity->id;
                $model->fecha_modificacion=date("Y-m-d H:i:s");
                          
                    if ($model->save())
                    {
                        
                        $this->estatus  =  'OK';
                        $this->mensaje  =  'El registro se ha guardado correctamente';
                    }
                    else
                    {
                       $this->estatus  =  'ERROR';
                       $this->mensaje  =  $model->getErrors();      
                    }
                
        }
        else
        {
            $this->estatus  =  'ERROR';
             $this->mensaje  =  'El Paciente a actualizar No Existe';     
        
        }  
        }
        catch (Exception $ex)
        {
               $this->estatus  =  'ERROR';
               $this->mensaje  =  $ex->getMessage();
        }
         $Resultaado   =   ['Estatus' => $this->estatus, 'Mensaje' => $this->mensaje];
        return json_encode($Resultaado);
    }
    
    
    public function actionUpdatepaciente($paciente_id)
    {
          $cUrl='';
          $extension="";
        try
        {
             $cIdioma="es_ES";
             setlocale(LC_TIME, $cIdioma);
             $model = PacientesDao::findModel($paciente_id);
            
            if (!empty ($_FILES['profile_avatar']['name']))
                {
                     
                    $trozos = explode(".",$_FILES['profile_avatar']['name']);
                    $extension = end($trozos);
                    $model->extencion=$extension;
                }
             if ($model != null && $model->load(Yii::$app->request->post())) 
            {   
                 
               if ($extension != "")
                                    {
                                         
                                            $cNameImagen=$_FILES['profile_avatar']['name'];
                                            $basePhysical = Yii::getAlias('@webroot');
                                            $target_path="imagenes/avatar";
                                            $target_path=$basePhysical.'/'.$target_path;
                                            $target_path = $target_path .'/'. basename($model->id);
                                            if(!move_uploaded_file($_FILES['profile_avatar']['tmp_name'], $target_path.'.'.$extension))
                                            {   
                                                 throw new Exception("La Foto no se han guardado correctamente, ya que el peso excede lo maximo que es de 500 kb");
                                             
                                            }
                                           
                                         
                                             
                                       
                                    }
                $model->usuario_modificacion=YII::$app->user->identity->id;
                $model->fecha_actualizacion=date("Y-m-d H:i:s");
               $model->fecha_nacimiento=Yii::$app->formatter->asDate(str_replace("/","-",$model->fecha_nacimiento), 'yyyy-MM-dd');    
                 $model->fecha_creacion=Yii::$app->formatter->asDate(str_replace("/","-",$model->fecha_creacion), 'yyyy-MM-dd');    
               
               
                    if ($model->save())
                    {
                        
                        
                        $this->estatus  =  'OK';
                        $this->mensaje  =  'El registrose ha guardado correctamente';
                    }
                    else
                    {
                       $this->estatus  =  'ERROR';
                       $this->mensaje  =  $model->getErrors();      
                    }
                
            }
        else
        {
            $this->estatus  =  'ERROR';
             $this->mensaje  =  'El Paciente a actualizar No Existe';     
        
        }  
        }
        catch (Exception $ex)
        {
               $this->estatus  =  'ERROR';
               $this->mensaje  =  $ex->getMessage();
        }
         $Resultaado   =   ['Estatus' => $this->estatus, 'Mensaje' => $this->mensaje];
        return json_encode($Resultaado);
    }
    
    private function  gen_uuid() {
    
        return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
      
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),

        // 16 bits for "time_mid"
        mt_rand( 0, 0xffff ),

        // 16 bits for "time_hi_and_version",
        // four most significant bits holds version number 4
        mt_rand( 0, 0x0fff ) | 0x4000,

        // 16 bits, 8 bits for "clk_seq_hi_res",
        // 8 bits for "clk_seq_low",
        // two most significant bits holds zero and one for variant DCE1.1
        mt_rand( 0, 0x3fff ) | 0x8000,

        // 48 bits for "node"
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
    );
   }
   
    public function actionUpdatehistorialapp($paciente_id)
    {
        
        try
        {
             $cIdioma="es_ES";
             setlocale(LC_TIME, $cIdioma);
             $model = HistorialDao::GetAAPP($paciente_id);
             
             if($model == null){
                $model= new HistorialApp();
                $model->paciente_id=$paciente_id;
                $model->usuario_creacion=YII::$app->user->identity->id;
                $model->fecha_creacion=date("Y-m-d H:i:s");
             }
             
             
        if ($model->load(Yii::$app->request->post())){    
                $model->usuario_modificacion=YII::$app->user->identity->id;
                $model->fecha_modificacion=date("Y-m-d H:i:s");
                          
                    if ($model->save())
                    {
                        
                        $this->estatus  =  'OK';
                        $this->mensaje  =  'El registro se ha guardado correctamente';
                    }
                    else
                    {
                       $this->estatus  =  'ERROR';
                       $this->mensaje  =  $model->getErrors();      
                    }
                
        }
        else
        {
            $this->estatus  =  'ERROR';
             $this->mensaje  =  'El Paciente a actualizar No Existe';     
        
        }  
        }
        catch (Exception $ex)
        {
                $this->estatus  =  'ERROR';
               $this->mensaje  =  $ex->getMessage();
        }
         $Resultaado   =   ['Estatus' => $this->estatus, 'Mensaje' => $this->mensaje];
        return json_encode($Resultaado);
    }
    
    public function actionUpdatehistorialpa($paciente_id)
    {
        
        try
        {
             $cIdioma="es_ES";
        setlocale(LC_TIME, $cIdioma);
             $model = HistorialDao::GetPA($paciente_id);
             
             if($model == null){
                $model= new HistorialPa();
                $model->paciente_id=$paciente_id;
                $model->usuario_creacion=YII::$app->user->identity->id;
                $model->fecha_creacion=date("Y-m-d H:i:s");
             }
             
             
        if ($model->load(Yii::$app->request->post())){    
                $model->usuario_modificacion=YII::$app->user->identity->id;
                $model->fecha_modificacion=date("Y-m-d H:i:s");
                          
                    if ($model->save())
                    {
                        
                        $this->estatus  =  'OK';
                        $this->mensaje  =  'El registro se ha guardado correctamente';
                    }
                    else
                    {
                       $this->estatus  =  'ERROR';
                       $this->mensaje  =  $model->getErrors();      
                    }
                
        }
        else
        {
            $this->estatus  =  'ERROR';
             $this->mensaje  =  'El Paciente a actualizar No Existe';     
        
        }  
        }
        catch (Exception $ex)
        {
                $this->estatus  =  'ERROR';
               $this->mensaje  =  $ex->getMessage();
        }
         $Resultaado   =   ['Estatus' => $this->estatus, 'Mensaje' => $this->mensaje];
        return json_encode($Resultaado);
    }
    
  
    
    public function actionUpdatehistorialcomentarios($paciente_id)
    {
        
        try
        {
             $cIdioma="es_ES";
        setlocale(LC_TIME, $cIdioma);
             $model = HistorialDao::GetHisComentarios($paciente_id);
             
             if($model == null){
                $model= new HistorialComentarios();
                $model->paciente_id=$paciente_id;
                $model->usuario_creacion=YII::$app->user->identity->id;
                $model->fecha_creacion=date("Y-m-d H:i:s");
             }
             
             
        if ($model->load(Yii::$app->request->post())){    
                $model->usuario_modificacion=YII::$app->user->identity->id;
                $model->fecha_modificacion=date("Y-m-d H:i:s");
                          
                    if ($model->save())
                    {
                        
                        $this->estatus  =  'OK';
                        $this->mensaje  =  'El registro se ha guardado correctamente';
                    }
                    else
                    {
                       $this->estatus  =  'ERROR';
                       $this->mensaje  =  $model->getErrors();      
                    }
                
        }
        else
        {
            $this->estatus  =  'ERROR';
             $this->mensaje  =  'El Paciente a actualizar No Existe';     
        
        }  
        }
        catch (Exception $ex)
        {
                 $this->estatus  =  'ERROR';
               $this->mensaje  =  $ex->getMessage();
        }
         $Resultaado   =   ['Estatus' => $this->estatus, 'Mensaje' => $this->mensaje];
        return json_encode($Resultaado);
    }
    
     public function actionUpdatehistorialapnp($paciente_id)
    {
        
        try
        {
             $cIdioma="es_ES";
             setlocale(LC_TIME, $cIdioma);
             $model = HistorialDao::GetHisApnp($paciente_id);
             
             if($model == null){
                $model= new HistorialApnp();
                $model->paciente_id=$paciente_id;
                $model->usuario_creacion=YII::$app->user->identity->id;
                $model->fecha_creacion=date("Y-m-d H:i:s");
             }
             
             
        if ($model->load(Yii::$app->request->post())){    
                $model->usuario_modificacion=YII::$app->user->identity->id;
                $model->fecha_modificacion=date("Y-m-d H:i:s");
                          
                    if ($model->save())
                    {
                        
                        $this->estatus  =  'OK';
                        $this->mensaje  =  'El registro se ha guardado correctamente';
                    }
                    else
                    {
                       $this->estatus  =  'ERROR';
                       $this->mensaje  =  $model->getErrors();      
                    }
                
        }
        else
        {
            $this->estatus  =  'ERROR';
             $this->mensaje  =  'El Paciente a actualizar No Existe';     
        
        }  
        }
        catch (Exception $ex)
        {
                 $this->estatus  =  'ERROR';
               $this->mensaje  =  $ex->getMessage();
        }
         $Resultaado   =   ['Estatus' => $this->estatus, 'Mensaje' => $this->mensaje];
        return json_encode($Resultaado);
    }
    
      public function actionUpdatehistorialgineco($paciente_id)
    {
        
        try
        {
             $cIdioma="es_ES";
            setlocale(LC_TIME, $cIdioma);
             $model = $this->serviceHistorial->GetHisGineco($paciente_id);
             
             if($model == null){
                $model= new HistorialGineco();
                $model->paciente_id=$paciente_id;
               }
             
             
        if ($model->load(Yii::$app->request->post())){    
            $model->ultima_regla=$model->ultima_regla != ''?Yii::$app->formatter->asDate($model->ultima_regla, 'yyyy-MM-dd'):null;
            if($model->embarazada==1)
            {
                  $model->fecha_parto=Yii::$app->formatter->asDate($model->fecha_parto, 'yyyy-MM-dd'); 
            }
            else
            {
               $model->fecha_parto=null;  
            }
                    if ($model->save())
                    {
                        
                        $this->estatus  =  'OK';
                        $this->mensaje  =  'El registro se ha guardado correctamente';
                    }
                    else
                    {
                       $this->estatus  =  'ERROR';
                       $this->mensaje  =  $model->getErrors();      
                    }
                
        }
        else
        {
            $this->estatus  =  'ERROR';
             $this->mensaje  =  'El Paciente a actualizar No Existe';     
        
        }  
        }
        catch (Exception $ex)
        {
                 $this->estatus  =  'ERROR';
               $this->mensaje  =  $ex->getMessage();
        }
         $Resultaado   =   ['Estatus' => $this->estatus, 'Mensaje' => $this->mensaje];
        return json_encode($Resultaado);
    }
    
   
    
   
    


    
    
    
  
    public  function saveFiles($files,$tipo,$paciente_id,$id_objeto)
    {
        $basePhysical = Yii::getAlias('@webroot');
         if (isset($files['photos'])) {
        foreach ($files['photos']['name'] as $name => $value){
            $files_ent= new Files();
            
            $trozos = explode(".",$files['photos']['name'][$name]);
            $files_ent->extencion = end($trozos);
            $files_ent->paciente_id=$paciente_id;
            $files_ent->id_objeto=$id_objeto;
            $files_ent->tipo=$tipo;
            $files_ent->nombre=$files['photos']['name'][$name];
           
            if (!$files_ent->save())
            {
                $error=$this->getError($files_ent->getErrors());
                throw new Exception($error);
            } 
            $target_path="files/";
            $target_path=$basePhysical.'/'.$target_path;
            $target_path = $target_path .'/'. basename($files_ent->id);
            if(!move_uploaded_file($_FILES['photos']['tmp_name'][$name], $target_path.'.'.$files_ent->extencion))
            {
                throw new Exception("No se pudo cargar las imagenes");
                Files::findOne($files->id)->delete();
                 
            }
        }
         }
    }
    
  
    
    private function getError($errors)
    {
        $error="";
        foreach ($errors as $clave) {
             // print_r($clave);
                 $error.="<br/>".$clave[0];
        }
        
        return $error;
    }
    
    public function actionGetfiles($documento_id,$paciente_id)
    {
        $lista_files= FilesDao::DameFiles($paciente_id, $documento_id);
        $data=array();
        foreach ($lista_files as $files)
        {
         $data[] = array("id"=>$files['id'], "src"=>'https://sistema.nafatedelacruz.com.mx/files/'.$files['id'].'.'.$files['extencion']);    
        }
        return json_encode($data);
    }
    
     public function actionExportanotas($paciente_id)
    {
    
       $lstNotas=Yii::$app->request->post('identificadores');
       $model= PacientesDao::findModel($paciente_id);
       $notas= NotasMedicasDao::getNotasAll($lstNotas);
       $doctor= DoctorDao::finddoctor(YII::$app->user->identity->id);
       $defaultConfig = (new \Mpdf\Config\ConfigVariables())->getDefaults();
       $fontDirs = $defaultConfig['fontDir'];
       $defaultFontConfig = (new \Mpdf\Config\FontVariables())->getDefaults();
       $fontData = $defaultFontConfig['fontdata'];
       $mpdf = new \Mpdf\Mpdf(['fontdata' => $fontData + [
                'fontawesome' => [
                    'fontawesome' => 'fontawesome-webfont.ttf',
                ]
            ]]);
        date_default_timezone_set('America/Mexico_City');
       Yii::$app->formatter->asDate(date("Y-m-d"), 'MM/dd/yyyy');
       $fecha=  utf8_encode (strftime('%d/%m/%Y  Hora: %H:%M:%S', strtotime(date("Y-m-d H:i:s"))));
          $mpdf->SetMargins(60,10,33);
        $mpdf->SetFont('Dejavu Sans','fontawesome');
        $view="notas";
        $mpdf->SetHeader($this->renderPartial('header',['doctor'=>$doctor,'fecha'=>$fecha]));
        $mpdf->WriteHTML($this->renderPartial($view,['model'=>$model,'notas'=>$notas,'fecha'=>$fecha]));
        $basePhysical = Yii::getAlias('@webroot');
        $target_path="/pdf/";
        $Folio=$this->gen_uuid();
        $filename=$basePhysical.$target_path.$Folio.".pdf";
        $mpdf->Output($filename);
        $Resultaado   =   ['Estatus' => 'OK' , 'Mensaje' => '', 'cUrl' => 'https://sistema.nafatedelacruz.com.mx/pdf/'.$Folio.".pdf"];
        return json_encode($Resultaado);
        
    }
    
    public function actionExportanotasevolucion($paciente_id)
    {
    
       $lstNotas=Yii::$app->request->post('identificadores');
       $model= PacientesDao::findModel($paciente_id);
       $notas= NotasEvolucionDao::getNotasAll($lstNotas);
       $doctor= DoctorDao::finddoctor(YII::$app->user->identity->id);
       $defaultConfig = (new \Mpdf\Config\ConfigVariables())->getDefaults();
       $fontDirs = $defaultConfig['fontDir'];
       $defaultFontConfig = (new \Mpdf\Config\FontVariables())->getDefaults();
       $fontData = $defaultFontConfig['fontdata'];
       $mpdf = new \Mpdf\Mpdf(['fontdata' => $fontData + [
                'fontawesome' => [
                    'fontawesome' => 'fontawesome-webfont.ttf',
                ]
            ]]);
        $cIdioma="es_ES";
       date_default_timezone_set('America/Mexico_City');
       $fecha=  utf8_encode (strftime('%d/%m/%Y  Hora: %H:%M:%S', strtotime(date("Y-m-d H:i:s"))));
      $mpdf->SetMargins(60,10,33);
        $mpdf->SetFont('Dejavu Sans','fontawesome');
        $view="notas_evolucion";
        $mpdf->SetHeader($this->renderPartial('header',['doctor'=>$doctor,'fecha'=>$fecha]));
        $mpdf->SetFooter($this->renderPartial('footer',['doctor'=>$doctor,'fecha'=>$fecha]));
        $mpdf->WriteHTML($this->renderPartial($view,['model'=>$model,'notas'=>$notas,'fecha'=>$fecha]));
        $basePhysical = Yii::getAlias('@webroot');
        $target_path="/pdf/";
        $Folio=$this->gen_uuid();
        $filename=$basePhysical.$target_path.$Folio.".pdf";
        $mpdf->Output($filename);
        $Resultaado   =   ['Estatus' => 'OK' , 'Mensaje' => '', 'cUrl' => 'https://sistema.nafatedelacruz.com.mx/pdf/'.$Folio.".pdf"];
        return json_encode($Resultaado);
        
    }
    
    public function actionExportareceta($paciente_id)
    {
    
       $lstNotas=Yii::$app->request->post('identificadores');
       $header=Yii::$app->request->post('header');
       $model= PacientesDao::findModel($paciente_id);
       $notas= RecetasDao::getRecetasAll($lstNotas);
       $doctor= DoctorDao::finddoctor(YII::$app->user->identity->id);
       $defaultConfig = (new \Mpdf\Config\ConfigVariables())->getDefaults();
       $fontDirs = $defaultConfig['fontDir'];
       $defaultFontConfig = (new \Mpdf\Config\FontVariables())->getDefaults();
       $fontData = $defaultFontConfig['fontdata'];
        if ($header == "3")
       {
              $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8']);
       }
       else
       {
            $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [215.9,139.7]]);
       }
       
      
       $cIdioma="es_ES";
        setlocale(LC_TIME, $cIdioma);
      $fecha=Yii::$app->formatter->asDate(date("Y-m-d"), 'dd/MM/yyyy');
        $mpdf->SetMargins(60,10,33);
         $mpdf->SetLeftMargin(100);
        $mpdf->SetFont('Dejavu Sans','fontawesome');
        $view="recetas";
        if($header=="1" ||  $header=="3")
        { 
          $mpdf->SetHeader($this->renderPartial('header',['doctor'=>$doctor,'fecha'=>$fecha]));
          $mpdf->SetFooter($this->renderPartial('footer',['doctor'=>$doctor,'fecha'=>$fecha]));
        }
        $mpdf->WriteHTML($this->renderPartial($view,['model'=>$model,'notas'=>$notas,'fecha'=>$fecha]));
        $basePhysical = Yii::getAlias('@webroot');
        $target_path="/pdf/";
        $Folio=$this->gen_uuid();
        $filename=$basePhysical.$target_path.$Folio.".pdf";
        $mpdf->Output($filename);
        $Resultaado   =   ['Estatus' => 'OK' , 'Mensaje' => '', 'cUrl' => 'https://sistema.nafatedelacruz.com.mx/pdf/'.$Folio.".pdf"];
        return json_encode($Resultaado);
        
    }
    
    public function actionExportadocumento($paciente_id)
    {
    
       $lstNotas=Yii::$app->request->post('identificadores');
       $model= PacientesDao::findModel($paciente_id);
       $notas= DocumentosPacienteDao::getDocumentosAll($lstNotas);
       $doctor= DoctorDao::finddoctor(YII::$app->user->identity->id);
       $defaultConfig = (new \Mpdf\Config\ConfigVariables())->getDefaults();
       $fontDirs = $defaultConfig['fontDir'];
       $media_carta=Yii::$app->request->post('media_carta');
       $defaultFontConfig = (new \Mpdf\Config\FontVariables())->getDefaults();
       $fontData = $defaultFontConfig['fontdata'];
         $header=Yii::$app->request->post('header_carta');
        if ($header == "0")
       {
              $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8']);
       }
       else
       {
            $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [215.9,139.7]]);
       }
       
       
   
        $cIdioma="es_ES";
        setlocale(LC_TIME, $cIdioma);
        $fecha=Yii::$app->formatter->asDate(date("Y-m-d"), 'dd/MM/yyyy');
         $mpdf->SetMargins(60,10,33);
        $mpdf->SetFont('Dejavu Sans','fontawesome');
        $view="formatos";
        $mpdf->SetHeader($this->renderPartial('header',['doctor'=>$doctor,'fecha'=>$fecha]));
        $mpdf->SetFooter($this->renderPartial('footer',['doctor'=>$doctor,'fecha'=>$fecha]));
        $mpdf->WriteHTML($this->renderPartial($view,['model'=>$model,'notas'=>$notas,'fecha'=>$fecha]));
        $basePhysical = Yii::getAlias('@webroot');
        $target_path="/pdf/";
        $Folio=$this->gen_uuid();
        $filename=$basePhysical.$target_path.$Folio.".pdf";
        $mpdf->Output($filename);
        $Resultaado   =   ['Estatus' => 'OK' , 'Mensaje' => '', 'cUrl' => 'https://sistema.nafatedelacruz.com.mx/pdf/'.$Folio.".pdf"];
        return json_encode($Resultaado);
        
    }
    
    
    public function actionExportahistorial($paciente_id)
    {
    
       $lstNotas=Yii::$app->request->post('identificadores');
       $model= $this->servicePacientes->findModel($paciente_id);
       $historial_ahf= $this->serviceHistorial->findModelAHF($model->id);
       $historial_app= $this->serviceHistorial->findModelAPP($model->id);
       $historial_pa= $this->serviceHistorial->findModelPA($model->id);
       $historial_ef= $this->serviceHistorial->findModelEF($model->id);
       $historial_comentarios=$this->serviceHistorial->findModelHC($model->id);
       $historial_apnp= $this->serviceHistorial->findModelApnp($model->id);
       $historia_gineco=$this->serviceHistorial->findModelGineco($model->id);
       $doctor= DoctorDao::finddoctor(YII::$app->user->identity->id);
       $mpdf = new \Mpdf\Mpdf();
        $cIdioma="es_ES";
        setlocale(LC_TIME, $cIdioma);
        $fecha=  utf8_encode (strftime('%A %d de %B del %Y', strtotime(date("Y-m-d H:i:s"))));
        $mpdf->SetMargins(60,10,33);
        $mpdf->SetFont('Dejavu Sans','fontawesome');
        $view="historial";
        $mpdf->SetHeader($this->renderPartial('header',['doctor'=>$doctor,'fecha'=>$fecha]));
        $mpdf->SetFooter($this->renderPartial('footer',['doctor'=>$doctor,'fecha'=>$fecha]));
        $mpdf->WriteHTML($this->renderPartial($view,['model'=>$model,
                                                     'historial_ahf'=>$historial_ahf,
                                                     'historial_app'=>$historial_app,
                                                     'historial_pa'=>$historial_pa,
                                                     '$historial_comentarios'=>$historial_comentarios,
                                                     'historial_apnp'=>$historial_apnp,
                                                     'historia_gineco'=>$historia_gineco,
                                                     'historial_ef'=>$historial_ef]));
        $basePhysical = Yii::getAlias('@webroot');
        $target_path="/pdf/";
        $Folio=$this->gen_uuid();
        $filename=$basePhysical.$target_path.$Folio.".pdf";
        $mpdf->Output($filename);
        $Resultaado   =   ['Estatus' => 'OK' , 'Mensaje' => '', 'cUrl' => 'https://sistema.nafatedelacruz.com.mx/pdf/'.$Folio.".pdf"];
        return json_encode($Resultaado);
        
    }
    
    
    static  function calculaedad($fechanacimiento){
      $fecha_nac = new \DateTime(date('Y/m/d',strtotime($fechanacimiento))); // Creo un objeto DateTime de la fecha ingresada
      $fecha_hoy =  new \DateTime(date('Y/m/d',time())); // Creo un objeto DateTime de la fecha de hoy
      $edad = date_diff($fecha_hoy,$fecha_nac);
      return $edad->format('%Y').' años  '.$edad->format('%m').' meses y '.$edad->format('%d').' dias';
      
    }
    
       static  function calculaedadanos($fechanacimiento){
     $fecha_nac = new \DateTime(date('Y/m/d',strtotime($fechanacimiento))); // Creo un objeto DateTime de la fecha ingresada
      $fecha_hoy =  new \DateTime(date('Y/m/d',time())); // Creo un objeto DateTime de la fecha de hoy
      $edad = date_diff($fecha_hoy,$fecha_nac);
      return $edad->format('%Y').' años  ';
      
    }
    
    public function actionDelete($id){
        
      
        try
        {
            $this->servicePacientes->delete($id);
            $this->estatus  =  'OK';  
            $this->mensaje  = 'El registro se ha eliminado con correctamente';
                
        }
     
        
        catch (Exception $ex)
        {
           $this->estatus  =  'ERROR';
           $this->mensaje  =  $ex->getMessage();
        }
         $Resultaado   =   ['Estatus' => $this->estatus, 'Mensaje' => $this->mensaje];
        return json_encode($Resultaado);
        
    }


}
