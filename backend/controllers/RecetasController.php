<?php

namespace backend\controllers;

use Yii;
use backend\models\Receta;
use backend\dao\PacientesDao;
use backend\dao\RecetasDao;
use backend\bussines\Generico;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DoctoresController implements the CRUD actions for Doctores model.
 */
class RecetasController extends Controller
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
    protected $serviceRecetas;
    
    public function __construct($id, $module, $config = []) {

        $this->serviceGeneric= new Generico();
        $this->servicePacientes= new PacientesDao();
        $this->serviceRecetas= new RecetasDao();
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
    

    public function actionPagina($sEcho,$iDisplayStart,$iDisplayLength,$iSortCol_0, $sSortDir_0,$paciente_id)
    {
        $sSearch="";
        $data=  $this->serviceRecetas->getAll($sEcho, $iDisplayStart, $iDisplayLength, $sSearch, $iSortCol_0 ,$sSortDir_0,$paciente_id);              
        return json_encode($data);
   
    }
    
    public function actionGuarda($paciente_id,$id_receta)
    {
        
        try
        {
             $cIdioma="es_ES";
             setlocale(LC_TIME, $cIdioma);
             date_default_timezone_set('America/Mexico_City');
             $model =  $this->serviceRecetas->GetReceta($paciente_id,$id_receta);
             
             if($model == null){
                $model= new Receta();
                $model->paciente_id=$paciente_id;
                $model->usuario_creacion=YII::$app->user->identity->id;
                $model->fecha_creacion=date("Y-m-d H:i:s");
                $model->hora_creacion=date('H:i:s');
               
             }
             
             
             
        if ($model->load(Yii::$app->request->post())){    
                
                if ( $model->prox_cita != '')
                {
                    $model->prox_cita=Yii::$app->formatter->asDate(str_replace("/","-",$model->prox_cita), 'yyyy-MM-dd'); 
                }
                
                  $model->fecha_creacion=Yii::$app->formatter->asDate(str_replace("/","-",$model->fecha_creacion), 'yyyy-MM-dd'); 
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
    
    public function actionShow($receta_id,$paciente_id)
    {
        $notasEvolucion = $this->serviceRecetas->GetReceta($paciente_id, $receta_id);
        $model=  $this->servicePacientes->findModel($paciente_id);
        if ($receta_id > 0){
         $notasEvolucion->fecha_creacion=Yii::$app->formatter->asDate($notasEvolucion->fecha_creacion, 'dd/MM/yyyy'); 
        if ($notasEvolucion->prox_cita != '')
        {
            $notasEvolucion->prox_cita=Yii::$app->formatter->asDate($notasEvolucion->prox_cita, 'dd/MM/yyyy');
            $notasEvolucion->hora=$notasEvolucion->hora;
           
        }
        
        }
        else{
             $notasEvolucion= new Receta();
             $notasEvolucion->paciente_id=$paciente_id;
             $notasEvolucion->id_receta=0;
        }
        $this->layout = false;
        $plantilla= $this->render('//pacientes/recetas/form', [
                'model'=>$model,
                'recetas' => $notasEvolucion
                ]);
       $Resultaado   =   ['Estatus' => 'OK' , 'Mensaje' => '', 'plantilla' => $plantilla];
        return json_encode($Resultaado);
        
    }
    
    public function actionDelete($paciente_id,$receta_id){
        
      
        try
        {
            $this->serviceRecetas->delete($paciente_id,$receta_id);
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


