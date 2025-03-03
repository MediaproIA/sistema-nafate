<?php
use yii\helpers\Html;
/* @var $historial_ahf backend\models\HistorialAhf */
?>
 <div class="form-group row col-lg-12">
      <div class="col-lg-12">
                             <label class="col-form-label col-lg-12">Antecedentes Heredo-Familiares:<span class="required">*</span></label>
                             <div class="col-lg-12">
                                
                                      <?= Html::activeTextarea($historial_ahf, 'antecendente',['class' => 'form-control summernote  required',]) ?>                                     
                             </div>
                         
      </div>                    
</div>

