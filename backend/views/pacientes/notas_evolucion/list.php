<?php
use yii\helpers\Html;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use yii\helpers\Url;
$url_check_notas=Url::to(['pacientes/exportanotasevolucion','paciente_id'=>$model->id]); 
?>
<!--begin::Card-->
<div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <div class="card-title">
                        <h3 class="card-label">Lista de Resumen Clínico</h3>
                </div>
             <div class="card-toolbar">
                              <!--begin::Button-->
                            <button class="btn btn-success font-weight-bolder" onclick="showNotaEvolucion(0)">
                            <i class="far fa-plus-square"></i></button>
                            <!--end::Button-->&nbsp;
                            <!--begin::Button-->
                            <button class="btn btn-primary font-weight-bolder" id="exportar_notas_evolucion">
                            <i class="far fa-file-pdf"></i></button>
                            <!--end::Button-->
                    </div>
            
        </div>
        <div class="card-body table-responsive">
               
                <!--begin: Datatable-->
                  <form id="form_check_notas_evolucion" method="post" action="<?=$url_check_notas?>">
                <table class="table table-borderless table-vertical-center" id="notae_evolucion" style="display: block"  >
                        <thead>
                                <tr>
                                    <th title="Field #1" style="width: 20%">#</th>
                                    <th title="Field #2" style="width: 60%">Fecha</th>
                                     <th title="Field #2" style="width:60%">Hora</th>
                                    <th title="Field #2" style="width:20%"></th>
                                </tr>
                        </thead>
                        <tbody>
                                
                               
                        </tbody>
                </table>
                  </form>
                <!--end: Datatable-->
        </div>
</div>
<!--end::Card-->

