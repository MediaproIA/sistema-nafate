<?php
use yii\helpers\Html;
/* @var $model backend\models\Pacientes */
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$baseUrlTempo= str_replace('common', 'assets_metronic', $baseUrl);
?>
 <div class="form-group row col-lg-12">
      <div class="col-lg-6">
                             <label class="col-form-label col-lg-12">Nombre (s):<span class="required">*</span></label>
                             <div class="col-lg-12">
                               <?= Html::activeTextInput($model, 'nombres',['class' => 'form-control  required',]) ?>                              
                             </div>
                         
      </div>
       <div class="col-lg-6">
                             <label class="col-form-label col-lg-12">Apellidos:<span class="required">*</span></label>
                             <div class="col-lg-12">
                               <?= Html::activeTextInput($model, 'apellidos',['class' => 'form-control  required',]) ?>                              
                             </div>
                         
      </div>               
</div>
 <div class="form-group row col-lg-12">
      <div class="col-lg-6">
                             <label class="col-form-label col-lg-12">Fecha de Nacimiento:</label>
                             <div class="col-lg-12">
                               <?= Html::activeTextInput($model, 'fecha_nacimiento',['class' => 'form-control date-picker','autocomplete' => 'off','readonly' => 'true']) ?>                              
                             </div>
                         
      </div>
       <div class="col-lg-6">
                             <label class="col-form-label col-lg-12">Genero:<span class="required">*</span></label>
                             <div class="col-lg-12">
                               <?= Html::activeRadioList($model, "genero", [0=>'Femenino', 1 => 'Masculino',3 => 'Indefinido'],['class' => 'form-control  required',])?>                             
                             </div>
                         
      </div>               
</div>
 <div class="form-group row col-lg-12">
      <div class="col-lg-6">
                             <label class="col-form-label col-lg-12">Celular:<span class="required">*</span></label>
                             <div class="col-lg-12">
                               <?= Html::activeTextInput($model, 'telefono_celular',['class' => 'form-control  required',]) ?>                              
                             </div>
                         
      </div>
       <div class="col-lg-6">
                             <label class="col-form-label col-lg-12">Teléfono:</label>
                             <div class="col-lg-12">
                               <?= Html::activeTextInput($model, 'telefono_fijo',['class' => 'form-control',]) ?>                              
                             </div>
                         
      </div>               
</div>
 <div class="form-group row col-lg-12">
      <div class="col-lg-6">
                             <label class="col-form-label col-lg-12">Email:</label>
                             <div class="col-lg-12">
                               <?= Html::activeTextInput($model, 'email',['class' => 'form-control','style' => 'text-transform: none !important']) ?>                              
                             </div>
                         
      </div>
          <div class="col-lg-6">
                             <label class="col-form-label col-lg-12">RFC:</label>
                             <div class="col-lg-12">
                               <?= Html::activeTextInput($model, 'rfc',['class' => 'form-control',]) ?>                              
                             </div>
                         
      </div>           
</div>


   <div class="form-group row col-lg-12">
        <div class="col-lg-6">
                             <label class="col-form-label col-lg-12">Dirección:</label>
                             <div class="col-lg-12">
                               <?= Html::activeTextarea($model, 'direccion',['class' => 'form-control',]) ?>                              
                             </div>
                         
      </div>  
      <div class="col-lg-6">
                             <label class="col-form-label col-lg-12">Fecha:<span class="required">*</span></label>
                             <div class="col-lg-12">
                               <?= Html::activeTextInput($model, 'fecha_creacion',['class' => 'form-control date-picker  required',]) ?>                              
                             </div>
                         
      </div>
   </div>
      <div class="form-group row col-lg-12">
           <div class="col-lg-6">
                         <label class="col-form-label col-12 text-lg-center text-center">Imagen</label>
            <div class="col-12">
         
                    <input type="file" name="profile_avatar" accept=".png, .jpg, .jpeg" />     
                        </div>
    
   </div>
          </div>