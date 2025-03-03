$(document).ready(function() {
  Fancybox.bind('[data-fancybox="gallery"]', {
  animated: false,
  dragToClose: false,

  showClass: false,
  hideClass: false,

  closeButton: "top",

  Image: {
    click: "close",
    wheel: "slide",
    zoom: false,
    fit: "cover",
  },
});
    $("#alumnosecundaria-adeuda_matarias").change(function(){
       
       var opcion=$(this).val();
       if (opcion === "1")
       {
           $("#materias_adeudo").show();
       }
       else
       {
           $("#materias_adeudo").hide();
           $("#alumnosecundaria-numero_materias").val("");
       }
  });
    $("#alumnoinfoaddicional-padecimiento_id").change(function(){
       
       var opcion=$(this).val();
       if (opcion === "4")
       {
           $("#enfermedad").show();
       }
       else
       {
           $("#enfermedad").hide();
           $("#alumnoinfoaddicional-padecimiento").val("");
       }
  });
    $("#alumnoinstitucionmedica-pertene_institucion").change(function(){
       
       var opcion=$(this).val();
       if (opcion === "1")
       {
           $("#Institucion_1").show();
           $("#Institucion_2").show();
       }
       else
       {
           $("#Institucion_1").hide();
           $("#Institucion_2").hide();
       }
  }); 
    $("#alumnoinstitucionmedica-tipo_institucion").change(function(){
       
       var opcion=$(this).val();
       if (opcion === "6")
       {
           $("#unidad_medica_otra").show();
       }
       else
       {
           $("#unidad_medica_otra").hide();
           $("#alumnoinstitucionmedica-otra").val("");
       }
  });
    $('.validation').change(function() {
         var lchecked=this.checked;
         var file_id=$(this).attr("file-id");
         updatestatusfile(lchecked,file_id);      
});
    $("#alumnodomicilio-entidad_id").change(function(){
       var entidad_id=$(this).val();
       buscaMunicipio(entidad_id,'alumnodomicilio-ciudad');
  }); 
    $("#alumnosecundaria-adeuda_matarias").change(function(){
       var opcion=$(this).val();
       if (opcion === "1")
       {
           $("#materias_adeudo").show();
       }
       else
       {
           $("#materias_adeudo").hide();
           $("#alumnosecundaria-numero_materias").val("");
       }
  });
    $("#Notificar").click(function(){
        $("#alumnoaprobado-estatus").val("3");
        var formulario=$("#form_sample_2");
        formulario.validate();
         
        EnviaFormulario(formulario,''); 
    });
    
     $("#btnValidateFiles").click(function(){
        var formulario=$("#form_sample_2");
        formulario.validate();
        EnviaFormulario(formulario,''); 
    });
    

});

function buscaSecundaria(item)
{
  
        var url=urlObtenSecundaria+'?clave='+item;
         $.ajax({
            cache: false,
            type: "POST",
            url:url ,
            success: function (response) {
                 data=$.parseJSON(response);   
                if (data.Estatus === "OK") {
                    var nombre= data.secundaria !== null?data.secundaria:'';
                    $("#alumnosecundaria-nombre_secundaria").val(nombre);
                }

            },
            error: function (exception) {
               
                $("#alumnosecundaria-nombre_secundaria").val('');
            }
        });
    
}

function updatestatusfile (checked,file_id) {
 
    var url=$("#urlValidateFiles").val();
    var form_data = new FormData();                  
    form_data.append("file_id",file_id);
    form_data.append("checked",checked);
    bloqueaPagina();
    $.ajax({
            url: url, // Url to which the request is send
            type: "POST",             // Type of request to be send, called as method
            data: form_data, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData:false,        // To send DOMDocument or non processed data file it is set to false
            success: function(data)   // A function to be called if request succeeds
            {
                data=$.parseJSON(data);              
                $.unblockUI();
                if (data.Estatus == "OK") {
                                           
                    MuestraMensaje(data.Mensaje, "1",'');
                }
                if (data.Estatus == "ERROR") {
                    MuestraMensaje(data.Mensaje, "2",'');
                }
                $("#alumnoaprobado-estatus").val(data.estatusTramite);
             
                    if (data.estatusTramite=="4")
                    {
                        $("#btnValidateFiles").removeAttr('disabled');
                    }
                    else
                    {
                      $("#btnValidateFiles").attr('disabled','disabled');  
                    }
            },
             error: function (xhr, ajaxOptions, thrownError) {
                  $.unblockUI();
                MuestraMensaje(thrownError, "2", '4','');
               
            },

            });  
        
      
}



