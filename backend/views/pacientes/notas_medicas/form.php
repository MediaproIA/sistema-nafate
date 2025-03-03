<?php
use yii\helpers\Html;
use yii\helpers\Url;
/* @var $notasMedicas backend\models\NotasMedicas */

$url_notas=Url::to(['notas/guardarnota','paciente_id'=>$model->id,'id_nota'=>$notasMedicas->id]); 

?>
 <form action="<?=$url_notas?>" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" name="form_notas" id="form_notas" method="post">
    <div class="form-group row col-lg-12">
         <div class="col-lg-12">
                                <label class="col-form-label col-lg-12">Nota Medica:<span class="required">*</span></label>
                                <div class="col-lg-12">
                                  <?= Html::activeTextarea($notasMedicas, 'nota',['class' => 'form-control summernote   required',]) ?>                              
                                </div>

         </div>                    
   </div>
   <?php if ($notasMedicas->id > 0)
   {
       
   ?>
     <div class="form-group row col-lg-12">
      <div class="col-lg-6">
                             <label class="col-form-label col-lg-12">Fecha:<span class="required">*</span></label>
                             <div class="col-lg-12">
                               <?= Html::activeTextInput($notasMedicas, 'fecha',['class' => 'form-control date-picker  required',]) ?>                              
                             </div>
                         
      </div>
       <div class="col-lg-6">
                             <label class="col-form-label col-lg-12">Hora:<span class="required">*</span></label>
                             <div class="col-lg-12">
                                   <?= Html::activeTextInput($notasMedicas, 'hora',['class' => 'form-control time  required',]) ?>                          
                             </div>
                         
      </div>               
</div>
   <?php } ?> 
<div class="form-group row col-lg-12">
<div class="col-lg-12">        		<!--begin::Card-->
<input type="file" accept="application/pdf,image/*, image/gif, image/jpeg,image/bmp"  id="documents_4" multiple >
</div>										<!--end::Card-->
    
</div>     
<div id="table-doc" class="form-group row col-lg-12">
  <?= $this->render('_table', ['list_documents'=>$list_files,'assets'=>$assets]) ?>
</div>
 </form>
 