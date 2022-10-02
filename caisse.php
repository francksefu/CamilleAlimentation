<!DOCTYPE >
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="formulaire.css" media="screen" type="text/css" />
    <!--<link rel="stylesheet" href="formuTab3.css" media="screen" type="text/css" /> -->
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
    
</head>
<body>
<body style="background: url(fond3.png) no-repeat center fixed; background-size:cover">
<div  class="header" style="background-color: transparent;">
        <h1 style="text-shadow: 3px 3px 5px white;color: #fff;">Suivie d' entreprise</h1>
</div>

<div class="topnav">
    <a href="accueilEntreprise.php">Accueil</a>
    <a href="produitb.php" >Produit</a>
    <a href="bonusPerte.php" >Bonus et Perte</a>
    <a href="sortie.php">Sorties</a>
    <a href="diminution.php">Diminution</a>
    <a href="Client.php">Client</a>
    <a href="detteClient.php">Dettes clients</a>
    <a href="detteEntreprise.php">Dette Entreprise</a>
    <a href="etats.php" >Les Etats</a>
    <a href="caisse.php" class="active">Caisse</a>
    
</div>

<div class="row">
    <div class="column1">
    
        <p id="region">
            <?php 
            
            include 'connexion.php';
            $nom=$prixAcht=$prixVente=$quantite="";
            
            if($_SERVER["REQUEST_POST"]=="POST"){
                    $nom=verifions($_POST["DateCourant"]);
                    $prixAchat=verifions($_POST["DatePrecedent"]);
                    $prixVente=verifions($_POST["ArgentHier"]);
                    $quantite=verifions($_POST["CaisseReel"]);
                    $sorte=verifions($_POST["Sorte"]);
                    $identifiant=verifions($_POST["Identifiant"]);
                    $detteClient=verifions($_POST["DetteClientRembourse"]);
                    $detteEntreprise=verifions($_POST["RembourseDetteEntreprise"]);
                    
            }    
                function verifions($donne){
                    
                    $donne=htmlspecialchars($donne);
    
                    return $donne;
                }
                if(verifions($_POST["Sorte"])==1){
                $reqSql=("INSERT INTO `Caisse`(`DatesCourant`,DatesPrecedent , `ArgentHier`, `CaisseReel`,DetteClientRembourse,RembourseDetteEntreprise) values('".verifions($_POST["DateCourant"])."','".verifions($_POST["DatePrecedent"])."','".$_POST["ArgentHier"]."','".$_POST["CaisseReel"]."','".$_POST["DetteClientRembourse"]."','".$_POST["RembourseDetteEntreprise"]."')");
                if(mysqli_query($db, $reqSql)){
                echo"<span id='succes'> enregistrement fait</span>";
                }else{
                echo"error : ".mysqli_error($db)."ligne155";
                }
            }
                $dateCourantA=" ";$dateCourantN=" ";$datePrecedentN=0;$datePrecedentA=0;$argentHierA=0;$N=0;$argentHierN=0;$caisseReelN=0;$caisseReelA=0;
                $updN=" ";$updPA=" ";$updPV=" ";$updQ=" ";$detteClientN=" ";$detteClientA=" ";$detteEntrepriseA=0;$detteEntrepriseN=0;
                if(verifions($_POST["Sorte"])==2){
                    $reqSql= ("SELECT DatesCourant,DatesPrecedent,ArgentHier,CaisseReel,DetteClientRembourse,RembourseDetteEntreprise FROM Caisse WHERE idCaisse =".verifions($_POST["Identifiant"])."");
                        $result= mysqli_query($db, $reqSql);
                        if(mysqli_num_rows($result)>0){
                            while($row= mysqli_fetch_assoc($result)){
                                $dateCourantA= $row["DatesCourant"];
                                $datePrecedentA= $row["DatesPrecedent"];
                                $argentHierA= $row["ArgentHier"];
                                $caisseReelA= $row["CaisseReel"];
                                $detteClientA= $row["DetteClientRembourse"];
                                $detteEntrepriseA= $row["RembourseDetteEntreprise"];

                            }
                        }else{echo "Une erreur s est produite ";}
                        if(empty(verifions($_POST["DateCourant"]))){
                            $dateCourantN=$dateCourantA;
                        }else{$dateCourantN=verifions($_POST["DateCourant"]);}
                        if(empty(verifions($_POST["DatePrecedent"]))){
                            $datePrecedentN=$datePrecedentA;
                        }else{$datePrecedentN=verifions($_POST["DatePrecedent"]);}
                        if(empty(verifions($_POST["ArgentHier"]))){
                            $argentHierN=$argentHierA;
                        }else{$argentHierN=verifions($_POST["ArgentHier"]);}
                        if(empty(verifions($_POST["CaisseReel"]))){
                            $caisseReelN=$caisseReelA;
                        }else{$caisseReelN=verifions($_POST["CaisseReel"]);}
                        if(empty(verifions($_POST["DetteClientRembourse"]))){
                            $detteClientN=$detteClientA;
                        }else{$detteClientN=verifions($_POST["DetteClientRembourse"]);}
                        if(empty(verifions($_POST["RembourseDetteEntreprise"]))){
                            $detteEntrepriseN=$detteEntrepriseA;
                        }else{$detteEntrepriseN=verifions($_POST["RembourseDetteEntreprise"]);}
                        $updN= ("UPDATE `Caisse` SET `DatesCourant` = '".$dateCourantN."' WHERE `Caisse`.`idCaisse` = ".verifions($_POST["Identifiant"])."");
                       $updPA= ("UPDATE `Caisse` SET `DatesPrecedent` = '".$datePrecedentN."' WHERE `Caisse`.`idCaisse` = ".verifions($_POST["Identifiant"])."");
                        $updPV= ("UPDATE `Caisse` SET `ArgentHier` = '".$argentHierN."' WHERE `Caisse`.`idCaisse` = ".verifions($_POST["Identifiant"])."");
                        $updQ= ("UPDATE `Caisse` SET `CaisseReel` = '".$caisseReelN."' WHERE `Caisse`.`idCaisse` = ".verifions($_POST["Identifiant"])."");
                        $updQi= ("UPDATE `Caisse` SET `DetteClientRembourse` = '".$detteClientN."' WHERE `Caisse`.`idCaisse` = ".verifions($_POST["Identifiant"])."");
                        $updQy= ("UPDATE `Caisse` SET `RembourseDetteEntreprise` = '".$detteEntrepriseN."' WHERE `Caisse`.`idCaisse` = ".verifions($_POST["Identifiant"])."");
                        if(mysqli_query($db,$updN)){echo"";}else{
                            echo"Error : ".mysqli_error($db);
                        }
                        if(mysqli_query($db,$updPA)){echo"";}else{
                            echo"Error : ".mysqli_error($db);
                        }
                        if(mysqli_query($db,$updPV)){echo"";}else{
                            echo"Error : ".mysqli_error($db);
                        }if(mysqli_query($db,$updQi)){echo"";}else{
                            echo"Error : ".mysqli_error($db);
                        }
                        if(mysqli_query($db,$updQy)){echo"";}else{
                            echo"Error : ".mysqli_error($db);
                        }
                        if(mysqli_query($db,$updQ)){echo"<span>Mis a jour fait</span>";}else{
                            echo"Error : ".mysqli_error($db);
                        }
                        echo "voici :".$nomN." pA".$pAAN." pV".$pVAN." q".$qAN;
                }
                if(verifions($_POST["Sorte"])==3){
                    $del= ("DELETE FROM Caisse WHERE idCaisse=".verifions($_POST["Identifiant"])."");
                    if(mysqli_query($db,$del)){echo"<span> Suppression fait</span>";}else{
                        echo"Error : ".mysqli_error($db);
                    }
                }
                
                
            ?>  
            </p>
            <?php // cacher et montre les formulaires d insertion et modification avec la partie de 25%?>
        <ul>
            <li><button class="btn btn-primary" type="button" 
            onclick="document.getElementById('nouvelPP').style.display='block';
            document.getElementById('modify').style.display='none';document.getElementById('delet').style.display='none';">Nouveau</button></li>
            <li><button class="btn btn-primary" type="button" 
            onclick="document.getElementById('modify').style.display='block';
            document.getElementById('nouvelPP').style.display='none';document.getElementById('delet').style.display='none';"> Modifier </button></li>
            <li><button class="btn btn-primary" type="button" onclick="document.getElementById('delet').style.display='block';
            document.getElementById('nouvelPP').style.display='none';document.getElementById('modify').style.display='none';"> Supprimer</button></li>
            
        </ul>
    
    </div>
    
        
    

        <div class="enveloppe2 column2">
            
                <form method= "POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
                    <div id="nouvelPP" >
                        <br><label for="DateCourant">Date Courant</label><br>
                        <input type="date" id="DateCourant" name="DateCourant" placeholder="Date d aujourd hui" required>*
                        <br> <label for="DatePrecedent" > Date precedent<br><i>La caisse commence souvent avec un peu d argent de la date precedante, c est ici que vous mettez cette date precedante</i> </label><br>
                        <input type="date" id="DatePrecedent" name="DatePrecedent" placeholder="Date precedent" required>FC
                        <br><label for="ArgentHier" > Argent venant de la date precedente </label><br>
                        <input type="float" id="ArgentHier" name="ArgentHier" placeholder="Argent Hier"  required>FC
                        <br><label for="CaisseReel" ><p> Montant reel: ce que vous avez en main apres comptage  </p></label><br>
                        <input type="float" id="CaisseReel" name="CaisseReel" placeholder="Montant reel" required>
                        <br><label for="DetteE" ><p> les clients vous ont remboursE combien cette journee  </p></label><br>
                        <input type="float" id="DetteClientR" name="DetteClientRembourse" placeholder="Dette client rembourse" required>
                        <br><label for="DetteE" ><p> Avez vous remboursé les dettes que l entreprise avait prise? mettez les ici, ce dont vous avez remboursé aujourd hui  </p></label><br>
                        <input type="float" id="DetteClientR" name="RembourseDetteEntreprise" placeholder="Dette Entreprise remboursé" required>
                        
                        <input type="hidden"  name="Sorte" value="1">
                        <input type="submit" name="submit" value="submit" >
                    </div>
                </form>
            
            

            <div id="modify" class="hidform">
                <form method= "POST" action=" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
                Identifiant <input type="number" name="Identifiant" placeholder="Identifiant" required><br>
                <br><label for="DateCourant">Date Courant</label><br>
                    <input type="date" id="DateCourant" name="DateCourant" placeholder="Date d aujourd hui" >
                    <br> <label for="DatePrecedent" > Date precedent<br><i>La caisse commence souvent avec un peu d argent de la date precedante, c est ici que vous mettez cette date precedante</i> </label><br>
                    <input type="date" id="DatePrecedent" name="DatePrecedent" placeholder="Date precedent" >FC
                    <br><label for="ArgentHier" > Argent venant de la date precedente </label><br>
                    <input type="float" id="ArgentHier" name="ArgentHier" placeholder="Argent Hier"  >FC
                    <br><label for="CaisseReel" ><p> Montant reel: ce que vous avez en main apres comptage  </p></label><br>
                    <input type="float" id="CaisseReel" name="CaisseReel" placeholder="Montant reel" >
                    <br><label for="DetteE" ><p> les clients vous ont remboursE combien cette journee  </p></label><br>
                    <input type="float" id="DetteClientR" name="DetteClientRembourse" placeholder="Dette client rembourse" >
                    <br><label for="Dett" ><p> Avez vous remboursé les dettes que l entreprise avait prise? mettez les ici, ce dont vous avez remboursé aujourd hui  </p></label><br>
                    <input type="float" id="DettR" name="RembourseDetteEntreprise" placeholder="Dette Entreprise remboursé" >
                           
                    <input type="hidden" name="Sorte" value="2">
                    <input type="submit" value="soumettre">
                </form>
            </div>

            <div id="delet" class="hidform">
                <form method= "post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
                    
                Identifiant <input type="number" id="Identifiant" name="Identifiant" placeholder="identifiant" required>
                    <input type="hidden" name="Sorte" value="3">
                    <input type="submit" value="Supprimer">
                </form>
            </div>
        </div>
            
        
    </div>
    <div class="column3">
    <div class="tableau" style="background-color:#ddd;">
            <?php
                include 'connexion.php';
                        $valeur=0;$sommePVT=0;$sommeBenefice=0;$dateDP=" ";$sommeS=0;$sommeSP=0;$caisseIdeal=0;$totValeurE=0;
                        
                        
                $reqSql= ("SELECT idCaisse, DatesCourant, DatesPrecedent, ArgentHier, CaisseReel,DetteClientRembourse,RembourseDetteEntreprise FROM Caisse order by DatesCourant desc");
                $result= mysqli_query($db, $reqSql);
                if(mysqli_num_rows($result)>0){
                    
                    echo"<table class='table table-striped' style='width: 6000px'><tr><th>identifiant</th><th>DateCourant</th><th>DatePrecedent</th><th>Argent Hier</th><th>Caisse Reel</th><th>Total produit vendu</th><th>Total dette client</th><th>dette pris par l entreprise</th><th>Remoursement clients </th><th>Remoursement entreprise </th><th>Pertes de manip </th><th>Sortie du revenu actuel</th><th>Sortie du revenu precedent</th><th>Caisse ideal sans argent hier </th><th>Caisse ideal avec argent hier </th><th>Difference entre l ideal et le reel</th></tr>";
                    while($row= mysqli_fetch_assoc($result)){
                        $dateCourt=$row["DatesCourant"];
                        $reqSql1= ("SELECT `PrixVente`, `Differenced`, `DatesD`  FROM Dimiinution,Produit  WHERE (Dimiinution.idProduit=Produit.idProduit)AND Dimiinution.DatesD='".$dateCourt."'");
                        $result1= mysqli_query($db, $reqSql1);
                        
                        if(mysqli_num_rows($result1)>0){
                            
                            
                            while($row1= mysqli_fetch_assoc($result1)){
                                    $valeur=($row1["PrixVente"]*$row1["Differenced"]);
                                    
                                    
                                    $sommePVT +=$valeur;
                                    
                            }
                            
                        }else{echo "";}

                        $reqSql2=("SELECT ValeurDette FROM DetteClient WHERE  DetteClient.DatesD='".$dateCourt."'");
                        $result2= mysqli_query($db, $reqSql2);
                        $somme=0;$totValeur=0;$totValeurE=0;$argentPaie=0;
                        if(mysqli_num_rows($result2)>0){
                            
                            while($row2= mysqli_fetch_assoc($result2)){

                                $totValeur +=($row2["ValeurDette"]);
                                
                                    
                            }
                            
                            
                        }else{echo "";}
                        $reqSql3=("SELECT ValeurDette FROM DetteEntreprise WHERE  DetteEntreprise.DatesD='".$dateCourt."'");
                        $result3= mysqli_query($db, $reqSql3);
                        $totValeurE=0;
                        if(mysqli_num_rows($result3)>0){
                            
                            while($row3= mysqli_fetch_assoc($result3)){

                                $totValeurE +=($row3["ValeurDette"]);
                                
                                    
                            }
                            
                            
                        }else{echo "";}
                        $reqSql5= ("SELECT *  FROM Sortie  WHERE DatesP IS NULL AND Sortie.DatesD='".$dateCourt."'");
                        $result5= mysqli_query($db, $reqSql5);
                        $somme=0;
                        if(mysqli_num_rows($result5)>0){
                        
                            
                            while($row5= mysqli_fetch_assoc($result5)){
                                
                                
                                
                                $sommeS +=$row5["Montant"];
                                
                            }
                            
                            
                        }else{echo "";}
                        
                        $reqSql6= ("SELECT *  FROM Sortie  WHERE DatesP IS NOT NULL  AND Sortie.DatesD='".$dateCourt."'");
                        $result6= mysqli_query($db, $reqSql6);
                        $somme=0;
                        if(mysqli_num_rows($result5)>0){
                        
                            
                            while($row6= mysqli_fetch_assoc($result6)){
                                
                                
                                
                                $sommeSP +=$row6["Montant"];
                                
                            }
                            
                            
                        }else{echo "";}
                        $totValPerte=0;
                        $reqSql7= ("SELECT `idBonusPerte`,`Nom`,`PrixVente`, `QuantiteGagne`, `QuantitePerdu`,QuantiteStock, `Motif`, `DatesD`  FROM Produit ,BonusPerte  WHERE BonusPerte.idProduit=Produit.idProduit AND (BonusPerte.DatesD ='".$dateCourt."')");
                        $result7= mysqli_query($db, $reqSql7);
                        if(mysqli_num_rows($result7)>0){
                            
                           
                            while($row7= mysqli_fetch_assoc($result7)){
                                   
                                    $valPerte=($row7["PrixVente"]*$row7["QuantitePerdu"]);
                                   
                                    $totValPerte += $valPerte;
                                    
                                   
                            }
                           
                           
                        }else{echo "";}
                    
                    
                       $caisseIdeal = $sommePVT + $totValeurE - $totValeur - $sommeS + $row["DetteClientRembourse"] - $totValPerte - $row["RembourseDetteEntreprise"];
                            echo"<tr><td>".$row["idCaisse"]."</td><td>".$row["DatesCourant"]."</td><td>".$row["DatesPrecedent"]."</td><td>".$row["ArgentHier"]."</td><td>".$row["CaisseReel"]."</td><td>".$sommePVT."</td><td>".$totValeur."</td><td>".$totValeurE."</td><td>".$row["DetteClientRembourse"]."</td><td>".$row["RembourseDetteEntreprise"]."</td><td>".-$totValPerte."</td><td>".$sommeS."</td><td>".$sommeSP."</td><td>".$caisseIdeal."</td><td>".$caisseIdeal+$row["ArgentHier"]."</td><td>".$caisseIdeal+$row["ArgentHier"]-$row["CaisseReel"]."</td></tr>"; 
                            $sommePVT=0;$totValeur=0;$totValeurE=0;$argentPaie=0;$sommeS=0;$sommeSP=0;
                    }
                    echo"</table>";
                }else{echo "";}

            ?> 
            
        
        </div>
    </div>    
    
        
</div>


<div class="footer">
        <h2>Copyrigth</h2>
        <p>franck sefu +243 973359746</p>
</div>
 
</body>
</html>