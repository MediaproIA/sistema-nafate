<?php
use yii\helpers\Html;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!--begin::Card-->
<div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <div class="card-title">
                        <h3 class="card-label">Lista de Notas Medicas</h3>
                </div>
            
        </div>
        <div class="card-body">
               
                <!--begin: Datatable-->
                <table class="datatable datatable-bordered datatable-head-custom" id="kt_datatable" style="display: block" >
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
                <!--end: Datatable-->
        </div>
</div>
<!--end::Card-->

