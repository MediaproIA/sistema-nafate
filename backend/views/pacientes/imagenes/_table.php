<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<div class="col-md-12">
    <div class="row draggable-zone">
        <div class="col-md-3"></div>
         <div class="col-md-3">Tipo</div>
         <div class="col-md-3">Nombre</div>
         <div class="col-md-3"></div>
    </div>    
<div class="draggable-zone" id="zone-order">

    <?php foreach ($list_documents as $documents) {
      $path='https://sistema.nafatedelacruz.com.mx/files';
        switch (strtolower($documents["extencion"])){
           case "pdf":
               $class='data-type="pdf"';
               $image="pdf.svg";
               break;
            case "docx":
               $class='data-type="docx"';
               $image="doc.svg";
               break;
           default:
               $class='';
               $image="jpg.svg";
               break;
        }
     
   
        
        ?>
    
    <div id="row-<?=$documents["id"]?>" id-row="<?=$documents["id"]?>" class="row draggable" style="margin-top:10px;border-top: 1px solid #EBEDF3;  justify-content: center;  align-items: center; ">
        <div class="col-md-3">
            <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary draggable-handle">
                <i class="ki ki-menu "></i></a></div>
                <div class="col-md-3"><img src="<?=$path?>/<?=$documents["id"]?>.<?=$documents["extencion"]?>" alt="Documentacion" width="150px" style="padding-bottom:5px;padding-top:5px;"/></div>
         <div class="col-md-3"><?=$documents["nombre"]?></div>
         <div class="col-md-3"><a class="btn btn-danger" onclick="deletedocument(<?=$documents["id"]?>)">Eliminar</a></div>
    <input type="hidden" name="orden-<?=$documents["id"]?>" id="orden-<?=$documents["id"]?>" value="<?=$documents["orden"]?>" />
    </div>  
    

    <?php } ?>
</div> 
    </div>