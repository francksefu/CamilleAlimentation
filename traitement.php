<!DOCTYPE >
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="formuTab1.css" media="screen" type="text/css"/>
   

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
        
        .topnav a:hover {
    background-color: #ddd;
    color: black;
    border-radius: 50%;
}
        #total  {
            display: none;
        }
        #depense,#depense1,#depense2 {
             display: none;
        }
        #dette { 
            display: none;
        }
        th{
            background-color: yellowgreen;
        }
        
    </style>
    
</head>
<body style="background: url(imageAlim2.png) no-repeat center fixed; background-size:cover">
<div  class="header" style="background-color: transparent;">
        <h1 style="text-shadow: 3px 3px 5px white;color: #fff;">Suivie d' entreprise</h1>
</div>

<div class="topnav">
    <a href="accueilEntreprise.php">Accueil</a>
    <a href="produitb.php" >Produit</a>
    <a href="bonusPerte.php" >Bonus et Perte</a>
    <a href="sortie.php">Sortie</a>
    <a href="diminution.php" >Diminution</a>
    <a href="Client.php">Client</a>
    <a href="detteClient.php" >Dettes clients</a>
    <a href="detteEntreprise.php">Dette Entreprise</a>
    <a href="etats.php" >Les Etats</a>
    <a href="caisse.php" >Caisse</a>
</div>

   


<div class="row">
    
    <div class="column2">
    <div class="tableau" style="background-color:#ddd;">
        
            
            <?php
                include 'connexion.php';
                
                function verifions($data){
                    $data=htmlspecialchars($data);
                    return $data;
                }
                echo"<div id='total'>";
                $dim1=verifions($_POST["Diminution1"]);
                $sort1=verifions($_POST["Sortie1"]);
                $detteE1=verifions($_POST["DetteEntreprise1"]);
                $detteC1=verifions($_POST["DetteClient1"]);
                $envoi=verifions($_POST["Envoie"]);

                $dim21=verifions($_POST["Diminution21"]);
                $sort21=verifions($_POST["Sortie21"]);
                $detteE21=verifions($_POST["DetteEntreprise21"]);
                $detteC21=verifions($_POST["DetteClient21"]);
                
                $dim22=verifions($_POST["Diminution22"]);
                $sort22=verifions($_POST["Sortie22"]);
                $detteE22=verifions($_POST["DetteEntreprise22"]);
                $detteC22=verifions($_POST["DetteClient22"]);
                echo"</div>";

                if($envoi=="dim1"){        
                    $reqSql= ("SELECT idDiminution,`Nom`,`PrixVente`,`PrixAchat`, `NewQuantity`, `HoldQuantity`,`QuantiteStock`, `Differenced`, `DatesD`  FROM Produit ,Dimiinution  WHERE (Dimiinution.idProduit=Produit.idProduit)AND Dimiinution.DatesD='".$dim1."'");
                    $result= mysqli_query($db, $reqSql);
                    $valeur=0;$sommePVT=0;$sommeBenefice=0;$benefice=0;
                    if(mysqli_num_rows($result)>0){
                        
                        echo"<table class = 'table table-striped' ><tr><th>Identifiant</th><th>Nom Produit</th><th>PrixVente</th><th>PrixAchat</th><th>Nouvelle quantite</th><th>AncienneQuantite</th><th>QuantiteStock</th><th>Difference</th><th>PrixVenteTotal</th><th>Benefice</th><th>DatesD</th></tr>";
                        while($row= mysqli_fetch_assoc($result)){
                                $valeur=($row["PrixVente"]*$row["Differenced"]);
                                $benefice=($valeur-($row["PrixAchat"]*$row["Differenced"]));
                                echo"<tr><td>".$row["idDiminution"]."</td><td>".$row["Nom"]."</td><td>".$row["PrixVente"]."</td><td>".$row["PrixAchat"]."</td><td>".$row["NewQuantity"]."</td><td>".$row["HoldQuantity"]."</td><td>".$row["QuantiteStock"]."</td><td>".$row["Differenced"]."</td><td>".$valeur."</td><td>".$benefice."</td><td>".$row["DatesD"]."</td></tr>"; 
                                $sommePVT +=$valeur;
                                $sommeBenefice +=$benefice;
                        }
                        echo"</table>";
                        echo "<p>Prix de vente Total : ".$sommePVT."Fc<br><br>Benefice Total : ".$sommeBenefice." FC</p>";
                    }else{echo"Pas des donnees a cette dates la ";}
                    echo"</div>"; 
                    

                }

                if($envoi=="sort1"){ 
                    
                           
                    $reqSql= ("SELECT *  FROM Sortie  WHERE Sortie.DatesD='".$sort1."'");
                    $result= mysqli_query($db, $reqSql);
                    $somme=0;
                    if(mysqli_num_rows($result)>0){
                        
                        echo"<table class = 'table table-striped'><tr><th>identifiant</th><th>Type de Sortie</th><th>Montant</th><th>il_pris_quoi</th><th>Dates</th></tr>";
                        while($row= mysqli_fetch_assoc($result)){
                                
                                
                                echo"<tr><td>".$row["idSortie"]."</td><td>".$row["TypeD"]."</td><td>".$row["Montant"]."</td><td>".$row["il_pris_quoi"]."</td><td>".$row["DatesD"]."</td></tr>"; 
                                $somme +=$row["Montant"];
                                
                        }
                        echo"</table>";
                        echo "<p>Montant Total : ".$somme." Fc<br></p>";
                    }else{echo "Pas des donnees a cette dates la ";}
                    echo"</div>"; 
                    
                }

                if($envoi=="dette"){         
                    $reqSql= ("SELECT *  FROM Sortie  WHERE TypeD='Dette'AND Sortie.DatesD='".$sort1."'");
                    $result= mysqli_query($db, $reqSql);
                    $somme=0;
                    if(mysqli_num_rows($result)>0){
                        
                        echo"<table class = 'table table-striped'><tr><th>identifiant</th><th>Type de Sortie</th><th>Montant</th><th>il_pris_quoi</th><th>Dates</th></tr>";
                        while($row= mysqli_fetch_assoc($result)){
                               
                                
                                echo"<tr><td>".$row["idSortie"]."</td><td>".$row["TypeD"]."</td><td>".$row["Montant"]."</td><td>".$row["il_pris_quoi"]."</td><td>".$row["DatesD"]."</td></tr>"; 
                                $somme +=$row["Montant"];
                                
                        }
                        echo"</table>";
                        echo "<p>Montant Total : ".$somme." Fc<br></p>";
                    }else{echo "Pas des donnees a cette dates la ";}
                    echo"</div>"; 
                }
                if($envoi=="depense"){      
                    $reqSql= ("SELECT *  FROM Sortie  WHERE TypeD='Depense' And Sortie.DatesD='".$sort1."'");
                    $result= mysqli_query($db, $reqSql);
                    $somme=0;
                    if(mysqli_num_rows($result)>0){
                        
                        echo"<table class = 'table table-striped'><tr><th>identifiant</th><th>Type de Sortie</th><th>Montant</th><th>il_pris_quoi</th><th>Dates</th></tr>";
                        while($row= mysqli_fetch_assoc($result)){        
                                echo"<tr><td>".$row["idSortie"]."</td><td>".$row["TypeD"]."</td><td>".$row["Montant"]."</td><td>".$row["il_pris_quoi"]."</td><td>".$row["DatesD"]."</td></tr>"; 
                                $somme +=$row["Montant"];
                                
                        }
                        echo"</table>";
                        echo "<p>Montant Total : ".$somme." Fc<br></p>";
                    }else{echo "pas de donnee ";}
                    echo"</div>";  


                }
                if($envoi=="charge"){      
                    $reqSql= ("SELECT *  FROM Sortie  WHERE TypeD='Charge' And Sortie.DatesD='".$sort1."'");
                    $result= mysqli_query($db, $reqSql);
                    $somme=0;
                    if(mysqli_num_rows($result)>0){
                        
                        echo"<table class = 'table table-striped'><tr><th>identifiant</th><th>Type de Sortie</th><th>Montant</th><th>il_pris_quoi</th><th>Dates</th></tr>";
                        while($row= mysqli_fetch_assoc($result)){        
                                echo"<tr><td>".$row["idSortie"]."</td><td>".$row["TypeD"]."</td><td>".$row["Montant"]."</td><td>".$row["il_pris_quoi"]."</td><td>".$row["DatesD"]."</td></tr>"; 
                                $somme +=$row["Montant"];
                                
                        }
                        echo"</table>";
                        echo "<p>Montant Total : ".$somme." Fc<br></p>";
                    }else{echo "pas de donnee ";}
                    echo"</div>";  


                }
                if($envoi=="datep"){      
                    $reqSql= ("SELECT *  FROM Sortie  WHERE DatesP is not null And Sortie.DatesD='".$sort1."'");
                    $result= mysqli_query($db, $reqSql);
                    $somme=0;
                    if(mysqli_num_rows($result)>0){
                        
                        echo"<table class = 'table table-striped'><tr><th>identifiant</th><th>Type de Sortie</th><th>Montant</th><th>il_pris_quoi</th><th>Dates</th><th>Dates Precedent</th></tr>";
                        while($row= mysqli_fetch_assoc($result)){        
                                echo"<tr><td>".$row["idSortie"]."</td><td>".$row["TypeD"]."</td><td>".$row["Montant"]."</td><td>".$row["il_pris_quoi"]."</td><td>".$row["DatesD"]."</td><td>".$row["DatesP"]."</td></tr>"; 
                                $somme +=$row["Montant"];
                                
                        }
                        echo"</table>";
                        echo "<p>Montant Total : ".$somme." Fc<br></p>";
                    }else{echo "pas de donnee ";}
                    echo"</div>";  


                }
               
               
                if($envoi=="detteE1"){
                    $reqSql=("SELECT * FROM DetteEntreprise WHERE DetteEntreprise.DatesD='".$detteE1."'");
                    $result= mysqli_query($db, $reqSql);
                    $somme=0;$totValeur=0;$totReste=0;$totMontant=0;
                    if(mysqli_num_rows($result)>0){
                        
                        echo"<table class = 'table table-striped'><tr><th>identifiant</th><th>Type </th><th>Valeur de la dette</th><th>Montant deja payE</th><th>Reste</th><th>Motif</th><th>Dates</th></tr>";
                       
                        while($row= mysqli_fetch_assoc($result)){
                           
                            $totValeur +=($row["ValeurDette"]);
                            $totMontant +=($row["MontantPaye"]);
                            $totReste +=($row["Reste"]);
                            

                            echo"<tr><td>".$row["idDette"]."</td><td>".$row["TypeD"]."</td><td>".$row["ValeurDette"]."</td><td>".$row["MontantPaye"]."</td><td>".$row["Reste"]."</td><td>".$row["il_pris_quoi"]."</td><td>".$row["DatesD"]."</td></tr>"; 
                                
                                
                        }
                        echo"</table>";
                        echo "<p> Total valeur des dettes : ".$totValeur." Fc<br><br>Total montant deja payE : ".$totMontant." FC <br><br>Total reste : ".$totReste." FC </p>";
                    }else{echo "Pas des donnees a cette dates la ";}
                    echo"</div>";  

                
                }
                if($envoi=="detteE1A"){
                    $reqSql=("SELECT * FROM DetteEntreprise WHERE TypeD='Argent'AND DetteEntreprise.DatesD='".$detteE1."'");
                    $result= mysqli_query($db, $reqSql);
                    $somme=0;$totValeur=0;$totReste=0;$totMontant=0;
                    
                    if(mysqli_num_rows($result)>0){
                        
                        echo"<table class = 'table table-striped'><tr><th>identifiant</th><th>Type </th><th>Valeur de la dette</th><th>Montant deja payE</th><th>Reste</th><th>Motif</th><th>Dates</th></tr>";
                        while($row= mysqli_fetch_assoc($result)){
                           
                            $totValeur +=($row["ValeurDette"]);
                            $totMontant +=($row["MontantPaye"]);
                            $totReste +=($row["Reste"]);
                           
                                echo"<tr><td>".$row["idDette"]."</td><td>".$row["TypeD"]."</td><td>".$row["ValeurDette"]."</td><td>".$row["MontantPaye"]."</td><td>".$row["Reste"]."</td><td>".$row["il_pris_quoi"]."</td><td>".$row["DatesD"]."</td></tr>"; 
                               
                                 
                        }
                        echo"</table>";
                        echo "<p> Total valeur des dettes : ".$totValeur." Fc<br><br>Total montant deja payE : ".$totMontant." FC <br><br>Total reste : ".$totReste." FC </p>";
                    }else{echo "Pas des donnees a cette dates la ";}
                    echo"</div>";  

                
                }
                if($envoi=="detteE1C"){
                    $reqSql=("SELECT * FROM DetteEntreprise WHERE TypeD='Consignation'AND DetteEntreprise.DatesD='".$detteE1."'");
                    $result= mysqli_query($db, $reqSql);
                    $somme=0;$totValeur=0;$totReste=0;$totMontant=0;
                    if(mysqli_num_rows($result)>0){
                        
                        echo"<table class = 'table table-striped'><tr><th>identifiant</th><th>Type </th><th>Valeur de la dette</th><th>Montant deja payE</th><th>Reste</th><th>Motif</th><th>Dates</th></tr>";
                        while($row= mysqli_fetch_assoc($result)){
                           
                            $totValeur +=($row["ValeurDette"]);
                            $totMontant +=($row["MontantPaye"]);
                            $totReste +=($row["Reste"]);
                           
                                echo"<tr><td>".$row["idDette"]."</td><td>".$row["TypeD"]."</td><td>".$row["ValeurDette"]."</td><td>".$row["MontantPaye"]."</td><td>".$row["Reste"]."</td><td>".$row["il_pris_quoi"]."</td><td>".$row["DatesD"]."</td></tr>"; 
                                
                                
                        }
                        echo"</table>";
                        echo "<p> Total valeur des dettes : ".$totValeur." Fc<br><br>Total montant deja payE : ".$totMontant." FC <br><br>Total reste : ".$totReste." FC </p>";
                    }else{echo "Pas des donnees a cette dates la ";}
                    echo"</div>";  

                
                }
                if($envoi=="datepp"){
                    $reqSql=("SELECT * FROM DetteEntreprise WHERE DatesRNew is not null AND DetteEntreprise.DatesD='".$detteE1."'");
                    $result= mysqli_query($db, $reqSql);
                    $somme=0;$totValeur=0;$totReste=0;$totMontant=0;
                    if(mysqli_num_rows($result)>0){
                        
                        echo"<table class = 'table table-striped'><tr><th>identifiant</th><th>Type </th><th>Valeur de la dette</th><th>Montant deja payE</th><th>Reste</th><th>Motif</th><th>Dates</th><th>Dates Precedent</th></tr>";
                        while($row= mysqli_fetch_assoc($result)){
                           
                            $totValeur +=($row["ValeurDette"]);
                            $totMontant +=($row["MontantPaye"]);
                            $totReste +=($row["Reste"]);
                           
                                echo"<tr><td>".$row["idDette"]."</td><td>".$row["TypeD"]."</td><td>".$row["ValeurDette"]."</td><td>".$row["MontantPaye"]."</td><td>".$row["Reste"]."</td><td>".$row["il_pris_quoi"]."</td><td>".$row["DatesD"]."</td><td>".$row["DatesRNew"]."</td></tr>"; 
                                
                                
                        }
                        echo"</table>";
                        echo "<p> Total valeur des dettes : ".$totValeur." Fc<br><br>Total montant deja payE : ".$totMontant." FC <br><br>Total reste : ".$totReste." FC </p>";
                    }else{echo"Pas des donnees a cette dates la ";}
                    echo"</div>";  

                
                }
                if($envoi=="detteC1"){
                    $reqSql=("SELECT idDette, NomClient,Telephone,ValeurDette,MontantPaye, Reste, il_pris_quoi,DatesD, DatesRNew FROM Client,DetteClient WHERE Client.idClient=DetteClient.idClient AND DetteClient.DatesD='".$detteC1."'");
                    $result= mysqli_query($db, $reqSql);
                    $somme=0;$totValeur=0;$totReste=0;$totMontant=0;
                    if(mysqli_num_rows($result)>0){
                        
                        echo"<table class = 'table table-striped'><tr><th>Identifiant</th><th>Nom du Client</th><th>Telephone</th><th>Valeur de la dette</th><th>Montant deja payE</th><th>Reste</th><th>Motif</th><th>Dates</th><th>Dates de paiement</th></tr>";
                        while($row= mysqli_fetch_assoc($result)){
                                $totValeur +=($row["ValeurDette"]);
                                $totMontant +=($row["MontantPaye"]);
                                $totReste +=($row["Reste"]);
                                echo"<tr><td>".$row["idDette"]."</td><td>".$row["NomClient"]."</td><td>".$row["Telephone"]."</td><td>".$row["ValeurDette"]."</td><td>".$row["MontantPaye"]."</td><td>".$row["Reste"]."</td><td>".$row["il_pris_quoi"]."</td><td>".$row["DatesD"]."</td><td>".$row["DatesRNew"]."</td></tr>"; 
                                
                                
                        }
                        echo"</table>";
                        echo "<p> Total valeur des dettes : ".$totValeur." Fc<br><br>Total montant deja payE : ".$totMontant." FC <br><br>Total reste : ".$totReste." FC </p>";
                    }else{echo "Pas des donnees a cette dates la ";}
                    echo"</div>";  

                
                }
                if($envoi=="idClient"){
                    $reqSql=("SELECT idDette,NomClient,Telephone,ValeurDette,MontantPaye, Reste, il_pris_quoi,DatesD,DatesRNew FROM Client,DetteClient WHERE Client.idClient=DetteClient.idClient AND DetteClient.idClient='".verifions($_POST["idClient1"])."'");
                    $result= mysqli_query($db, $reqSql);
                    $somme=0;$totValeur=0;$totReste=0;$totMontant=0;
                    if(mysqli_num_rows($result)>0){
                        
                        echo"<table class = 'table table-striped'><tr><th>Identifiant</th><th>Nom du Client</th><th>Telephone</th><th>Valeur de la dette</th><th>Montant deja payE</th><th>Reste</th><th>Motif</th><th>Dates</th><th>Dates de paiement</th></tr>";
                        while($row= mysqli_fetch_assoc($result)){
                                $totValeur +=($row["ValeurDette"]);
                                $totMontant +=($row["MontantPaye"]);
                                $totReste +=($row["Reste"]);
                                echo"<tr><td>".$row["idDette"]."</td><td>".$row["NomClient"]."</td><td>".$row["Telephone"]."</td><td>".$row["ValeurDette"]."</td><td>".$row["MontantPaye"]."</td><td>".$row["Reste"]."</td><td>".$row["il_pris_quoi"]."</td><td>".$row["DatesD"]."</td><td>".$row["DatesRNew"]."</td></tr>"; 
                                
                                
                        }
                        echo"</table>";
                        echo "<p> Total valeur des dettes : ".$totValeur." Fc<br><br>Total montant deja payE : ".$totMontant." FC <br><br>Total reste : ".$totReste." FC </p>";
                    }else{echo "Pas des donnees a cette dates la ";}
                    echo"</div>";  

               
                }

                if($envoi=="idClient0"){
                    $idC = htmlspecialchars($_POST["idClient10"]) * 1;
                    $reqSql=("SELECT idDette,NomClient,Telephone,ValeurDette,MontantPaye, Reste, il_pris_quoi,DatesD,DatesRNew FROM Client,DetteClient WHERE ((Client.idClient=DetteClient.idClient) and (Reste != 0)) AND (DetteClient.idClient='".$idC."')");
                    $result= mysqli_query($db, $reqSql);
                    $somme=0;$totValeur=0;$totReste=0;$totMontant=0;
                    if(mysqli_num_rows($result)>0){
                        
                        echo"<table class = 'table table-striped'><tr><th>Identifiant</th><th>Nom du Client</th><th>Telephone</th><th>Valeur de la dette</th><th>Montant deja payE</th><th>Reste</th><th>Motif</th><th>Dates</th><th>Dates de paiement</th></tr>";
                        while($row= mysqli_fetch_assoc($result)){
                                $totValeur +=($row["ValeurDette"]);
                                $totMontant +=($row["MontantPaye"]);
                                $totReste +=($row["Reste"]);
                                echo"<tr><td>".$row["idDette"]."</td><td>".$row["NomClient"]."</td><td>".$row["Telephone"]."</td><td>".$row["ValeurDette"]."</td><td>".$row["MontantPaye"]."</td><td>".$row["Reste"]."</td><td>".$row["il_pris_quoi"]."</td><td>".$row["DatesD"]."</td><td>".$row["DatesRNew"]."</td></tr>"; 
                                
                                
                        }
                        echo"</table>";
                        echo "<p> Total valeur des dettes : ".$totValeur." Fc<br><br>Total montant deja payE : ".$totMontant." FC <br><br>Total reste : ".$totReste." FC </p>";
                    }else{echo "Pas des donnees a cette dates la ";}
                    echo"</div>";  

                
                }

                if($envoi=="bonusPerte1"){
                    $totValGagne=0;$totValPerte=0;$totDiff=0;
                    $reqSql= ("SELECT `idBonusPerte`,`Nom`,`PrixVente`, `QuantiteGagne`, `QuantitePerdu`,QuantiteStock, `Motif`, `DatesD`  FROM Produit ,BonusPerte  WHERE BonusPerte.idProduit=Produit.idProduit AND BonusPerte.DatesD='".verifions($_POST["BonusPerte"])."'");
                $result= mysqli_query($db, $reqSql);
                if(mysqli_num_rows($result)>0){
                    $valeur=0;
                    echo"<table class = 'table table-striped'><tr><th>identifiant</th><th>Nom Produit</th><th>Quantite gagne</th><th>Quantite perdu</th><th>Quantite en stock</th><th>motif</th><th>Valeur</th><th>DatesD</th></tr>";
                    while($row= mysqli_fetch_assoc($result)){
                            $valGagne=($row["PrixVente"]*$row["QuantiteGagne"]);
                            $valPerte=($row["PrixVente"]*$row["QuantitePerdu"]);
                            $totValGagne +=$valGagne;
                            $totValPerte += $valPerte;
                            
                            echo"<tr><td>".$row["idBonusPerte"]."</td><td>".$row["Nom"]."</td><td>".$row["QuantiteGagne"]."</td><td>".$row["QuantitePerdu"]."</td><td>".$row["QuantiteStock"]."</td><td>".$row["Motif"]."</td><td>".$valGagne-$valPerte."</td><td>".$row["DatesD"]."</td></tr>"; 
                    }
                    echo"</table>";
                    echo "<p> Montant total correspondant aux bonus : ".$totValGagne." Fc<br><br>Montant total correspondant aux pertes : ".$totValPerte." FC <br><br>la difference entre les deux donne : ".$totValGagne-$totValPerte." FC </p>";
                }else{echo "Pas des donnees a cette dates la ";}

                }
                if($envoi=="bonusPerte2"){
                    $totValGagne=0;$totValPerte=0;$totDiff=0;
                    $reqSql= ("SELECT `idBonusPerte`,`Nom`,`PrixVente`, `QuantiteGagne`, `QuantitePerdu`,QuantiteStock, `Motif`, `DatesD`  FROM Produit ,BonusPerte  WHERE BonusPerte.idProduit=Produit.idProduit AND (BonusPerte.DatesD  BETWEEN'".verifions($_POST["BonusPerte21"])."' AND '".verifions($_POST["BonusPerte22"])."')");
                $result= mysqli_query($db, $reqSql);
                if(mysqli_num_rows($result)>0){
                    $valeur=0;
                    echo"<table class = 'table table-striped'><tr><th>identifiant</th><th>Nom Produit</th><th>Quantite gagne</th><th>Quantite perdu</th><th>Quantite en stock</th><th>motif</th><th>Valeur</th><th>DatesD</th></tr>";
                    while($row= mysqli_fetch_assoc($result)){
                            $valGagne=($row["PrixVente"]*$row["QuantiteGagne"]);
                            $valPerte=($row["PrixVente"]*$row["QuantitePerdu"]);
                            $totValGagne +=$valGagne;
                            $totValPerte += $valPerte;
                            
                            echo"<tr><td>".$row["idBonusPerte"]."</td><td>".$row["Nom"]."</td><td>".$row["QuantiteGagne"]."</td><td>".$row["QuantitePerdu"]."</td><td>".$row["QuantiteStock"]."</td><td>".$row["Motif"]."</td><td>".$valGagne-$valPerte."</td><td>".$row["DatesD"]."</td></tr>"; 
                    }
                    echo"</table>";
                    echo "<p> Montant total correspondant aux bonus : ".$totValGagne." Fc<br><br>Montant total correspondant aux pertes : ".$totValPerte." FC <br><br>la difference entre les deux donne : ".$totValGagne-$totValPerte." FC </p>";
                }else{echo "Pas des donnees a cette dates la ";}

                }

                if($envoi=="dim2"){        
                    $reqSql= ("SELECT idDiminution ,`Nom`,`PrixVente`,`PrixAchat`, `NewQuantity`, `HoldQuantity`,`QuantiteStock`, `Differenced`, `DatesD`  FROM Produit ,Dimiinution WHERE  (Dimiinution.DatesD  BETWEEN'".$dim21."' AND '".$dim22."') AND (Dimiinution.idProduit=Produit.idProduit) ");
                    $result= mysqli_query($db, $reqSql);
                    $valeur=0;$sommePVT=0;$sommeBenefice=0;$benefice=0;
                    if(mysqli_num_rows($result)>0){
                        
                        echo"<table class = 'table table-striped'><tr><th>Identifiant</th><th>Nom Produit</th><th>PrixVente</th><th>PrixAchat</th><th>Nouvelle quantite</th><th>AncienneQuantite</th><th>QuantiteStock</th><th>Difference</th><th>PrixVenteTotal</th><th>Benefice</th><th>DatesD</th></tr>";
                        while($row= mysqli_fetch_assoc($result)){
                                $valeur=($row["PrixVente"]*$row["Differenced"]);
                                $benefice=($valeur-($row["PrixAchat"]*$row["Differenced"]));
                                echo"<tr><td>".$row["idDiminution"]."</td><td>".$row["Nom"]."</td><td>".$row["PrixVente"]."</td><td>".$row["PrixAchat"]."</td><td>".$row["NewQuantity"]."</td><td>".$row["HoldQuantity"]."</td><td>".$row["QuantiteStock"]."</td><td>".$row["Differenced"]."</td><td>".$valeur."</td><td>".$benefice."</td><td>".$row["DatesD"]."</td></tr>"; 
                                $sommePVT +=$valeur;
                                $sommeBenefice +=$benefice;
                        }
                        echo"</table>";
                        echo "<p>Prix de vente Total : ".$sommePVT."Fc<br><br>Benefice Total : ".$sommeBenefice." FC</p>";
                    }else{echo "Pas des donnees a cette dates la ";}
                    echo"</div>"; 

                }

                if($envoi=="sort2"){ 
                    
                           
                    $reqSql= ("SELECT *  FROM Sortie  WHERE (Sortie.DatesD  BETWEEN'".$sort21."' AND '".$sort22."')");
                    $result= mysqli_query($db, $reqSql);
                    $somme=0;
                    if(mysqli_num_rows($result)>0){
                        
                        echo"<table class = 'table table-striped'><tr><th>identifiant</th><th>Type de Sortie</th><th>Montant</th><th>il_pris_quoi</th><th>Dates</th></tr>";
                        while($row= mysqli_fetch_assoc($result)){
                                
                                
                                echo"<tr><td>".$row["idSortie"]."</td><td>".$row["TypeD"]."</td><td>".$row["Montant"]."</td><td>".$row["il_pris_quoi"]."</td><td>".$row["DatesD"]."</td></tr>"; 
                                $somme +=$row["Montant"];
                                
                        }
                        echo"</table>";
                        echo "<p>Montant Total : ".$somme." Fc<br></p>";
                    }else{echo "Pas des donnees a cette dates la ";}
                    echo"</div>"; 
                    
                }

                if($envoi=="dette2"){         
                    $reqSql= ("SELECT *  FROM Sortie  WHERE TypeD='Dette'AND (Sortie.DatesD  BETWEEN'".$sort21."' AND '".$sort22."')");
                    $result= mysqli_query($db, $reqSql);
                    $somme=0;
                    if(mysqli_num_rows($result)>0){
                        
                        echo"<table class = 'table table-striped'><tr><th>identifiant</th><th>Type de Sortie</th><th>Montant</th><th>il_pris_quoi</th><th>Dates</th></tr>";
                        while($row= mysqli_fetch_assoc($result)){
                                
                                
                                echo"<tr><td>".$row["idSortie"]."</td><td>".$row["TypeD"]."</td><td>".$row["Montant"]."</td><td>".$row["il_pris_quoi"]."</td><td>".$row["DatesD"]."</td></tr>"; 
                                $somme +=$row["Montant"];
                                
                        }
                        echo"</table>";
                        echo "<p>Montant Total : ".$somme." Fc<br></p>";
                    }else{echo "Pas des donnees a cette dates la ";}
                }
                if($envoi=="depense2"){         
                    $reqSql1= ("SELECT *  FROM Sortie  WHERE TypeD='Depense' AND (Sortie.DatesD  BETWEEN'".$sort21."' AND '".$sort22."')");
                    $result1= mysqli_query($db, $reqSql1);
                    $somme=0;$totValeur=0;$totReste=0;$totMontant=0;
                    if(mysqli_num_rows($result1)>0){
                        
                        echo"<table class = 'table table-striped'><tr><th>identifiant</th><th>Type de Sortie</th><th>Montant</th><th>il_pris_quoi</th><th>Dates</th></tr>";
                        while($row1= mysqli_fetch_assoc($result1)){
                                
                                
                                echo"<tr><td>".$row1["idSortie"]."</td><td>".$row1["TypeD"]."</td><td>".$row1["Montant"]."</td><td>".$row1["il_pris_quoi"]."</td><td>".$row1["DatesD"]."</td></tr>"; 
                                $somme +=$row1["Montant"];
                                
                        }
                        echo"</table>";
                        echo "<p>Montant Total : ".$somme." Fc<br></p>";
                    }else{echo "Pas des donnees a cette dates la ";}
                    echo"</div>"; 
                }
                if($envoi=="charge2"){         
                    $reqSql1= ("SELECT *  FROM Sortie  WHERE TypeD='Charge' AND (Sortie.DatesD  BETWEEN'".$sort21."' AND '".$sort22."')");
                    $result1= mysqli_query($db, $reqSql1);
                    $somme=0;$totValeur=0;$totReste=0;$totMontant=0;
                    if(mysqli_num_rows($result1)>0){
                        
                        echo"<table class = 'table table-striped'><tr><th>identifiant</th><th>Type de Sortie</th><th>Montant</th><th>il_pris_quoi</th><th>Dates</th></tr>";
                        while($row1= mysqli_fetch_assoc($result1)){
                                
                                
                                echo"<tr><td>".$row1["idSortie"]."</td><td>".$row1["TypeD"]."</td><td>".$row1["Montant"]."</td><td>".$row1["il_pris_quoi"]."</td><td>".$row1["DatesD"]."</td></tr>"; 
                                $somme +=$row1["Montant"];
                                
                        }
                        echo"</table>";
                        echo "<p>Montant Total : ".$somme." Fc<br></p>";
                    }else{echo "Pas des donnees a cette dates la ";}
                    echo"</div>"; 
                }
                if($envoi=="detteE2"){
                    $reqSql=("SELECT * FROM DetteEntreprise WHERE (DetteEntreprise.DatesD  BETWEEN'".$detteE21."' AND '".$detteE22."')");
                    $result= mysqli_query($db, $reqSql);
                    $somme=0;$totValeur=0;$totReste=0;$totMontant=0;
                    if(mysqli_num_rows($result)>0){
                        
                        echo"<table class = 'table table-striped'><tr><th>identifiant</th><th>Type </th><th>Valeur de la dette</th><th>Montant deja payE</th><th>Reste</th><th>Motif</th><th>Dates</th></tr>";
                        while($row= mysqli_fetch_assoc($result)){
                                $totValeur +=($row["ValeurDette"]);
                                $totMontant +=($row["MontantPaye"]);
                                $totReste +=($row["Reste"]);
                                echo"<tr><td>".$row["idDette"]."</td><td>".$row["TypeD"]."</td><td>".$row["ValeurDette"]."</td><td>".$row["MontantPaye"]."</td><td>".$row["Reste"]."</td><td>".$row["il_pris_quoi"]."</td><td>".$row["DatesD"]."</td></tr>"; 
                               
                                
                        }
                        echo"</table>";
                        echo "<p> Total valeur des dettes : ".$totValeur." Fc<br><br>Total montant deja payE : ".$totMontant." FC <br><br>Total reste : ".$totReste." FC </p>";
                    }else{echo"Pas des donnees a cette dates la ";}
                    echo"</div>";  

                
                }
                if($envoi=="detteE2A"){
                    $reqSql=("SELECT * FROM DetteEntreprise WHERE TypeD='Argent'AND (DetteEntreprise.DatesD  BETWEEN'".$detteE21."' AND '".$detteE22."')");
                    $result= mysqli_query($db, $reqSql);
                    $somme=0;$totValeur=0;$totReste=0;$totMontant=0;
                    if(mysqli_num_rows($result)>0){
                        
                        echo"<table class = 'table table-striped'><tr><th>identifiant</th><th>Type </th><th>Valeur de la dette</th><th>Montant deja payE</th><th>Reste</th><th>Motif</th><th>Dates</th></tr>";
                        while($row= mysqli_fetch_assoc($result)){
                                $totValeur +=($row["ValeurDette"]);
                                $totMontant +=($row["MontantPaye"]);
                                $totReste +=($row["Reste"]);
                                echo"<tr><td>".$row["idDette"]."</td><td>".$row["TypeD"]."</td><td>".$row["ValeurDette"]."</td><td>".$row["MontantPaye"]."</td><td>".$row["Reste"]."</td><td>".$row["il_pris_quoi"]."</td><td>".$row["DatesD"]."</td></tr>"; 
                               
                                
                        }
                        echo"</table>";
                        echo "<p> Total valeur des dettes : ".$totValeur." Fc<br><br>Total montant deja payE : ".$totMontant." FC <br><br>Total reste : ".$totReste." FC </p>";
                    }else{echo "Pas des donnees a cette dates la ";}
                    echo"</div>";  

                
                }
                if($envoi=="detteE2C"){
                    $reqSql=("SELECT * FROM DetteEntreprise WHERE TypeD='Consignation'AND (DetteEntreprise.DatesD  BETWEEN'".$detteE21."' AND '".$detteE22."')");
                    $result= mysqli_query($db, $reqSql);
                    $somme=0;$totValeur=0;$totReste=0;$totMontant=0;
                    if(mysqli_num_rows($result)>0){
                        
                        echo"<table class = 'table table-striped'><tr><th>identifiant</th><th>Type </th><th>Valeur de la dette</th><th>Montant deja payE</th><th>Reste</th><th>Motif</th><th>Dates</th></tr>";
                        while($row= mysqli_fetch_assoc($result)){
                                $totValeur +=($row["ValeurDette"]);
                                $totMontant +=($row["MontantPaye"]);
                                $totReste +=($row["Reste"]);
                                echo"<tr><td>".$row["idDette"]."</td><td>".$row["TypeD"]."</td><td>".$row["ValeurDette"]."</td><td>".$row["MontantPaye"]."</td><td>".$row["Reste"]."</td><td>".$row["il_pris_quoi"]."</td><td>".$row["DatesD"]."</td></tr>"; 
                               
                                
                        }
                        echo"</table>";
                        echo "<p> Total valeur des dettes : ".$totValeur." Fc<br><br>Total montant deja payE : ".$totMontant." FC <br><br>Total reste : ".$totReste." FC </p>";
                    }else{echo "Pas des donnees a cette dates la ";}
                    echo"</div>";  

                
                }
                if($envoi=="detteC2"){
                    $reqSql=("SELECT idDette,NomClient,Telephone,ValeurDette,MontantPaye, Reste, il_pris_quoi,DatesD FROM Client,DetteClient WHERE Client.idClient=DetteClient.idClient AND (DetteClient.DatesD  BETWEEN'".$detteC21."' AND '".$detteC22."')");
                    $result= mysqli_query($db, $reqSql);
                    $somme=0;$totValeur=0;$totReste=0;$totMontant=0;
                    if(mysqli_num_rows($result)>0){
                        
                        echo"<table class = 'table table-striped'><tr><th>Identifiant</th><th>Nom du Client</th><th>Telephone</th><th>Valeur de la dette</th><th>Montant deja payE</th><th>Reste</th><th>Motif</th><th>Dates</th></tr>";
                        while($row= mysqli_fetch_assoc($result)){
                                $totValeur +=($row["ValeurDette"]);
                                $totMontant +=($row["MontantPaye"]);
                                $totReste +=($row["Reste"]);
                                echo"<tr><td>".$row["idDette"]."</td><td>".$row["NomClient"]."</td><td>".$row["Telephone"]."</td><td>".$row["ValeurDette"]."</td><td>".$row["MontantPaye"]."</td><td>".$row["Reste"]."</td><td>".$row["il_pris_quoi"]."</td><td>".$row["DatesD"]."</td></tr>"; 
                                
                                
                        }
                        echo"</table>";
                        echo "<p> Total valeur des dettes : ".$totValeur." Fc<br><br>Total montant deja payE : ".$totMontant." FC <br><br>Total reste : ".$totReste." FC </p>";
                    }else{echo "Pas des donnees a cette dates la ";}
                    echo"</div>";  

                
                }

            ?> 
            
        
        </div>
        
            
        
    </div>
    
        
</div>


<div class="footer">
        <h2>&copy; Copyrigth</h2>
        <p style="border: none;">franck sefu +243 973359746</p>
</div>

 
</body>
</html>