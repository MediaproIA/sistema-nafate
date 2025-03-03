<?php

namespace backend\controllers;

use Yii;
use backend\models\NotasEvolucion;
use backend\dao\PacientesDao;
use backend\dao\NotasEvolucionDao;
use backend\bussines\Generico;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DoctoresController implements the CRUD actions for Doctores model.
 */
class NotasevolucionController extends Controller
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
    protected $servicePacientes;
    protected $serviceNotas;
    
    public function __construct($id, $module, $config = []) {

        $this->serviceGeneric= new Generico();
        $this->servicePacientes= new PacientesDao();
        $this->serviceNotas= new NotasEvolucionDao();
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
    

      public function actionPaginanotaevolucion($sEcho,$iDisplayStart,$iDisplayLength,$iSortCol_0, $sSortDir_0,$paciente_id)
    {
        $sSearch="";
        $data=  $this->serviceNotas->getAll($sEcho, $iDisplayStart, $iDisplayLength, $sSearch, $iSortCol_0 ,$sSortDir_0,$paciente_id);              
        return json_encode($data);
   
    }
    
     public function actionGuardarnotaevolucion($paciente_id,$id_nota)
    {
        
        try
        {
             $cIdioma="es_ES";
        setlocale(LC_TIME, $cIdioma);
             $model = $this->serviceNotas->GetNotaEvolucion($paciente_id,$id_nota);
             
             if($model == null){
                $model= new NotasEvolucion();
                $model->paciente_id=$paciente_id;
                $model->usuario_creacion=YII::$app->user->identity->id;
                $model->fecha_creacion=date("Y-m-d H:i:s");
                $model->fecha=date("Y-m-d");
                $model->hora=date("H:i:s");
             }
             
             
             
        if ($model->load(Yii::$app->request->post())){    
                $model->fecha=Yii::$app->formatter->asDate(str_replace("/","-",$model->fecha), 'yyyy-MM-dd'); 
                //$model->hora=Yii::$app->formatter->asDate($model->hora, 'H:i:s'); 
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
    
    public function actionShownotaevolucion($nota_id,$paciente_id)
    {
        $notasEvolucion = $this->serviceNotas->GetNotaEvolucion($paciente_id, $nota_id);
        $model=$this->servicePacientes->findModel($paciente_id);
        if ($nota_id > 0)
        {
            $notasEvolucion->fecha=Yii::$app->formatter->asDate($notasEvolucion->fecha, 'dd/MM/yyyy'); 
            $notasEvolucion->hora=$notasEvolucion->hora;
        }
        else 
        {
             $notasEvolucion=  new NotasEvolucion();
             $notasEvolucion->paciente_id=$model->id;
             $notasEvolucion->id=$nota_id;
        }
        $this->layout = false;
        $plantilla= $this->render('//pacientes/notas_evolucion/form', [
                'model'=>$model,
                'notasEvolucion' => $notasEvolucion
                ]);
       $Resultaado   =   ['Estatus' => 'OK' , 'Mensaje' => '', 'plantilla' => $plantilla];
        return json_encode($Resultaado);
        
    }
    
    public function actionDelete($paciente_id,$nota_id){
        
      
        try
        {
            $this->serviceNotas->delete($paciente_id,$nota_id);
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
