<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use backend\models\Tblsuscripciones;
use yii\helpers\Url;
/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public $estatus  = '';
    public $mensaje  =  '';
    public $error  =  '';
    public $url='';
    public $enableCsrfValidation = false;
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error','validar'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index','dash'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
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

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
       
      return $this->goHome();
    }
    
    public function actionDash()
    {
       
        return $this->render('dash');
    }
    public function actionLogin()
    {
         $this->layout = 'login';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

           $model = new LoginForm(); 
           $model->contrasena = '';
            return $this->render('login', [
                'model' => $model,
            ]);
    }
    
    /**
     * Login action.
     *
     * @return string
     */
    public function actionValidar()
    {
       if (!Yii::$app->user->isGuest) {
           $this->estatus='OK';
           $this->url=Url::to(['site/index']);
       }
        $model = new LoginForm();
        $model->contrasena=Yii::$app->request->post('contrasena');
        $model->username=Yii::$app->request->post('username');
        $model->load(Yii::$app->request->post());
        if ($model->login()){
             $this->estatus='OK';
            $this->url=Url::to(['pacientes/index']);
        } 
        else 
        {
          $this->estatus='ERROR';
          $this->mensaje='El usuario o contrase«Ða invalida'; 
        }
       
        $Resultaado   =   ['estatus' => $this->estatus, 'mensaje' => $this->mensaje,'url' => $this->url];
        return json_encode($Resultaado);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
    
    
    
}
