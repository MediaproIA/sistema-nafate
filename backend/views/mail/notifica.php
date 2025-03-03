<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * var model= new ba
 * and open the template in the editor.
 */
use yii\helpers\Html;
use frontend\controllers\SiteController;

/* @var $this yii\web\View */
/* @var $model  backend\models\Tblclientes */

?>
<tr height="4">
<td></td>
</tr>
<tr height="22">
<td colspan="2">
<table cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td width="55"></td>
<td width="310" style="font:ArialMT; font-family:Arial; line-height:1.54; text-align:left; color:#666666; font-size:14px">
<b><?=$cNombreCliente?></b></td>
<td width="5"></td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr height="16">
<td></td>
</tr>
<tr height="18">
<td>
<table cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td width="55"></td>
<td width="600" style="font:ArialMT; font-family:Arial; line-height:1.13; font-size:16px; text-align:left; color:#666666">
Tenemos una buena noticia, su pedido con identificador <?=$formato?> ya está en camino para entrega, si desea consultar los detalles del envío visite la paqueteria : <?=$cUrl?> e ingrese el código de rastreo  ingresando su código de rastreo: <?=$cCodigoRastreo?></td>
<td width="37"></td>
</tr>
</tbody>
</table>
</td>
</tr>

