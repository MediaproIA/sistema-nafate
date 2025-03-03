<?php

namespace backend\controllers;

use Yii;
use backend\models\NotasMedicas;
use backend\dao\PacientesDao;
use backend\dao\NotasMedicasDao;
use backend\bussines\Generico;
use backend\dao\FilesDao;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DoctoresController implements the CRUD actions for Doctores model.
 */
class NotasController extends Controller
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
      protected $serviceFiles;
    public function __construct($id, $module, $config = []) {

        $this->serviceGeneric= new Generico();
        $this->servicePacientes= new PacientesDao();
        $this->serviceNotas= new NotasMedicasDao();
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
    
    public function actionPaginanota($sEcho,$iDisplayStart,$iDisplayLength,$paciente_id)
    {
        $sSearch="";
        $data=  $this->serviceNotas->getAll($sEcho, $iDisplayStart, $iDisplayLength, $sSearch,1 ,'desc',$paciente_id);              
        return json_encode($data);
   
    }
    
     public function actionGuardarnota($paciente_id,$id_nota)
    {
        
        try
        {
             $cIdioma="es_ES";
        setlocale(LC_TIME, $cIdioma);
             $model = $this->serviceNotas->GetNota($paciente_id,$id_nota);
             
             if($model == null){
                $model= new NotasMedicas();
                $model->paciente_id=$paciente_id;
                $model->usuario_creacion=YII::$app->user->identity->id;
                $model->fecha_creacion=date("Y-m-d H:i:s");
                $model->fecha=date("Y-m-d");
                $model->hora=date('H:i:s');
             }
             
             
             
        if ($model->load(Yii::$app->request->post())){    
                $model->fecha=Yii::$app->formatter->asDate(str_replace("/","-",$model->fecha), 'yyyy-MM-dd'); 
               
                $model->usuario_modificacion=YII::$app->user->identity->id;
                $model->fecha_modificacion=date("Y-m-d H:i:s");
                          
                    if ($model->save())
                    {
                        $this->serviceGeneric->Reordena($_POST, $model->paciente_id,$model->id);
                        $this->serviceGeneric->saveFiles($_FILES,4, $model->paciente_id, $model->id,'files/','documents');
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
    
    public function actionShownota($nota_id,$paciente_id)
    {
        $notasMedicas = $this->serviceNotas->GetNota($paciente_id, $nota_id);
        $model=    $this->servicePacientes->findmodel($paciente_id);
        $target_path="..";
        if ($nota_id > 0)
        {
            $notasMedicas->fecha=Yii::$app->formatter->asDate($notasMedicas->fecha, 'dd/MM/yyyy'); 
            $notasMedicas->hora=$notasMedicas->hora;
           
        }
        else{
               $notasMedicas=  new NotasMedicas();
             $notasMedicas->paciente_id=$model->id;
             $notasMedicas->id=$nota_id;
        }
        $this->layout = false;
         $lista_files= $this->serviceFiles->DameFiles($paciente_id, $nota_id);
        $plantilla= $this->render('//pacientes/notas_medicas/form', [
                'model'=>$model,
                'notasMedicas' => $notasMedicas,
                'baseUrl'=>$target_path,
                'list_files'=>$lista_files,
                'assets'=>'/medical/backend/web/assets_metronic/'
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
