<?php

namespace backend\controllers;

use Yii;
use backend\models\Doctores;
use backend\dao\DoctorDao;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DoctoresController implements the CRUD actions for Doctores model.
 */
class DoctoresController extends Controller
{
    /**
     * {@inheritdoc}
     */
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
    
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Doctores::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Doctores model.
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
     * Creates a new Doctores model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Doctores();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->doctor_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Doctores model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->doctor_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

        public function actionDelete($id){
        
      
        try
        {
            Doctores::findOne($id)->delete();
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

    /**
     * Finds the Doctores model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Doctores the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Doctores::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
       public function actionPagina($sEcho,$iDisplayStart,$iDisplayLength,$sSearch,$iSortCol_0, $sSortDir_0)
    {
        
        $data= DoctorDao::getList($sEcho, $iDisplayStart, $iDisplayLength, $sSearch, $iSortCol_0, $sSortDir_0);              
        return json_encode($data);
   
    }
    
    public function actionGuardar()
    {
          $cUrl='';
        try
        {
            $model = new Doctores();
            if ($model->load(Yii::$app->request->post())) { 
               
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
            $model = DoctorDao::findModel($id);
            if ($model->load(Yii::$app->request->post())) {
              
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
}
