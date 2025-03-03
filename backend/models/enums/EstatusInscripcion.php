<?php
namespace backend\models\enums;

use Yii;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
abstract class EstatusInscripcion 
{
  const Aprobado = "0";
  const UploadFiles = "1";
  const En_Validacion_de_Pago = "2";
  const Rechazado = "3";
  const Finalizado = "4";
}

