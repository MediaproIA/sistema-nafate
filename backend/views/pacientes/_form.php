<?php
use backend\assets\CommonAssetAdd;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
$asset  =  CommonAssetAdd::register($this);
$baseUrl = $asset->baseUrl;
/* @var $this yii\web\View */
/* @var $model backend\models\Pacientes */
/* @var $notasMedicas backend\models\NotasMedicas */
/* @var $form yii\widgets\ActiveForm */
$url = Url::to(['pacientes/updatepaciente','paciente_id'=>$model->id]);
$url_ahf = Url::to(['pacientes/updatehistorialahf','paciente_id'=>$model->id]);
$url_app = Url::to(['pacientes/updatehistorialapp','paciente_id'=>$model->id]);
$url_ap = Url::to(['pacientes/updatehistorialpa','paciente_id'=>$model->id]);
$url_ef=Url::to(['ef/update','paciente_id'=>$model->id]);
$url_gineco=Url::to(['pacientes/updatehistorialgineco','paciente_id'=>$model->id]);
$url_comentarios=Url::to(['pacientes/updatehistorialcomentarios','paciente_id'=>$model->id]);
$url_apnp=Url::to(['pacientes/updatehistorialapnp','paciente_id'=>$model->id]);
$url_files_up=Url::to(['files/savefile','paciente_id'=>$model->id]);
$url_show_nota=Url::to(['notas/shownota','paciente_id'=>$model->id]);
$url_show_nota_evolucion=Url::to(['notasevolucion/shownotaevolucion','paciente_id'=>$model->id]);
$url_show_receta=Url::to(['recetas/show','paciente_id'=>$model->id]);
$url_show_documento=Url::to(['documentos/showdocumento','paciente_id'=>$model->id]);
$url_export=Url::to(['pacientes/exportahistorial','paciente_id'=>$model->id]);
$urlTypeHead=Url::to(['medicamentos/getall']);
$urlTypeFormato=Url::to(['formatos/getall']);
$url_getMedicamento=Url::to(['medicamentos/getone']);
$url_getFormato=Url::to(['formatos/getone']);
$url_files=Url::to(['pacientes/getfiles','paciente_id'=>$model->id]);
$baseUrlTempo= str_replace('common', 'assets_metronic', $baseUrl);
$pathImg= str_replace('common', '', $baseUrl);
$url_ef_delete=Url::to(['ef/delete']);
$url_notas_delete=Url::to(['notas/delete','paciente_id'=>$model->id]);
$url_notas_delete_evolucion=Url::to(['notasevolucion/delete','paciente_id'=>$model->id]);
$url_delete_recetas=Url::to(['recetas/delete','paciente_id'=>$model->id]);
$url_delete_documentos=Url::to(['documentos/delete','paciente_id'=>$model->id]);
?>
   <div class="tab-content">
<div class="tab-pane fade show active" id="home-tab-1" role="tabpanel">
<form action="<?=$url?>" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" name="form_paciente" id="form_paciente" method="post">
<div class="card-body container-fluid">
<div class="row">    
    <div class="col-md-8">
    <?= $this->render('_frmInfoPaciente', ['model' => $model,'baseUrl'=>$baseUrl]) ?>
    
    </div>
   <div class="col-md-4">
    			<!--begin::Group-->
    
            <label class="col-form-label col-12 text-lg-center text-center">Imagen</label>
            <div class="col-12">
                    <?php
                    $basePhysical = Yii::getAlias('@webroot');

                                                         $target_path=$basePhysical."/imagenes/avatar".'/';
                                                         $img_file = $target_path.$model->id.'.'.$model->extencion;
                                                         $fecha = new DateTime();
                                                         $UrlFavicon=$baseUrlTempo.'/media/users/blank.png';
                                                         if (!$model->isNewRecord && file_exists ( $img_file ))
                                                         {
                                                            $target_path="/imagenes/avatar/";
                                                            $UrlFavicon=$target_path.$model->id.'.'.$model->extencion;
                                                           
                                                         }   
                                                         ?>
                <img src="<?=$UrlFavicon?>?<?=$fecha->getTimestamp()?>" class="img-fluid" />
             
                <div style="text-align:center">
                     <b>Edad</b>: <?=$fecha_letras?>
                </div>
            </div>
   
    <!--end::Group-->    
    </div>
</div>
</div>
<div class="card-footer" style="clear: both">
                                            <div class="row">
                                                           <div class="col-lg-12 ml-lg-auto">
                                                               
                                                             
                                                                <?= Html::button($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' =>'btn btn-primary','id'=>'update_paciente']) ?>
                                                               
                                                               
                                                                <?= Html::a('Cancelar', ['index'], ['class' => 'redirecciona btn btn-secondary']) ?>	
                                                             
                                                           </div>
                                                   </div>

                                </div>
</form>
</div>

<div class="tab-pane fade" id="home-tab-2" role="tabpanel">
 
 <?= $this->render('notas_medicas/group', ['model' => $model,'baseUrl'=>$baseUrl,'notasMedicas'=>$notasMedicas,'baseUrl'=>$baseUrl,'list_files'=>$lista_files,'assets'=>$baseUrlTempo]) ?>
 
</div>
 <div class="tab-pane fade" id="home-tab-3" role="tabpanel">
 <?= $this->render('recetas/group', ['model' => $model,'baseUrl'=>$baseUrl, 'recetas'=>$recetas]) ?>
</div>

 <div class="tab-pane fade" id="home-tab-7" role="tabpanel">
      <form action="<?=$url_app?>" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" name="form_app" id="form_app" method="post">
        <?= $this->render('app/group', ['model' => $model,'baseUrl'=>$baseUrl,'historial_app'=>$historial_app]) ?>
      </form>
 </div>
 <div class="tab-pane fade" id="home-tab-8" role="tabpanel">
  <form action="<?=$url_ef?>" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" name="form_ef" id="form_ef" method="post">
        <?= $this->render('ef/group', ['model' => $model,'baseUrl'=>$baseUrl,'historial_ef'=>$historial_ef,'list_documents'=>$list_documents,'assets'=>$baseUrlTempo]) ?>
  </form>
 </div>
 <div class="tab-pane fade" id="home-tab-10" role="tabpanel">
        <?= $this->render('imagenes/group', ['model' => $model,'baseUrl'=>$baseUrl,'formatos'=>$formatos,'lista_files'=>$lista_files,'assets'=>$baseUrlTempo]) ?>
 </div>
  <div class="tab-pane fade" id="home-tab-11" role="tabpanel">
        <?= $this->render('documentos/group', ['model' => $model,'baseUrl'=>$baseUrl,'notasMedicas'=>$notasMedicas]) ?>
 </div>
   <div class="tab-pane fade" id="home-tab-12" role="tabpanel">
        <?= $this->render('notas_evolucion/group', ['model' => $model,'baseUrl'=>$baseUrl, 'notasEvolucion'=>$notasEvolucion]) ?>
   </div>
   <div class="tab-pane fade" id="home-tab-13" role="tabpanel">
     <form action="<?=$url_ahf?>" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" name="form_ahf" id="form_ahf" method="post">
         <?= $this->render('ahf/group', ['model' => $model,'baseUrl'=>$baseUrl,'historial_ahf'=>$historial_ahf]) ?>
     </form>
   </div>
   <div class="tab-pane fade" id="home-tab-15" role="tabpanel">
         <form action="<?=$url_ap?>" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" name="form_ap" id="form_ap" method="post">
         <?= $this->render('pa/group', ['model' => $model,'baseUrl'=>$baseUrl, 'historial_pa'=>$historial_pa]) ?>
         </form>
   </div>
   <div class="tab-pane fade" id="home-tab-16" role="tabpanel">
      <form action="<?=$url_comentarios?>" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" name="form_comentarios" id="form_comentarios" method="post">
        <?= $this->render('comentarios/group', ['model' => $model,'baseUrl'=>$baseUrl,'historial_comentarios'=>$historial_comentarios]) ?>
      </form>
   </div>
   <div class="tab-pane fade" id="home-tab-17" role="tabpanel">
      <form action="<?=$url_gineco?>" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" name="form_gineco" id="form_gineco" method="post">
        <?= $this->render('gineco/group', ['model' => $model,'baseUrl'=>$baseUrl,'historial_gineco'=>$historial_gineco]) ?>
      </form>
   </div>    
   <div class="tab-pane fade" id="home-tab-14" role="tabpanel">
      <form action="<?=$url_apnp?>" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" name="form_apnp" id="form_apnp" method="post">
        <?= $this->render('apnp/group', ['model' => $model,'baseUrl'=>$baseUrl, 'historial_apnp'=>$historial_apnp]) ?>
      </form>
   </div>
    <div class="tab-pane fade" id="home-tab-20" role="tabpanel">
      <form action="<?=$url_files_up?>" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" name="form_files_up" id="form_files_up" method="post">
        <?= $this->render('files/group', ['model' => $model,'baseUrl'=>$baseUrl, 'list_files'=>$list_documents_up,'assets'=>$baseUrlTempo]) ?>
      </form>
   </div>
</div>
<script>
     var urlUploadAF='<?=$url_ef?>';
     var url_show_nota='<?=$url_show_nota?>'; 
     var url_show_nota_evolucion='<?=$url_show_nota_evolucion?>';
     var urlTypeHead='<?=$urlTypeHead?>';
     var url_getMedicamento='<?=$url_getMedicamento?>';
     var url_show_receta='<?=$url_show_receta?>';
     var urlTypeFormato='<?=$urlTypeFormato?>';
     var url_getFormato='<?=$url_getFormato?>';
     var url_show_documento='<?=$url_show_documento?>';
     //var url_files='<?=$url_files?>';
     var url_export='<?=$url_export?>';
     var url_ef_delete='<?=$url_ef_delete?>';
     var url_notas_delete='<?=$url_notas_delete?>';
     var url_notas_delete_evolucion='<?=$url_notas_delete_evolucion?>'; 
     var url_delete_recetas='<?=$url_delete_recetas?>'; 
     var url_delete_documentos='<?=$url_delete_documentos?>';

</script>
<?php 

$text_test = "common.basePath = '". $baseUrl ."/';".
             "common.initDataTable($('#notas_medicas'),'". Url::to(['notas/paginanota']) ."','',".
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

$text_test2 = "common.basePath = '". $baseUrl ."/';".
             "common.initDataTable($('#notae_evolucion'),'". Url::to(['notasevolucion/paginanotaevolucion']) ."','',".
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
$text_test3 = "common.basePath = '". $baseUrl ."/';".
             "common.initDataTable($('#contenedor_receta'),'". Url::to(['recetas/pagina']) ."','',".
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
$text_test4 = "common.basePath = '". $baseUrl ."/';".
             "common.initDataTable($('#contenedor_table_documento'),'". Url::to(['documentos/paginadocumento']) ."','',".
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
$this->registerJs($text_test2, yii\web\View::POS_READY, 'my-options_2');
$this->registerJs($text_test, yii\web\View::POS_READY, 'my-options');
$this->registerJs($text_test3, yii\web\View::POS_READY, 'my-options_3');
$this->registerJs($text_test4, yii\web\View::POS_READY, 'my-options_4');



		