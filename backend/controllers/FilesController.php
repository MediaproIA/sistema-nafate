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
class FilesController extends Controller
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
                        'only' => ['guardadocumento','showdocumento','delete','paginadocumento'],
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
    
     public function actionPaginadocumento($sEcho,$iDisplayStart,$iDisplayLength,$paciente_id)
    {
        $sSearch="";
        $data=$this->serviceDocumentosPacienteDao->getAll($sEcho, $iDisplayStart, $iDisplayLength, $sSearch, 0, 'desc',$paciente_id);              
        return json_encode($data);
   
    }
    
      public function actionSavefile($paciente_id)
    {
        $transaction = Yii::$app->db->beginTransaction();
       
        try
        { 
       
                    $this->serviceGeneric->saveFiles($_FILES,5, $paciente_id,0,'files/','documents');
                     $transaction->commit();
                         $this->layout=false;
                        $this->table= $this->render('//pacientes/files/_table', ['list_documents'=> $this->serviceFiles->DameFilesByType($paciente_id, 5),'assets'=>'https://sistema.nafatedelacruz.com.mx/']);
                        $this->estatus  =  'OK';
                        $this->mensaje  =  'El registro se ha guardado correctamente';
                 
                
        
        
        }
        catch (Exception $ex)
        {
               $transaction->rollBack();
               $this->estatus  =  'ERROR';
               $this->mensaje  =  $ex->getMessage();
        }
         $Resultaado   =   ['Estatus' => $this->estatus, 'Mensaje' => $this->mensaje,'table'=>$this->table];
        return json_encode($Resultaado);
    }
    

    
}
