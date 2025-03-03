<?php

/* @var $doctor backend\models\Doctores */
 
?>
<div style="font-size: 12px; float: left; width: 20%; text-align: left">
    <img src="https://sistema.nafatedelacruz.com.mx/assets_metronic/media/logos/logo-light_pdf.png" height="70px" />
</div>
<div style="font-size: 12px; float: left; width: 70%">
    <div style="text-align: center;font-size: 14px;"><?= strtoupper($doctor->nombre)?> <?= strtoupper($doctor->apellidos)?> "CONSULTORIO MÉDICO"</div>
    <div style="text-align: center;"><?=$doctor->direccion?></div>  
     <div style="text-align: center;"><?=$doctor->email?> </div>
    <div style="text-align: center;" class="color_blue">Cel:<?= strtoupper($doctor->telefono)?></div>
    <br/>
</div>
