<?php

/* @var $doctor backend\models\Doctores */
 
?>
<div style="font-size: 12px; float: left; width: 30%; text-align: left">
    <img src="https://sistema.nafatedelacruz.com.mx/assets_metronic/media/logos/logo-light_pdf.png" height="90px" />
</div>
<div style="font-size: 13px; float: left; width: 70%">
    
    <div style="text-align: center;font-size: 18px;"><?= strtoupper($doctor->nombre)?> <?= strtoupper($doctor->apellidos)?></div>
    <div style="text-align: center;">Calle 11A, No. 556. Col. Pensiones V Etapa. Mérida, Yuctán.</div>  
    <div style="text-align: center;">Tel:<?= strtoupper($doctor->telefono)?> Cel: 9992441212</div>
    <div style="text-align: right;">e-mail:nafate@ablacionycancer.com </div>
    <br>&nbsp;
     
     
</div>
