<?php
use yii\helpers\Html;
/* @var $historial_apnp backend\models\HistorialApnp */
?>
 <div class="form-group row col-lg-12">
      <div class="col-lg-6">
                             <label class="col-form-label col-lg-12">Lugar de Origen:</label>
                             <div class="col-lg-12">
                                   <?= Html::activeTextInput($historial_apnp, 'lugar_origen',['class' => 'form-control',]) ?>
                                            
                             </div>
                         
      </div>
     <div class="col-lg-6">
                             <label class="col-form-label col-lg-12">Lugar de Residencia:</label>
                             <div class="col-lg-12">
                               <?= Html::activeTextInput($historial_apnp, 'lugar_residencia',['class' => 'form-control',]) ?>                            
                             </div>
                         
      </div>   
</div>

<div class="form-group row col-lg-12">
      <div class="col-lg-6">
                             <label class="col-form-label col-lg-12">Ocupación:</label>
                             <div class="col-lg-12">
                                 <?= Html::activeTextInput($historial_apnp, 'ocupacion',['class' => 'form-control',]) ?>         
                                            
                             </div>
                         
      </div>
      <div class="col-lg-6">
                             <label class="col-form-label col-lg-12">Religión:</label>
                             <div class="col-lg-12">
                                <?= Html::activeTextInput($historial_apnp, 'religion',['class' => 'form-control',]) ?>                       
                             </div>
                         
      </div>  
</div>

<div class="form-group row col-lg-12">
      <div class="col-lg-6">
                             <label class="col-form-label col-lg-12">  Estado civil:</label>
                             <div class="col-lg-12">
                                  <?= Html::activeTextInput($historial_apnp, 'estado_civil',['class' => 'form-control',]) ?> 
                              
                                            
                             </div>
                         
      </div>
      <div class="col-lg-6">
                             <label class="col-form-label col-lg-12">Escolaridad:</label>
                             <div class="col-lg-12">
                                 <?= Html::activeTextInput($historial_apnp, 'escolaridad',['class' => 'form-control',]) ?> 
                                 
                                            
                             </div>
                         
      </div>  
</div>


 <div class="form-group row col-lg-12">
     <div class="col-lg-6">
                             <label class="col-form-label col-lg-12">Grupo Sanguineo:</label>
                             <div class="col-lg-12">
                                 <?= Html::activeTextInput($historial_apnp, 'grupo_sanguineo',['class' => 'form-control',]) ?>         
                                            
                             </div>
                         
      </div>
      <div class="col-lg-6">
                             <label class="col-form-label col-lg-12">Alcoholismo:</label>
                             <div class="col-lg-12">
                                   <?= Html::activeTextInput($historial_apnp, 'alcolismo',['class' => 'form-control',]) ?>   
                                                      
                             </div>
                         
      </div>                  
</div>
 <div class="form-group row col-lg-12">
  
      <div class="col-lg-12">
                             <label class="col-form-label col-lg-12">Toxicomanias:</label>
                             <div class="col-lg-12">
                                 <?= Html::activeTextInput($historial_apnp, 'drogas',['class' => 'form-control',]) ?> 
                                                   
                             </div>
                         
      </div>                  
</div>
 <div class="form-group row col-lg-12">
     <div class="col-lg-6">
                             <label class="col-form-label col-lg-12">Actividad Fisica:</label>
                             <div class="col-lg-12">
                              <?= Html::activeTextInput($historial_apnp, 'activiad_fisica',['class' => 'form-control',]) ?>           
                             </div>
                         
      </div>
      <div class="col-lg-6">
                             <label class="col-form-label col-lg-12">Inmunizaciones:</label>
                             <div class="col-lg-12">
                                 <?= Html::activeTextInput($historial_apnp, 'inmunizaciones',['class' => 'form-control',]) ?> 
                                                   
                             </div>
                         
      </div>                  
</div>
 <div class="form-group row col-lg-12">
      <div class="col-lg-6">
                             <label class="col-form-label col-lg-12">Nombre de la Pareja:</label>
                             <div class="col-lg-12">
                                   <?= Html::activeTextInput($historial_apnp, 'nombre_pareja',['class' => 'form-control',]) ?>
                                            
                             </div>
                         
      </div>
     <div class="col-lg-6">
                             <label class="col-form-label col-lg-12">Edad:</label>
                             <div class="col-lg-12">
                               <?= Html::activeTextInput($historial_apnp, 'edad_pareja',['class' => 'form-control',]) ?>                            
                             </div>
                         
      </div>   
</div>
 <div class="form-group row col-lg-12">
      <div class="col-lg-12">
                             <label class="col-form-label col-lg-12">Comentarios:</label>
                             <div class="col-lg-12">
                                   <?= Html::activeTextarea($historial_apnp, 'comentarios',['class' => 'form-control',]) ?>
                                            
                             </div>
                         
      </div>
       
</div>

                         


                         

