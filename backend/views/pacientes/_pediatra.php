<?php
use yii\helpers\Html;
/* @var $model backend\models\Pacientes */
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<div class="form-group row col-lg-12"><h3 style="margin-left: 20px; margin-top: 20px;">Antecedentes Pre Perinatales</h3></div>
 <div class="form-group row col-lg-12">
      <div class="col-lg-6">
                             <label class="col-form-label col-lg-12">Control de Embarazo a partir de:<span class="required">*</span></label>
                             <div class="col-lg-12">
                                 <input type="text" class="form-control">
                             </div>
                         
      </div>
       <div class="col-lg-6">
                             <label class="col-form-label col-lg-12">Duración del Embarazo:<span class="required">*</span></label>
                             <div class="col-lg-12">
                                <input type="text" class="form-control">                             
                             </div>
                         
      </div>               
</div>
 <div class="form-group row col-lg-12">
      <div class="col-lg-6">
                             <label class="col-form-label col-lg-12">Llanto espontaneo al nacer:<span class="required">*</span></label>
                             <div class="col-lg-12">
                                 <input type="text" class="form-control">
                             </div>
                         
      </div>
       <div class="col-lg-6">
                             <label class="col-form-label col-lg-12">Peso:<span class="required">*</span></label>
                             <div class="col-lg-12">
                                <input type="text" class="form-control">                             
                             </div>
                         
      </div>               
</div>
 <div class="form-group row col-lg-12">
      <div class="col-lg-6">
                             <label class="col-form-label col-lg-12">Talla al nacer:<span class="required">*</span></label>
                             <div class="col-lg-12">
                                 <input type="text" class="form-control">
                             </div>
                         
      </div>
       <div class="col-lg-6">
                             <label class="col-form-label col-lg-12">Complicaciones:<span class="required">*</span></label>
                             <div class="col-lg-12">
                                <input type="text" class="form-control">                             
                             </div>
                         
      </div>               
</div>
 <div class="form-group row col-lg-12">
      <div class="col-lg-12">
                             <label class="col-form-label col-lg-12">Incubadora (Timepo y Motivo):<span class="required">*</span></label>
                             <div class="col-lg-12">
                                 <textarea type="text" class="form-control"></textarea>
                             </div>
                         
      </div>          
</div>
 <div class="form-group row col-lg-12">
      <div class="col-lg-12">
                             <label class="col-form-label col-lg-12">Complicaciones:<span class="required">*</span></label>
                             <div class="col-lg-12">
                                 <textarea type="text" class="form-control"></textarea>
                             </div>
                         
      </div>          
</div>

<div class="form-group row col-lg-12"><h3 style="margin-left: 20px; margin-top: 20px;">Antecedentes Personales patológicos y no patológicos</h3></div>
 <div class="form-group row col-lg-12">
      <div class="col-lg-6">
                             <label class="col-form-label col-lg-12">Inmunizaciones:<span class="required">*</span></label>
                             <div class="col-lg-12">
                                 <textarea type="text" class="form-control"></textarea>
                             </div>
                         
      </div>
       <div class="col-lg-6">
                             <label class="col-form-label col-lg-12">Quirurgicos:<span class="required">*</span></label>
                             <div class="col-lg-12">
                               <textarea type="text" class="form-control"></textarea>                           
                             </div>
                         
      </div>               
</div>
 <div class="form-group row col-lg-12">
      <div class="col-lg-6">
                             <label class="col-form-label col-lg-12">Tranfuncionales:<span class="required">*</span></label>
                             <div class="col-lg-12">
                                <textarea type="text" class="form-control"></textarea>
                             </div>
                         
      </div>
       <div class="col-lg-6">
                             <label class="col-form-label col-lg-12">Traumaticos:<span class="required">*</span></label>
                             <div class="col-lg-12">
                                <input type="text" class="form-control">                             
                             </div>
                         
      </div>               
</div>
 <div class="form-group row col-lg-12">
      <div class="col-lg-6">
                             <label class="col-form-label col-lg-12">Lactansia Maternal (Tiempo):<span class="required">*</span></label>
                             <div class="col-lg-12">
                                 <textarea type="text" class="form-control"></textarea>
                             </div>
                         
      </div>
       <div class="col-lg-6">
                             <label class="col-form-label col-lg-12">Inicio de Aprobación:<span class="required">*</span></label>
                             <div class="col-lg-12">
                                <input type="text" class="form-control">                             
                             </div>
                         
      </div>               
</div>
 <div class="form-group row col-lg-12">
      <div class="col-lg-12">
                             <label class="col-form-label col-lg-12">Hospitalización:<span class="required">*</span></label>
                             <div class="col-lg-12">
                                 <textarea type="text" class="form-control"></textarea>
                             </div>
                         
      </div>          
</div>
 <div class="form-group row col-lg-12">
      <div class="col-lg-12">
                             <label class="col-form-label col-lg-12">Exantematicas:<span class="required">*</span></label>
                             <div class="col-lg-12">
                                 <textarea type="text" class="form-control"></textarea>
                             </div>
                         
      </div>          
</div>

<div class="form-group row col-lg-12"><h3 style="margin-left: 20px; margin-top: 20px;">Desarrollo Psico-motor</h3></div>
 <div class="form-group row col-lg-12">
      <div class="col-lg-6">
                             <label class="col-form-label col-lg-12">Sostiene la Cabeza:<span class="required">*</span></label>
                             <div class="col-lg-12">
                                <?= Html::activeRadioList($model, "genero", [0=>'SI', 1 => 'NO'])?>
                             </div>
                         
      </div>
       <div class="col-lg-6">
                             <label class="col-form-label col-lg-12">Se Para con apoyo:<span class="required">*</span></label>
                             <div class="col-lg-12">
                               <?= Html::activeRadioList($model, "genero", [0=>'SI', 1 => 'NO'])?>                          
                             </div>
                         
      </div>               
</div>
 <div class="form-group row col-lg-12">
      <div class="col-lg-6">
                             <label class="col-form-label col-lg-12">Balbucea:<span class="required">*</span></label>
                             <div class="col-lg-12">
                                <?= Html::activeRadioList($model, "genero", [0=>'SI', 1 => 'NO'])?>
                             </div>
                         
      </div>
       <div class="col-lg-6">
                             <label class="col-form-label col-lg-12">Se sienta solo:<span class="required">*</span></label>
                             <div class="col-lg-12">
                               <?= Html::activeRadioList($model, "genero", [0=>'SI', 1 => 'NO'])?>                            
                             </div>
                         
      </div>               
</div>
 <div class="form-group row col-lg-12">
      <div class="col-lg-6">
                             <label class="col-form-label col-lg-12">Camina solo:<span class="required">*</span></label>
                             <div class="col-lg-12">
                                <?= Html::activeRadioList($model, "genero", [0=>'SI', 1 => 'NO'])?>
                             </div>
                         
      </div>
       <div class="col-lg-6">
                             <label class="col-form-label col-lg-12">Primeras Palabras con significado:<span class="required">*</span></label>
                             <div class="col-lg-12">
                                <input type="text" class="form-control">                             
                             </div>
                         
      </div>               
</div>
 <div class="form-group row col-lg-12">
      <div class="col-lg-6">
                             <label class="col-form-label col-lg-12">Getea:<span class="required">*</span></label>
                             <div class="col-lg-12">
                                 <?= Html::activeRadioList($model, "genero", [0=>'SI', 1 => 'NO'])?>
                             </div>
                         
      </div>
      <div class="col-lg-6">
                             <label class="col-form-label col-lg-12">Corre:<span class="required">*</span></label>
                             <div class="col-lg-12">
                                 <?= Html::activeRadioList($model, "genero", [0=>'SI', 1 => 'NO'])?>
                             </div>
                         
      </div>  
</div>

 <div class="form-group row col-lg-12">
      <div class="col-lg-12">
                             <label class="col-form-label col-lg-12">Contro de esfinteres:<span class="required">*</span></label>
                             <div class="col-lg-12">
                                 <?= Html::activeRadioList($model, "genero", [0=>'SI', 1 => 'NO'])?>
                             </div>
                         
      </div>          
</div>

<div class="form-group row col-lg-12"><h3 style="margin-left: 20px; margin-top: 20px;">Interogatorio por aparatos y sistemas</h3></div>
 <div class="form-group row col-lg-12">
      <div class="col-lg-6">
                             <label class="col-form-label col-lg-12">Piel y Anexos:<span class="required">*</span></label>
                             <div class="col-lg-12">
                                 <textarea type="text" class="form-control"></textarea>
                             </div>
                         
      </div>
       <div class="col-lg-6">
                             <label class="col-form-label col-lg-12">Digestivo:<span class="required">*</span></label>
                             <div class="col-lg-12">
                               <textarea type="text" class="form-control"></textarea>                           
                             </div>
                         
      </div>               
</div>
 <div class="form-group row col-lg-12">
      <div class="col-lg-6">
                             <label class="col-form-label col-lg-12">Neuropsiquiatrico:<span class="required">*</span></label>
                             <div class="col-lg-12">
                                <textarea type="text" class="form-control"></textarea>
                             </div>
                         
      </div>
       <div class="col-lg-6">
                             <label class="col-form-label col-lg-12">Cardiuvascular:<span class="required">*</span></label>
                             <div class="col-lg-12">
                                <input type="text" class="form-control">                             
                             </div>
                         
      </div>               
</div>
 <div class="form-group row col-lg-12">
      <div class="col-lg-6">
                             <label class="col-form-label col-lg-12">Genitu Urinario:<span class="required">*</span></label>
                             <div class="col-lg-12">
                                 <textarea type="text" class="form-control"></textarea>
                             </div>
                         
      </div>
       <div class="col-lg-6">
                             <label class="col-form-label col-lg-12">Linfohematico:<span class="required">*</span></label>
                             <div class="col-lg-12">
                                <input type="text" class="form-control">                             
                             </div>
                         
      </div>               
</div>
 <div class="form-group row col-lg-12">
      <div class="col-lg-12">
                             <label class="col-form-label col-lg-12">Resperatorio:<span class="required">*</span></label>
                             <div class="col-lg-12">
                                 <textarea type="text" class="form-control"></textarea>
                             </div>
                         
      </div>          
</div>
 <div class="form-group row col-lg-12">
      <div class="col-lg-12">
                             <label class="col-form-label col-lg-12">Musculo Hesqueletico:<span class="required">*</span></label>
                             <div class="col-lg-12">
                                 <textarea type="text" class="form-control"></textarea>
                             </div>
                         
      </div>          
</div>
 <div class="form-group row col-lg-12">
      <div class="col-lg-12">
                             <label class="col-form-label col-lg-12">Nervioso:<span class="required">*</span></label>
                             <div class="col-lg-12">
                                 <textarea type="text" class="form-control"></textarea>
                             </div>
                         
      </div>          
</div>
 <div class="form-group row col-lg-12">
      <div class="col-lg-12">
                             <label class="col-form-label col-lg-12">Hospitalización (Tiempo):<span class="required">*</span></label>
                             <div class="col-lg-12">
                                 <textarea type="text" class="form-control"></textarea>
                             </div>
                         
      </div>          
</div>
 <div class="form-group row col-lg-12">
      <div class="col-lg-12">
                             <label class="col-form-label col-lg-12">Fracturas:<span class="required">*</span></label>
                             <div class="col-lg-12">
                                 <textarea type="text" class="form-control"></textarea>
                             </div>
                         
      </div>          
</div>
 <div class="form-group row col-lg-12">
      <div class="col-lg-12">
                             <label class="col-form-label col-lg-12">Antecedentes Quirurgicos:<span class="required">*</span></label>
                             <div class="col-lg-12">
                                 <textarea type="text" class="form-control"></textarea>
                             </div>
                         
      </div>          
</div>

 <div class="form-group row col-lg-12">
      <div class="col-lg-12">
                             <label class="col-form-label col-lg-12">Alergias e Intolerancia:<span class="required">*</span></label>
                             <div class="col-lg-12">
                                 <textarea type="text" class="form-control"></textarea>
                             </div>
                         
      </div>          
</div>
 <div class="form-group row col-lg-12">
      <div class="col-lg-12">
                             <label class="col-form-label col-lg-12">Antecedentes Tranfuncionales:<span class="required">*</span></label>
                             <div class="col-lg-12">
                                 <textarea type="text" class="form-control"></textarea>
                             </div>
                         
      </div>          
</div>

 <div class="form-group row col-lg-12">
      <div class="col-lg-12">
                             <label class="col-form-label col-lg-12">Transfuncionales:<span class="required">*</span></label>
                             <div class="col-lg-12">
                                 <textarea type="text" class="form-control"></textarea>
                             </div>
                         
      </div>          
</div>