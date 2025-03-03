<?php

use yii\helpers\Html;
use yii\helpers\Url;
use backend\assets\CommonAsset;
use backend\assets\DataTableAsset;
/* @var $this yii\web\View */
/* @var $searchModel app\models\FamilySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lista de Usuarios';
$this->params['breadcrumbs'][] = $this->title;
CommonAsset::register($this);
$local = DataTableAsset::register($this);

?>
<div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-1">
                        <!--begin::Page Heading-->
                        <div class="d-flex align-items-baseline flex-wrap mr-5">
                                <!--begin::Page Title-->
                                <h5 class="text-dark font-weight-bold my-1 mr-5">Cátalogos</h5>
                                <!--end::Page Title-->
                                <!--begin::Breadcrumb-->
                                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                                        <li class="breadcrumb-item text-muted">
                                                <a href="<?= Url::to(['tblproductos/']); ?>/" class="text-muted">Cátalogos</a>
                                        </li>
                                        <li class="breadcrumb-item text-muted">
                                                <a href="<?= Url::to(['tblproductos/']); ?>/" class="text-muted"><?=$this->title?></a>
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
                                <i class="flaticon-diagram text-primary"></i>
                               </span>
                                        <h3 class="card-label"><?=$this->title?>

                                </div>
                                <div class="card-toolbar">

                                        <!--begin::Button-->
                                        <a href="<?= Url::to(['user/create']); ?>/" class="btn btn-primary font-weight-bolder">
                                        <i class="la la-plus"></i>Crear Usuario</a>
                                        <!--end::Button-->
                                </div>
                        </div>
                        <div class="card-body">
                                <!--begin: Datatable-->
                                <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
                                        <thead>
                                                    <tr>
                                                        <th>
                                                            ID
                                                        </th>
                                                        <th  <label class="col-form-label col-lg-3">>
                                                          Usuario
                                                        </th>
                                                        <th  <label class="col-form-label col-lg-3">>
                                                            Estatus
                                                        </th>
                                                        <th>
                                                           Acciones
                                                        </th>
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
<!--begin::Post-->
<?php

$text_test = "common.basePath = '". $local->baseUrl ."/';".
             "common.initDataTable($('#kt_datatable'),'". Url::to(['user/pagina']) ."','". Url::to(['user/update']) ."',".
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


