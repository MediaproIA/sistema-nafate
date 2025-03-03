<?php

namespace backend\controllers;

use Yii;
use backend\models\HistorialEf;
use backend\dao\HistorialDao;
use backend\dao\FilesDao;
use backend\bussines\Generico;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DoctoresController implements the CRUD actions for Doctores model.
 */
class EfController extends Controller
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
    protected $serviceHistorial;
     protected $serviceFiles;
    public function __construct($id, $module, $config = []) {

        $this->serviceGeneric= new Generico();
        $this->serviceHistorial= new HistorialDao();
        $this->serviceFiles= new FilesDao();
        parent::__construct($id, $module, $config);
    
    }
    
    public function behaviors()
    {
        return [
                'access' => [
                        'class' => \yii\filters\AccessControl::className(),
                        'only' => ['index','create','update','view','pagina','actualizar','guardar','delete'],
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
    
    public function actionUpdate($paciente_id)
    {
        $transaction = Yii::$app->db->beginTransaction();
        try
        {
             $cIdioma="es_ES";
             setlocale(LC_TIME, $cIdioma);
             $model = $this->serviceHistorial->GetEF($paciente_id);
             
             if($model == null){
                $model= new HistorialEf();
                $model->paciente_id=$paciente_id;
                $model->usuario_creacion=YII::$app->user->identity->id;
                $model->fecha_creacion=date("Y-m-d H:i:s");
             }
             
             
        if ($model->load(Yii::$app->request->post())){    
                $model->usuario_modificacion=YII::$app->user->identity->id;
                $model->fecha_modificacion=date("Y-m-d H:i:s");
                 
              
                    if ($model->save())
                    {
                        $this->serviceGeneric->saveFiles($_FILES,2, $model->paciente_id, 0,'files/','documents');
                        $this->layout=false;
                        $this->table= $this->renderPartial('//pacientes/ef/_table', ['list_documents'=> $this->serviceFiles->DameFiles($paciente_id, 0),'assets'=>'https://sistema.nafatedelacruz.com.mx/']);
                        $this->estatus  =  'OK';
                        $this->mensaje  =  'El registro se ha guardado correctamente';
                        $transaction->commit();
                        
                    }
                    else
                    {
                        $transaction->rollBack(); 
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
         $Resultaado   =   ['Estatus' => $this->estatus, 'Mensaje' => $this->mensaje,'table'=>$this->table];
        return json_encode($Resultaado);
    }
    
    public function actionDelete($id){
        
      
        try
        {
            $this->serviceFiles->delete($id);
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

