<?php
use yii\helpers\Html;
use yii\helpers\Url;
$this->title = 'Dashboard';
$this->params['breadcrumbs'][] = $this->title;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!--begin::Subheader-->
<div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-1">
                        <!--begin::Page Heading-->
                        <div class="d-flex align-items-baseline flex-wrap mr-5">
                                <!--begin::Page Title-->
                                <h5 class="text-dark font-weight-bold my-1 mr-5">Inscripciones</h5>
                                <!--end::Page Title-->
                                <!--begin::Breadcrumb-->
                                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                                        <li class="breadcrumb-item text-muted">
                                                <a href="<?= Url::to(['inscripciones/']); ?>/" class="text-muted">Alumnos</a>
                                        </li>
                                        <li class="breadcrumb-item text-muted">
                                                <a href="<?= Url::to(['inscripciones/']); ?>/" class="text-muted"><?=$this->title?></a>
                                        </li>
                                      
                                </ul>
                                <!--end::Breadcrumb-->
                        </div>
                        <!--end::Page Heading-->
                </div>
                <!--end::Info-->
               
        </div>
</div>
<!--end::Subheader-->
<!--begin::Entry-->
                                        <div class="d-flex flex-column-fluid">
                                                <!--begin::Container-->
                                                <div class="container">
                                                      
                                                        <!--begin::Row-->
                                                        <div class="row">
                                                                <div class="col-lg-6">
                                                                        <!--begin::Card-->
                                                                        <div class="card card-custom gutter-b">
                                                                                <div class="card-header">
                                                                                        <div class="card-title">
                                                                                                <h3 class="card-label">Pie Chart 1</h3>
                                                                                        </div>
                                                                                </div>
                                                                                <div class="card-body">
                                                                                        <div id="kt_gchart_3" style="height:500px;"></div>
                                                                                </div>
                                                                        </div>
                                                                        <!--end::Card-->
                                                                </div>
                                                                <div class="col-lg-6">
                                                                        <!--begin::Card-->
                                                                        <div class="card card-custom gutter-b">
                                                                                <div class="card-header">
                                                                                        <div class="card-title">
                                                                                                <h3 class="card-label">Pie Chart 2</h3>
                                                                                        </div>
                                                                                </div>
                                                                                <div class="card-body">
                                                                                        <div id="kt_gchart_4" style="height:500px;"></div>
                                                                                </div>
                                                                        </div>
                                                                        <!--end::Card-->
                                                                </div>
                                                        </div>
                                                        <!--end::Row-->
                                                       
                                                </div>
                                                <!--end::Container-->
                                        </div>
                                        <!--end::Entry-->
<?php 
$this->registerJsFile('//www.google.com/jsapi');
$this->registerJsFile('@web/assets_metronic/js/pages/features/charts/google-charts.js',['depends' => [backend\assets\AppAsset::class]]);
?>