<?php
use yii\helpers\Html;
/* @var $historial_gineco backend\models\HistorialGineco */
$display_none=$historial_gineco->embarazada=='1'?"display:block;":"display:none;";
?>
 <div class="form-group row col-lg-12">
      <div class="col-lg-4">
                             <label class="col-form-label col-lg-12">Fecha Ultima Regla:<span class="required">*</span></label>
                             <div class="col-lg-12">
                                   <?= Html::activeTextInput($historial_gineco, 'ultima_regla',['class' => 'form-control  date-picker',]) ?>
                                            
                             </div>
                         
      </div>
     <div class="col-lg-4">
                             <label class="col-form-label col-lg-12">¿Embarazada?:<span class="required">*</span></label>
                             <div class="col-lg-12">
                               <?= Html::activeDropDownList($historial_gineco, "embarazada", [0=>'No', 1 => 'SI'],['class' => 'form-control  required'])?>                            
                             </div>
                         
      </div>
     <div class="col-lg-4" style="<?=$display_none?>" id="fecha_parto">
                             <label class="col-form-label col-lg-12">Fecha Probable de Parto:</label>
                             <div class="col-lg-12">
                               <?= Html::activeTextInput($historial_gineco, "fecha_parto",['class' => 'form-control date-picker required'])?>                            
                             </div>
                         
      </div> 
</div>
 <div class="form-group row col-lg-12">
      <div class="col-lg-6">
                             <label class="col-form-label col-lg-12">Menarca:</label>
                             <div class="col-lg-12">
                                   <?= Html::activeTextInput($historial_gineco, 'monarca',['class' => 'form-control',]) ?>
                                            
                             </div>
                         
      </div>
        <div class="col-lg-6">
                             <label class="col-form-label col-lg-12">Menopausia:</label>
                             <div class="col-lg-12">
                                   <?= Html::activeTextInput($historial_gineco, 'menupaucia',['class' => 'form-control',]) ?>
                                            
                             </div>
                         
      </div>
       
</div>
 <div class="form-group row col-lg-12">
      <div class="col-lg-6">
                             <label class="col-form-label col-lg-12">Embarazos:</label>
                             <div class="col-lg-12">
                                   <?= Html::activeTextInput($historial_gineco, 'embarazos',['class' => 'form-control',]) ?>
                                            
                             </div>
                         
      </div>
        <div class="col-lg-6">
                             <label class="col-form-label col-lg-12">Partos:</label>
                             <div class="col-lg-12">
                                   <?= Html::activeTextInput($historial_gineco, 'partos',['class' => 'form-control',]) ?>
                                            
                             </div>
                         
      </div>
       
</div>
 <div class="form-group row col-lg-12">
      <div class="col-lg-6">
                             <label class="col-form-label col-lg-12">Cesareas:</label>
                             <div class="col-lg-12">
                                   <?= Html::activeTextInput($historial_gineco, 'cesareas',['class' => 'form-control',]) ?>
                                            
                             </div>
                         
      </div>
        <div class="col-lg-6">
                             <label class="col-form-label col-lg-12">Abortos:</label>
                             <div class="col-lg-12">
                                   <?= Html::activeTextInput($historial_gineco, 'abortos',['class' => 'form-control',]) ?>
                                            
                             </div>
                         
      </div>
       
</div>
 <div class="form-group row col-lg-12">
      <div class="col-lg-6">
                             <label class="col-form-label col-lg-12">Número de Hijos:</label>
                             <div class="col-lg-12">
                                   <?= Html::activeTextInput($historial_gineco, 'hijos',['class' => 'form-control',]) ?>
                                            
                             </div>
                         
      </div>
        
       
</div>
 <div class="form-group row col-lg-12">
    
        <div class="col-lg-12">
                             <label class="col-form-label col-lg-12">Comentarios:</label>
                             <div class="col-lg-12">
                                   <?= Html::activeTextarea($historial_gineco, 'comentarios',['class' => 'form-control summernote',]) ?>
                                            
                             </div>
                         
      </div>
       
</div>                        
