<?php
use yii\helpers\Html;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

    <div style="width: 40%; float: left">
      
             <?= $this->render('list', ['model' => $model,'baseUrl'=>$baseUrl,'notasMedicas'=>$notasMedicas]) ?> 
       
    </div>
    <div style="width: 60%; float: left;">
      <div class="card-body">
     <?= $this->render('form', ['model' => $model,'baseUrl'=>$baseUrl,'notasMedicas'=>$notasMedicas]) ?>
           </div>
           <div class="card-footer" style="clear: both">
                                            <div class="row">
                                                           <div class="col-lg-12 ml-lg-auto">
                                                               
                                                             
                                                                <?= Html::button($model->isNewRecord ? 'Crear' : 'Guardar', ['class' =>'btn btn-primary','id'=>'btnValidateFiles' ,'disabled'=>'disabled']) ?>
                                                               
                                                               
                                                                <?= Html::a('Cancelar', ['index'], ['class' => 'redirecciona btn btn-secondary']) ?>	
                                                             
                                                           </div>
                                                   </div>

                                </div>
    </div>

