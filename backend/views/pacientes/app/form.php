<?php
use yii\helpers\Html;
/* @var $historial_app backend\models\HistorialApp */
?>
 <div class="form-group row col-lg-12">
      <div class="col-lg-12">
                             <label class="col-form-label col-lg-12">Enfermedades:</label>
                             <div class="col-lg-12">
                                 <?= Html::activeTextarea($historial_app, 'enfermedades',['class' => 'form-control summernote',]) ?>                                 
                                            
                             </div>
                         
      </div>                    
</div>
 <div class="form-group row col-lg-12">
      <div class="col-lg-12">
                             <label class="col-form-label col-lg-12">Infecciosos:</label>
                             <div class="col-lg-12">
                                <?= Html::activeTextarea($historial_app, 'infecciosos',['class' => 'form-control summernote',]) ?>                              
                             </div>
                         
      </div>                    
</div>
<div class="form-group row col-lg-12">
      <div class="col-lg-12">
                             <label class="col-form-label col-lg-12">Tumorales:</label>
                             <div class="col-lg-12">
                                 <?= Html::activeTextarea($historial_app, 'tumorales',['class' => 'form-control summernote',]) ?>  
                                            
                             </div>
                         
      </div>                    
</div>
 <div class="form-group row col-lg-12">
      <div class="col-lg-12">
                             <label class="col-form-label col-lg-12">Quirúrgicos:</label>
                             <div class="col-lg-12">
                                <?= Html::activeTextarea($historial_app, 'quirurgicos',['class' => 'form-control summernote',]) ?>                        
                             </div>
                         
      </div>                    
</div>
<div class="form-group row col-lg-12">
      <div class="col-lg-12">
                             <label class="col-form-label col-lg-12">Traumáticos:</label>
                             <div class="col-lg-12">
                                 <?= Html::activeTextarea($historial_app, 'traumaticos',['class' => 'form-control summernote',]) ?> 
                                            
                             </div>
                         
      </div>                    
</div>

 <div class="form-group row col-lg-12">
      <div class="col-lg-12">
                             <label class="col-form-label col-lg-12">Transfucionales:</label>
                             <div class="col-lg-12">
                                  <?= Html::activeTextarea($historial_app, 'tranfucionales',['class' => 'form-control summernote',]) ?> 
                                            
                             </div>
                         
      </div>                    
</div>
 <div class="form-group row col-lg-12">
      <div class="col-lg-12">
                             <label class="col-form-label col-lg-12">Alérgicos:</label>
                             <div class="col-lg-12">
                               <?= Html::activeTextarea($historial_app, 'alergicos',['class' => 'form-control summernote',]) ?>                             
                             </div>
                         
      </div>                    
</div>
