common = {};

common.basePath = null;

common.callHref = function(url){
	window.location.href = url;
};

common.initDataTable = function(tableElement, urlLoad,urlupdate, parameters) { 
   
    tableElement.on('change', '.group-checkable', function() {
			var set = $(this).closest('table').find('td:first-child .checkable');
			var checked = $(this).is(':checked');

			$(set).each(function() {
				if (checked) {
					$(this).prop('checked', true);
					$(this).closest('tr').addClass('active');
				}
				else {
					$(this).prop('checked', false);
					$(this).closest('tr').removeClass('active');
				}
			});
		});

		tableElement.on('change', 'tbody tr .checkbox', function() {
			$(this).parents('tr').toggleClass('active');
		});
    if (parameters != null) {
        if (parameters["loadingMessage"])
            common.showLoading(parameters["loadingMessage"]);
    }

    var tableProperties = {
        dom: 'Blfrtip',
        buttons: [],
        aLengthMenu: [50, 100, 200, 300, 500,'All'],
        iDisplayLength: 100,
        order: [[ 1, "desc" ]],
        bProcessing: true,
        bServerSide: true,
        bFilter: false,
        info:     false,
        columnDefs: [
				{
					targets: 0,
					className: 'dt-left',
					orderable: false,
					render: function(data, type, full, meta) {
					    
                                            var d= full;	
                                            return '<label class="checkbox checkbox-single"><input type="checkbox" id="identificadores[]" name="identificadores[]" value="'+d["0"]+'" class="checkable"/><span></span></label>';
					},
				}
        ],
        headerCallback: function(thead, data, start, end, display) {
				thead.getElementsByTagName('th')[0].innerHTML = `
                    <label class="checkbox checkbox-single">
                        <input type="checkbox" value="" class="group-checkable"/>
                        <span></span>
                    </label>`;
			},
	
	     bDeferRender: true,
        bAutoWidth: true,
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
        "sFirst":    "<",
        "sLast":     ">>",
        "sNext":     ">",
        "sPrevious": "<<"
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
        fnServerParams: function ( aoData ) {
           
           var paciente_id=$("#paciente_id").val() == ''?0:$("#paciente_id").val();
           aoData.push( { "name": "paciente_id", "value": paciente_id } );
           
        },
        fnRowCallback: function (nRow, aData, iDisplayIndex) {
        // to get datatable settings
        var oSettings = (this.fnSettings) ? this.fnSettings() : this
        $("td:last", nRow).css('width','100%');
        
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