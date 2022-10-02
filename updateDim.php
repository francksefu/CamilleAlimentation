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
            width: 100%;
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
        #modify {
             display: none;
        }
        #delet { 
            display: none;
        }
    </style>
    
<body>
    <?php 
        include 'connexion.php';
        $reqSql= ("SELECT `idDiminution`,`Nom`,`PrixVente`, `NewQuantity`, `HoldQuantity`, `Differenced`, `DatesD`,PU,Valeur  FROM Produit ,Dimiinution  WHERE Dimiinution.idProduit=Produit.idProduit order by DatesD desc ");
                $result= mysqli_query($db, $reqSql);
                if(mysqli_num_rows($result)>0){
                    $valeur=0;
                    echo"<table class='table table-striped'><tr><th>identifiant</th><th>Nom Produit</th><th>Nouvelle quantite</th><th>AncienneQuantite</th><th>Difference</th><th>Valeur</th><th>DatesD</th></tr>";
                    while($row= mysqli_fetch_assoc($result)){
                        $updQ= ("UPDATE `Dimiinution` SET `PU` = ".$row["PrixVente"]." WHERE `Dimiinution`.`idDiminution` = ".$row["idDiminution"]."");
                        if(mysqli_query($db,$updQ)){echo"";}else{
                            echo"Error : ".mysqli_error($db);
                        }

                        $upd= ("UPDATE `Dimiinution` SET `Valeur` = ".($row["PrixVente"]*$row["Differenced"])." WHERE `Dimiinution`.`idDiminution` = ".$row["idDiminution"]."");
                        if(mysqli_query($db,$upd)){echo"";}else{
                            echo"Error : ".mysqli_error($db);
                        }

                            $valeur=($row["PrixVente"]*$row["Differenced"]);
                            echo"<tr><td>".$row["idDiminution"]."</td><td>".$row["Nom"]."</td><td>".$row["NewQuantity"]."</td><td>".$row["HoldQuantity"]."</td><td>".$row["Differenced"]."</td><td>".$valeur."</td><td>".$row["DatesD"]."</td><td>".$row["PU"]."</td><td>".$row["Valeur"]."</td></tr>"; 
                    }
                    echo"</table>";
                }else{echo "Une erreur s est produite ";}

    ?>
</body>
</html>