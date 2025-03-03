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
 $estado="";
 switch ($model->genero)
 {
    case 0:
        $sexo="Femenino";
        break;
    case 1:
        $sexo="Masculino";
        break;
    case 2:
        $sexo="indefinido";
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
    <div class="float50">Estado civil: <?=$historial_apnp->estado_civil?></div>
    <div class="float50">Ocupación: <?=$historial_apnp->ocupacion?></div>
    <div class="float50">Religion: <?=$historial_apnp->religion?></div>
    <div class="float50">Grupo Sanguineo: <?=$historial_apnp->grupo_sanguineo?></div> 
    <div class="float50">Escolaridad: <?=$historial_apnp->escolaridad?></div>
   
</div>
<div class="float50">
   <div class="float50">Alcoholismo: <?= $historial_apnp->alcolismo?></div>
   <div class="float50">Toxicomanias: <?= $historial_apnp->drogas?></div> 
   <div class="float50">Actividad Fisica: <?=$historial_apnp->activiad_fisica?></div>
   <div class="float50">Inmunizaciones: <?=$historial_apnp->inmunizaciones?></div> 
   <div class="float50">Nombre de la Pareja: <?=$historial_apnp->nombre_pareja?></div>
   <div class="float50">Comentarios: <?=$historial_apnp->comentarios?></div> 
</div>
<h3 style="text-align: left">Personales Patológicos</h3>
<div>
    <div class="float50">Enfermedades:<?=$historial_app->enfermedades?></div>
    <div class="float50">Infecciosos:<?=$historial_app->infecciosos?></div>
    <div class="float50">Tumorales:<?=$historial_app->tumorales?></div>
    <div class="float50">Quirúrgicos:<?=$historial_app->quirurgicos?></div>
    <div class="float50">Traumáticos:<?=$historial_app->traumaticos?></div>
</div>

 <?php if ($historia_gineco != null && $historia_gineco->ultima_regla !=  null ) {
     
     ?>
<h3 style="text-align: left">Gineco - Obstétricos</h3>
<div>
       <?php if ($historia_gineco->ultima_regla != null && $historia_gineco->ultima_regla != '') {?>
     
    <div class="float50">Fecha Ultima Regla:<?=$historia_gineco->ultima_regla?></div>  
    <?php } ?>
      
  
    <div class="float50">Embarazada:<?=$historia_gineco->embarazada==1?"Si":"No"?></div>
    <?php if ($historia_gineco->embarazada==1 && $historia_gineco->fecha_parto != null) {?>
      <div class="float50">Fecha Probable de Parto:<?=$historia_gineco->fecha_parto?></div>
    
    <?php } ?>
    <div class="float50">Menarca:<?=$historia_gineco->monarca?></div>
    <div class="float50">Menupausia:<?=$historia_gineco->menupaucia?></div>
    <div class="float50">Embarazos:<?=$historia_gineco->embarazos?></div>
    <div class="float50">Partos:<?=$historia_gineco->partos?></div>
    
    <div class="float50">Cesareas:<?=$historia_gineco->cesareas?></div>
    <div class="float50">Abortos:<?=$historia_gineco->abortos?></div>
    <div class="float50">Número de Hijos:<?=$historia_gineco->hijos?></div>
    <div class="float50"><?=$historia_gineco->comentarios?></div>
    
</div>
<?php 
 }
?>
<h3 style="text-align: left">Padecimiento Actual</h3>

<div style="width: 100%;">
  <?=$historial_pa->padecimiento_actual?>
</div>

<h3 style="text-align: left">Exploración Física </h3>

<div style="width: 100%; text-align: left">
 <div class="float50">
    
    <div>TA: <?=$historial_ef->TA?>-<?=$historial_ef->TA_2?></div>
    <div>FC: <?=$historial_ef->FC?></div>
    <div>FR: <?=$historial_ef->FR?></div>
    <div>Peso (KG): <?=$historial_ef->Peso?></div>
  
   
</div>
<div class="float50">
    <div>Talla (Cm): <?=$historial_ef->Talla?></div>
    <div>IMC: <?=$historial_ef->IMC?></div> 
    <div>Temp: <?=$historial_ef->Temp?></div>
</div>
<div>
    <div class="float50">Exploración Fisica:<?=$historial_ef->exploracion_fisica?></div>
    <div class="float50">Estudios de Laboratorio y Gabinete:<?=$historial_ef->estudios?></div>
   
 
    
</div>
<h3 style="text-align: left">Diagnóstico </h3>
<div style="width: 100%;">
  <?=$historial_ef->diagnostico?>
</div>

<h3 style="text-align: left">Tratamiento </h3>
<div style="width: 100%;">
  <?=$historial_ef->tratamiento?>
</div>

</div>
</div>
<div>
   
    
</div>