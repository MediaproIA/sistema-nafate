<?php
use yii\helpers\Html;
/* @var $historial_ef backend\models\HistorialEf */
?>
  <div class="form-group row col-md-12">
      <div class="col-md-4">
                             <label class="col-form-label col-lg-12">TA</label>
                             <div style="width: 40%; float: left">
                               <?= Html::activeTextInput($historial_ef, 'TA',['class' => 'form-control',]) ?>                              
                             </div>
                             <div style="width: 10%; float: left; vertical-align: central; text-align: center; margin-top: 10px;">-</div>
                              <div style="width: 40%; float: left">
                               <?= Html::activeTextInput($historial_ef, 'TA_2',['class' => 'form-control',]) ?>                              
                             </div>
                           
                         
      </div>
  
      <div class="col-md-4">
                             <label class="col-form-label col-lg-12">FC</label>
                             <div class="col-lg-12">
                               <?= Html::activeTextInput($historial_ef, 'FC',['class' => 'form-control',]) ?>                              
                             </div>
                         
      </div>
       <div class="col-md-4">
                             <label class="col-form-label col-lg-12">FR</label>
                             <div class="col-lg-12">
                               <?= Html::activeTextInput($historial_ef, 'FR',['class' => 'form-control',]) ?>                              
                             </div>
                         
      </div>
     
      
     
</div>
  <div class="form-group row col-md-12">
     
      <div class="col-md-3">
                             <label class="col-form-label col-lg-12">Peso (KG)</label>
                             <div class="col-lg-12">
                               <?= Html::activeTextInput($historial_ef, 'Peso',['class' => 'form-control',]) ?>                              
                             </div>
                         
      </div>
       <div class="col-md-3">
                             <label class="col-form-label col-lg-12">Talla (Cm)</label>
                             <div class="col-lg-12">
                               <?= Html::activeTextInput($historial_ef, 'Talla',['class' => 'form-control',]) ?>                              
                             </div>
                         
      </div>
      <div class="col-md-3">
                             <label class="col-form-label col-lg-12">IMC</label>
                             <div class="col-lg-12">
                               <?= Html::activeTextInput($historial_ef, 'IMC',['class' => 'form-control ',]) ?>                              
                             </div>
                         
      </div>
       <div class="col-md-3">
                             <label class="col-form-label col-lg-12">Temp.</label>
                             <div class="col-lg-12">
                               <?= Html::activeTextInput($historial_ef, 'Temp',['class' => 'form-control',]) ?>                              
                             </div>
                         
      </div>
      
     
</div>
 <div class="form-group row col-lg-12">
      <div class="col-lg-12">
                             <label class="col-form-label col-lg-12">Exploración Fisica:</label>
                             <div class="col-lg-12">
                                  <?= Html::activeTextarea($historial_ef, 'exploracion_fisica',['class' => 'form-control summernote',]) ?>                          
                                            
                             </div>
                         
      </div>                    
</div>
 <div class="form-group row col-lg-12">
      <div class="col-lg-12">
                             <label class="col-form-label col-lg-12">Estudios de Laboratorio y Gabinete:</label>
                             <div class="col-lg-12">
                               <?= Html::activeTextarea($historial_ef, 'estudios',['class' => 'form-control summernote',]) ?>                            
                             </div>
                         
      </div>                    
</div>
 <div class="form-group row col-lg-12">
      <div class="col-lg-12">
                             <label class="col-form-label col-lg-12">Diagnóstico:</label>
                             <div class="col-lg-12">
                               <?= Html::activeTextarea($historial_ef, 'diagnostico',['class' => 'form-control summernote',]) ?>                            
                             </div>
                         
      </div>                    
</div>
 <div class="form-group row col-lg-12">
      <div class="col-lg-12">
                             <label class="col-form-label col-lg-12">Tratamiento:</label>
                             <div class="col-lg-12">
                               <?= Html::activeTextarea($historial_ef, 'tratamiento',['class' => 'form-control summernote',]) ?>                            
                             </div>
                         
      </div>                    
</div>
<div class="form-group row col-lg-12">
<div class="col-lg-12">        		<!--begin::Card-->
<input type="file" accept="application/pdf,image/*, image/gif, image/jpeg,image/bmp"  id="documents" multiple >
</div>										<!--end::Card-->
    
</div>
<div id="table-ef" class="form-group row col-lg-12">
  <?= $this->render('_table', ['list_documents'=>$list_documents,'assets'=>$assets]) ?>
</div>

