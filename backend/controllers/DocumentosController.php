<?php

namespace backend\controllers;

use Yii;
use backend\models\Documentos;
use backend\dao\PacientesDao;
use backend\dao\FilesDao;
use backend\dao\DocumentosPacienteDao;
use backend\bussines\Generico;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DoctoresController implements the CRUD actions for Doctores model.
 */
class DocumentosController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public $estatus  = '';
    public $mensaje  =  '';
    public $error  =  '';
    public $url  =  '';
       public $table  =  '';
    public $enableCsrfValidation = false;
    protected $serviceGeneric;
    protected $serviceDocumentosPacienteDao;
     protected $serviceFiles;
       protected $servicePacientes;
    public function __construct($id, $module, $config = []) {

        $this->serviceGeneric= new Generico();
        $this->serviceDocumentosPacienteDao= new DocumentosPacienteDao();
        $this->serviceFiles= new FilesDao();
         $this->servicePacientes= new PacientesDao();
        parent::__construct($id, $module, $config);
    
    }
    
    public function behaviors()
    {
        return [
                'access' => [
                        'class' => \yii\filters\AccessControl::className(),
                        'only' => ['showdocumento','delete','paginadocumento'],
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
    
     public function actionPaginadocumento($sEcho,$iDisplayStart,$iDisplayLength,$iSortCol_0, $sSortDir_0,$paciente_id)
    {
        $sSearch="";
        $data=$this->serviceDocumentosPacienteDao->getAll($sEcho, $iDisplayStart, $iDisplayLength, $sSearch,$iSortCol_0, $sSortDir_0,$paciente_id);              
        return json_encode($data);
   
    }
    
      public function actionGuarda($paciente_id,$id_documento)
    {
        $transaction = Yii::$app->db->beginTransaction();
       
        try
        { $cIdioma="es_ES";
        setlocale(LC_TIME, $cIdioma);
      //  $paciente_id=Yii::$app->request->post('paciente_id_doc');
        // $id_documento=Yii::$app->request->post('paciente_id_doc');
$model = $this->serviceDocumentosPacienteDao->Getdocumento($paciente_id,$id_documento);
             
             if($model == null){
                $model= new Documentos();
                $model->paciente_id=$paciente_id;
                $model->usuario_creacion=YII::$app->user->identity->id;
                $model->fecha_creacion=date("Y-m-d H:i:s");
               $model->hora_creacion=date('H:i:s');
             }
             
             
             
        if ($model->load(Yii::$app->request->post())){    
               $model->formato_id= $model->formato_id==''?0: $model->formato_id;
                $model->usuario_modificacion=YII::$app->user->identity->id;
                $model->fecha_modificacion=date("Y-m-d H:i:s");
                  $model->fecha_creacion=Yii::$app->formatter->asDate(str_replace("/","-",$model->fecha_creacion), 'yyyy-MM-dd');           
                    if ($model->save())
                    {
                        $this->serviceGeneric->Reordena($_POST, $model->paciente_id,$model->id);
                        $this->serviceGeneric->saveFiles($_FILES,1, $model->paciente_id, $model->id,'files/','documents');
                        $transaction->commit();
                        $this->estatus  =  'OK';
                        $this->mensaje  =  'El registro se ha guardado correctamente';
                    }
                    else
                    {
                       $this->estatus  =  'ERROR';
                       $this->mensaje  =  $model->getErrors();
                        $transaction->rollBack();
                    }
                
        }
        else
        {
            $transaction->rollBack();
            $this->estatus  =  'ERROR';
             $this->mensaje  =  'El Paciente a actualizar No Existe';     
        
        }  
        }
        catch (Exception $ex)
        {
               $transaction->rollBack();
               $this->estatus  =  'ERROR';
               $this->mensaje  =  $ex->getMessage();
        }
         $Resultaado   =   ['Estatus' => $this->estatus, 'Mensaje' => $this->mensaje];
        return json_encode($Resultaado);
    }
    
    public function actionShowdocumento($paciente_id,$documento_id)
    {
        $notasEvolucion = $this->serviceDocumentosPacienteDao->Getdocumento($paciente_id, $documento_id);
        $target_path="..";
        $model= $this->servicePacientes->findModel($paciente_id);
        if ($notasEvolucion==null)
        {
               $notasEvolucion= new Documentos();
                $notasEvolucion->paciente_id=$paciente_id;
                $notasEvolucion->id=0;
        }
        else
        {
             $notasEvolucion->fecha_creacion=Yii::$app->formatter->asDate($notasEvolucion->fecha_creacion, 'dd/MM/yyyy'); 
        }
        $lista_files= $this->serviceFiles->DameFiles($paciente_id, $documento_id);
        $this->layout = false;
        $plantilla= $this->render('//pacientes/imagenes/form', [
                'model'=>$model,
                'formatos' => $notasEvolucion,
                'baseUrl'=>$target_path,
                'lista_files'=>$lista_files,
                'assets'=>'/medical/backend/web/assets_metronic/'
                ]);
       $Resultaado   =   ['Estatus' => 'OK' , 'Mensaje' => '', 'plantilla' => $plantilla];
        return json_encode($Resultaado);
        
    }
    
        public function actionDelete($paciente_id,$documento_id){
        
      
        try
        {
            $this->serviceDocumentosPacienteDao->delete($paciente_id,$documento_id);
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
