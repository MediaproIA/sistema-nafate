<?php
use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model backend\models\SignupForm */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'Crear Usuario';
$url = Url::to(['user/signup']);


if ($model->isNewRecord)
{
   $this->title = 'Crear Usuario';
$url = Url::to(['user/signup']);

}
else
{
    $this->title = 'Actualziar Usuario';
    $url = Url::to(['user/actualizar', 'id' => $model->id]);  
}




?>
<div class="tab-pane fade show active" id="home-tab-1" role="tabpanel">
<form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" action="<?=$url ?>" id="form_sample_2" method="post" >
     <?= Html::csrfMetaTags() ?>
    <div class="card-body">
    <div class="form-group row col-lg-12">
        <div class="col-lg-6">
                <label class="col-form-label col-lg-3">Email <span class="text-danger">*</span></label>
                <div class="col-lg-9">
                   <?= Html::activeTextInput($model, 'email',['class' => 'form-control  required','style' => 'text-transform: none;']) ?>
                </div>
        </div>
        <?php if ($model->isNewRecord)  { ?>
         <div class="col-lg-6">
                <label class="col-form-label col-lg-3">Contraseña <span class="text-danger">*</span></label>
                <div class="col-lg-9">
                   <?= Html::activePasswordInput($model, 'password',['class' => 'form-control  required','style' => 'text-transform: none;']) ?>
                </div>
        </div>
        <?php } ?>
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


