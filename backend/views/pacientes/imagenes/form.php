<?php
use yii\helpers\Html;
/* @var $formatos backend\models\Documentos */
use yii\helpers\Url;
$url_notas=Url::to(['documentos/guarda','paciente_id'=>$model->id,'id_documento'=>$formatos->id]); 
$url=$baseUrl."/files/";
?>
 <form action="<?=$url_notas?>" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" name="form_documentos" id="form_documentos" method="post">

 <div class="form-group row col-lg-12">
      <div class="col-lg-12">
                             <label class="col-form-label col-lg-12">Formato:<span class="required">*</span></label>
                             <div class="col-lg-12">
                                 <?= Html::activeDropDownList($formatos,'formato_id',[],['class'=>'form-control col-lg-12 select2', 'style'=>"width:300px"])?>
                              <span class="input-group-btn">
                                 <button class="btn btn-primary" type="button" id="addReporte"> 
                                  <span class="fa fa-plus"></span>
                                </button>
                              </span>      
                             </div>
                         
      </div>                    
</div>
<div class="form-group row col-lg-12">
      <div class="col-lg-6">
                             <label class="col-form-label col-lg-12">Nombre:<span class="required">*</span></label>
                             <div class="col-lg-12">
                                   <?= Html::activeTextInput($formatos, 'nombre',['class' => 'form-control  required',]) ?>
                                            
                             </div>
                         
      </div>
  
</div>
 <div class="form-group row col-lg-12">
      <div class="col-lg-12">
                             <label class="col-form-label col-lg-12">Documento:<span class="required">*</span></label>
                             <div class="col-lg-12">
                               <?= Html::activeTextarea($formatos, 'contenido',['class' => 'form-control summernote  required',]) ?>  
                                                      
                             </div>
                         
      </div>                    
</div>

   
 

<div class="form-group row col-lg-12">
<div class="col-lg-12">        		<!--begin::Card-->
<input type="file" accept="image/*, image/gif, image/jpeg,image/bmp"  id="documents_2" multiple >
</div>										<!--end::Card-->
    
</div>

         <?php if ($formatos->id > 0)
   {
       
   ?>
     <div class="form-group row col-lg-12">
      <div class="col-lg-6">
                             <label class="col-form-label col-lg-12">Fecha de Creación :<span class="required">*</span></label>
                             <div class="col-lg-12">
                               <?= Html::activeTextInput($formatos, 'fecha_creacion',['class' => 'form-control date-picker','autocomplete' => 'off']) ?>                              
                             </div>
                         
      </div>
       <div class="col-lg-6">
                             <label class="col-form-label col-lg-12">Hora de Creación:<span class="required">*</span></label>
                             <div class="col-lg-12">
                                   <?= Html::activeTextInput($formatos, 'hora_creacion',['class' => 'form-control  required time',]) ?>                          
                             </div>
                         
      </div>               
</div>
   <?php } ?> 
     


<div id="table-doc" class="form-group row col-lg-12">
  <?= $this->render('_table', ['list_documents'=>$lista_files,'assets'=>$assets]) ?>
</div>
 </form>