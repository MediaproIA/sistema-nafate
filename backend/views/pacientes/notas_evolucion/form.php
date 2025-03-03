<?php
use yii\helpers\Html;
use yii\helpers\Url;
/* @var $notasEvolucion backend\models\NotasEvolucion */
$url_notas=Url::to(['notasevolucion/guardarnotaevolucion','paciente_id'=>$model->id,'id_nota'=>$notasEvolucion->id]); 

?>
 <form action="<?=$url_notas?>" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" name="form_notasevolucion" id="form_notasevolucion" method="post">
 
 <div class="form-group row col-lg-12">
      <div class="col-lg-12">
                             <label class="col-form-label col-lg-12">Resumen Clínico:<span class="required">*</span></label>
                             <div class="col-lg-12">
                               <?= Html::activeTextarea($notasEvolucion, 'nota_evolucion',['class' => 'form-control summernote  required',]) ?>                              
                             </div>
                         
      </div>                    
</div>
 
  <?php if ($notasEvolucion->id > 0)
   {
       
   ?>
     <div class="form-group row col-lg-12">
      <div class="col-lg-6">
                             <label class="col-form-label col-lg-12">Fecha:<span class="required">*</span></label>
                             <div class="col-lg-12">
                               <?= Html::activeTextInput($notasEvolucion, 'fecha',['class' => 'form-control date-picker  required',]) ?>                              
                             </div>
                         
      </div>
       <div class="col-lg-6">
                             <label class="col-form-label col-lg-12">Hora:<span class="required">*</span></label>
                             <div class="col-lg-12">
                                   <?= Html::activeTextInput($notasEvolucion, 'hora',['class' => 'form-control  required',]) ?>                          
                             </div>
                         
      </div>               
</div>
   <?php } ?> 
 </form>