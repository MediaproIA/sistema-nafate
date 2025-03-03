<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
 <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
<thead>
        <tr>
                <th>Tipo</th>
                <th>Nombre</th>
                <th>Acciones</th>										
        </tr>
</thead>
<tbody>
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
    <tr id='row-<?=$documents["id"]?>'>
      <th><a  href="#" file-url="<?=$path?>/<?=$documents["paciente_id"]?>.<?=$documents["extencion"]?>" onclick="window.open('<?=$path?>/<?=$documents["id"]?>.<?=$documents["extencion"]?>', '_blank', 'location=yes,height=800,width=800,,scrollbars=yes,status=yes')"><img src="<?=$assets?>/media/svg/files/<?=$image?>" alt="Documentacion" width="100px"/></a></th>
      <th><?=$documents["nombre"]?></th>    
      <th><div class="col-3">
            <span class="switch switch-outline switch-icon switch-success">
                
                        <a class="btn btn-danger" onclick="deletedocument(<?=$documents["id"]?>)">Eliminar</a>
                
            </span>
    </div></th>
  
    </tr>
    <?php } ?>
</tbody>
</table>