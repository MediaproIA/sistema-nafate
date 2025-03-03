<?php
use yii\helpers\Html;
use yii\helpers\Url;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
  $url = Url::to(['user/reset']); 
?>
<form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" action="<?php echo $url ?>" id="form_sample_2" method="post" >
     <?= Html::csrfMetaTags() ?>
 	<div class="m-portlet__body">
                <div class="form-group m-form__group row">
                         <div class="col-lg-6">
                                <label>Contraseña Anterior <span class="required">*</span></label>
                                <input type="password" name="ante" id="ante" value="" class="form-control required" style="text-transform: none;"/>
                        </div>
                        <div class="col-lg-6">
                                <label>Contraseña Nueva <span class="required">*</span></label>
                                  <div class="m-input-icon m-input-icon--right">
                                      <input type="password" name="new" id="new" value="" class="form-control required" style="text-transform: none;"/>
                                </div>
                        </div>
                        
                </div>
        </div>
        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                <div class="m-form__actions m-form__actions--solid">
                        <div class="row">
                                <div class="col-lg-6">
                                     <?= Html::button($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' =>'btn btn-primary','id'=>'btnForm']) ?>
                                    <?= Html::a('Cancelar', ['index'], ['class' => 'redirecciona btn btn-secondary']) ?>	
                                        
                                </div>
                                

                        </div>
                </div>
        </div>
</form>
