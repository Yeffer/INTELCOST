<?php
if ( ! empty($_REQUEST['accion'])) {
  $strAccion = $_REQUEST['accion'];
}

if ( ! empty($_POST['txtDireccion'])) {
  $txtDireccion = $_POST['txtDireccion'];
}

#Validamos para obtener el id de las ciudades
if ( ! empty($_POST['txtCiudad'])){
  $txtCiudad = $_POST['txtCiudad'];
  if($txtCiudad == 'New York'){
    $idCiudad = 1;
  }
  if($txtCiudad == 'Orlando'){
    $idCiudad = 2;
  }
  if($txtCiudad == 'Los Angeles'){
    $idCiudad = 3;
  }
  if($txtCiudad == 'Houston'){
    $idCiudad = 4;
  }
  if($txtCiudad == 'Washington'){
    $idCiudad = 5;
  }
  if($txtCiudad == 'Miami'){
    $idCiudad = 6;
  }
}

if ( ! empty($_POST['txtTelefono'])) {
  $txtTelefono = $_POST['txtTelefono'];
}

if ( ! empty($_POST['txtCodigoPostal'])){
  $txtCodigoPostal = $_POST['txtCodigoPostal'];
}

#Validamos para obtener el id de los tipos
if ( ! empty($_POST['txtTipo'])){
  $txtTipo = $_POST['txtTipo'];
  if($txtTipo == 'Casa'){
    $idTipo = 1;
  }
  if($txtTipo == 'Casa de Campo'){
    $idTipo = 2;
  }
  if($txtTipo == 'Apartamento'){
    $idTipo = 3;
  }
}
#Validamos y limpiamos los caracteres especiales
if ( ! empty($_POST['txtPrecio'])){
  $txtPrecio = $_POST['txtPrecio'];
  $caracter = array ("$",",");
  $txtPrecio = str_replace($caracter,"",$txtPrecio );
}

if ( ! empty($_POST['idRegistro'])) {
  $idRegistro = $_POST['idRegistro'];
}

require_once ("clsBienes.php");
$objBienes = new clsBienes();

switch ($strAccion) {
  case "Guardar":
    $objBienes->create($txtDireccion, $idCiudad,$txtTelefono,$txtCodigoPostal,$idTipo,$txtPrecio);            
    break;

  case "eliminar":    
    $idRegistro = $_GET['id'];    
    $objBienes->delete($idRegistro);
    break;
}

header("Location: index.php");
