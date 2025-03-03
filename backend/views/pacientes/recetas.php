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
 
 .inter
 {
     line-height : 5px;
 }
 p
 {
     line-height : -1px;
 }
</style>

<div style="font-size: 11px;">
   <?php $nota_numero=0; foreach ($notas as $notasMedicas) { $nota_numero=$nota_numero+1; ?>
        <div style="float:left; width: 50%; text-align: left"><span class="color_blue">Paciente:</span><br/><?= strtoupper($model->nombres)?>  <?= strtoupper($model->apellidos)?></div>
     <div style="float:left; width: 16%; text-align: left"><span class="color_blue">Edad:</span><br/><?= backend\controllers\PacientesController::calculaedadanos($model->fecha_nacimiento)?> </div>
      <div style="float:left; width: 16%; text-align: left"><span class="color_blue">F.N.:</span><br/><?=Yii::$app->formatter->asDate($model->fecha_nacimiento, 'dd/MM/yyyy');?> </div>
     <div style="float:left; width: 16%; text-align: right"><span class="color_blue">Fecha:</span><br> <?=Yii::$app->formatter->asDate($notasMedicas["fecha_creacion"], 'dd/MM/yyyy');?></div>
     <br/>&nbsp;
     <div style="clear:both" class="inter" style="margin-top: 30px;">
         
   
  
      <?=$notasMedicas["receta"]?>
     
       <?php if ($notasMedicas["receta"] !='' ) {   $fecha_cita=Yii::$app->formatter->asDate($notasMedicas["prox_cita"], 'dd/MM/yyyy');  ?>
           
     <div style="text-align: right; margin-top: 20px"><b>Cita:</b>  <?=$fecha_cita?>  <b>Hora :</b>  <?=$notasMedicas["hora"]?></div>
     
     
  
      
     </div>
  <?php } }?>
</div>
<div>
   
    
</div>