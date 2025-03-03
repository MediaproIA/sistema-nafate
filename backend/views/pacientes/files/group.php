<?php
use yii\helpers\Html;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

  
    <div>
      <div class="card-body">
     <?= $this->render('form', ['model' => $model,'baseUrl'=>$baseUrl,'list_documents'=>$list_files,'assets'=>$assets]) ?>
           </div>
       
    </div>

