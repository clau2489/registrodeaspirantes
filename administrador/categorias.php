<!DOCTYPE html>
<?php
session_start();
if (empty($_SESSION["usuario"])) {
    header("Location: index.php");
    exit();
}?>

<html lang="es">
<?php include 'header.php';?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.quicksearch/2.2.1/jquery.quicksearch.js"></script>

<body>  
  <div class="container-fluid mt-4">
    <div class="row">
      <div class="col-md-6">
        <h5 style="color: black;"><i class="fa fa-book" style="font-size: 20px;"></i>  Administrador </h5>
      </div>
      <div class="col-md-6">
      </div>       
    </div>
    <hr class="bg-white">
    <!-- Panel de botones -->
    <div class="row">
      <div class="col-md-6">
        <input type="text" id="search" class="form-control form-control-sm" placeholder="Escribe para buscar..." />
      </div>
      <div class="col-md-6 text-right">
        <a href="categorias.php" class="btn btn-secondary btn-sm"><i class="fa fa-plus-circle"></i> Categorías</a>           
        <a href="nuevo.php" class="btn btn-primary btn-sm"><i class="fa fa-plus-circle"></i> Nuevo Comercio</a>                      
        <a class="btn btn-warning btn-sm" href="logout.php"><i class="fa fa-power-off"></i> Cerrar sesión</a>  
      </div>
        <form action="procesos/process.php" method="post" target="_blank" id="formExport">
          <input type="hidden" id="data_to_send" name="data_to_send" />
        </form>          
    </div>
    <br>

    <div class="row mt-2">
      <div class="col-md-12 p-2">
        <div class="table-responsive">
          <table class="table table-bordered table-hover table-sm bg-light" id="table">
            <thead class="bg-success text-white">
                <tr>
                  <th>Titular</th>
                  <th>DNI </th>
                  <th>Nombre de Fantasia </th>
                  <th>Direccion </th>
                  <th>Barrio </th>
                  <th>Whatsapp </th>
                  <th>Telefono </th>
                  <th>Email </th>
                  <th>Dir. Web </th>
                  <th>Horario </th>                  
                  <th style="width: 2%"></th>
                  <th style="width: 2%"></th>
                </tr>
              </thead>
                  <?php
                  require_once ("conexion/db.php");
                  require_once ("conexion/conexion.php");
                  $query_ped=mysqli_query($conn,"select * from comercios_rubros");  
                  while($rw=mysqli_fetch_array($query_ped)) {  
                  ?>                
              <tbody>
                <tr>
                    <td><?php echo $rw['titular']; ?></td>
                    <td><?php echo $rw['dni']; ?></td>
                    <td><?php echo $rw['nombre_fantasia']; ?></td>
                    <td><?php echo $rw['direccion']; ?></td>
                    <td><?php echo $rw['barrio']; ?></td>
                    <td><?php echo $rw['whatsapp']; ?></td>
                    <td><?php echo $rw['tel_linea']; ?></td>
                    <td><?php echo $rw['email']; ?></td>
                    <td><?php echo $rw['web']; ?></td>
                    <td><?php echo $rw['horario']; ?></td>
                    <td>
                      <a class="btn btn-success btn-small btn-sm" href="modificar.php?id=<?php echo $rw['id_comercio']; ?>" title="Modificar"><i class="fa fa-pencil"></i></a>
                    </td>
                    <td>
                      <a class="btn btn-danger btn-small btn-sm" href="procesos/borrar.php?id=<?php echo $rw['id_comercio']; ?>" onclick="return confirm('Pulce ACEPTAR para confirmar la eliminacion o CANCELAR la eliminacion');" title="Eliminar"><i class="fa fa-trash"></i></a>
                    </td>                      
                  <?php
                  }
                  ?>
                </tr>
              </tbody>
              <iframe id="txtArea1" style="display:none"></iframe>
          </table>
        </div>


      </div>      
    </div>
  </div>
  <?php include 'footer.php';?>
</body>
<script type="text/javascript">


// script de reemplazo de punto por coma
function Remplaza(entry) {
  out = "."; // reemplazar el .
  add = ","; // por ,
  temp = "" + entry;
  while (temp.indexOf(out)>-1) {
  pos= temp.indexOf(out);
  temp = "" + (temp.substring(0, pos) + add + 
  temp.substring((pos + out.length), temp.length));
  }
  document.subform.texto.value = temp;
}


// script de busqueda rapida en tabla
$("#search").keyup(function(){
    _this = this;
    // Muestra los tr que concuerdan con la busqueda, y oculta los demás.
    $.each($("#table tbody tr"), function() {
        if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
           $(this).hide();
        else
           $(this).show();                
    });
});

document.getElementById('submitExport').addEventListener('click', function(e) {
    e.preventDefault();
    let export_to_excel = document.getElementById('table');
    let data_to_send = document.getElementById('data_to_send');
    data_to_send.value = export_to_excel.outerHTML;
    document.getElementById('formExport').submit();
});


</script> 
</html>

