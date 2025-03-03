<?php
use yii\helpers\Html;
/* @var $recetas backend\models\Receta */
use yii\helpers\Url;
$url_notas=Url::to(['recetas/guarda','paciente_id'=>$model->id,'id_receta'=>$recetas->id_receta]); 

?>
 <form action="<?=$url_notas?>" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" name="form_recetas" id="form_recetas" method="post">
 <div class="form-group row col-lg-12">
     <div class="col-lg-4">
                             <label class="col-form-label col-lg-12">TA</label>
                             <div style="width: 40%; float: left">
                               <?= Html::activeTextInput($recetas, 'TA',['class' => 'form-control',]) ?>                              
                             </div>
                             <div style="width: 10%; float: left; vertical-align: central; text-align: center; margin-top: 10px;">-</div>
                              <div style="width: 40%; float: left">
                               <?= Html::activeTextInput($recetas, 'TA_2',['class' => 'form-control',]) ?>                              
                             </div>
                           
                         
      </div>
  
      <div class="col-lg-4">
                             <label class="col-form-label col-lg-12">FC</label>
                             <div class="col-lg-12">
                               <?= Html::activeTextInput($recetas, 'FC',['class' => 'form-control',]) ?>                              
                             </div>
                         
      </div>
       <div class="col-lg-4">
                             <label class="col-form-label col-lg-12">FR</label>
                             <div class="col-lg-12">
                               <?= Html::activeTextInput($recetas, 'FR',['class' => 'form-control',]) ?>                              
                             </div>
                         
      </div>
    
       
     
</div>
<div class="form-group row col-lg-12">
     
      <div class="col-lg-3">
                             <label class="col-form-label col-lg-12">Peso (KG)</label>
                             <div class="col-lg-12">
                               <?= Html::activeTextInput($recetas, 'Peso',['class' => 'form-control',]) ?>                              
                             </div>
                         
      </div>
       <div class="col-lg-3">
                             <label class="col-form-label col-lg-12">Talla (Cm)</label>
                             <div class="col-lg-12">
                               <?= Html::activeTextInput($recetas, 'Talla',['class' => 'form-control',]) ?>                              
                             </div>
                         
      </div>
      <div class="col-lg-3">
                             <label class="col-form-label col-lg-12">IMC</label>
                             <div class="col-lg-12">
                               <?= Html::activeTextInput($recetas, 'IMC',['class' => 'form-control ',]) ?>                              
                             </div>
                         
      </div>
       <div class="col-lg-3">
                             <label class="col-form-label col-lg-12">Temp.</label>
                             <div class="col-lg-12">
                               <?= Html::activeTextInput($recetas, 'Temp',['class' => 'form-control',]) ?>                              
                             </div>
                         
      </div>
      
       
     
</div>
 <div class="form-group row col-lg-12">
      
                             <label class="col-form-label col-lg-12">Medicamento:<span class="required">*</span></label>
                             <div class="col-lg-6">
                                 <select class="form-control select2" id="kt_select2_5" name="kt_select2_5" style="width: 100%;" >
														
                                  </select>                                   
                            
                             </div>
                             <div class="col-lg-6">
                             <span class="input-group-btn">
                                 <button class="btn btn-primary" type="button" id="addMed"> 
                                  <span class="fa fa-plus"></span>
                                </button>
                              </span>     
                             </div>
                        
</div>

 <div class="form-group row col-lg-12">
      <div class="col-lg-12">
                             <label class="col-form-label col-lg-12">Receta Medica:<span class="required">*</span></label>
                             <div class="col-lg-12">
                                  <?= Html::activeTextarea($recetas, 'receta',['rows' => '20','class' => 'form-control summernote  required',]) ?>                                       
                             </div>
                         
      </div>                    
</div>

<div class="form-group row col-lg-12">
      <div class="col-lg-6">
                             <label class="col-form-label col-lg-12">Cita:</label>
                             <div class="col-lg-12">
                               <?= Html::activeTextInput($recetas, 'prox_cita',['class' => 'form-control date-picker','autocomplete' => 'off']) ?>                              
                             </div>
                         
      </div>
       <div class="col-lg-6">
                             <label class="col-form-label col-lg-12">Hora:</label>
                             <div class="col-lg-12">
                                   <?= Html::activeTextInput($recetas, 'hora',['class' => 'form-control','autocomplete' => 'off']) ?>                          
                             </div>
                         
      </div>               
</div>
        <?php if ($recetas->id_receta > 0)
   {
       
   ?>
     <div class="form-group row col-lg-12">
      <div class="col-lg-6">
                             <label class="col-form-label col-lg-12">Fecha de Creación :<span class="required">*</span></label>
                             <div class="col-lg-12">
                               <?= Html::activeTextInput($recetas, 'fecha_creacion',['class' => 'form-control date-picker','autocomplete' => 'off']) ?>                              
                             </div>
                         
      </div>
       <div class="col-lg-6">
                             <label class="col-form-label col-lg-12">Hora de Creación:<span class="required">*</span></label>
                             <div class="col-lg-12">
                                   <?= Html::activeTextInput($recetas, 'hora_creacion',['class' => 'form-control  required time',]) ?>                          
                             </div>
                         
      </div>               
</div>
   <?php } ?> 
 </form>