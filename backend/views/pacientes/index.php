<?php
use yii\helpers\Html;
use yii\helpers\Url;
use backend\assets\DataTableAsset;
use backend\assets\CommonAsset;
/* @var $this yii\web\View */
/* @var $searchModel app\models\FamilySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lista de Pacientes';
$this->params['breadcrumbs'][] = $this->title;
CommonAsset::register($this);
$local = DataTableAsset::register($this);

?>
<!--begin::Subheader-->
<div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-1">
                        <!--begin::Page Heading-->
                        <div class="d-flex align-items-baseline flex-wrap mr-5">
                                <!--begin::Page Title-->
                                <h5 class="text-dark font-weight-bold my-1 mr-5">Consultorio Médico</h5>
                                <!--end::Page Title-->
                                <!--begin::Breadcrumb-->
                                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                                        <li class="breadcrumb-item text-muted">
                                                <a href="<?= Url::to(['pacientes/']); ?>/" class="text-muted">Pacientes</a>
                                        </li>
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
<!--end::Subheader-->
<!--begin::Entry-->
						<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<div class="container">
								
								<!--begin::Card-->
								<div class="card card-custom">
									<div class="card-header card-header-tabs-line">
                                                                         
										<div class="card-title">
                                                                                       <span class="card-icon">
                                                                                <i class="flaticon-avatar text-primary"></i>
                                                                               </span>
											<h3 class="card-label"><?=$this->title?>
											
										</div>
                                                                                <div class="card-toolbar">

                                                                                        <!--begin::Button-->
                                                                                        <a class="btn btn-primary font-weight-bolder" data-toggle="modal" data-target="#basic">
                                                                                        <i class="la la-plus"></i>Crear Paciente</a>
                                                                                        <!--end::Button-->
                                                                                </div>
										
									</div>
									<div class="card-body">
										<!--begin: Datatable-->
										<table class="table table-separate table-head-custom" id="kt_datatable">
											<thead>
                                                <tr>																									
                                                            <th style="width: 10%">Fecha de Creación</th>
                                                            <th style="width: 20%">Nombres</th>										
		                                                    <th style="width: 20%">Apellidos</th>
                                                            <th style="width: 5%">Celular</th>
                                                            <th style="width: 5%">Genero</th>
                                                            <th style="width: 20%">Email</th>
                                                            <th style="width: 20%">Acciones</th>
												</tr>
											</thead>
											<tbody>
									
											</tbody>
										</table>
										<!--end: Datatable-->
									</div>
								</div>
								<!--end::Card-->
							</div>
							<!--end::Container-->
						</div>
						<!--end::Entry-->
<!--begin::Post-->    <!--begin::Modal-->
                <div class="modal fade" id="basic" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                    <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                        <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                        Crear Paciente
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">
                                                                &times;
                                                        </span>
                                                </button>
                                        </div>
                                        <div class="modal-body">
                                                 <form action="<?= Url::to(['pacientes/guardar']); ?>" id="form_sample_2" method="post" enctype="multipart/form-data" >	

                                                   <div class="form-group row col-lg-12">
                                                            <div class="col-lg-6">
                                                                    <label class="col-form-label col-lg-12">Nombre (s) <span class="required">*</span></label>
                                                                     <div class="col-lg-12">
                                                                        <?= Html::activeTextInput($model, 'nombres',['class' => 'form-control  required',]) ?>
                                                                     </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                    <label class="col-form-label col-lg-12">Apellidos<span class="required">* </span></label>
                                                                     <div class="col-lg-12">
                                                                         <?= Html::activeTextInput($model, 'apellidos',['class' => 'form-control  required']) ?>

                                                                     </div>
                                                            </div>
                                                    </div>  
                                                    <div class="form-group row col-lg-12">
                                                            <div class="col-lg-6">
                                                                    <label class="col-form-label col-lg-12">Fecha de Nacimiento<span class="required">*</span></label>
                                                                     <div class="col-lg-12">
                                                                        <?= Html::activeTextInput($model, 'fecha_nacimiento',['class' => 'form-control required date-picker','data-date-format' => 'mm/dd/yyyy']) ?>
                                                                     </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                    <label class="col-form-label col-lg-12">Teléfono<span class="required">* </span></label>
                                                                     <div class="col-lg-12">
                                                                         <?= Html::activeTextInput($model, 'telefono_celular',['class' => 'form-control  required']) ?>

                                                                     </div>
                                                            </div>
                                                    </div>  
                                                    <div class="form-group row col-lg-12">
                                                            <div class="col-lg-6">
                                                                    <label class="col-form-label col-lg-12">Genero<span class="required">*</span></label>
                                                                     <div class="col-lg-12">
                                                                      <?= Html::activeRadioList($model, "genero", [0=>'Femenino', 1 => 'Masculino'])?> 
                                                                     </div>
                                                            </div>

                                                    </div> 


                                                </form>
                                        </div>
                                        <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                        Close
                                                </button>
                                             <button type="button" class="btn btn-primary" id="btnForm">
                                                        Guardar
                                                </button>
                                        </div>
                                </div>
                        </div>
                 </form>
                </div>
                <!--end::Modal-->
<?php

$text_test = "common.basePath = '". $local->baseUrl ."/';".
             "common.initDataTable($('#kt_datatable'),'". Url::to(['pacientes/pagina']) ."','',".
             "function (oSettings, json) {
            },
            {
                aoColumnDefs: [
                    {
                        \"bSortable\": false,
                        \"aTargets\": [2],
                        \"fnCreatedCell\" : function(nTd, sData, oData, iRow, iCol){
                            var b = $('<button style=\"margin: 0\">edit</button>');
                            b.button();
                            b.on('click',function(){
                                document.location.href = oData[0];
                                return false;
                            });
                            $(nTd).empty();
                            $(nTd).prepend(b);
                        }
                          
                            
                           
                          
                    }
               
                   
        ],

                fnRowCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    
                },
                fnDrawCallback: function (oSettings) {
                    
                },
                loadingMessage: \"Loading ". Html::encode($this->title) ."...\"
            });";
$this->registerJs($text_test, yii\web\View::POS_READY, 'my-options');
?>
<script>
var url_delete='<?=Url::to(['pacientes/delete']);?>';
</script>