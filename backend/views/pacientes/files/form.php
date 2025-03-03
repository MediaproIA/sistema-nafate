<?php
use yii\helpers\Html;
/* @var $historial_ef backend\models\HistorialEf */
?>
 
<div class="form-group row col-lg-12">
<div class="col-lg-12">        		<!--begin::Card-->

<input type="file" accept="application/pdf,image/*, image/gif, image/jpeg,image/bmp"   multiple  id="documents_3" >
</div>										<!--end::Card-->
 
                                                          
                                                  
</div>
<div class="form-group row col-lg-12">
										<!--end::Card-->
 
                                                           <div class="col-lg-6 ml-lg-auto">
                                                               
                                                             
                                                                <?= Html::button($model->isNewRecord ? 'Crear' : 'Cargar', ['class' =>'btn btn-primary','id'=>'btn_up_file']) ?>
                                                               
                                                               
                                                               
                                                             
                                                           </div>
                                                  
</div>
<div id="table-file" class="form-group row col-lg-12">
  <?= $this->render('_table', ['list_documents'=>$list_documents,'assets'=>$assets]) ?>
</div>

