$(document).ready(function() {
  cargarControles();
  cargarControlesImagen();   
   
   
   $('#documents').imageuploadify();
   $('#documents_3').imageuploadify();
   $("#exportar_notas").click(function(){
    
   if ($('#notas_medicas input[type=checkbox]:checked').length === 0) {
        
        MuestraMensaje('Debe seleccionar al menos un registro','2','');
      
    }
    else
    {
       var formulario=$("#form_check_notas");
       exportarpdf(formulario);
    }
    });
   $("#exportar_notas_evolucion").click(function(){
    
        if ($('#notae_evolucion input[type=checkbox]:checked').length === 0) {

             MuestraMensaje('Debe seleccionar al menos un registro','2','');

         }
         else
         {
            var formulario=$("#form_check_notas_evolucion");
            exportarpdf(formulario);
         }
    });
   $("#exporHis").click(function(){
     var url=url_export
     exportarhist(url);        
    });
   $("#exportar_recetas").click(function(){
    
        if ($('#contenedor_receta input[type=checkbox]:checked').length === 0) {

             MuestraMensaje('Debe seleccionar al menos un registro','2','');

         }
         else
         {
            var formulario=$("#form_check_recetas");
              $("#header").val("1");
            exportarpdf(formulario);
         }
    });
    
    $("#exportar_recetas_header").click(function(){
    
     if ($('#contenedor_receta input[type=checkbox]:checked').length === 0) {

             MuestraMensaje('Debe seleccionar al menos un registro','2','');

         }
         else
         {
            var formulario=$("#form_check_recetas");
            $("#header").val("0");
            exportarpdf(formulario);
         }
    }); 
    
       $("#exportar_recetas_carta").click(function(){
    
     if ($('#contenedor_receta input[type=checkbox]:checked').length === 0) {

             MuestraMensaje('Debe seleccionar al menos un registro','2','');

         }
         else
         {
            var formulario=$("#form_check_recetas");
            $("#header").val("3");
            exportarpdf(formulario);
         }
    }); 
    
   $("#exportar_documentos").click(function(){
    
        if ($('#contenedor_table_documento input[type=checkbox]:checked').length === 0) {

             MuestraMensaje('Debe seleccionar al menos un registro','2','');

         }
         else
         {
               $("#header_carta").val("0");
            var formulario=$("#form_check_documentos");
            exportarpdf(formulario);
         }
    });
       $("#exportar_documentos_media").click(function(){
    
        if ($('#contenedor_table_documento input[type=checkbox]:checked').length === 0) {

             MuestraMensaje('Debe seleccionar al menos un registro','2','');

         }
         else
         {
             $("#header_carta").val("3");
            var formulario=$("#form_check_documentos");
            exportarpdf(formulario);
         }
    });
    
   $("#historialgineco-embarazada").change(function(){
       var value=$(this).val();
       if (value==1)
       {
           $("#fecha_parto").show();
               
           //$('#historialgineco-fecha_parto').datepicker('setDate', date2);
       }
       else
       {
           $("#fecha_parto").hide();
       }
   })
   $("#update_paciente").click(function(){ 
       var formulario=$("#form_paciente");
       formulario.validate();
       EnviaFormularioFiles(formulario,'');     
    });  
   $("#btn_ahf").click(function(){ 
       var formulario=$("#form_ahf");
       formulario.validate();
       EnviaFormularioFiles(formulario,'');     
    });  
   $("#btn_app").click(function(){ 
       var formulario=$("#form_app");
       formulario.validate();
       EnviaFormularioFiles(formulario,'');     
    }); 
   $("#btn_ap").click(function(){ 
       var formulario=$("#form_ap");
       formulario.validate();
       EnviaFormularioFiles(formulario,'');     
    });
   $("#btn_ef").click(function(){ 
       var formulario=$("#form_ef");
       formulario.validate();
       EnviaFormularioEF(formulario);
       
      
    });
   $("#btn_comentarios").click(function(){ 
       var formulario=$("#form_comentarios");
       formulario.validate();
       EnviaFormularioFiles(formulario,'');     
    });
   $("#btn_apnp").click(function(){ 
       var formulario=$("#form_apnp");
       formulario.validate();
       EnviaFormularioFiles(formulario,'');     
    });
   $("#btn_gine").click(function(){ 
       var formulario=$("#form_gineco");
       formulario.validate();
       EnviaFormularioFiles(formulario,'');     
    });
   $("#btn_notas").click(function(){ 
       var formulario=$("#form_notas");
       formulario.validate();
       EnviaFormularioImages(formulario,'notas_medicas');
      showNota(0);
       
    });
   $("#btn_notasevolucion").click(function(){ 
       var formulario=$("#form_notasevolucion");
       formulario.validate();
       EnviaFormularioRefresh(formulario,'notae_evolucion');
        showNotaEvolucion(0);
    });
   
      $("#btn_recetas").click(function(){ 
       var formulario=$("#form_recetas");
       formulario.validate();
       EnviaFormularioRefresh(formulario,'contenedor_receta');
       showReceta(0);
       
    });
    $("#btn_document").click(function(){ 
       var formulario=$("#form_documentos");
       formulario.validate();
       EnviaFormularioImages(formulario,'contenedor_table_documento');
     
       
    });
    
         $("#btn_up_file").click(function(){ 
       var formulario=$("#form_files_up");
       formulario.validate();
       EnviaFormularioFile(formulario);
     
       
    });
    
      $('#contenedor_table_documento').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            $('#contenedor_table_documento').DataTable().$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );
    
    
    $( "#historialef-peso" ).change(function() {
        var peso=$("#historialef-peso").val();
        var altura=$("#historialef-talla").val();
        peso=peso===""?0:peso;
        altura=altura===""?0:altura;
        if (peso > 0 && altura > 0)
        {
            var altura_mts=convertirMts(altura);
            var IMC=CalcularImc(altura_mts,peso);
            var rounded = Math.round((IMC + Number.EPSILON) * 100) / 100;
            $("#historialef-imc").val(rounded);
        }
        
        
    });
     
     $( "#historialef-talla" ).change(function() {
        var peso=$("#historialef-peso").val();
        var altura=$("#historialef-talla").val();
        altura=altura===""?0:altura;
        peso=peso==""?0:peso;
        if (peso > 0 && altura > 0)
        {
            var altura_mts=convertirMts(altura);
            var IMC=CalcularImc(altura_mts,peso);
            var rounded = Math.round((IMC + Number.EPSILON) * 100) / 100;
            $("#historialef-imc").val(rounded);
        }
        
        
    });


});

function showReceta(receta_id)
{
    sUrl=url_show_receta+'&receta_id='+receta_id;
    mostrarRegistro(sUrl,'receta_contenedor'); 
}

function showNota(nota_id)
{
    sUrl=url_show_nota+'&nota_id='+nota_id;
    mostrarRegistroDocument(sUrl,'contendor_nota');
}

function showNotaEvolucion(nota_id)
{
    sUrl=url_show_nota_evolucion+'&nota_id='+nota_id;
    mostrarRegistro(sUrl,'notas_evolucion');
}

function showDocumento(documento_id)
{
    sUrl=url_show_documento+'&documento_id='+documento_id;
    mostrarRegistroDocument(sUrl,'contenedor_documentos');
   
}

function cargaFiles(sUrl) {


    $.ajax({
        type: 'get',
        url: sUrl,
        asyc: true,
        success: function (data) {
          data=$.parseJSON(data);
        
        $('.input-images-1').imageUploader({
            preloaded: data,
            imagesInputName: 'photos',
            preloadedInputName: 'old'
        });
                
          
        }
    });
}


function mostrarRegistro(sUrl,contendor) {

bloqueaPagina();
    $.ajax({
        type: 'get',
        url: sUrl,
        asyc: true,
        success: function (data) {
           data=$.parseJSON(data);              
           $.unblockUI();
           if (data.Estatus == "OK") {
                    
                     $("#"+contendor).html();
                     $("#"+contendor).html(data.plantilla);
                     $('.summernote').summernote({
                            height: 350,
                             toolbar: [
                       // [groupName, [list of button]]
                       ['style', ['bold', 'italic', 'underline', 'clear']],
                       ['font', ['strikethrough', 'superscript', 'subscript']],
                       ['fontsize', ['fontsize']],
                       ['color', ['color']],
                       ['para', ['ul', 'ol', 'paragraph']],
                       ['height', ['height']]
                     ]
                    });
                     $('.date-picker').datepicker({
                        rtl: KTUtil.isRTL(),
                        orientation: "bottom left",
                        todayHighlight: true,
                         format: 'dd/mm/yyyy'

                    });
                     $('.time').timepicker({
                            minuteStep: 1,
                            defaultTime: null,
                            showSeconds: true,
                            showMeridian: false,
                            snapToStep: true
                        });
                       cargarControles();
                                          }
                if (data.Estatus == "ERROR") {
                      MuestraMensaje(data.Mensaje,'2','');
                }
                
          
        }
    });
}

function mostrarRegistroDocument(sUrl,contendor) {

bloqueaPagina();
    $.ajax({
        type: 'get',
        url: sUrl,
        asyc: true,
        success: function (data) {
           data=$.parseJSON(data);              
           $.unblockUI();
           if (data.Estatus == "OK") {
                    
                     $("#"+contendor).html();
                     $("#"+contendor).html(data.plantilla);
                     $('.summernote').summernote({
                            height: 350,
                             toolbar: [
                       // [groupName, [list of button]]
                       ['style', ['bold', 'italic', 'underline', 'clear']],
                       ['font', ['strikethrough', 'superscript', 'subscript']],
                       ['fontsize', ['fontsize']],
                       ['color', ['color']],
                       ['para', ['ul', 'ol', 'paragraph']],
                       ['height', ['height']]
                     ]
                    });
                     $('.date-picker').datepicker({
                        rtl: KTUtil.isRTL(),
                        orientation: "bottom left",
                        todayHighlight: true,
                         format: 'dd/mm/yyyy'

                    });
                     $('.time').timepicker({
                            minuteStep: 1,
                            defaultTime: null,
                            showSeconds: true,
                            showMeridian: false,
                            snapToStep: true
                        });
                     cargarControlesImagen(); 
                                          }
                if (data.Estatus == "ERROR") {
                      MuestraMensaje(data.Mensaje,'2','');
                }
                
          
        }
    });
}
function exportarhist(url) {
 
    bloqueaPagina();
        $.ajax({
            type: 'get',
            cache: false,
            async: true,
            url: url,
            success: function (data) {
              
                var data=$.parseJSON(data);              
                $.unblockUI();
                if (data.Estatus == "OK") {
                    window.open(data.cUrl,'_blank' );
                }
                if (data.Estatus == "ERROR") {
                      MuestraMensaje(data.Mensaje,'2','');
                }
            },

            error: function (xhr, ajaxOptions, thrownError) {
                 $.unblockUI();
                     MuestraMensaje(data.Mensaje,'2','');
   
               
            },

        });
 
}
function exportarpdf(formulario) {
 
    bloqueaPagina();
        $.ajax({
            type: 'POST',
            cache: false,
            async: true,
            url: formulario.attr('action'),
            data:formulario.serialize(),
            success: function (data) {
              
                var data=$.parseJSON(data);              
                $.unblockUI();
                if (data.Estatus == "OK") {
                    window.open(data.cUrl,'_blank' );
                }
                if (data.Estatus == "ERROR") {
                      MuestraMensaje(data.Mensaje,'2','');
                }
            },

            error: function (xhr, ajaxOptions, thrownError) {
                 $.unblockUI();
                     MuestraMensaje(data.Mensaje,'2','');
   
               
            },

        });
 
}
function addContenido(sUrl,contendor,lLimpia) {

bloqueaPagina();
    $.ajax({
        type: 'get',
        url: sUrl,
        asyc: true,
        success: function (data) {
           data=$.parseJSON(data);              
           $.unblockUI();
           let htmlContent='';
               if (data.Estatus == "OK") {
                      if (!lLimpia)
                      {
                        htmlContent = $("#"+contendor).summernote('code');
                        htmlContent = htmlContent+data.contenido ;
                       
                      }
                      else
                      {
                      
                        htmlContent = data.contenido ;
                      }
                       $("#"+contendor).summernote("code", htmlContent);
                }
                if (data.Estatus == "ERROR") {
                      MuestraMensaje(data.Mensaje,'2','');
                }
                
          
        }
    });
}
function addContenidoDocumento(sUrl,contendor,lLimpia) {

bloqueaPagina();
    $.ajax({
        type: 'get',
        url: sUrl,
        asyc: true,
        success: function (data) {
           data=$.parseJSON(data);              
           $.unblockUI();
           let htmlContent='';
               if (data.Estatus == "OK") {
                      if (lLimpia)
                      {
                        htmlContent = $("#"+contendor).summernote('code');
                        htmlContent = htmlContent+data.contenido ;
                        
                      }
                      else
                      {
                      
                        htmlContent = data.contenido ;
                      }
                      $("#documentos-nombre").val(data.nombre);
                       $("#"+contendor).summernote("code", htmlContent);
                }
                if (data.Estatus == "ERROR") {
                      MuestraMensaje(data.Mensaje,'2','');
                }
                
          
        }
    });
}
function cargarControles(){
        
    $("#addMed").click(function(){ 
       var medicamento_id=$("#kt_select2_5").val();
       var url=url_getMedicamento+'?id='+medicamento_id;
       var contenedor='receta-receta';
       addContenido(url,contenedor,false);
    });
    $('#kt_select2_5').select2({
     placeholder: 'Seleccionar Medicamento',
  ajax: { 
   url: urlTypeHead,
   type: "post",
   dataType: 'json',
   delay: 250,
   data: function (params) {
       
    return {
      query: params.term
    };
   },
   processResults: function (response) {
     return {
        results: response
     };
   },
   cache: true
  }
 }); 

}
function cargarControlesImagen()
{
        $('#documentos-formato_id').select2({
     placeholder: 'Seleccionar Formato',
    ajax: { 
    url: urlTypeFormato,
   type: "post",
   dataType: 'json',
   delay: 250,
   data: function (params) {
       
    return {
      query: params.term
    };
   },
   processResults: function (response) {
     return {
        results: response
     };
   },
   cache: true
  }
 });
      $("#addReporte").click(function(){ 
     var formato_id=$("#documentos-formato_id").val();
     var url=url_getFormato+'?id='+formato_id;
     var contenedor='documentos-contenido';
    addContenidoDocumento(url,contenedor,true);});
    $('#documents_2').imageuploadify();
    $('#documents_4').imageuploadify();
    KTCardDraggable.init(); 
}
function CalcularImc(altura,peso)
{
    var IMC=peso/(altura*altura);
    return IMC;
}

function convertirMts(altura)
{
    var mts_Altura=0;
    if (altura != "")
    {
         mts_Altura=(altura*1)/100;
    }
    return mts_Altura;
}

function deletedocument(file){
    
    Swal.fire({
    title: '¿Esta seguro que decea eliminar el registro?',
    showCancelButton: true,
    confirmButtonText: 'Confirmar',
    cancelButtonText: `Cancelar`,
  }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
       deleteRegister(file);
    } 
  });
}

function deleteNotas(nota){
    
    Swal.fire({
    title: '¿Esta seguro que decea eliminar el registro?',
    showCancelButton: true,
    confirmButtonText: 'Confirmar',
    cancelButtonText: `Cancelar`,
  }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
       sUrl=url_notas_delete+'&nota_id='+nota;
       deleteNotasMedicas(sUrl,'notas_medicas');
    } 
  });
}

function deleteNotasEvolucion(nota){
    
    Swal.fire({
    title: '¿Esta seguro que decea eliminar el registro?',
    showCancelButton: true,
    confirmButtonText: 'Confirmar',
    cancelButtonText: `Cancelar`,
  }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
       sUrl=url_notas_delete_evolucion+'&nota_id='+nota;
       deleteNotasMedicas(sUrl,'notae_evolucion');
    } 
  });
}

function deleteFiles(document_id){
    
    Swal.fire({
    title: '¿Esta seguro que decea eliminar el registro?',
    showCancelButton: true,
    confirmButtonText: 'Confirmar',
    cancelButtonText: `Cancelar`,
  }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
       sUrl=url_delete_documentos+'&documento_id='+document_id;
       deleteNotasMedicas(sUrl,'contenedor_table_documento');
    } 
  });
}
function deleteRecetas(receta_id){
    
    Swal.fire({
    title: '¿Esta seguro que decea eliminar el registro?',
    showCancelButton: true,
    confirmButtonText: 'Confirmar',
    cancelButtonText: `Cancelar`,
  }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
       sUrl=url_delete_recetas+'&receta_id='+receta_id;
       deleteNotasMedicas(sUrl,'contenedor_receta');
    } 
  });
}
function deleteNotasMedicas(sUrl,datatable) {

bloqueaPagina();
    $.ajax({
        type: 'post',
        url: sUrl,
        asyc: true,
        success: function (data) {
           data=$.parseJSON(data);              
           $.unblockUI();
         
               if (data.Estatus == "OK") {
                      $('#'+datatable).DataTable().ajax.reload();
                     MuestraMensaje(data.Mensaje,'1','');
                }
                if (data.Estatus == "ERROR") {
                      MuestraMensaje(data.Mensaje,'2','');
                }
                
          
        }
    });
}


function deleteRegister(file) {
var sUrl=url_ef_delete+'?id='+file;
bloqueaPagina();
    $.ajax({
        type: 'post',
        url: sUrl,
        asyc: true,
        success: function (data) {
           data=$.parseJSON(data);              
           $.unblockUI();
         
               if (data.Estatus == "OK") {
                    $('#row-'+file).remove();
                     MuestraMensaje(data.Mensaje,'1','');
                }
                if (data.Estatus == "ERROR") {
                      MuestraMensaje(data.Mensaje,'2','');
                }
                
          
        }
    });
}


function EnviaFormularioEF (formulario){
 var valida = formulario.valid();
    if (valida)
    {
         bloqueaPagina();
         var formData = new FormData(formulario[0]); 
         for (let i = 0; i < totalFiles.length; i++) {
             formData.append('documents[]', totalFiles[i].file);
          }
        
         $.ajax({
           url: formulario.attr('action'),
           type: 'POST',
           data: formData,
           async: true,
           cache: false,
           contentType: false,
           processData: false,
           success: function (response) {
             data=$.parseJSON(response);
             $.unblockUI();

                   if (data.Estatus == "OK") 
                   {  
                        MuestraMensaje(data.Mensaje, "1",'');
                       $("div .imageuploadify-container").remove();
                       $("#table-ef").empty();
                       $("#table-ef").append(data.table);
                        totalFiles = []; 

                   } else {

                         MuestraMensaje(data.Mensaje, "2",'');

                   }
           }
           ,
                   error: function (exception) {
                        MuestraMensaje(exception, "2",'');
                       $.unblockUI(); 

                   }
         });  
    }
   
}

function EnviaFormularioImages (formulario,datatable){
 var valida = formulario.valid();
    if (valida)
    {
        
          bloqueaPagina();
           reodernar();
          var formData = new FormData(formulario[0]);
          var formData = new FormData(formulario[0]); 
          for (let i = 0; i < totalFiles.length; i++) {
             formData.append('documents[]', totalFiles[i].file);
          }
        
         $.ajax({
           url: formulario.attr('action'),
           type: 'POST',
           data: formData,
           async: true,
           cache: false,
           contentType: false,
           processData: false,
           success: function (response) {
             data=$.parseJSON(response);
             $.unblockUI();

                   if (data.Estatus == "OK") 
                   {
                      formulario[0].reset();
                      $('#documentos-contenido').summernote('reset');
                      $("div .imageuploadify-container").remove();
                      $('#'+datatable).DataTable().ajax.reload();    
                      MuestraMensaje(data.Mensaje, "1",'');
                      showDocumento(-1);
                       totalFiles = []; 
                       
                   } else {

                         MuestraMensaje(data.Mensaje, "2",'');

                   }
           }
           ,
                   error: function (exception) {
                        MuestraMensaje(exception, "2",'');
                       $.unblockUI(); 

                   }
         });  
    }
   
}

function reodernar ()
{
    var contador=0;
    var string='';
    
     $("#zone-order .row").each(function(){
        
           contador=contador+1;
            id = $(this).attr("id-row");
            string="#orden-"+id;
            
             $(string).val(contador);
       });
}

function EnviaFormularioFile (formulario){
 var valida = formulario.valid();
    if (valida)
    {
         bloqueaPagina();
         var formData = new FormData(formulario[0]); 
         for (let i = 0; i < totalFiles.length; i++) {
             formData.append('documents[]', totalFiles[i].file);
          }
        
         $.ajax({
           url: formulario.attr('action'),
           type: 'POST',
           data: formData,
           async: true,
           cache: false,
           contentType: false,
           processData: false,
           success: function (response) {
             data=$.parseJSON(response);
             $.unblockUI();

                   if (data.Estatus == "OK") 
                   {  
                        MuestraMensaje(data.Mensaje, "1",'');
                       $("div .imageuploadify-container").remove();
                       $("#table-file").empty();
                       $("#table-file").append(data.table);
                        totalFiles = []; 

                   } else {

                         MuestraMensaje(data.Mensaje, "2",'');

                   }
           }
           ,
                   error: function (exception) {
                        MuestraMensaje(exception, "2",'');
                       $.unblockUI(); 

                   }
         });  
    }
   
}
