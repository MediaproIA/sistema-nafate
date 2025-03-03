<?php

use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model backend\models\Pacientes */

$this->title = 'Expediente Clinico ' .strtoupper($model->nombres) .' '.strtoupper($model->apellidos);
$this->params['breadcrumbs'][] = ['label' => 'Pacientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
$url="";


?>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-1">
                        <!--begin::Page Heading-->
                        <div class="d-flex align-items-baseline flex-wrap mr-5">
                                <!--begin::Page Title-->
                                <h5 class="text-dark font-weight-bold my-1 mr-5">Consultas Medicas</h5>
                                <!--end::Page Title-->
                                <!--begin::Breadcrumb-->
                                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                                       
                                        
                                         <li class="breadcrumb-item text-muted">
                                                <a href="<?= Url::to(['pacientes/']); ?>/" class="text-muted"><?=$this->title?></a>
                                        </li>
                                </ul>
                                <!--end::Breadcrumb-->
                        </div>
                        <!--end::Page Heading-->
                </div>
                <!--end::Info-->
               
        </div>
</div>

     <?= Html::csrfMetaTags() ?>
<div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div id="container" class="container">
                    <!--begin::Card-->
                    <div class="card card-custom">
                            <!--begin::Card body-->
                           
                                <div class="card-header card-header-tabs-line">
                                    <div class="card-title">
                                        <span class="card-icon">
					 <i class="flaticon2-menu text-primary"></i>
					</span>
                                        <h3 class="card-label"><?= Html::encode($this->title) ?></h3>
                                    </div>
                                    <div class="card-toolbar">
                                        <ul class="nav nav-tabs nav-bold nav-tabs-line" >
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-1" data-toggle="tab" href="#home-tab-1">Ficha</a>
                                            </li>
                                            <li class="nav-item dropdown">
                                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Historia Clínica</a>
                                                    <div class="dropdown-menu">
                                                            <a class="dropdown-item" data-toggle="tab" href="#home-tab-13" >AHF</a>
                                                            <a class="dropdown-item" data-toggle="tab" href="#home-tab-7" >APP</a>
                                                            <a class="dropdown-item" data-toggle="tab" href="#home-tab-17" >AGO</a>
                                                            <a class="dropdown-item" data-toggle="tab" href="#home-tab-14" >APNP</a>
                                                            <a class="dropdown-item" data-toggle="tab" href="#home-tab-15" >PA</a>
                                                            <a class="dropdown-item" data-toggle="tab" href="#home-tab-8">EF / EXA-LAB</a>
                                                            <a class="dropdown-item" data-toggle="tab" href="#home-tab-16">Comentarios</a>
                                                            <a class="dropdown-item" id="exporHis" style="cursor: pointer;" >Exportar Historial</a>
                                                    </div>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="home-2" data-toggle="tab" href="#home-tab-2">Notas Medicas</a>
                                            </li>
                                             <li class="nav-item">
                                                <a class="nav-link" id="home-2" data-toggle="tab" href="#home-tab-12">Resumen Clínico</a>
                                            </li>
                                             <li class="nav-item">
                                                <a class="nav-link" id="home-2" data-toggle="tab" href="#home-tab-3">Recetas Medicas</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="home-3" data-toggle="tab" href="#home-tab-10">Documentos</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="home-3" data-toggle="tab" href="#home-tab-20">Archivos</a>
                                            </li>
                                          
                                        </ul>
                                    </div>
                                </div>
                                   <?= $this->render('_form', [
                                                'model' => $model,
                                                'notasMedicas'=>$notasMedicas,
                                                'historial_ahf'=>$historial_ahf,
                                                'historial_app'=>$historial_app,
                                                'historial_pa'=>$historial_pa,
                                                'historial_ef'=>$historial_ef,
                                                'recetas'=>$recetas,
                                                'notasEvolucion'=>$notasEvolucion,
                                                'historial_comentarios'=>$historial_comentarios,
                                                'historial_apnp'=>$historial_apnp,
                                                'historial_gineco'=>$historial_gineco,
                                                'formatos'=>$formatos,
                                                'list_documents_up'=>$list_documents_up,
                                                'list_documents'=>$list_documents,
                                                'lista_files'=>$lista_files,
                                                'fecha_letras'=>$fecha_letras
                                               ]
                                                ) ?>
                            
                               
                                
                            <!--end::Card body-->
                    </div>
                            <!--end::Card-->
</div>
</div>
<input type="hidden" name="paciente_id" id="paciente_id" value="<?=$model->id?>" /> 
        
<!--end::Content-->
<?php 
//$this->registerJs($text_test, yii\web\View::POS_READY, 'my-options');

     
$this->registerJsFile('@web/common/js/common2.js',['depends' => [backend\assets\AppAsset::class]]);
$this->registerJsFile('@web/assets_metronic/js/pages/crud/file-upload/image-input.js',['depends' => [backend\assets\AppAsset::class]]);
$this->registerJsFile('@web/assets_metronic/js/imageuploadify.js',['depends' => [backend\assets\AppAsset::class]]);
$this->registerJsFile('@web/assets_metronic/js/pages/historial_clinico.js',['depends' => [backend\assets\AppAsset::class]]);
$this->registerJsFile('@web/assets_metronic/plugins/custom/draggable/draggable.bundle.js',['depends' => [backend\assets\AppAsset::class]]);
$this->registerJsFile('@web/assets_metronic/js/pages/features/cards/draggable.js',['depends' => [backend\assets\AppAsset::class]]);
?>