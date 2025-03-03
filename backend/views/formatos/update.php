<?php
use yii\helpers\Url;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Formatos */

$this->title = 'Actualizar Formato: ' . ' ' . $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'formatos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->formato_id, 'url' => ['view', 'id' => $model->formato_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-1">
                        <!--begin::Page Heading-->
                        <div class="d-flex align-items-baseline flex-wrap mr-5">
                                <!--begin::Page Title-->
                                <h5 class="text-dark font-weight-bold my-1 mr-5">Formatos</h5>
                                <!--end::Page Title-->
                                <!--begin::Breadcrumb-->
                                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                                        <li class="breadcrumb-item text-muted">
                                                <a href="<?= Url::to(['pacientes/']); ?>/" class="text-muted">Catálogos</a>
                                        </li>
                                        <li class="breadcrumb-item text-muted">
                                                <a href="<?= Url::to(['pacientes/']); ?>/" class="text-muted">Lista de Formatos</a>
                                        </li>
                                         <li class="breadcrumb-item text-muted">
                                                <a href="<?= Url::to(['formatos/create']); ?>/" class="text-muted"><?=$this->title?></a>
                                        </li>
                                </ul>
                                <!--end::Breadcrumb-->
                        </div>
                        <!--end::Page Heading-->
                </div>
                <!--end::Info-->
               
        </div>
</div>
    <!--begin::Post-->
<div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div id="container" class="container">
                    <!--begin::Card-->
                    <div class="card card-custom">
                            <!--begin::Card body-->
                           
                                <div class="card-header card-header-tabs-line">
                                    <div class="card-title">
                                        <span class="card-icon">
					 <i class="flaticon-doc text-primary"></i>
					</span>
                                        <h3 class="card-label"><?= Html::encode($this->title) ?></h3>
                                    </div>
                                    <div class="card-toolbar">
                                        <ul class="nav nav-tabs nav-bold nav-tabs-line" >
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-1" data-toggle="tab" href="#home-tab-1">Información</a>
                                            </li>
                                            

                                        </ul>
                                    </div>
                                </div>
                                 
                                <div class="card-body">
                                      <div class="tab-content">
                                        <?= $this->render('_form', [  'model' => $model]) ?>
                                      </div>
                                </div>
                           
                                    <!--end::Card body-->
                    </div>
                            <!--end::Card-->
</div>
<!--end::Content-->
