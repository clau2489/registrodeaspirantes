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

    <!-- Titulo -->
    <div class="row">
      <div class="col-md-6">
        <h5 style="color: white;"><i class="fa fa-book" style="font-size: 20px;"></i>  Nuevo Artículo </h5>
      </div>
      <div class="col-md-6">
      </div>       
    </div>
    <hr class="bg-white">


    <!-- Panel de botones -->
    <div class="row">
      <div class="col-md-6">
      </div>
      <div class="col-md-6 text-right">       
        <a class="btn btn-info btn-sm" href="home.php" ><i class="fa fa-arrow-left"></i> Volver</a>
        <a class="btn btn-warning btn-sm" href="logout.php"><i class="fa fa-power-off"></i> Cerrar sesión</a>  
      </div>
        <form action="procesos/process.php" method="post" target="_blank" id="formExport">
          <input type="hidden" id="data_to_send" name="data_to_send" />
        </form>          
    </div>

    <div class="row mt-2">
      <div class="col-md-6 offset-md-3 p-2">
        <div class="formulario">
          <h5>Ingreso de Nuevo Comercio</h5>
          <hr>
          <br>      
          <form action="procesos/agregar.php" method="post">

            <div class="form-row">
              <label>Rubro:</label> 
              <select class="form-control" name="dato_uno" id="dato_uno" required>
                <?php
                require 'conexion/db.php';
                require 'conexion/conexion.php';                
                //select con rubro
                $query_rubro=mysqli_query($conn,"select * from comercios_rubro");
                while($rubro=mysqli_fetch_array($query_rubro))
                {
                ?>                
                <option name="dato_uno" id="dato_uno" value="<?php echo ($rubro['id_rubro']); ?>" selected><?php echo utf8_encode($rubro['tipo']); ?></option>          
                <?php
                }
                ?>
              </select>      
            </div>


            <div class="form-row">
                <label>Titular</label>
                <input type="text" class="form-control" id="dato_dos" name="dato_dos" placeholder="Nombre del titular"  onkeyup="javascript:this.value=this.value.toUpperCase();" required>
            </div>

            <div class="form-row">
                <label>DNI</label>
                <input type="number" class="form-control" id="dato_tres" name="dato_tres" placeholder="Documento" required>
            </div>

            <div class="form-row">
                <label>Nombre de Fantasia</label>
                <input type="text" class="form-control" id="dato_cuatro" name="dato_cuatro" placeholder="Nombre de fantasia" required onkeyup="javascript:this.value=this.value.toUpperCase();">
            </div>

            <div class="form-row">
                <label>Dirección</label>
                <input type="text" class="form-control" id="dato_cinco" name="dato_cinco" placeholder="Dirección" required onkeyup="javascript:this.value=this.value.toUpperCase();">
            </div>

            <div class="form-row">
                <label>Barrio</label>
                <input type="text" class="form-control" id="dato_seis" name="dato_seis" placeholder="Barrio" required onkeyup="javascript:this.value=this.value.toUpperCase();">
            </div>

            <div class="form-row">
                <label>Whatsapp</label>
                <input type="number" class="form-control" id="dato_siete" name="dato_siete" placeholder="" >
            </div>

            <div class="form-row">
                <label>Teléfono de Línea</label>
                <input type="number" class="form-control" id="dato_ocho" name="dato_ocho" placeholder="">
            </div>

            <div class="form-row">
                <label>Correo Electrónico</label>
                <input type="email" class="form-control" id="dato_nueve" name="dato_nueve" placeholder="correo@correo">
            </div>

            <div class="form-row">
                <label>Direccion Web</label>
                <input type="text" class="form-control" id="dato_diez" name="dato_diez" placeholder="Dirección de Facebook,Instagram Sitio Web">
            </div>

            <div class="form-row">
                <label>Horario</label>
                <input type="text" class="form-control" id="dato_once" name="dato_once" placeholder="Horario" required onkeyup="javascript:this.value=this.value.toUpperCase();">
            </div>

            <br>
            <div class="form-row">
              <button type="submit" class="btn btn-success btn-block">Ingresar Comercio</button>
            </div>            
          </form>          
        </div>

      </div>           
    </div>

  </div>
  <?php include 'footer.php';?>
</body>
<script type="text/javascript">

function sumar() {
  var precio = document.getElementById("dato_tres").value;
  var porcentaje = document.getElementById("dato_cuatro").value;
  var ganancia = precio * porcentaje / 100;
  var total = parseFloat(precio) + parseFloat(ganancia);
  document.getElementById('dato_cinco').value = ganancia;
  document.getElementById('dato_seis').value = total;
}


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

