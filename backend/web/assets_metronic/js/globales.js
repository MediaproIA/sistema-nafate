var urlGlobal='';
$(document).ready(function() {
urlGlobal='';
    

$('.number').keypress(validateNumber);
$('.phone').inputmask("(999) 9-99-99-99");
$('.money').inputmask("numeric", {
    radixPoint: ".",
    groupSeparator: ",",
    digits: 2,
    autoGroup: true,
    prefix: '$', //No Space, this will truncate the first character
    rightAlign: false,
    oncleared: function () { self.Value(''); }
});
$('.time').timepicker({
            minuteStep: 1,
            defaultTime: null,
            showSeconds: true,
            showMeridian: false,
            snapToStep: true
        });
$("#btnForm").click(function(){ 
  var formulario=$("#form_sample_2");
  formulario.validate();
  EnviaFormulario(formulario,'');     
});
$('.date-picker').datepicker({
    rtl: KTUtil.isRTL(),
    orientation: "bottom left",
    todayHighlight: true,
     format: 'dd/mm/yyyy'
    
});
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
});
function MuestraMensaje(mensaje,cTipo,nombrefuncion) {
   


   
    switch (cTipo) {
        case "1"://Información
                  Swal.fire({
                            text: mensaje,
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "Aceptar",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        }).then(function (result) {
                            if (result.isConfirmed) { 
                                if (result.value  && nombrefuncion != '') {
                                          Redirecciona();
                                     }
                            }
                        });

            break;
        case "2"://Error
              Swal.fire({
                       text: mensaje,
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Aceptar",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    });
            break;
        case "3"://Confirmacion
            swal({
                    title: cMensaje,
                    text: '',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, deseo eliminarlo!'
                  }).then((result) => {
                    if (result.value) {
                         window[nombrefuncion].call();
                    }
                  })
            break;
        case "4"://Exclamación
             swal("Información",cMensaje, "error");
            break;

    }
}
function EnviaFormulario(formulario,funcion) {
 
    var valida = formulario.valid();
    if (valida)
    {
        bloqueaPagina();
        $.ajax({
            type: 'POST',
            cache: false,
            async: true,
            url: formulario.attr('action'),
            data:formulario.serialize(),
            success: function (data) {
              
                data=$.parseJSON(data);              
                $.unblockUI();
                if (data.Estatus == "OK") {
                     
                     if (typeof (data.cUrl) != "undefined" && data.cUrl!='')
                     {
                         urlGlobal=data.cUrl;
                     }
                    
                    MuestraMensaje(data.Mensaje,'1','Redirecciona');
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
}
function EnviaFormularioFiles (formulario){
 var valida = formulario.valid();
    if (valida)
    {
         bloqueaPagina();
         var formData = new FormData(formulario[0]);
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

function EnviaFormularioRefresh (formulario,datatable){
 var valida = formulario.valid();
    if (valida)
    {
         bloqueaPagina();
         var formData = new FormData(formulario[0]);
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
                      
                      $('#notasmedicas-nota').summernote('reset');
                      $('#notasevolucion-nota_evolucion').summernote('reset');
                      $('#receta-receta').summernote('reset');
                      $('#documentos-contenido').summernote('reset');
                      $("div .imageuploadify-container").remove();
                     
                      $('#kt_select2_5').val(null).trigger('change');
                      $('#'+datatable).DataTable().ajax.reload();    
                      MuestraMensaje(data.Mensaje, "1",'');
                       
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
function validateNumber(event) {
    var key = window.event ? event.keyCode : event.which;
    if (event.keyCode === 8 || event.keyCode === 46) {
        return true;
    } else if ( key < 48 || key > 57 ) {
        return false;
    } else {
        return true;
    }
};
function bloqueaPagina() {
   KTApp.blockPage({overlayColor: '#000000',state: 'warning',size: 'lg'});
}
function Redirecciona(){

if (urlGlobal=='')
{
    var cUrl = $('.redirecciona').attr('href');
    window.location =cUrl;
}
else
{
  window.location =urlGlobal; 
}
}
function ToSeoUrl(str) {
        
str = str.replace(/^\s+|\s+$/g, ''); // trim
  str = str.toLowerCase();

  // remove accents, swap ñ for n, etc
  var from = "ãàáäâẽèéëêìíïîõòóöôùúüûñç·/_,:;";
  var to   = "aaaaaeeeeeiiiiooooouuuunc------";
  for (var i=0, l=from.length ; i<l ; i++) {
    str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
  }

  str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
    .replace(/\s+/g, '-') // collapse whitespace and replace by -
    .replace(/-+/g, '-'); // collapse dashes

  return str; 
}

function deleteitem(id){
    
    Swal.fire({
    title: '¿Esta seguro que decea eliminar el registro?',
    showCancelButton: true,
    confirmButtonText: 'Confirmar',
    cancelButtonText: `Cancelar`,
  }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
       sUrl=url_delete+'?id='+id;
       deleteregisterTable(sUrl,'kt_datatable');
    } 
  });
}

function deleteregisterTable(sUrl,datatable) {

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