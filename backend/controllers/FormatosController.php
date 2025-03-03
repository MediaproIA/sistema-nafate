<?php

namespace backend\controllers;

use Yii;
use backend\models\Formatos;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\dao\DocumentosDao;
/**
 * FormatosController implements the CRUD actions for Formatos model.
 */
class FormatosController extends Controller
{
    public $estatus  = '';
    public $mensaje  =  '';
    public $error  =  '';
    public $url  =  '';
    public $enableCsrfValidation = false;
    
    public function behaviors()
    {
        return [
                'access' => [
                        'class' => \yii\filters\AccessControl::className(),
                        'only' => ['index','create','update','view','pagina','actualizar','guardar'],
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
     * Lists all Formatos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Formatos::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Formatos model.
     * @param integer $id
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
     * Creates a new Formatos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Formatos();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->formato_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Formatos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->formato_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Formatos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Formatos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Formatos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Formatos::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
       public function actionPagina($sEcho,$iDisplayStart,$iDisplayLength,$sSearch,$iSortCol_0, $sSortDir_0)
    {
        
        $data= DocumentosDao::getList($sEcho, $iDisplayStart, $iDisplayLength, $sSearch, $iSortCol_0, $sSortDir_0);              
        return json_encode($data);
   
    }
    
    public function actionGuardar()
    {
          $cUrl='';
        try
        {
            $model = new Formatos();
            if ($model->load(Yii::$app->request->post())) { 
                $model->activo=$model->activo=='on'?1:0;
             $model->usuario_creacion=YII::$app->user->identity->id;
             $model->usuario_modificacion=YII::$app->user->identity->id;
             $model->fecha_creacion=date("Y-m-d H:i:s");
             $model->fecha_modificacion=date("Y-m-d H:i:s");
                
            if ($model->save())
            {
                    $this->estatus  =  'OK';
                    $this->mensaje  =  'El registro se ha guardado correctamente.';
            }
            else
            {
               $this->estatus  =  'ERROR';
               $this->mensaje  =   $model->getErrors();     
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
         $Resultaado   =   ['Estatus' => $this->estatus, 'Mensaje' => $this->mensaje];
        return json_encode($Resultaado);
    }
    public function actionActualizar($id)
    {
        try 
        {
            $model = DocumentosDao::findModel($id);
            if ($model->load(Yii::$app->request->post())) {
              $model->activo=$model->activo=='on'?1:0;
             $model->usuario_modificacion=YII::$app->user->identity->id;
             $model->fecha_modificacion=date("Y-m-d H:i:s");
            if ($model->save())
            {
                $this->estatus  =  'OK';
                $this->mensaje  =  'El registro se ha Actualizado correctamente';
            }
            else
            {
               $this->estatus  =  'ERROR';
               $this->mensaje  = $model->getErrors();
            }
         } 
        else
        {
            throw new Exception($model->getErrors());
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
    
     public function actionGetall()
    {
        if (isset($_POST['query'])) {
                $query=$_POST['query'];
            }
            else
            {
                $query='';
            }
       
       
        $lstMedicamentos= DocumentosDao::DameFormato($query);
       
        $data=array();
        foreach ($lstMedicamentos as $medicamento)
        {
             $data[] = array("id"=>$medicamento['formato_id'], "text"=>$medicamento['nombre']);
             
             
        }
        
        return json_encode($data);
    }
    
    public function actionGetone($id)
    {
       $Medicamento= DocumentosDao::findModel($id);
       $this->estatus  =  'OK';      
       $Resultaado   =   ['Estatus' => 'OK', 'contenido' =>$Medicamento->contenido,'nombre' =>$Medicamento->nombre];
       return json_encode($Resultaado);
    }
    

}
