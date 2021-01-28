<?php
require_once("clsBienes.php");

$objBienes = new clsBienes();

$arrBienes = $objBienes->read();
$arrCity = $objBienes->readCity();
$arrTipo = $objBienes->readTipo();

$idGuardar = NULL;

$txtDireccion = NULL;
$txtCiudad = NULL;
$txtTelefono = NULL;
$txtCodigoPostal = NULL;
$txtTipo = NULL;
$txtPrecio = NULL;


if (!empty($_GET['id'])) {

    $idGuardar = $_GET['id'];

    $arrReistro = $objBienes->consulta_uno($idGuardar);

    $txtDireccion = $arrReistro['direccion'];
    $txtCiudad = $arrReistro['ciudad'];
    $txtTelefono = $arrReistro['telefono'];
    $txtCodigoPostal = $arrReistro['codigo_postal'];
    $txtTipo = $arrReistro['tipo'];
    $txtPrecio = $arrReistro['precio'];
}

$data = file_get_contents("data-1.json");
$arrBienesJson = json_decode($data, true);
/*foreach ($arrBienesJson as $rowBienes)  {
  echo '<pre>';
  print_r($rowBienes['Direccion']);
  echo '</pre>';
}*/
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/customColors.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/ion.rangeSlider.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/index.css"  media="screen,projection"/>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Formulario</title>
</head>

<body>
  <video src="img/video.mp4" id="vidFondo"></video>

  <div class="contenedor">
    <div class="card rowTitulo">
      <h1>Bienes Intelcost</h1>
    </div>
    <div class="colFiltros">
      <form action="#" method="post" id="formulario">
        <div class="filtrosContenido">
          <div class="tituloFiltros">
            <h5>Filtros</h5>
          </div>
          <div class="filtroCiudad input-field">
            <p><label for="selectCiudad">Ciudad:</label><br></p>            
            <select name="ciudad" id="selectCiudad">
              <option value="" selected>Elige una ciudad</option>
                <?php foreach($arrCity as $rowValue){ ?>
                  <option value="<?php echo $rowValue['id'];?>"><?php echo $rowValue['nombre']; ?></option> 
                <?php } ?>
            </select>
          </div>
          <div class="filtroTipo input-field">
            <p><label for="selecTipo">Tipo:</label></p>
            <br>
            <select name="tipo" id="selectTipo">
              <option value="">Elige un tipo</option>
                <?php foreach($arrTipo as $rowValue){ ?>
                  <option value="<?php echo $rowValue['id'];?>"><?php echo $rowValue['nombre']; ?></option> 
                <?php } ?>
            </select>
          </div>
          <div class="filtroPrecio">
            <label for="rangoPrecio">Precio:</label>
            <input type="text" id="rangoPrecio" name="precio" value="" />
          </div>
          <div class="botonField">
            <input type="submit" class="btn white" value="Buscar" id="submitButton">
          </div>
        </div>
      </form>
    </div>
    <div id="tabs" style="width: 75%;">
      <ul>
        <li><a href="#tabs-1">Bienes disponibles</a></li>
        <li><a href="#tabs-2">Mis bienes</a></li>
      </ul>
      <div id="tabs-1">
        <div class="colContenido" id="divResultadosBusqueda">
          <div class="tituloContenido card" style="justify-content: center;">
            <h5>Resultados de la búsqueda:</h5>
            <div class="divider"></div>
            <form action="acciones_bienes.php" method="POST" >   
            <table>     
                  <?php foreach ($arrBienesJson as $rowBienes) {?>                                         
                  <tr>
                    <td class="trImg"><img src="img/home.jpg" alt="Comprar propiedad" class="casaVenta"/></td>                                   
                      <?php    
                          echo "<td>";
                              echo "<input type='hidden' name='idRegistro' value=" . $rowBienes['Id'] . ">";
                              echo "<input type='hidden' name='txtDireccion' value=" .  htmlspecialchars($rowBienes['Direccion']) . ">";
                              echo "<input type='hidden' name='txtCiudad' value=" . htmlspecialchars($rowBienes['Ciudad']) . ">";
                              echo "<input type='hidden' name='txtTelefono' value=" . htmlspecialchars($rowBienes['Telefono']) . ">";
                              echo "<input type='hidden' name='txtCodigoPostal' value=" . htmlspecialchars($rowBienes['Codigo_Postal']) . ">";
                              echo "<input type='hidden' name='txtTipo' value=" . htmlspecialchars($rowBienes['Tipo']) . ">";
                              echo "<input type='hidden' name='txtPrecio' value=" . htmlspecialchars($rowBienes['Precio']) . ">";

                              echo "<p><b>Dirección:</b>" . $rowBienes['Direccion'] . "</p>";
                              echo "<p><b>Ciudad:</b>" . $rowBienes['Ciudad'] . "</p>";
                              echo "<p><b>Teléfono:</b>" . $rowBienes['Telefono'] . "</p>";
                              echo "<p><b>Código postal:</b>" . $rowBienes['Codigo_Postal'] . "</p>";
                              echo "<p><b>Tipo:</b>" . $rowBienes['Tipo'] . "</p>";
                              echo "<p><b>Precio:</b>" . $rowBienes['Precio'] . "</p>";    
                              echo "<input class='btnGuardar btn' type='submit' name='accion' id='crear' value='Guardar' /> ";                                                              
                          echo "</td>";                    
                      ?> 
                  </tr>
                  <?php } ?>
                </table> 
              </form>        
          </div>
        </div>
      </div>
      
      <div id="tabs-2" >
        <div class="colContenido" id="divResultadosBusqueda">
          <div class="tituloContenido card" style="justify-content: center;">
            <h5>Bienes guardados:</h5>
            <div class="divider"></div>                    
                <table>     
                  <?php foreach ($arrBienes as $rowBienes) {?>                                         
                  <tr>
                  <td class="trImg"><img src="img/home.jpg" alt="Comprar propiedad" class="casaVenta"/></td>                  
                      <?php    
                          echo "<td>";
                              echo "<p><b>Dirección:</b>" . $rowBienes['direccion'] . "</p>";
                              echo "<p><b>Ciudad:</b>" . $rowBienes['ciudad'] . "</p>";
                              echo "<p><b>Teléfono:</b>" . $rowBienes['telefono'] . "</p>";
                              echo "<p><b>Código postal:</b>" . $rowBienes['codigo_postal'] . "</p>";
                              echo "<p><b>Tipo:</b>" . $rowBienes['tipo'] . "</p>";
                              echo "<p><b>Precio:</b>" . $rowBienes['precio'] . "</p>";                            
                          echo "</td>";                    
                      ?>
                  </tr>
                  <?php } ?>
                </table>              
          </div>
        </div>
      </div>
    </div>


    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    
    <script type="text/javascript" src="js/ion.rangeSlider.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
    <script type="text/javascript" src="js/buscador.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">
      $( document ).ready(function() {
          $( "#tabs" ).tabs();
      });
    </script>
  </body>
  </html>
