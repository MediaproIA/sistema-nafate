<?php
/* @var $notasMedicas backend\models\NotasMedicas */
 /* @var $model backend\models\Pacientes */
/* @var $historial_ahf backend\models\HistorialAhf */
/* @var $historial_app backend\models\HistorialApp */
/* @var $historial_pa backend\models\HistorialPa */
/* @var $historial_ef backend\models\HistorialEf */
/* @var $historial_apnp backend\models\HistorialApnp */
/* @var $historia_gineco backend\models\HistorialGineco */
 $fecha= Yii::$app->formatter->asDate($model->fecha_creacion,'dd/MM/yyyy');
 $sexo=$model->genero==0?"Femenino":"Masculino";
 $estado="";
 switch ($historial_apnp->estado_civil)
 {
    case 0:
        $estado="Soltero";
        break;
    case 1:
        $estado="Casado";
        break;
    case 2:
        $estado="Divorciado";
        break;
    
 }
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
 }
</style>
<div style="font-size: 11px;">
    <div style="float:left; width: 33%; text-align: left"><span class="color_blue">Paciente:</span><br/><?= strtoupper($model->nombres)?>  <?= strtoupper($model->apellidos)?></div>
    <div style="float:left; width: 33%; text-align: left"><span class="color_blue">Edad:</span><br/><?= backend\controllers\PacientesController::calculaedad($model->fecha_nacimiento)?> </div>
    <div style="float:left; width: 33%; text-align: right"><span class="color_blue">Fecha:</span><br> <?=$fecha?></div>
<h2 style="text-align: center">Historia Clínica</h2>


<h3 style="text-align: left">Antecedentes Heredofamiliares</h3>
<div>
    <?=$historial_ahf->antecendente?>
</div>
<h3 style="text-align: left">Personales no Patológicos</h3>

<div class="float50">
    
    <div class="float50">Lugar de Origen: <?=$historial_apnp->lugar_origen?></div>
    <div class="float50">Lugar de Residencia: <?=$historial_apnp->lugar_residencia?></div>
    <div class="float50">Estado civil: <?=$estado?></div>
    <div class="float50">Ocupación: <?=$historial_apnp->ocupacion?></div>
    <div class="float50">Religion: <?=$historial_apnp->religion?></div>
    <div class="float50">Grupo Sanguineo: <?=$historial_apnp->grupo_sanguineo?></div> 
    <div class="float50">Escolaridad: <?=$historial_apnp->escolaridad?></div>
   
</div>
<div class="float50">
   <div class="float50">Alcoholismo: <?= $historial_apnp->alcolismo==1?"Si":"No"?></div>
   <div class="float50">Toxicomanias: <?= strtoupper($historial_apnp->drogas)?></div> 
   <div class="float50">Actividad Fisica: <?= strtoupper($historial_apnp->activiad_fisica)?></div>
   <div class="float50">Inmunizaciones: <?= strtoupper($historial_apnp->inmunizaciones)?></div> 
    <div class="float50">Nombre de la Pareja: <?= strtoupper($historial_apnp->nombre_pareja)?></div>
     <div class="float50">Comentarios: <?= strtoupper($historial_apnp->comentarios)?></div> 
</div>
<h3 style="text-align: left">Personales Patológicos</h3>
<div>
    <div class="float50">    Enfermedades:<?=$historial_app->enfermedades?></div>
    <div class="float50">Infecciosos:<?=$historial_app->infecciosos?></div>
    <div class="float50">Tumorales:<?=$historial_app->tumorales?></div>
    <div class="float50">Quirúrgicos:<?=$historial_app->quirurgicos?></div>
    <div class="float50">Traumáticos:<?=$historial_app->traumaticos?></div>
</div>

 <?php if (!$historia_gineco->isNewRecord ) {
     
     ?>
<h3 style="text-align: left">Gineco - Obstétricos</h3>
<div>
    <div class="float50">Fecha Ultima Regla:<?=Yii::$app->formatter->asDate($historia_gineco->ultima_regla, 'MM/dd/yyyy')?></div>
    <div class="float50">Embarazada:<?=$historia_gineco->embarazada==1?"Si":"No"?></div>
    <?php if ($historia_gineco != null) {?>
      <div class="float50">Fecha Probable de Parto:<?=Yii::$app->formatter->asDate($historia_gineco->fecha_parto, 'MM/dd/yyyy')?></div>
    
    <?php } ?>
    <div class="float50">Monarca:<?=$historia_gineco->monarca?></div>
    <div class="float50">Menupausia:<?=$historia_gineco->menupaucia?></div>
    
</div>
<?php 
 }
?>
<div>
    <div class="complete">Padecimiento Actual:<?=$historial_pa->padecimiento_actual?></div>
  
</div>
<div>
    <div class="complete">Exploración Fisica:<?=$historial_ef->exploracion_fisica?></div>
    <div class="complete">Estudios de Laboratorio y Gabinete:<?=$historial_ef->estudios?></div>
    <div class="complete">Diagnóstico:<?=$historial_ef->diagnostico?></div>
    <div class="complete">Tratamiento:<?=$historial_ef->tratamiento?></div>
</div>

</div>
<div>
   
    
</div>