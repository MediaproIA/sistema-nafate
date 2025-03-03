<?php
use yii\helpers\Html;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="row"> 
    <div class="col-md-4">
      
             <?= $this->render('list', ['model' => $model,'baseUrl'=>$baseUrl,'notasMedicas'=>$notasMedicas]) ?> 
       
    </div>
     <div class="col-md-8">
        <div class="card-body" id="contendor_nota">
     <?= $this->render('form', ['model' => $model,'notasMedicas'=>$notasMedicas,'list_files'=>$list_files,'assets'=>$assets,'baseUrl'=>$baseUrl]) ?>
           </div>
           <div class="card-footer" style="clear: both">
                                            <div class="row">
                                                           <div class="col-lg-12 ml-lg-auto">
                                                               
                                                             
                                                                <?= Html::button($model->isNewRecord ? 'Crear' : 'Guardar', ['class' =>'btn btn-primary','id'=>'btn_notas']) ?>
                                                               
                                                               
                                                                <?= Html::a('Cancelar', ['index'], ['class' => 'redirecciona btn btn-secondary']) ?>	
                                                             
                                                           </div>
                                                   </div>

                                </div>
    </div>
      </div>

