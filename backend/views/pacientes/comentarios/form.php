<?php
use yii\helpers\Html;
/* @var $historial_comentarios backend\models\HistorialComentarios */
?>
 <div class="form-group row col-lg-12">
      <div class="col-lg-12">
                             <label class="col-form-label col-lg-12">Comentarios:<span class="required">*</span></label>
                             <div class="col-lg-12">
                                
                                      <?= Html::activeTextarea($historial_comentarios, 'comentarios',['class' => 'form-control summernote  required',]) ?>                                     
                             </div>
                         
      </div>                    
</div>

