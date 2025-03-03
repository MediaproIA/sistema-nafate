<?php
namespace backend\controllers;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\Url;
use backend\models\SignupForm;
use backend\dao\UserDao;
/**
 * Description of UserCotroller
 *
 * @author harley.medina
 */
class UserController  extends Controller {
   /**
     * {@inheritdoc}
     */
    public $estatus  = '';
    public $mensaje  =  '';
    public $error  =  '';
    public $url='';
    public $estatusTramite=false;
    public $enableCsrfValidation = false;
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
                    'logout' => ['get'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
    
    public function actionIndex()
    {
       
        return $this->render('index');
    }
    
    public function actionSignup()
    {
         $model = new SignupForm();
        $transaction = Yii::$app->db->beginTransaction();
        try 
        {
          if ($model->load(Yii::$app->request->post()) && $model->signup()) {
              
                $this->estatus  =  'OK';
                $this->mensaje  =  'Se ha enviado un email para confirmar su correo electrónico, por favor de validár en su correo no deseado';
                 $this->url = Url::to(['user/index']);
                $transaction->commit();
            }
            else {
                 $transaction->rollback();
                 $this->estatus  =  'ERROR';
                 $this->mensaje  =  'Ocurrio un error';
            }
        } 
        catch (Exception $ex){
            
             $transaction->rollback();
             $this->estatus  =  'ERROR';
             $this->mensaje  =  $ex->getMessage();
        }
        
      $Resultaado   =   ['Estatus' => $this->estatus, 'Mensaje' => $this->mensaje,'cUrl'=>$this->url];
      return json_encode($Resultaado);
    }
    
    public function actionPagina($sEcho,$iDisplayStart,$iDisplayLength,$sSearch)
    {
        $data=UserDao::getList($sEcho, $iDisplayStart, $iDisplayLength, $sSearch);
                          
        return json_encode($data);
    

    }
    
    public function actionCreate()
    {
        $model = new SignupForm();
        $model->isNewRecord=true;
        return $this->render('create', [
                'model' => $model,
            ]);
    }
    
    public function actionUpdate($id)
    {
        $model = UserDao::findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
    
    public function actionChange()
    {
        $model = UserDao::findModel(YII::$app->user->identity->id);
                return $this->render('reset', [
                'model' => $model
            ]);
        
    }
    
    public function actionReset ()
    {
    
        $passAnte=Yii::$app->request->post('ante');
        $passNue=Yii::$app->request->post('new');
        $model =  UserDao::findModel(YII::$app->user->identity->id);
        
            if ($model->validatePassword($passAnte))
            {
                $this->estatus  =  'OK';
                $this->mensaje  =  'La Contraseña se Actualizo Correctamente';
                $model->setPassword($passNue);
                $model->generateAuthKey();
                $this->url = Url::to(['../inscripciones/index']);
                $model->save();
            }
            else
            {
               $this->estatus  =  'ERROR';
            $this->mensaje  =  'La contraseña no coicide con la registrada en nuestra base de datos'; 
            }
         $Resultaado   =   ['Estatus' => $this->estatus, 'Mensaje' => $this->mensaje];
        return json_encode($Resultaado);
    }
    
     public function actionActualizar ($id)
    {
    
         $filter=Yii::$app->request->post('User');
        $model =  UserDao::findModel($id);
        $this->estatus  =  'OK';
        $this->mensaje  =  'El usuario se Actualizo Correctamente';
        $model->email=$filter['email'];
         $model->username=$model->email;
        $model->save();
        $Resultaado   =   ['Estatus' => $this->estatus, 'Mensaje' => $this->mensaje];
        return json_encode($Resultaado);
    }
}
