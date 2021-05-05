
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

            <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

     <title>Test Aleide</title>
</head>

 <body>

    <style>
            *{
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            .login{
                text-align: center;
            }

            form{
                margin-top: 50px;
                margin-bottom: 50px;
                width: 90%;
                margin-left:auto;
                margin-right:auto;
                padding:50px;
                background: -moz-linear-gradient(-45deg, #ff7e00 0%, #a016f7 100%);
                background: -webkit-linear-gradient(-45deg, #ff7e00 0%, #a016f7 100%);
                background: linear-gradient(135deg, #ff7e00 0%, #a016f7 100%);
                filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff7e00', endColorstr='#a016f7', GradientType=1);
                border-radius:5px;
                position:relative;
                font-family: 'Libre Franklin', sans-serif;
            }

            h2{
                font-family: Arial, Helvetica, sans-serif;
            }

    </style>

<header>
        <?php
            include "components/header.php";
        ?>
</header>

        <?php  include "prendiDati.php" ?>


            <div class="col-md-4 offset-md-4">
           
                <form action="saveDati.php" method="post">
                    <h2 class="login">
                            Segnati qui 
                    </h2>
                   
                    
                   <div class="form-group">
                            <label for="nome">Nome completo</label>
                            <input type="text" name="nome" class="form-control" required>
                            <hr>
                            <label for="data">Data di nascita</label>
                            <input type="date" name="data" class="form-control" required>
                            <hr>
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" required>
                            <hr>
        <!--------------- seleziono regione -->
                          <p> 
                            <label for="regione">Regione:</label><br />
                            <select id="regione" name="regione">
                            <option value ="0">-Seleziona la Regione-</option>
                            <?php
                              while($row = mysqli_fetch_array($mostraRegione)){
                            ?>                    
                            <option value="<?php echo $row['id']; ?>">
                             <?php echo $row['regione']; ?></option>
                            <?php
                                }
                            ?>
                            </select>
                        </p>
        <!-- -------------------seleziono provincia -->
                           <p>
                            <label for="provincia">Provincia:</label><br />
                                <select id="provincia" name="provincia">
                                <option value="0">Seleziona la Provincia</option>
                             </select>
                            </p>
                             <!-- seleziono comune -->
                             <p>
                             <label for="comune">Citta:</label><br />
                                <select id="comune" name="comune">
                                <option value="0">Seleziona il Comune</option>
                             </select>
                             </p>      
                             
                               
                            <hr>
                            <input type="submit" name="submit" value="invia" class="btn btn-success">
                   </div>

                 </form>
            </div>      
                            <!-- Footer -->
    
                <?php
                        include "components/footer.php";
                ?>

    <script src="main.js"></script>

 </body>
</html>