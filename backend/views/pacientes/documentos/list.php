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

                            <!--begin::Button-->
                            <button class="btn btn-primary font-weight-bolder" id="exportar_documentos">
                            <i class="far fa-file-pdf"></i></button>
                            <!--end::Button-->
                    </div>
        </div>
        <div class="card-body">
             <div class="  table-responsive">
          
               <!--begin: Datatable-->
                <form id="form_check_notas" method="post" action="<?=$url_check_notas?>">
                <table class="table table-borderless table-vertical-center" id="kt_datatable" style="display: block" >
                        <thead>
                                <tr>
                                    <th title="Field #1" style="width: 20%">#</th>
                                    <th title="Field #2" style="width: 60%">Fecha</th>
                                     <th title="Field #2" style="width: 60%">Hora</th>
                                    <th title="Field #2" style="width: 20%"></th>
                                </tr>
                        </thead>
                        <tbody>
                                <tr>
                                        <td>1</td>
                                        <td>4 de Octubre del 2021</td>
                                        <td>12:43 </td>
                                        <td><button class="btn btn-primary">Mostrar</button></td>
                                       
                                </tr>
                               
                        </tbody>
                </table>
                </form>
                <!--end: Datatable-->
                  </div>
        </div>
</div>
<!--end::Card-->

