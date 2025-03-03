<?php
use yii\helpers\Html;
use yii\helpers\Url;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$url_check_notas=Url::to(['pacientes/exportareceta','paciente_id'=>$model->id]);
?>
<!--begin::Card-->
<div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <div class="card-title">
                        <h3 class="card-label">Lista de Recetas Medicas</h3>
                </div>
            <div class="card-toolbar">
 <!--begin::Button-->
                            <button class="btn btn-success font-weight-bolder" onclick="showReceta(0)">
                            <i class="far fa-plus-square"></i></button>
                            <!--end::Button-->&nbsp;
                             <button class="btn btn-bg-dark font-weight-bolder" id="exportar_recetas_header">
                            <i class="far fa-file-powerpoint"></i></button>
                            <!--end::Button-->&nbsp;
                            <!--begin::Button-->
                            <button class="btn btn-primary font-weight-bolder" id="exportar_recetas">
                            <i class="far fa-file-pdf"></i></button>
                            <!--end::Button-->
                            <!--end::Button-->&nbsp;
                            <!--begin::Button-->
                            <button class="btn btn-danger font-weight-bolder" id="exportar_recetas_carta">
                            <i class="far fa-file-pdf"></i></button>
                            <!--end::Button-->
                    </div>
            
        </div>
        <div class="card-body table-responsive">
               
                <!--begin: Datatable-->
                  <form id="form_check_recetas" method="post" action="<?=$url_check_notas?>">
                <table class="table table-borderless table-vertical-center" id="contenedor_receta" style="display: block" >
                        <thead>
                                <tr>
                                    <th title="Field #1" style="width: 20%">#</th>
                                        <th title="Field #2" style="width: 60%">Fecha</th>
                                        <th title="Field #2" style="width: 60%">Hora</th>
                                        <th title="Field #2" style="width: 20%"></th>
                                </tr>
                        </thead>
                        <tbody>
                                
                               
                        </tbody>
                </table>
                      <input type="hidden" name="header" id="header" value="1" />
                  </form>
                <!--end: Datatable-->
        </div>
</div>
<!--end::Card-->


