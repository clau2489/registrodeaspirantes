<!DOCTYPE html>
<html lang="en">

<!-- Head --> 
<?php include("layout/head.php"); ?>
<style type="text/css">
  html{
    background-color: #e6e6e6;
  }
  body{
    background-color: #e6e6e6;
  }
</style>

<?php include("layout/nav.php"); ?>

<body id="page-top">

  <!-- Header 
  <header class="masthead d-flex">
    <div class="container text-center my-auto">
      <img src="assets/img/mmpverde.png" width="300px">
      <h1 class="mb-1">Compro en mi Pueblo</h1>
      <h3 class="mb-5">
        <em style="color: white;">Una forma diferente de comprar</em>
      </h3>
      <a class="btn btn-success btn-sm js-scroll-trigger" href="#about">Accedé al programa</a>
    </div>
    <div class="overlay"></div>
  </header>
  
  <div class="row-fluid bg-black">
    <a href="administrator" style="color: white; padding-left: 20px"><i class="fa fa-sign-in" style="color: white"></i> Acceso a usuarios Registrados</a>
  </div>  --> 


  <!-- About -->
  <section class="content-section" id="about">
    <div class="container">        
      
      <div class="row"> 
        <div class="offset-md-2 col-md-8" style="background-color: white">          
          <div class="text-center mb-5">
            <img src="assets/img/mmpverde.png" width="250px">
          </div>
          <div class="alert alert-primary">
            <h5>Usted está por finalizar su preinscripción al Registro Único de Aspirantes a Programas Habitacionales del Municipio de Marcos Paz. <br> Por favor, agregue personas a su grupo familiar según corresponda</h5>
          </div>
          <div class="text">

            <?php
            $documento = $_GET['id'];
            include("config/db.php");
            include("config/conexion.php");
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
              <h5>Grupo Familiar: <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal" style="float: right;"> Agregar familiar </button></h5>
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
                    <a href="#" class="card-link" style="color: red">Eliminar</a>
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

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <form action="agregarfamiliar.php" method="post">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Familiar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <?php
                $documento = $_GET['id'];
                ?>
                <div class="form-group">
                  <input type="hidden" value="<?php echo $documento ?>" name="documento_solicitante" id="documento_solicitante" >
                  <label>Apellido: </label>
                  <input type="text" class="form-control" id="apellido" name="apellido" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                </div>
                <div class="form-group">
                  <label>Nombre: </label>
                  <input type="text" class="form-control" id="nombre" name="nombre" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                </div>
                <div class="form-group">
                  <label>Nº de Documento: </label>
                  <input type="number" class="form-control" id="documento" name="documento" required maxlength="8">
                </div>
                <div class="form-group">
                  <label>Edad: </label>
                  <input type="number" class="form-control" id="edad" name="edad" required>
                </div>
                <div class="form-group">
                  <label>Fecha de Nacimiento: </label>
                  <input type="date" class="form-control" id="fechadenacimiento" name="fechadenacimiento" required>
                </div>
                <div class="form-group">
                  <label>Parentesco: </label>
                  <input type="text" class="form-control" id="parentesco" name="parentesco" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"  required>
                </div>                                                                

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <input type="submit" class="btn btn-primary" value="Agregar Familiar" />
              </div>
            </form>
          </div>
        </div>
      </div>
      
      <div class="row">
        <div class="container">
          <div class="offset-md-2 col-md-8">
            <form action="enviarmail.php" method="post">
              <?php
              $documento = $_GET['id'];
              ?>            
              <input type="hidden" value="<?php echo $documento; ?>" name="documento" id="documento">
              <input type="submit" class="btn btn-primary btn-block mt-5" value="Finalizar Trámite"  onclick="alert('Al finalizar el trámite, los datos ingresados no podrán ser modificados. ¿Esta seguro que desea continuar? ')">
            </form>
            <br><br><br>
          </div>        
        </div>
      </div>

    </section>

    <?php include("layout/footer.php"); ?>

    <?php include("layout/script.php"); ?>

    <script type="text/javascript">
      function showContent() {
        content.style.display='block';
      }
    </script>  

    <script type="text/javascript">
      function showlegajo() {
        legajo = document.getElementById("legajo");
        no = document.getElementById("no");
        if (no.checked) {
          legajo.style.display='block';
        }
        else {
          legajo.style.display='none';
        }
      }
    </script> 

  </body>

  </html>