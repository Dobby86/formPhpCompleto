<?php
   include "connDb.php";

    if(isset($_POST["submit"])){

        $nome = $_POST["nome"];      
        $data = $_POST["data"];
        $email = $_POST["email"];

        if(!preg_match("/^[-a-zA-Z0-9 .]*$/",$nome)) {
          
            exit("Only letters and white space allowed");
        }
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          
            exit("email format not valued");
        }

        $regione = $_POST["regione"];
        $provincia = $_POST["provincia"];
        $comune = $_POST["comune"];
        
        if(!empty($nome) && !empty($data) && !empty($email) && !empty($regione) && !empty($provincia) && !empty($comune)){

            //filtro nome

            $nomeFiltrato = mysqli_real_escape_string($connessioneDB, $nome);

             //converti-province

            $selNomeProv = mysqli_query($connessioneDB, 'SELECT provincia FROM province WHERE id = '. $provincia);

            $nomeProv = mysqli_fetch_row($selNomeProv)[0];
            $nomeProv = mysqli_real_escape_string($connessioneDB, $nomeProv );

            //converti-comuni
            $selNomeCom = mysqli_query($connessioneDB, 'SELECT comune FROM comuni WHERE id = '. $comune);

            $nomeCom = mysqli_fetch_row($selNomeCom)[0];
            $nomeCom = mysqli_real_escape_string($connessioneDB, $nomeCom );

            //converti-regioni

            $selNomeReg = mysqli_query($connessioneDB, 'SELECT regione FROM regioni WHERE id = '. $regione);

            $nomeReg = mysqli_fetch_row($selNomeReg)[0];
            $nomeReg = mysqli_real_escape_string($connessioneDB, $nomeReg );
            
            //salvataggio!!!
            $test = "INSERT INTO utenti(nome, data, email, regionestamp, provinciastamp, comunestamp) VALUES('$nomeFiltrato','$data', '$email', '$nomeReg', '$nomeProv', '$nomeCom')";

            //check e vai su Welcome

            $creaUtenti = mysqli_query($connessioneDB, $test);


                 
            if($creaUtenti){
                header('Location: welcome.php');
                
            }
   
         
        }

        mysqli_close($connessioneDB);
}



?>





