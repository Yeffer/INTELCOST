<?php
#Hacer llamado de la coneccion a la base de datos
require_once("database.php");
connect_db();

#Clase CRUD 
class clsBienes
{

  function create($txtDireccion, $idCiudad,$txtTelefono,$txtCodigoPostal,$idTipo,$txtPrecio)
  {    
    $strSQL = " INSERT INTO `intelcost_bienes`.`bienes` (`direccion`, `id_ciudad`,`telefono`,`codigo_postal`,`id_tipo`,`precio`)
               VALUES ('$txtDireccion', '$idCiudad', '$txtTelefono', '$txtCodigoPostal', '$idTipo', '$txtPrecio')";
    consultar_db($strSQL);    
  }
  
  #Cargamos todos los datos
  function read()
  {
    $strSQL = "SELECT B.id, B.direccion, C.nombre AS ciudad, B.telefono, B.codigo_postal, T.nombre AS tipo, B.precio 
                FROM bienes AS B
                INNER JOIN ciudades AS C ON B.id_ciudad = C.id
                INNER JOIN tipo AS T ON B.id_tipo = T.id";
    $arrDatos = consultar_db($strSQL);
    return $arrDatos;
  }
  
  #Cargamos todas las ciudades
  function readCity()
  {
    $strSQL = "SELECT id, nombre FROM ciudades";
    $arrDatos = consultar_db($strSQL);
    return $arrDatos;
  }
  
  #Cargamos todos los tipos
  function readTipo()
  {
    $strSQL = "SELECT id, nombre FROM tipo";
    $arrDatos = consultar_db($strSQL);
    return $arrDatos;
  }
  
  #Eliminar registro de la tabla bienes
  function delete($id)
  {
    $strSQL = "DELETE FROM bienes WHERE id = $id ";
    consultar_db($strSQL);
  }
  
  function consulta_uno( $id )
  {
    
    $strSQL = "SELECT * FROM bienes WHERE id = $id";
    $arrDatos = consultar_db($strSQL);
    
    $arrRegisto = array_shift($arrDatos);
    
    return $arrRegisto;    
  }
}