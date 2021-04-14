<?php

include "connDb.php";

$query = 'SELECT * FROM regioni ORDER BY regione';

$mostraRegione = mysqli_query($connessioneDB, $query);



if(isset($_POST["action"]) && $_POST["action"] == "getProvince" ){

    $idRegione = $_POST["regione"];

    $query = 'SELECT * FROM province WHERE id_regione = '. $idRegione;
    
    $mostraProvince = mysqli_query($connessioneDB, $query);

    $options = '<option value="0">Seleziona la Provincia</option>';
    
    while($row = mysqli_fetch_array($mostraProvince))
    {
        $options .='<option value=" '.$row['id'].'"> '.$row['provincia'].'</option>';          
    }
    echo $options;
}

if(isset($_POST["action"]) && $_POST["action"] == "getComuni" ){

    $idProvincia = $_POST["provincia"];
    
    $query = 'SELECT * FROM comuni WHERE id_provincia = '. $idProvincia;
    
    $mostraComuni = mysqli_query($connessioneDB, $query);
    
    $options = '<option value="0">Seleziona il Comune</option>';
    
    while($row = mysqli_fetch_array($mostraComuni))
    {
        $options .='<option value=" '.$row['id'].'"> '.$row['comune'].'</option>';          
    }

    echo $options;


}

mysqli_close($connessioneDB);