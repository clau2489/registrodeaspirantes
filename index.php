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
        <div class="offset-md-2 col-md-8 p2" style="background-color: white">
          <div class="text-center mb-5">
            <img src="assets/img/mmpverde.png" width="300px">
          </div>          
          <div class="text-center">
            <h2>Registro Único de Aspirantes a Programas Habitacionales del Municipio de Marcos Paz</h2>
          </div>          
          <br>

          <div class="text-center">
            <h3>Formulario de Preinscripción</h3>
            <h4>Los datos aquí consignados revisten el carácter de declaración jurada</h4>
          </div>
          <br>

          <div style="font-size: 11px">
            <div class="alert alert-warning">
              <h6>Términos y condiciones:</h6> 
              <h6> La presente solicitud de pre-inscripcion al Registro Unico de Aspirantes Programas Habitacionales del Municipio de Marcos Paz, se encuentra normada por los requisitos solicitados en la Ordenanzas Municipales N°18/2004 y N°90/2014.-</h6>
              <hr>
              <h6>Descargar Ordenanzas Municipales desde aquí:</h6> 
              <a href="18-2004.pdf" target="_blank" class="bolder" style="font-size: 14px"><i class="fa fa-file-pdf-o"></i> Ordenanza Municipal N° 18/2004 </a>
              <br>              
              <a href="90-2014.pdf" target="_blank" class="bolder" style="font-size: 14px"><i class="fa fa-file-pdf-o"></i> Ordenanza Municipal N° 90/2014</a>                        
            </div>
            <hr>
            
            <h4>Los solicitantes deberán:</h4>  
            <div class="alert alert-success">
              <h6>No ser propietarios ni titular de documentos q acrediten titularidad de ningún inmueble</h6>           
            </div>
            <div class="alert alert-success">
              <h6> No ser ni haber sido adjudicatarios de unidades Habitacionales de programas oficiales de tierras o viviendas, salvo que su renuncia a ese beneficio este debidamente fundada.</h6>
            </div>
            <div class="alert alert-success">
              <h6> Tener domicilio en el distrito y haber residido en el en forma ininterrumpida los 5 últimos años</h6>           
            </div>
            <div class="alert alert-success">
              <h6> Permitir que personal municpal visite el domicilio declarado en el presente formulario para constatar la veracidad de los datos declarados</h6>           
            </div>
            <hr>

            <div class="text-center">
              <button class="btn btn-success" onclick="javascript:showContent()" > Acepto los terminos y condiciones </button>
            </div>

          </div>

          <br><br><br>

          <form action="procesar.php" method="post" id="content" style="display: none;">
            <div>
              
              <div class="alert alert-info">
                <p>Tilde esta opción si ya completó un formulario con anterioridad</p>
                <h4><input type="checkbox" name="no" id="no" onchange="javascript:showlegajo()"/> He realizado una inscripcion con anterioridad</h4>
                <br>                               
                <div class="form-group" id="legajo" style="display: none;">
                  <label>Por favor indique su Número de Legajo </label>
                  <input type="text" class="form-control" id="legajo" name="legajo">
                </div>                                
              </div>

              <div id="datospersonales">
                <br>
                <h4>Datos Personales del Solicitante:</h4>
                <br>
                <div class="form-group">
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
                  <label>Nacionalidad: </label>
                  <input type="text" class="form-control" id="nacionalidad" name="nacionalidad" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                </div>
                <div class="form-group">
                  <label>Estado Civil: </label>
                  <select class="form-control" id="estadocivil" name="estadocivil" required>
                    <option>Seleccione una opcion..</option>
                    <option value="SOLTERO">Soltero</option>
                    <option value="CASADO">Casado</option>
                    <option value="DIVORCIADO">Divorciado</option>
                    <option value="SEPARADO">Separado en proceso judicial</option>
                    <option value="VIUDO">Viudo</option>
                    <option value="CONCUBINATO">Concubinato</option>
                  </select>
                </div>                               
              </div>
              <hr>
              <div id="datosdecontacto">
                <br>
                <h4>Datos de Contacto:</h4>
                <br>                                          
                <div class="form-group">
                  <label>Celular de contacto: (Sin 0, 15 ni guiones) </label>
                  <input type="text" class="form-control" id="telefono" name="telefono" required>
                </div>
                <div class="form-group">
                  <label>Correo Electrónico:</label>
                  <input type="email" class="form-control" id="mail" name="mail" required>
                </div>                                 
              </div>
              <hr>
              <div id="datosdedomicilio">
                <br>
                <h4>Datos de Domicilio:</h4>
                <br>                           
                <div class="form-group">
                  <label>Calle: </label>
                  <input type="text" class="form-control" id="calle" name="calle" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
                </div>
                <div class="form-group">
                  <label>Altura: </label>
                  <input type="text" class="form-control" id="altura" name="altura" required>
                </div>
                <div class="form-group">
                  <label>Entre Calles: </label>
                  <input type="text" class="form-control" id="entrecalle1" name="entrecalle1" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required placeholder="Calle 1">
                  <input type="text" class="form-control" id="entrecalle2" name="entrecalle2" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required placeholder="Calle 2">
                </div>
                <div class="form-group">
                  <label>Barrio: </label>
                  <select class="form-control" id="barrio" name="barrio" required>
                    <option>Seleccionar..</option>
                    <?php
                    include("config/db.php");
                    include("config/conexion.php");
                    $id = $_GET['id'];
                    $consulta=mysqli_query($con,"select * from barrios order by nombre_barrio");
                    while($campo=mysqli_fetch_array($consulta)){
                      ?>                
                      <option value="<?php echo utf8_encode($campo[1])?>"><?php echo utf8_encode($campo[1])?></option>
                      <?php
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Localidad: </label>
                  <select class="form-control" id="localidad" name="localidad" required>
                    <option value="Marcos Paz">Marcos Paz</option>
                  </select>
                </div>                
              </div>
              <hr>
              <div id="datosdecontacto">
                <br>
                <h4>Situacion Social:</h4>
                <br>                                          
                <div class="form-group">
                  <label>Ocupación</label>
                  <select class="form-control" id="ocupacion" name="ocupacion" required>
                    <option value="RELACION DE DEPENDENCIA">Empleado en relacion de dependencia (Nacional, Provincial o Municipal)</option>
                    <option value="PRIVADO">Empleado Privado</option>
                    <option value="INDEPENDIENTE">Independiente</option>
                    <option value="JUBILADO/PENSIONADO">Jubilado/ Pensionado</option>
                    <option value="OTROS SIN ESPECIFICAR"> Otros sin especificar</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Vivienda Actual</label>
                  <select class="form-control" id="viviendaactual" name="viviendaactual" required>
                    <option value="ALQUILER">Alquiler</option>
                    <option value="COMODATO / PROP. FAMILIAR">Comodato / Vivienda propiedad de un familiar</option>
                    <option value="VIVIENDA PROPIA MATERIAL">Vivienda Propia Material</option>
                    <option value="VIVIENDA PROPIA CASILLA">Vivienda propia casilla</option>
                  </select>
                </div>                
                <div class="form-group">
                  <label>Ingreso Mensual Aprox:</label>
                  <input type="number" class="form-control" id="ingresomensual" name="ingresomensual" required>
                </div>                                 
              </div>

              <input type="submit" class="btn btn-success" value="Continuar al último paso" style="float: right;">

            </form>
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