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

<!-- Image and text -->
<nav class="navbar navbar-light bg-secondary" >
  <a class="navbar-brand" href="#">
    <img src="img/mmpblanco.png" width="50" height="30" class="d-inline-block align-top" alt="">
    Sistema de Administración
    
    <a class="btn btn-secondary btn-sm" href="logout.php" style="float: right;"><i class="fa fa-power-off"></i> Cerrar sesión</a>
  </a>
</nav>

  <div class="container-fluid mt-4">

  <section class="content-section" id="about">
    <div class="container">        
      
      <div class="row"> 
        <div class="offset-md-2 col-md-8 tarjeta">
          <div class="text">

            <h4>Datos del Aspirante: <a href="home.php" style="float: right;"> Volver</a></h4>

            <?php
            $documento = $_GET['id'];
            include("conexion/db.php");
            include("conexion/conexion.php");
            $query=mysqli_query($con,"select * from beneficiarios_vivienda where documento='$documento'");  
            while($rw=mysqli_fetch_array($query)) {  
              ?>
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $rw['apellido']; ?> <?php echo $rw['nombre']; ?></h5>
                  <h6 class="card-subtitle mb-2">DNI N°: <?php echo $rw['documento']; ?></h6>
                  <p class="card-text">Edad: <?php echo $rw['edad']; ?> años</p>
                  <p class="card-text">Nacionalidad: <?php echo $rw['nacionalidad']; ?></p>
                  <p class="card-text">Estado Civil:  <?php echo $rw['estadocivil']; ?></p>
                  <hr>
                  <p class="card-text">Correo Electronico: <?php echo $rw['mail']; ?></p>
                  <p class="card-text">Telefono: <?php echo $rw['telefono']; ?></p>
                  <hr>
                  <p class="card-text">Dirección: <?php echo $rw['calle']; ?> <?php echo $rw['altura']; ?></p>
                  <p class="card-text">Entre calles: : <?php echo $rw['entrecalle1']; ?> y <?php echo $rw['entrecalle2']; ?></p>
                  <p class="card-text">Barrio: <?php echo $rw['barrio']; ?></p>
                  <p class="card-text">Localidad: <?php echo $rw['localidad']; ?></p>
                  <hr>
                  <p class="card-text">Ocupación: <?php echo $rw['ocupacion']; ?></p>
                  <p class="card-text">Vivienda Actual: <?php echo $rw['vivienda_actual']; ?></p>
                  <p class="card-text">Ingreso Mensual Aprox: <?php echo $rw['ingreso_mensual']; ?></p>                  
                </div>
              </div>                             
              <?php
            }
            ?>

          </div>

          <hr>
          
          <div class="card">
            <div class="card-body">          
              <h5>Grupo Familiar: <!--<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal" style="float: right;"> Agregar familiar </button>--></h5>
              <br>
                <?php
                $documento = $_GET['id'];
                $query=mysqli_query($con,"select * from familiares_vivienda where documento_solicitante='$documento'");
                if (mysqli_num_rows($query) == 0) {
                  echo "<div class='alert alert-danger'> No tiene personas asignadas a su grupo familiar</div>";
                }
                while($rw=mysqli_fetch_array($query)) {  
                  ?>
                
                <div class="card" style="width: 100%;">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $rw['apellido']; ?> <?php echo $rw['nombre']; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $rw['parentesco']; ?></h6>
                    <hr>
                    <p class="card-text" style="padding: 0px; line-height: 2px;">DNI N°: <?php echo $rw['documento']; ?></p>
                    <p class="card-text" style="padding: 0px; line-height: 2px;">Fecha de Nacimiento :<?php echo $rw['fechadenacimiento']; ?></p>
                    <p class="card-text" style="padding: 0px; line-height: 2px;">Edad: <?php echo $rw['edad']; ?> años</p>
                    <!--<a href="#" class="card-link" style="color: red">Eliminar</a> -->
                  </div>
                </div>
                  <?php
                  }
                ?> 
              <br>
            </div>

          </div>
          <br>
        </div>
      </div>

    </section>




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


