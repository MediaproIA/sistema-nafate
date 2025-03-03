<?php
use yii\helpers\Html;
use yii\helpers\Url;
$url_check_notas=Url::to(['pacientes/exportadocumento','paciente_id'=>$model->id]);
?>
<!--begin::Card-->
<div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <div class="card-title">
                        <h3 class="card-label">Lista de Documentos</h3>
                </div>
                    <div class="card-toolbar">
                            <button class="btn btn-success font-weight-bolder" onclick="showDocumento(-1)">
                            <i class="far fa-plus-square"></i></button>
                            <!--end::Button-->&nbsp;
                            <!--begin::Button-->
                            <button class="btn btn-primary font-weight-bolder" id="exportar_documentos">
                            <i class="far fa-file-pdf"></i></button>&nbsp;
                            <!--end::Button-->
                              <button class="btn btn-danger font-weight-bolder" id="exportar_documentos_media">
                            <i class="far fa-file-pdf"></i></button>
                    </div>
            
        </div>
        <div class="card-body table-responsive">
               
                <!--begin: Datatable-->
                 <form id="form_check_documentos" method="post" action="<?=$url_check_notas?>">
                <table class="table table-borderless table-vertical-center" id="contenedor_table_documento" style="display: block" >
                        <thead>
                                <tr>
                                    <th title="Field #1" style="width: 10%">#</th>
                                    <th title="Field #2" style="width: 30%">Fecha</th>
                                      <th title="Field #2" style="width: 30%">Nombre</th>
                                    <th title="Field #2" style="width: 30%"></th>
                                </tr>
                        </thead>
                        <tbody>
                               
                               
                        </tbody>
                </table>
                <input type="hidden" name="header_carta" id="header_carta" value="0" />
                 </form>
                <!--end: Datatable-->
        </div>
</div>
<!--end::Card-->

