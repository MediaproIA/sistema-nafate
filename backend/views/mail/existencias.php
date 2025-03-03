
<h3>Hola, el dia <?=$FechaLetras?> se detecto que los siguientes productos tienes una existencia menor a <?=$iExistencias?></h3>


                                 <table style="width: 100%">
                                    <thead>
                                      <tr>
                                        <th>Imagen</th>
                                        <th>Producto</th>
                                        <th>Cantidad Disponible</th>
                                                                           
                                      </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($ListaProductos as $producto) { 
                                          $url=$producto['iIdProducto'].'.'.$producto['cExtencion'];
                                        ?>
                                      <tr>
                                        <td><img src="https://www.owlwalk.com/backend/web/imagenes/big/<?=$url?>" width="150px"></td>
                                        <td style="text-align: center"><?=$producto['cSku'] ?></td>
                                        <td style="text-align: center"><?=$producto['iExistencias'] ?></td>
                                         </tr>
                                        <?php  }
                                        
                                        
                                        ?>                                 
                                    </tbody>
                                   
                                  </table>
</div

						<!-- /Callout Panel -->		