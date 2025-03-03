<?php
use backend\dao\FilesDao;
/* @var $notasMedicas backend\models\NotasMedicas */
 /* @var $model backend\models\Pacientes */
?>
<style>
 body
 {
     font-size: 12px;
     font-family: Arial, Helvetica, sans-serif;  
 }
 table, th, td {
 
  padding: 10px;
}
 .float45
 {
     float: left; 
     width:45%; 
     margin-left: 5%; 
     margin-top: 2%;
     border-color:#ff3366;
     border-width: 1px; /* this allows you to adjust the thickness */
        border-style: solid;
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
     <?php $nota_numero=0; foreach ($notas as $notasMedicas) { ?>
     <div style="float:left; width: 50%; text-align: left"><span class="color_blue">Paciente:</span><br/><?= strtoupper($model->nombres)?>  <?= strtoupper($model->apellidos)?></div>
     <div style="float:left; width: 16%; text-align: left"><span class="color_blue">Edad:</span><br/><?= backend\controllers\PacientesController::calculaedadanos($model->fecha_nacimiento)?> </div>
     <div style="float:left; width: 33%; text-align: right"><span class="color_blue">Fecha:</span><br>  <?=Yii::$app->formatter->asDate($notasMedicas["fecha_creacion"], 'dd/MM/yyyy');?></div>
    
 <?php 
          $nota_numero=$nota_numero+1;
        $lista_files= FilesDao::DameFiles($notasMedicas['paciente_id'],$notasMedicas['id']);
        ?>
        <h2 style="text-align: center"><?=$notasMedicas["nombre"]?></h2>
           <?php
        if ($nota_numero > 1)
        {
        ?>
          <pagebreak />
        <?php }  ?>
        <?=$notasMedicas["contenido"]?>
           
         <?php
         if (count($lista_files) > 0 )
         {
          
         ?>
          <pagebreak />
          <table>
          <?php
            $contador=0;
             foreach ($lista_files as $files_ent) { 
                  $contador=$contador+1;
             if ($contador==1)
             {
             ?>
              <tr>
             <?php 
             }   
             ?>
              
            <td>
                <img src="https://sistema.nafatedelacruz.com.mx/files/<?=$files_ent['id']?>.<?=$files_ent['extencion']?>"  />
                
            </td>
            
             <?php   
              if ($contador==2)
             {
                  $contador=0;
               ?>
              </tr>
            <?php 
             }
               
             }
             if ($contador==2)
             {
              ?>
              </tr>
              <?php     
             }
             
             ?>
          </table>
           <?php  
         }
           
        
        ?>
   
   
           
</div>
<div>
   
  <?php }?>   
</div>