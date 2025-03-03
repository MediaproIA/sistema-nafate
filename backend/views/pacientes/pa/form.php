<?php
use yii\helpers\Html;
/* @var $historial_pa backend\models\HistorialPa */
?>
 
 <div class="form-group row col-lg-12">
      <div class="col-lg-12">
                             <label class="col-form-label col-lg-12">Padecimiento Actual:<span class="required">*</span></label>
                             <div class="col-lg-12">
                               <?= Html::activeTextarea($historial_pa, 'padecimiento_actual',['class' => 'form-control summernote  required',]) ?>                              
                             </div>
                         
      </div>                    
</div>
 