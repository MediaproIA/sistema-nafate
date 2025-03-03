common = {};

common.basePath = null;

common.callHref = function(url){
	window.location.href = url;
};

common.initDataTable = function(tableElement, urlLoad,urlupdate, parameters) { 
   
    if (parameters != null) {
        if (parameters["loadingMessage"])
            common.showLoading(parameters["loadingMessage"]);
    }

    var tableProperties = {
        dom: 'Blfrtip',
        buttons: [
           'excel', 'pdf', 
        ],
        aLengthMenu: [50, 100, 200, 300, 500,'All'],
        iDisplayLength: 50,
        order: [[ 0, "desc" ]],
        responsive: true,
        bProcessing: true,
        bServerSide: true,
        bDeferRender: true,
        bAutoWidth: true,
        bFilter: true,
        info:     true,
        language: {
               "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }
        },
        loadingMessage: 'Cargando...',
        sAjaxSource: urlLoad,
        sDom: "<'row' <'col-md-5'T>><'row'<'col-md-5'l><'col-md-5'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",
        sPaginationType: "full_numbers",
        fnRowCallback: function (nRow, aData, iDisplayIndex) {
        // to get datatable settings
        var oSettings = (this.fnSettings) ? this.fnSettings() : this
      //  $("td:last", nRow).html('<a href="'+urlupdate+'?id='+aData[0]+'"><i class="far fa-edit" style="font-size: 22px;" data-original-title="Edit"></i></a>')
        
        return nRow;
    },
        //oLanguage: dataTableLanguage,        
        fnInitComplete: function () {
         
               
           
         
            common.hideLoading();
            if (parameters["initCompleteCallback"])
                parameters["initCompleteCallback"]();
        }
    };

    if (parameters == undefined) parameters = {};

    $.extend( parameters, tableProperties );

    //Se establecen las propiedadesde la tabla
    tableElement.dataTable(parameters);

    return tableElement;
}

common.showLoading = function(costumMessage, targetBlock) {
      
}

common.hideLoading = function(targetUnBlock) {
  
}