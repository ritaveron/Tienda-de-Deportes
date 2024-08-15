<?php 
include 'global/config.php';
include 'global/conexion.php';
include 'carrito.php';
include 'template/cabecera.php';
?>
     <br>
        <div class="alert alert-success" role="alert">     
            <?php echo $mensaje; ?>
         <a href="#" class="badge badge-success">Ver carrito</a>
        </div>
        <div class="row">
          <?php 
          $sentencia=$pdo->prepare("SELECT * FROM productos");
          $sentencia->execute();//ejecuta la sentecia select
          $listaproducto=$sentencia->fetchAll(PDO::FETCH_ASSOC);
          //print_r($listaproducto);
          ?>

          <?php 
          foreach($listaproducto as $producto) {?>
           <div class="col-3">
              <div class="card">              
                 <img 
                 title="<?php echo $producto['nombre'];?>"alt="<?php echo $producto['nombre'];?> "class="card-img-top" src="<?php echo $producto['imagen'];?>"
                 data-toggle="popover"
                 data-trigger="hover"
                 data-content="<?php echo $producto['descripcion'];?>"
                 height="317px"
                 >
                                 
                  <div class="card-body">
                    <p><?php echo $producto['nombre'];?></p>
                    
                     <h5 class="card-title">$<?php echo $producto['precio'];?></h5>
                     <p class="card-text">Decripcion</p>

                     <form action="" method="post">

                      <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['id'],COD, KEY);?>">
                      <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['nombre'],COD, KEY);?>">
                      <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['precio'],COD, KEY);?>">
                      <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1,COD, KEY);?>">


                     <button class="btn btn-primary"name="btnAccion" value="Agregar" type="submit">Agregar al carrito</button>

                     </form>
                     
                    
                 
                    </div>
              </div>
            </div>
          <?php } ?>

            

        </div>    
    </div>
    <script>
      $(function () {
  $('[data-toggle="popover"]').popover()
})
    </script>
    <?php include 'template/pie.php'; ?>