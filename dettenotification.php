<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<link rel="stylesheet" href="formulaire.css" media="screen" type="text/css" />

    <link rel="stylesheet" href="bootstrap-4.0.0-dist/css/bootstrap-grid.css" media="screen" type="text/css" />
    <link rel="stylesheet" href="bootstrap-4.0.0-dist/css/bootstrap-grid.min.css" media="screen" type="text/css" />
    <link rel="stylesheet" href="bootstrap-4.0.0-dist/css/bootstrap-reboot.css" media="screen" type="text/css" />
    <link rel="stylesheet" href="bootstrap-4.0.0-dist/css/bootstrap-reboot.min.css" media="screen" type="text/css" />
    <link rel="stylesheet" href="bootstrap-4.0.0-dist/css/bootstrap.css" media="screen" type="text/css" />
    <link rel="stylesheet" href="bootstrap-4.0.0-dist/css/bootstrap.min.css" media="screen" type="text/css" />
    <script src="bootstrap-4.0.0-dist/js/bootstrap.bundle.js"></script>
    <script src="bootstrap-4.0.0-dist/js/bootstrap.bundle.min.js"></script>
    <script src="bootstrap-4.0.0-dist/js/bootstrap.bundle.js"></script>
    <script src="bootstrap-4.0.0-dist/js/bootstrap.js"></script>
    <script src="bootstrap-4.0.0-dist/js/bootstrap.min.js"></script>
    <style>
       button{
            display: block;
            color: #000;
            padding: 14px 8px;
            text-decoration: none;
            width: 30%;
            border: none;
            border-radius: 6px;
            font-size: 20px;
            border-radius: 20px;
            margin: 10px;

        }
        th{
            background-color: yellowgreen;
        }
        button:hover{
            background-color: #555;
            color: white;
            border-radius: 20px;
        }
   
        #nouvelPP  {
            display: none;
        }
        #modify, #ferme {
             display: none;
        }
        #delet { 
            display: none;
        }
        p {
            padding: 10px;
            font-family: Arial, Helvetica, sans-serif;
            border-radius: 10px;
            margin-bottom:10px;
            text-align: center;
            border: 1px solid black;
            width: 80%;
        }
    </style>
    
<body style="background: url(fond2.png) no-repeat center fixed; background-size:cover">
    <?php 
        include 'connexion.php';
        $reqSql= ("SELECT idDette,NomClient, ValeurDette, MontantPaye, Reste,il_pris_quoi, DatesD, DatesPaie, RetardDette FROM Client c,DetteClient d WHERE c.idClient=d.idClient order by DatesD desc");
        // current time in PHP
        $datetime = date("Y-m-d ");
        // print current time
        echo $datetime;
        echo "\n";
        //After using of strotime fuction then result 
        $yesterday = date("Y-m-d", strtotime("yesterday"));
        $oui = "Oui";
        echo $yesterday;

        $yesterday1 = date("Y-m-d", strtotime("-365 days"));

                $result= mysqli_query($db, $reqSql);
                if(mysqli_num_rows($result)>0){
                    //echo"<table class='table table-striped'><tr><th>identifiant</th><th>Nom Client</th><th>Valeur Dette</th><th>Montant PayE</th><th>Reste</th><th>il_pris_quoi</th><th>DatesD</th><th>DatesRNew</th></tr>";
                    while($row= mysqli_fetch_assoc($result)){
                            //echo"<tr><td>".$row["idDette"]."</td><td>".$row["NomClient"]."</td><td>".$row["ValeurDette"]."</td><td>".$row["MontantPaye"]."</td><td>".$row["Reste"]."</td><td>".$row["il_pris_quoi"]."</td><td>".$row["DatesD"]."</td><td>".$row["DatesRNew"]."</td></tr>"; 
                        if($row["RetardDette"] == "Oui"){
                            echo "";
                            if($row["RetardDette"] == "Depressie"){
                                $dep = "Depressie";
                                if(($yesterday1 >= $row["DatesPaie"]) && $row["DatesPaie"] != ""){
                                    $updQ1= ("UPDATE `DetteClient` SET `RetardDette` = '".$dep."' WHERE `DetteClient`.`idDette` = ".$row["idDette"]."");
                                    if(mysqli_query($db,$updQ1)){echo"";}else{
                                        echo"Error : ".mysqli_error($db);
                                    }
                                }
                            }
                        }else{
                            if(($row["DatesPaie"] < $yesterday) && $row["DatesPaie"] != ""){
                                $updQ= ("UPDATE `DetteClient` SET `RetardDette` = '".$oui."' WHERE `DetteClient`.`idDette` = ".$row["idDette"]."");
                                if(mysqli_query($db,$updQ)){echo"";}else{
                                    echo"Error : ".mysqli_error($db);
                                }
                            }
                            
                        }    
                        

                    }
                    //echo"</table>";
                }else{echo "Pas des donnees ";}
                $sommeValeur = 0;
                $reste = 0;
                $montant = 0;

                $reqSql1= ("SELECT idDette,NomClient, ValeurDette,DatesPaie, MontantPaye, Reste,il_pris_quoi, DatesD, DatesRNew, RetardDette  FROM Client c,DetteClient d WHERE( c.idClient=d.idClient) and((RetardDette = 'Oui') and (Reste != '0')) order by DatesD desc, idDette desc ");
                $result1= mysqli_query($db, $reqSql1);
                if(mysqli_num_rows($result1)>0){
                    //echo"<table class='table table-striped' style='width: 90%; margin-top : 5%; margin-left : 5%'><tr><th>identifiant</th><th>Nom Client</th><th>Valeur Dette</th><th>Montant PayE</th><th>Reste</th><th>il_pris_quoi</th><th>DatesD</th><th>DatesPaie</th><th>Retard Dette</th></tr>";
                    while($row1= mysqli_fetch_assoc($result1)){
                        $sommeValeur += $row1["ValeurDette"];
                        $reste += $row1["Reste"];
                        $montant += $row1["MontantPaye"];

                            //echo"<tr><td>".$row1["idDette"]."</td><td>".$row1["NomClient"]."</td><td>".$row1["ValeurDette"]."</td><td>".$row1["MontantPaye"]."</td><td>".$row1["Reste"]."</td><td>".$row1["il_pris_quoi"]."</td><td>".$row1["DatesD"]."</td><td>".$row1["DatesPaie"]."</td><td>".$row1["RetardDette"]."</td></tr>";
                    }
                    
                }else{echo "Une erreur s est produite ";}
                ?>
                <button class="btn btn-primary" onclick="document.getElementById('ferme').style.display='block'">Valeur des dettes non paie</button>
                <a href="detteClient.php"><button class="btn btn-primary">Retourner la page dette client</button></a>
                <div id="ferme">
                <?php
                echo "<p style='background: #ddd; margin-left:7%'> La valeur de dette en promesse de paie : ".$sommeValeur." Fc<br>";
                echo "Montant deja paie : ".$montant." Fc <br>";
                echo "reste : ".$reste." Fc <br></p>";
                echo "</div>";
                $reqSql2= ("SELECT idDette,NomClient, ValeurDette, MontantPaye, Reste,il_pris_quoi, DatesD, DatesPaie, RetardDette  FROM Client c,DetteClient d WHERE( c.idClient=d.idClient) and((RetardDette = 'Oui') and (Reste != '0')) order by DatesD desc, idDette desc ");
                $result2= mysqli_query($db, $reqSql2);
                if(mysqli_num_rows($result2)>0){
                    echo"<table class='table table-striped' style='background: #ddd;width: 90%; margin-top : 3%; margin-left : 5%'><tr><th>identifiant</th><th>Nom Client</th><th>Valeur Dette</th><th>Montant PayE</th><th>Reste</th><th>il_pris_quoi</th><th>DatesD</th><th>Dates de Paiement</th><th>Retard Dette</th></tr>";
                    while($row2= mysqli_fetch_assoc($result2)){
                        

                            echo"<tr><td>".$row2["idDette"]."</td><td>".$row2["NomClient"]."</td><td>".$row2["ValeurDette"]."</td><td>".$row2["MontantPaye"]."</td><td>".$row2["Reste"]."</td><td>".$row2["il_pris_quoi"]."</td><td>".$row2["DatesD"]."</td><td>".$row2["DatesPaie"]."</td><td>".$row2["RetardDette"]."</td></tr>";
                    }
                    echo"</table>";
                }else{echo "Pas de donnees ";}

    ?>
</body>
</html>