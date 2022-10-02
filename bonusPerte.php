<!DOCTYPE >
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    
</head>
<body style="background: url(fond2.png) no-repeat center fixed; background-size:cover">
<div  class="header" style="background-color: transparent;">
        <h1 style="text-shadow: 3px 3px 5px white;color: #fff;">Suivie d' entreprise</h1>
</div>
<div class="topnav">
    <a href="accueilEntreprise.php">Accueil</a>
    <a href="produitb.php">Produit</a>
    <a href="bonusPerte.php" class="active">Bonus et Perte</a>
    <a href="sortie.php">Sortie</a>
    <a href="diminution.php" >Diminution</a>
    <a href="Client.php">Client</a>
    <a href="detteClient.php" >Dettes clients</a>
    <a href="detteEntreprise.php">Dette Entreprise</a>
    <a href="etats.php" >Les Etats</a>
    <a href="caisse.php" >Caisse</a>
    
</div>

<div class="row">
    <div class="column1">
    <?php // cacher et montre les formulaires d insertion et modification avec la partie de 25%?>
        <ul>
            <li><button class="btn btn-primary" type="button" 
            onclick="document.getElementById('nouvelPP').style.display='block';
            document.getElementById('modify').style.display='none';document.getElementById('delet').style.display='none';">Nouveau</button></li>
            <li><button class="btn btn-primary" type="button" 
            onclick="document.getElementById('modify').style.display='block';
            document.getElementById('nouvelPP').style.display='none';document.getElementById('delet').style.display='none';"> Modifier </button></li>
            <li><button class="btn btn-primary" type="button" onclick="document.getElementById('delet').style.display='block';
            document.getElementById('nouvelPP').style.display='none';document.getElementById('modify').style.display='none';"> Supprimer </button></li>
            
        </ul>
        <p id="region">
            <?php

                function retourProduit($idproduit, $quantite){
                    include 'connexion.php';
                    if($idproduit != "")
                    {
                        
                        $idProd = $idproduit;
                        $quantiteF;
                        $sql = ("SELECT QuantiteStock FROM Produit WHERE idProduit = ".$idProd."");
                        $result = mysqli_query($db, $sql);
                                    
                        if(mysqli_num_rows($result)>0){
                                                
                            while($row= mysqli_fetch_assoc($result)){
                                $quantiteF = $row["QuantiteStock"];
                            }
                                        
                        }else{echo "error";}
                        $nvlQuantite = $quantiteF + $quantite;
                        $sql1 = ("UPDATE Produit SET QuantiteStock = '".$nvlQuantite."' WHERE idProduit =".$idProd." ");
                        if($db->query($sql1)===TRUE){
                            echo"";
                        }else{
                            "Echec de mise a jour :".$db->error;
                        }
                    }    
                }
            include 'connexion.php';     
            if($_SERVER["REQUEST_POST"]=="POST"){
                    $idProduit=verifions($_POST["idProduit"]);
                    $quantiteGagne=verifions($_POST["QuantiteGagne"]);
                    $quantitePerdu=verifions($_POST["QuantitePerdu"]);
                    $motif=verifions($_POST["Motif"]);
                    
                    $datesD=verifions($_POST["DatesD"]);
                    $sorte=verifions($_POST["Sorte"]);
                    $identifiant=verifions($_POST["Identifiant"]);
                    $quantiteGagne=0;
                    $quantitePerdu=0;
                    
            }    
                function verifions($donne){
                    
                    $donne=htmlspecialchars($donne);
    
                    return $donne;
                }
                $holdQuantity=0;$holdQuantity1=0;
                if(verifions($_POST["Sorte"])==1){
                
                    $reqSql= ("SELECT  QuantiteStock FROM Produit WHERE idProduit=".verifions($_POST["idProduit"])." ");
                    $result= mysqli_query($db, $reqSql);
                    if(mysqli_num_rows($result)>0){
                
                    while($row= mysqli_fetch_assoc($result)){
                    $holdQuantity=$row["QuantiteStock"]; 
                    }
        
                    }else{echo "Une erreur s est produite ";}  
                $updNi= ("UPDATE `Produit` SET `QuantiteStock` = '".verifions($_POST["QuantiteGagne"])-verifions($_POST["QuantitePerdu"])+$holdQuantity."' WHERE `Produit`.`idProduit` = ".verifions($_POST["idProduit"])."");
                if(mysqli_query($db,$updNi)){echo"";}else{
                    echo"Error : ".mysqli_error($db);
                }
                
                

                $reqSql=("INSERT INTO `BonusPerte`(`idProduit`, QuantiteGagne, `QuantitePerdu`, `DatesD`,`Motif`) 
                values('".(int)verifions($_POST["idProduit"])."','".verifions($_POST["QuantiteGagne"])."','".verifions($_POST["QuantitePerdu"])."','".verifions($_POST["DatesD"])."','".verifions($_POST["Motif"])."')");
                if(mysqli_query($db, $reqSql)){
                echo"<span id='succes'> enregistrement fait</span>";
                }else{
                echo"error : ".mysqli_error($db)."ligne155";
                }
            }
                $idProduitA=" ";$idProduitN=" ";$quantiteGagneA=0;$quantiteGagneN=0;$quantitePerduA=0;$quantitePerduN=0;$motifA=0;$motifN=0; $datesDA=" ";$datesDN=" ";
                $updN=" ";$updPA=" ";$updPV=" ";$updQ=" ";
                if(verifions($_POST["Sorte"])==2){
                    $reqSql= ("SELECT idProduit,QuantiteGagne,QuantitePerdu,DatesD,Motif FROM BonusPerte  WHERE idBonusPerte =".verifions($_POST["Identifiant"])."");
                        $result= mysqli_query($db, $reqSql);
                        if(mysqli_num_rows($result)>0){
                            while($row= mysqli_fetch_assoc($result)){
                                $idProduitA= $row["idProduit"];
                                $quantiteGagneA= $row["QuantiteGagne"];
                                $quantitePerduA= $row["QuantitePerdu"];
                                
                                
                                $datesDA= $row["DatesD"];
                                $motifA= $row["Motif"];
                            }
                        }else{echo "Une erreur s est produite ";}
                        if(empty(verifions($_POST["idProduit"]))){
                            $idProduitN=$idProduitA;
                        }else{$idProduitN=(int)verifions($_POST["idProduit"]);}
                        if(empty(verifions($_POST["QuantiteGagne"]))){
                            $quantiteGagneN=$quantiteGagneA;
                        }else{$quantiteGagneN=verifions($_POST["QuantiteGagne"]); retourProduit($idProduitA, -$quantiteGagneA);}
                        if(empty(verifions($_POST["QuantitePerdu"]))){
                            $quantitePerduN=$quantitePerduA;
                        }else{$quantitePerduN=verifions($_POST["QuantitePerdu"]); retourProduit($idProduitA, $quantitePerduA);}
                        
                        if(empty(verifions($_POST["DatesD"]))){
                            $datesDN=$datesDA;
                        }else{$datesDN=verifions($_POST["DatesD"]);}
                        if(empty(verifions($_POST["Motif"]))){
                            $motifN=$motifA;
                        }else{$motifN=verifions($_POST["Motif"]);}

                        $reqSql= ("SELECT  QuantiteStock FROM Produit WHERE idProduit=".$idProduitN." ");
                        $result= mysqli_query($db, $reqSql);
                        if(mysqli_num_rows($result)>0){
                
                        while($row= mysqli_fetch_assoc($result)){
                        $holdQuantity1=$row["QuantiteStock"]; 
                        }
        
                         }else{echo "Une erreur s est produite ";}  
                        
                        $updNio= ("UPDATE `Produit` SET `QuantiteStock` = '".$quantiteGagneN - $quantitePerduN + $holdQuantity1."' WHERE `Produit`.`idProduit` = ".$idProduitN."");
                        if(mysqli_query($db,$updNio)){echo"";}else{
                            echo"Error : ".mysqli_error($db);
                        }

                        $updN= ("UPDATE `BonusPerte` SET `idProduit` = '".$idProduitN."' WHERE `BonusPerte`.`idBonusPerte` = ".verifions($_POST["Identifiant"])."");
                       $updPA= ("UPDATE `BonusPerte` SET `QuantiteGagne` = '".$quantiteGagneN."' WHERE `BonusPerte`.`idBonusPerte` = ".verifions($_POST["Identifiant"])."");
                        $updPV= ("UPDATE `BonusPerte` SET `QuantitePerdu` = '".$quantitePerduN."' WHERE `BonusPerte`.`idBonusPerte` = ".verifions($_POST["Identifiant"])."");
                        $updQ= ("UPDATE `BonusPerte` SET `Motif` = '".$motifN."' WHERE `BonusPerte`.`idBonusPerte` = ".verifions($_POST["Identifiant"])."");
                        
                        $updDa= ("UPDATE `BonusPerte` SET `DatesD` = '".$datesDN."' WHERE `BonusPerte`.`idBonusPerte` = ".verifions($_POST["Identifiant"])."");
                        
                        

                        if(mysqli_query($db,$updN)){echo"";}else{
                            echo"Error : ".mysqli_error($db);
                        }
                        if(mysqli_query($db,$updPA)){echo"";}else{
                            echo"Error : ".mysqli_error($db);
                        }
                        if(mysqli_query($db,$updPV)){echo"";}else{
                            echo"Error : ".mysqli_error($db);
                        }
                        if(mysqli_query($db,$updQ)){echo"<span>Mis a jour fait</span>";}else{
                            echo"Error : ".mysqli_error($db);
                        }
                        
                        if(mysqli_query($db,$updDa)){echo"<span>Mis a jour fait</span>";}else{
                            echo"Error : ".mysqli_error($db);
                        }
                        
                        
                        echo "voici :".$idProduitN." vD".$quantiteGagneN." mP".$QuantitePerduN." q".$datesDN;
                }
                if(verifions($_POST["Sorte"])==3){
                    $del= ("DELETE FROM BonusPerte WHERE idBonusPerte=".verifions($_POST["Identifiant"])."");
                    if(mysqli_query($db,$del)){echo"<span> Suppression fait</span>";}else{
                        echo"Error : ".mysqli_error($db);
                    }
                }
                
                function datalist(){
                    include 'connexion.php';
                    $sql = ("SELECT Nom, idBonusPerte, Produit.idProduit, QuantitePerdu, QuantiteGagne, DatesD FROM BonusPerte, Produit WHERE (BonusPerte.idProduit = Produit.idProduit)");
                    $result = mysqli_query($db, $sql);
                            
                    if(mysqli_num_rows($result)>0){
                                        
                        while($row= mysqli_fetch_assoc($result)){
                            echo"<option value='".$row["idBonusPerte"].":nom=:".$row["Nom"].": Qte Perdu=:".$row["QuantitePerdu"].": Qte Gain= :".$row["QuantiteGagne"].": date= :".$row["DatesD"].": ".$row["idProduit"]."'>".$row["Nom"]." :perte= ".$row["QuantitePerdu"].":gain= ".$row["QuantiteGagne"]."</option>"; 
                        }
                               
                   }else{echo "Une erreur s est produite ";}  
            
                }

                function chercheProduit(){
                    include 'connexion.php';
                      $reqSql= ("SELECT idProduit, Nom, QuantiteStock FROM Produit ");
                    $result= mysqli_query($db, $reqSql);
                    if(mysqli_num_rows($result)>0){
                
                        while($row= mysqli_fetch_assoc($result)){
                        echo"<option value='".$row["idProduit"].":  Nom:".$row["Nom"]."'>".$row["Nom"].": ".$row["QuantiteStock"]."</option>"; 
                        }
        
                    }else{echo "Une erreur s est produite ";} 
                }
                
                
            ?>  
            </p>
    </div>
    <div class="column2">
       
        <div class="enveloppe2">
            
                <form method= "POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
                <p id="nouvelPP" >
                        
                        <input class="form-control" onchange="verificatN();" id="idProduitNNN" type="text" list=idproduit placeholder="choisissez ici un produit">
                        <input type="hidden" id="idProduitNN" name="idProduit">
                        <datalist id="idproduit">
                         <?php chercheProduit();?>
                        </datalist>
                    
                        <input type="number" class="form-control" id="QuantiteGagne" name="QuantiteGagne" placeholder="Quantite Gagne" required>
                        
                        <input type="number" class="form-control" id="QuantitePerdu" name="QuantitePerdu" placeholder="Quantite Perdu" required>
                        
                        <textarea class="form-control mt-3" id="Motif" name="Motif" placeholder="Motif" style="width: 30%;">motif: </textarea>
                                
                        <label for="DatesD">Date</label><br>
                        <input class="form-control" type="date" id="DatesD" name="DatesD"> 
                        <input type="hidden"  name="Sorte" value="1">
                        <input type="submit" name="submit" value="submit" >
                </p>
                </form>
            
            

            <div id="modify" class="hidform">
                <form method= "POST" action=" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
                <input type="text" class="form-control" onchange="verificationM();" list="identM" id="identifM" onchange="verificatM()" placeholder="Identifiant" required>
                        <datalist id="identM">
                            <?php 
                                datalist();

                            ?>
                        </datalist>
                    <input type="hidden" name="Identifiant" id="cache">
                    <input type="text" onchange="verificatM();" id="idProduitMMM" list="idproduitM"  placeholder="Mettez ici le nom du produit">
                    <input type="hidden" id="idProduitMM" name="idProduit">
                    <datalist id="idproduitM">
                         <?php chercheProduit();?>
                        </datalist>
                        
                        <input type="number" class="form-control" id="QuantiteGagneM" name="QuantiteGagne" placeholder="Quantite Gagne" >
                        
                        <input type="number" class="form-control" id="QuantitePerduM" name="QuantitePerdu" placeholder="Quantite Perdu" >
                        
                        <textarea id="Motif" class="form-control"  style="width: 30%;" name="Motif" placeholder="Motif" cols="30" rows="5" > </textarea>
                                
                        
                        <input type="date" class="form-control" id="DatesM" name="DatesD"> 
                
                    <input type="hidden" name="Sorte" value="2">
                    <input type="submit" value="soumettre">
                </form>
            </div>

            <div id="delet" class="hidform">
                <form method= "post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
                    
                 <input type="number" id="Identifiant" name="Identifiant" placeholder="identifiant" required>
                    <input type="hidden" name="Sorte" value="3">
                    <input type="submit" value="Supprimer">
                </form>
            </div>
        </div>

        <div class="tableau" style="background-color:#ddd;">
            <?php
                include 'connexion.php';
                        
                $reqSql= ("SELECT `idBonusPerte`,`Nom`,`PrixVente`, `QuantiteGagne`, `QuantitePerdu`,QuantiteStock, `Motif`, `DatesD`  FROM Produit ,BonusPerte  WHERE BonusPerte.idProduit=Produit.idProduit order by DatesD desc");
                $result= mysqli_query($db, $reqSql);
                if(mysqli_num_rows($result)>0){
                    $valeur=0;
                    echo"<table class='table table-bordered'><tr><th>identifiant</th><th>Nom Produit</th><th>Quantite gagne</th><th>Quantite perdu</th><th>Quantite en stock</th><th>motif</th><th>Valeur</th><th>DatesD</th></tr>";
                    while($row= mysqli_fetch_assoc($result)){
                            $valGagne=($row["PrixVente"]*$row["QuantiteGagne"]);
                            $valPerte=($row["PrixVente"]*$row["QuantitePerdu"]);
                            echo"<tr><td>".$row["idBonusPerte"]."</td><td>".$row["Nom"]."</td><td>".$row["QuantiteGagne"]."</td><td>".$row["QuantitePerdu"]."</td><td>".$row["QuantiteStock"]."</td><td>".$row["Motif"]."</td><td>".$valGagne-$valPerte."</td><td>".$row["DatesD"]."</td></tr>"; 
                    }
                    echo"</table>";
                }else{echo "Une erreur s est produite ";}

            ?> 
            
        
        </div>
            
        
    </div>
    
        
</div>


<div class="footer">
        <h2>&copy Copyrigth 2023</h2>
        <p>franck sefu kaunga +243 973359746
            <br>Je suis le gars de miss Stella
        </p>
</div>
<script>
    function verificatN(){
        if(document.getElementById("idProduitNNN").value != ""){
            let cont = document.getElementById("idProduitNNN").value;
            let tableau = cont.split(":");
            let nom =tableau[2];
           
            let identifiant = tableau[0]*1;

            document.getElementById("idProduitNN").value = identifiant;
        }
    }
    function verificatM(){
        if(document.getElementById("idProduitMMM").value != ""){
            let cont = document.getElementById("idProduitMMM").value;
            let tableau = cont.split(":");
            let nom =tableau[2];
            
            let identifiant = tableau[0]*1;

            document.getElementById("idProduitMM").value = identifiant;
        }
    }

    function verificationM(){
        if(document.getElementById("identifM").value != ""){
            let cont = document.getElementById("identifM").value;
            let tableau = cont.split(":");
            let idProd =tableau[9];
            let dateD = tableau[8];
            let quantiteP = tableau[4]*1;
            let quantiteG = tableau[6]*1;
            let identifiant = tableau[0]*1;

            document.getElementById("idProduitMMM").value = idProd;
            document.getElementById("QuantiteGagneM").value = quantiteG;
            document.getElementById("QuantitePerduM").value = quantiteP;
            document.getElementById("DatesM").value = dateD;
            document.getElementById("cache").value = identifiant;
        }
    }
    function verificationS(){
        if(document.getElementById("IdentifiantS").value != ""){
            let cont = document.getElementById("IdentifiantS").value;
            let tableau = cont.split(":");
            let identifiant = tableau[0]*1;
            document.getElementById("cacheS").value = identifiant;
        }
    }
</script>
 
</body>
</html>
