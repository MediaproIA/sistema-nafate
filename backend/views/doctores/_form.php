<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use common\models\User;
/* @var $this yii\web\View */
/* @var $model backend\models\Doctores */
/* @var $form yii\widgets\ActiveForm */
$url='';

if ($model->isNewRecord)
{
    $url = Url::to(['doctores/guardar']);
 
}
else
{
  $url = Url::to(['doctores/actualizar', 'id' => $model->doctor_id]);  
}




?>
<div class="tab-pane fade show active" id="home-tab-1" role="tabpanel">
<form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" action="<?php echo $url ?>" id="form_sample_2" method="post" >
     <?= Html::csrfMetaTags() ?>
    <div class="card-body">
    <div class="form-group row col-lg-12">
        <div class="col-lg-6">
                <label class="col-form-label col-lg-12">Nombres <span class="text-danger">*</span></label>
                <div class="col-lg-9">
                   <?= Html::activeTextInput($model, 'nombre',['class' => 'form-control  required',]) ?>
                </div>
        </div>
         <div class="col-lg-6">
                <label class="col-form-label col-lg-12">Apellidos <span class="text-danger">*</span></label>
                <div class="col-lg-9">
                   <?= Html::activeTextInput($model, 'apellidos',['class' => 'form-control  required',]) ?>
                </div>
        </div>
    </div>
    <div class="form-group row col-lg-12">
        <div class="col-lg-6">
                <label class="col-form-label col-lg-12">Cédula Profecional <span class="text-danger">*</span></label>
                <div class="col-lg-9">
                   <?= Html::activeTextInput($model, 'cedula_professional',['class' => 'form-control  required',]) ?>
                </div>
        </div>
         <div class="col-lg-6">
                <label class="col-form-label col-lg-12">Teléfono <span class="text-danger">*</span></label>
                <div class="col-lg-9">
                   <?= Html::activeTextInput($model, 'telefono',['class' => 'form-control',]) ?>
                </div>
        </div>
    </div>
    <div class="form-group row col-lg-12">
        <div class="col-lg-6">
                <label class="col-form-label col-lg-3">Email <span class="text-danger">*</span></label>
                <div class="col-lg-9">
                   <?= Html::activeTextInput($model, 'email',['class' => 'form-control email',]) ?>
                </div>
        </div>
         <div class="col-lg-6">
                <label class="col-form-label col-lg-3">Especialidad <span class="text-danger">*</span></label>
                <div class="col-lg-9">
                   <?= Html::activeTextInput($model, 'especialidad',['class' => 'form-control  required',]) ?>
                </div>
        </div>
    </div>
            <div class="form-group row col-lg-12">
                    <div class="col-lg-6">
                <label class="col-form-label col-lg-3">Dirección Corta<span class="text-danger">*</span></label>
                <div class="col-lg-9">
                   <?= Html::activeTextarea($model, 'direccion',['class' => 'form-control  required',]) ?>
                </div>
        </div>
      <div class="col-lg-6">
                <label class="col-form-label col-lg-3">Dirección Larga<span class="text-danger">*</span></label>
                <div class="col-lg-9">
                   <?= Html::activeTextarea($model, 'dire_larga',['class' => 'form-control  required',]) ?>
                </div>
        </div>
        
    </div> 
         <div class="form-group row col-lg-12">
         
        <div class="col-lg-6">
                <label class="col-form-label col-lg-3">Usuario <span class="text-danger">*</span></label>
                <div class="col-lg-9">
                  <?= Html::activeDropDownList($model, 'usuario_asignado', ArrayHelper::map(User::find()->all(), 'id', 'username'),['prompt'=>'-Selecione Categoria-','class' => 'form-control required','data-live-search'=>'true','data-size'=>'8']) ?>
                </div>
        </div>
        
    </div> 
    </div>
 	
    
       <div class="card-footer">
                 <div class="row">
                                <div class="col-lg-12 ml-lg-auto">
                                     <?= Html::button($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' =>'btn btn-primary','id'=>'btnForm']) ?>
                                    <?= Html::a('Cancelar', ['index'], ['class' => 'redirecciona btn btn-secondary']) ?>	
                                        
                                </div>
                                

                        </div>
               
        </div>
</form>
</div>