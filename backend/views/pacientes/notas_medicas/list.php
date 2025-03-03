<?php
use yii\helpers\Html;
use yii\helpers\Url;
/* @var $notasMedicas backend\models\NotasMedicas */

$url_check_notas=Url::to(['pacientes/exportanotas','paciente_id'=>$model->id]); 
?>
<!--begin::Card-->
<div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <div class="card-title">
                        <h3 class="card-label">Lista de Notas Medicas</h3>
                </div>
                    <div class="card-toolbar">

                              <button class="btn btn-success font-weight-bolder" onclick="showNota(0)">
                            <i class="far fa-plus-square"></i></button>
                            <!--end::Button-->&nbsp;
                            <button class="btn btn-primary font-weight-bolder" id="exportar_notas">
                            <i class="far fa-file-pdf"></i></button>
                            <!--end::Button-->
                    </div>
            
        </div>
        <div class="card-body table-responsive">
               
                <!--begin: Datatable-->
                <form id="form_check_notas" method="post" action="<?=$url_check_notas?>">
                <table class="table table-borderless table-vertical-center" id="notas_medicas" style="display: block" >
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
                <!--end: Datatable-->
                </form>
        </div>
</div>
<!--end::Card-->

