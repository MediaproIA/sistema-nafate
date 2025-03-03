<?php
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Medicamentos */
/* @var $form yii\widgets\ActiveForm */
$url='';

if ($model->isNewRecord)
{
    $url = Url::to(['medicamentos/guardar']);
 
}
else
{
  $url = Url::to(['medicamentos/actualizar', 'id' => $model->id]);  
}




?>
<div class="tab-pane fade show active" id="home-tab-1" role="tabpanel">
<form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" action="<?php echo $url ?>" id="form_sample_2" method="post" >
     <?= Html::csrfMetaTags() ?>
    <div class="card-body">
    <div class="form-group row col-lg-12">
        <div class="col-lg-6">
                <label class="col-form-label col-lg-3">Nombre <span class="text-danger">*</span></label>
                <div class="col-lg-9">
                   <?= Html::activeTextInput($model, 'nombre',['class' => 'form-control  required',]) ?>
                </div>
        </div>
         <div class="col-lg-6">
                <label class="col-form-label col-lg-3">Dosis <span class="text-danger">*</span></label>
                <div class="col-lg-9">
                   <?= Html::activeTextarea($model, 'descripcion',['class' => 'form-control  required',]) ?>
                </div>
        </div>
    </div>
     <div class="form-group row col-lg-12">
          <div class="col-lg-6">
                <label class="col-3 col-form-label">¿Estatus?</label>
                 <div class="col-3">
                      <span class="switch switch-outline switch-icon switch-primary">
                            <label>
                                <input type="checkbox" name="Medicamentos[activo]" id="lactivo" <?=$model->activo==1?"checked":"" ?> />
                                    <span></span>
                            </label>
                    </span>

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