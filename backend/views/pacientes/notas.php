<?php
/* @var $notasMedicas backend\models\NotasMedicas */
 /* @var $model backend\models\Pacientes */

?>
<style>
 body
 {
     font-size: 12px;
     font-family: Arial, Helvetica, sans-serif;  
 }
 .float50
 {
     float:left; 
     width:50%;
 }
 
  .complete
 {
     margin-top: 20px;
     font-weight: bold;
     width:100%;
 }
 .color_blue
 {
     color:#010066;
     font-weight: bold;
 }
</style>
<div style="font-size: 11px;">
     <?php $nota_numero=0; foreach ($notas as $notasMedicas) { $nota_numero=$nota_numero+1; ?>
       <div style="float:left; width: 33%; text-align: left"><span class="color_blue">Paciente:</span><br/><?= strtoupper($model->nombres)?>  <?= strtoupper($model->apellidos)?></div>
      <div style="float:left; width: 33%; text-align: left"><span class="color_blue">Edad:</span><br/><?= backend\controllers\PacientesController::calculaedadanos($model->fecha_nacimiento)?> </div>
      <div style="float:left; width: 33%; text-align: right"><span class="color_blue">Fecha:</span><br>  <?=Yii::$app->formatter->asDate($notasMedicas["fecha"], 'dd/MM/yyyy');?></div>
      <div style="clear:both">
      <h2 style="text-align: center">Notas Médicas</h2>
   
     <?=$notasMedicas["nota"]?>
  
     </div>
     
</div>
<div>
     <?php }?>
    
</div>