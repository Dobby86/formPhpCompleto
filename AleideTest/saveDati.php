<?php
   include "connDb.php";

    if(isset($_POST["submit"])){

        $nome = $_POST["nome"];
        $data = $_POST["data"];
        $email = $_POST["email"];

        if(!preg_match("/^[a-zA-Z-' ]*$/",$nome)) {
          
            exit("Only letters and white space allowed");
        }
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          
            exit("email format not valued");
        }

        $regione = $_POST["regione"];
        $provincia = $_POST["provincia"];
        $comune = $_POST["comune"];
        
        if(!empty($nome) && !empty($data) && !empty($email) && !empty($regione) && !empty($provincia) && !empty($comune)){

             //province

            $selNomeProv = mysqli_query($connessioneDB, 'SELECT provincia FROM province WHERE id = '. $provincia);

            $nomeProv = mysqli_fetch_row($selNomeProv)[0];
            $nomeProv = mysqli_real_escape_string($connessioneDB, $nomeProv );
            //comuni
            $selNomeCom = mysqli_query($connessioneDB, 'SELECT comune FROM comuni WHERE id = '. $comune);

            $nomeCom = mysqli_fetch_row($selNomeCom)[0];
            $nomeCom = mysqli_real_escape_string($connessioneDB, $nomeCom );

            //regioni

            $selNomeReg = mysqli_query($connessioneDB, 'SELECT regione FROM regioni WHERE id = '. $regione);

            $nomeReg = mysqli_fetch_row($selNomeReg)[0];
            $nomeReg = mysqli_real_escape_string($connessioneDB, $nomeReg );
            
            $test = "INSERT INTO utenti(nome, data, email, regionestamp, provinciastamp, comunestamp) VALUES('$nome','$data', '$email', '$nomeReg', '$nomeProv', '$nomeCom')";

            $creaUtenti = mysqli_query($connessioneDB, $test);


                 
            if($creaUtenti){
                header('Location: welcome.php');
                
            }
   
         
        }

        mysqli_close($connessioneDB);
}



?>





