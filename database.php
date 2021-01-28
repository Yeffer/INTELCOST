<?php

function connect_db() {

    $strHost = "localhost";
    $strUser = "root";
    $strPassword = "";
    $strDBName = "intelcost_bienes";

    $resLink = @mysqli_connect($strHost, $strUser, $strPassword);
    if ($resLink === FALSE) {
        die("Error de conexion a la DB. ");
    }

    $bolResult = @mysqli_select_db($strDBName);
    if ($bolResult === FALSE) {
        die("Error la DB no existe! " . $strDBName);
    }
}

function consultar_db($strSQL) {

    $mysqli = new mysqli("localhost","root","","intelcost_bienes");
    $resQuery = mysqli_query($mysqli, $strSQL);    
    
    if ($resQuery === FALSE) {
        die("No se pudo ejecutar la consulta en la base de datos: " . mysqli_error($mysqli));        
    }
    
    if ($resQuery === TRUE) {        
        return TRUE;
    }    

    $arrTodos = array();    
    while ($arrFila = @mysqli_fetch_assoc($resQuery)) {
        $arrTodos[] = $arrFila;
    }

    return $arrTodos;
    
}
