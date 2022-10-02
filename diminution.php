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
<body style="background: url(fond3.png) no-repeat center fixed; background-size:cover">
<div  class="header" style="background-color: transparent;">
        <h1 style="text-shadow: 3px 3px 5px white;color: #fff;">Suivie d' entreprise</h1>
</div>

<div class="topnav">
    <a href="accueilEntreprise.php">Accueil</a>
    <a href="produitb.php" >Produit</a>
    <a href="bonusPerte.php" >Bonus et Perte</a>
    <a href="sortie.php">Sortie</a>
    <a href="diminution.php" class="active">Diminution</a>
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
            <li><button type="button" class="btn btn-primary" 
            onclick="document.getElementById('nouvelPP').style.display='block';
            document.getElementById('modify').style.display='none';document.getElementById('delet').style.display='none';">Nouveau</button></li>
            <li><button type="button" class="btn btn-primary"
            onclick="document.getElementById('modify').style.display='block';
            document.getElementById('nouvelPP').style.display='none';document.getElementById('delet').style.display='none';"> Modifier </button></li>
            <li><button type="button" class="btn btn-primary" onclick="document.getElementById('delet').style.display='block';
            document.getElementById('nouvelPP').style.display='none';document.getElementById('modify').style.display='none';"> Supprimer </button></li>
            
        </ul>
        <p id="region">
            <?php 

function insereur($Produit, $newQuantity, $datesD, $pU){
    if($Produit == ""){
        echo "";
    }else{
        $holdQuantity = 0;
        $tableau = explode(":",$Produit);
        $idProduit = $tableau[0]*1;
        if($pU == ""){
            $pU = $tableau[6]*1;
        }
        include 'connexion.php';
        $reqSql= ("SELECT  QuantiteStock FROM Produit WHERE idProduit=".$idProduit." ");
        $result= mysqli_query($db, $reqSql);
        if(mysqli_num_rows($result)>0){

            while($row= mysqli_fetch_assoc($result)){
                $holdQuantity=$row["QuantiteStock"]; 
            }

        }else{echo "Une erreur s est produite ";}  
        $valeur = ($holdQuantity - $newQuantity) * $pU; 
        $updNi= ("UPDATE `Produit` SET `QuantiteStock` = '".$newQuantity."' WHERE `Produit`.`idProduit` = ".$idProduit."");
        if(mysqli_query($db,$updNi)){echo"";}else{
            echo"Error : ".mysqli_error($db);
        }
    
        $reqSql=("INSERT INTO `Dimiinution`(`idProduit`, NewQuantity, `HoldQuantity`, `Differenced`,PU, Valeur,`DatesD`) 
        values('".$idProduit."','".$newQuantity."','".$holdQuantity."','".($holdQuantity-$newQuantity)."','".$pU."','".$valeur."','".$datesD."')");
        if(mysqli_query($db, $reqSql)){
            echo"<span id='succes'> enregistrement fait</span>";
        }else{
            echo"error : ".mysqli_error($db)."ligne155";
        }
            
    }
    
}
            include 'connexion.php';

            if($_SERVER["REQUEST_POST"]=="POST"){
                    $idProduit=verifions($_POST["idProduit"]);
                    $newQuantity=verifions($_POST["NewQuantity"]);
                    $holdQuantity=verifions($_POST["HoldQuantity"]);
                    
                    $datesD=verifions($_POST["DatesD"]);
                    $sorte=verifions($_POST["Sorte"]);
                    $identifiant=verifions($_POST["Identifiant"]);
                    
            }    
                function verifions($donne){
                    
                    $donne=htmlspecialchars($donne);
    
                    return $donne;
                }
                
                if(verifions($_POST["Sorte"])==1){
                    insereur(htmlspecialchars($_POST["idProduit0"]), htmlspecialchars($_POST["NewQuantity0"]), htmlspecialchars($_POST["DatesD"]), htmlspecialchars($_POST["PU0"]));
                    insereur(htmlspecialchars($_POST["idProduit1"]), htmlspecialchars($_POST["NewQuantity1"]), htmlspecialchars($_POST["DatesD"]), htmlspecialchars($_POST["PU1"]));
                    insereur(htmlspecialchars($_POST["idProduit2"]), htmlspecialchars($_POST["NewQuantity2"]), htmlspecialchars($_POST["DatesD"]), htmlspecialchars($_POST["PU2"]));
                    insereur(htmlspecialchars($_POST["idProduit3"]), htmlspecialchars($_POST["NewQuantity3"]), htmlspecialchars($_POST["DatesD"]), htmlspecialchars($_POST["PU3"]));
                    insereur(htmlspecialchars($_POST["idProduit4"]), htmlspecialchars($_POST["NewQuantity4"]), htmlspecialchars($_POST["DatesD"]), htmlspecialchars($_POST["PU4"]));
                    insereur(htmlspecialchars($_POST["idProduit5"]), htmlspecialchars($_POST["NewQuantity5"]), htmlspecialchars($_POST["DatesD"]), htmlspecialchars($_POST["PU5"]));
                    insereur(htmlspecialchars($_POST["idProduit6"]), htmlspecialchars($_POST["NewQuantity6"]), htmlspecialchars($_POST["DatesD"]), htmlspecialchars($_POST["PU6"]));
                    insereur(htmlspecialchars($_POST["idProduit7"]), htmlspecialchars($_POST["NewQuantity7"]), htmlspecialchars($_POST["DatesD"]), htmlspecialchars($_POST["PU7"]));
                    insereur(htmlspecialchars($_POST["idProduit8"]), htmlspecialchars($_POST["NewQuantity8"]), htmlspecialchars($_POST["DatesD"]), htmlspecialchars($_POST["PU8"]));
                    insereur(htmlspecialchars($_POST["idProduit9"]), htmlspecialchars($_POST["NewQuantity9"]), htmlspecialchars($_POST["DatesD"]), htmlspecialchars($_POST["PU9"]));
                    insereur(htmlspecialchars($_POST["idProduit10"]), htmlspecialchars($_POST["NewQuantity10"]), htmlspecialchars($_POST["DatesD"]), htmlspecialchars($_POST["PU10"]));
                    insereur(htmlspecialchars($_POST["idProduit11"]), htmlspecialchars($_POST["NewQuantity11"]), htmlspecialchars($_POST["DatesD"]), htmlspecialchars($_POST["PU11"]));
                    insereur(htmlspecialchars($_POST["idProduit12"]), htmlspecialchars($_POST["NewQuantity12"]), htmlspecialchars($_POST["DatesD"]), htmlspecialchars($_POST["PU12"]));
                    insereur(htmlspecialchars($_POST["idProduit13"]), htmlspecialchars($_POST["NewQuantity13"]), htmlspecialchars($_POST["DatesD"]), htmlspecialchars($_POST["PU13"]));
                    insereur(htmlspecialchars($_POST["idProduit14"]), htmlspecialchars($_POST["NewQuantity14"]), htmlspecialchars($_POST["DatesD"]), htmlspecialchars($_POST["PU14"]));
                    insereur(htmlspecialchars($_POST["idProduit15"]), htmlspecialchars($_POST["NewQuantity15"]), htmlspecialchars($_POST["DatesD"]), htmlspecialchars($_POST["PU15"]));
                    
                    insereur(htmlspecialchars($_POST["idProduit16"]), htmlspecialchars($_POST["NewQuantity16"]), htmlspecialchars($_POST["DatesD"]), htmlspecialchars($_POST["PU16"]));
                    insereur(htmlspecialchars($_POST["idProduit17"]), htmlspecialchars($_POST["NewQuantity17"]), htmlspecialchars($_POST["DatesD"]), htmlspecialchars($_POST["PU17"]));
                    insereur(htmlspecialchars($_POST["idProduit18"]), htmlspecialchars($_POST["NewQuantity18"]), htmlspecialchars($_POST["DatesD"]), htmlspecialchars($_POST["PU18"]));
                    insereur(htmlspecialchars($_POST["idProduit19"]), htmlspecialchars($_POST["NewQuantity19"]), htmlspecialchars($_POST["DatesD"]), htmlspecialchars($_POST["PU19"]));
                    
                    /*for($i = 0; $i < 19; $i++){
                        
                        $produit = "idProduit"+$i;
                        $newQ = "NewQuantity" + $i;
                        $PU = "PU"+$i;
                        if(htmlspecialchars($_POST($produit)) == ""){

                        }else{
                            insereur(htmlspecialchars($_POST[$produit]), htmlspecialchars($_POST[$newQ]), htmlspecialchars($_POST["DatesD"]), htmlspecialchars($_POST[$PU]));
                    
                        }
                        
                    }*/
                    
                }
                $idProduitA=" ";$idProduitN=" ";$newQuantityA=0;$newQuantityN=0;$holdQuantityA=0;$holdQuantityN=0;$differenceA=0;$differenceN=0; $datesDA=" ";$datesDN=" ";
                $updN=" ";$updPA=" ";$updPV=" ";$updQ=" ";
                if(verifions($_POST["Sorte"])==2){
                    $reqSql= ("SELECT idProduit, NewQuantity, HoldQuantity, PU, Valeur,`Differenced`,DatesD FROM Dimiinution  WHERE idDiminution =".verifions($_POST["Identifiant"])."");
                        $result= mysqli_query($db, $reqSql);
                        if(mysqli_num_rows($result)>0){
                            while($row= mysqli_fetch_assoc($result)){
                                $idProduitA= $row["idProduit"];
                                $newQuantityA= $row["NewQuantity"];
                                $holdQuantityA= $row["HoldQuantity"];
                                $differenceA= $row["Differenced"];
                                $puA = $row["PU"];
                                //$valeurA = $row["Valeur"];
                                
                                $datesDA= $row["DatesD"];
                            }
                        }else{echo "Une erreur s est produite ";}
                        if(empty(verifions($_POST["idProduit"]))){
                            $idProduitN=$idProduitA;
                        }else{$idProduitN=(int)verifions($_POST["idProduit"]);}

                        if(empty(verifions($_POST["PU"]))){
                            $puN=$puA;
                        }else{$puN=htmlspecialchars($_POST["PU"]);}

                        if(empty(verifions($_POST["NewQuantity"]))){
                            $newQuantityN=$newQuantityA;
                        }else{
                            $newQuantityN=verifions($_POST["NewQuantity"]);   
                        }
                        if(empty(verifions($_POST["HoldQuantity"]))){
                            $holdQuantityN=$holdQuantityA;
                        }else{$holdQuantityN=verifions($_POST["HoldQuantity"]);}
                        if(empty(verifions($_POST["HoldQuantity"])) && empty(verifions($_POST["NewQuantity"]))){
                            $differenceN=$holdQuantityN-$newQuantityN;
                        }else{$differenceN=$holdQuantityN-$newQuantityN;}
                        
                        if(empty(verifions($_POST["DatesD"]))){
                            $datesDN=$datesDA;
                        }else{$datesDN=verifions($_POST["DatesD"]);}

                        $updN= ("UPDATE `Dimiinution` SET `idProduit` = '".$idProduitN."' WHERE `Dimiinution`.`idDiminution` = ".verifions($_POST["Identifiant"])."");
                       $updPA= ("UPDATE `Dimiinution` SET `NewQuantity` = '".$newQuantityN."' WHERE `Dimiinution`.`idDiminution` = ".verifions($_POST["Identifiant"])."");
                        $updPV= ("UPDATE `Dimiinution` SET `HoldQuantity` = '".$holdQuantityN."' WHERE `Dimiinution`.`idDiminution` = ".verifions($_POST["Identifiant"])."");
                        $updQ= ("UPDATE `Dimiinution` SET `Differenced` = '".$differenceN."' WHERE `Dimiinution`.`idDiminution` = ".verifions($_POST["Identifiant"])."");
                        $updpu= ("UPDATE `Dimiinution` SET `PU` = '".$puN."' WHERE `Dimiinution`.`idDiminution` = ".verifions($_POST["Identifiant"])."");
                        $updvaleur= ("UPDATE `Dimiinution` SET `Valeur` = '".$puN * $differenceN."' WHERE `Dimiinution`.`idDiminution` = ".verifions($_POST["Identifiant"])."");
                        
                        $updDa= ("UPDATE `Dimiinution` SET `DatesD` = '".$datesDN."' WHERE `Dimiinution`.`idDiminution` = ".verifions($_POST["Identifiant"])."");
                        
                        if(mysqli_query($db,$updpu)){echo"";}else{
                            echo"Error : ".mysqli_error($db);
                        }
                        if(mysqli_query($db,$updvaleur)){echo"";}else{
                            echo"Error : ".mysqli_error($db);
                        }

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
                        
                        if(mysqli_query($db,$updDa)){echo"";}else{
                            echo"Error : ".mysqli_error($db);
                        }
                        
                        $updNio= ("UPDATE `Produit` SET `QuantiteStock` = '".$newQuantityN."' WHERE `Produit`.`idProduit` = ".$idProduitN."");
                        if(mysqli_query($db,$updNio)){echo"";}else{
                            echo"Error : ".mysqli_error($db);
                        }
                        echo "voici :".$idProduitN." vD".$newQuantityN." mP".$holdQuantityN." q".$datesDN;
                }
                if(verifions($_POST["Sorte"])==3){
                    $del= ("DELETE FROM Dimiinution WHERE idDiminution=".verifions($_POST["Identifiant"])."");
                    if(mysqli_query($db,$del)){echo"<span> Suppression fait</span>";}else{
                        echo"Error : ".mysqli_error($db);
                    }
                }

                function chercherProduit(){
                    include 'connexion.php';

                      $reqSql= ("SELECT idProduit, Nom, QuantiteStock, PrixVente FROM Produit ");
                        $result= mysqli_query($db, $reqSql);
                        if(mysqli_num_rows($result)>0){
                
                            while($row= mysqli_fetch_assoc($result)){
                                echo"<option value='".$row["idProduit"].": Nom :".$row["Nom"].": Qtite stock :".$row["QuantiteStock"].": P.U :".$row["PrixVente"]."'>".$row["Nom"].": ".$row["QuantiteStock"]."</option>"; 
                            }
        
                    }else{echo "Une erreur s est produite ";} 
                }
                function modification(){
                    include 'connexion.php';
                    $reqSql= ("SELECT `idDiminution`,`Nom`,`PrixVente`, `NewQuantity`,Dimiinution.idProduit, `HoldQuantity`, `Differenced`, `DatesD`, PU,Valeur  FROM Produit ,Dimiinution  WHERE Dimiinution.idProduit=Produit.idProduit order by DatesD desc limit 700");
                    $result= mysqli_query($db, $reqSql);
                    if(mysqli_num_rows($result)>0){
                        
                        while($row= mysqli_fetch_assoc($result)){
                            echo"<option value ='".$row["idDiminution"].": Produit :".$row["idProduit"].":".$row["Nom"].": Nv Qtite :".$row["NewQuantity"].": Ancienne Qtite :".$row["HoldQuantity"].":difference:".$row["Differenced"].": Prix U :".$row["PU"].": Valeur :".$row["Valeur"].": Dates :".$row["DatesD"]."'>Valeur : ".$row["Valeur"].": dates :".$row["DatesD"]."</option>"; 
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
                <input type="submit" value="soumettre" style="width: 20%" id="envoi">
                  <input type="date" style="width: 35%;" id="DatesD" name="DatesD" class="form-control">
                  <input type="text" id="calculeur" readonly class="form-control" style="width: 30%;" placeholder="Calcul total..."><br>
                            
                        
                    <span  onclick="effaceRapide(0)" style=" color :aliceblue; font-size:40px; background:transparent; "> &Cross;</span>
                    <input type = "text" style="width: 30%;" list = "idproduit0" id = "Produit0" name="idProduit0"  placeholder="Chercher un produit ici ..." class="form-control">
                        <datalist id="idproduit0">
                            <?php chercherProduit(); ?>
                       </datalist>
                    <input type="hidden" id="prixU0" name="prixU0">
                    <input type="number" id="quantite0" style="width: 15%;"name="NewQuantity0" onchange="clickMoi()"placeholder="Nouvelle Quantite" class="form-control">
                    <input type="float" id = "pu0" style="width: 15%;" onchange="clickPrix()" name="PU0" placeholder="P.U reduction" class="form-control">
                    <input type="float" style="width: 7%;" class="form-control" id="diff0"  placeholder="Diff" readonly>

                    <input type="float" style="width: 20%;" class="form-control" id="demo0"  placeholder="Calcul direct" readonly>
                     <br>
                     
                     <span  onclick="effaceRapide(1)" style=" color :aliceblue; font-size:40px; background:transparent; "> &Cross;</span>
                    <input type = "text" style="width: 30%;" list = "idproduit1" id = "Produit1" name="idProduit1"  placeholder="Chercher un produit ici ..." class="form-control">
                        <datalist id="idproduit1">
                            <?php chercherProduit(); ?>
                       </datalist>
                    <input type="hidden" id="prixU1" name="prixU1">
                    <input type="number" id="quantite1" style="width: 15%;"name="NewQuantity1" onchange="clickMoi()"placeholder="Nouvelle Quantite" class="form-control">
                    <input type="float" id = "pu1" style="width: 15%;" onchange="clickPrix()" name="PU1" placeholder="P.U reduction" class="form-control">
                    <input type="float" style="width: 7%;" class="form-control" id="diff1"  placeholder="Diff" readonly>

                    <input type="float" style="width: 20%;" class="form-control" id="demo1"  placeholder="Calcul direct" readonly>
                    <br>

                    <span  onclick="effaceRapide(2)" style=" color :aliceblue; font-size:40px; background:transparent; "> &Cross;</span>
                    <input type = "text" style="width: 30%;" list = "idproduit2" id = "Produit2" name="idProduit2"  placeholder="Chercher un produit ici ..." class="form-control">
                        <datalist id="idproduit2">
                            <?php chercherProduit(); ?>
                       </datalist>
                    <input type="hidden" id="prixU2" name="prixU2">
                    <input type="number" id="quantite2" style="width: 15%;"name="NewQuantity2" onchange="clickMoi()"placeholder="Nouvelle Quantite" class="form-control">
                    <input type="float" id = "pu2" style="width: 15%;" onchange="clickPrix()" name="PU2" placeholder="P.U reduction" class="form-control">
                    <input type="float" style="width: 7%;" class="form-control" id="diff2"  placeholder="Diff" readonly>

                    <input type="float" style="width: 20%;" class="form-control" id="demo2"  placeholder="Calcul direct" readonly>
                    <br>

                    <span  onclick="effaceRapide(3)" style=" color :aliceblue; font-size:40px; background:transparent; "> &Cross;</span>
                    <input type = "text" style="width: 30%;" list = "idproduit3" id = "Produit1" name="idProduit3"  placeholder="Chercher un produit ici ..." class="form-control">
                        <datalist id="idproduit3">
                            <?php chercherProduit(); ?>
                       </datalist>
                    <input type="hidden" id="prixU3" name="prixU3">
                    <input type="number" id="quantite3" style="width: 15%;"name="NewQuantity3" onchange="clickMoi()"placeholder="Nouvelle Quantite" class="form-control">
                    <input type="float" id = "pu3" style="width: 15%;" onchange="clickPrix()" name="PU3" placeholder="P.U reduction" class="form-control">
                    <input type="float" style="width: 7%;" class="form-control" id="diff3"  placeholder="Diff" readonly>

                    <input type="float" style="width: 20%;" class="form-control" id="demo3"  placeholder="Calcul direct"  readonly>
                    <br>

                    <span  onclick="effaceRapide(4)" style=" color :aliceblue; font-size:40px; background:transparent; "> &Cross;</span>
                    <input type = "text" style="width: 30%;" list = "idproduit4" id = "Produit4" name="idProduit4"  placeholder="Chercher un produit ici ..." class="form-control">
                        <datalist id="idproduit4">
                            <?php chercherProduit(); ?>
                       </datalist>
                    <input type="hidden" id="prixU4" name="prixU4">
                    <input type="number" id="quantite4" style="width: 15%;"name="NewQuantity4" onchange="clickMoi()"placeholder="Nouvelle Quantite" class="form-control">
                    <input type="float" id = "pu4" style="width: 15%;" onchange="clickPrix()" name="PU4" placeholder="P.U reduction" class="form-control">
                    <input type="float" style="width: 7%;" class="form-control" id="diff4"  placeholder="Diff" readonly>

                    <input type="float" style="width: 20%;" class="form-control" id="demo4"  placeholder="Calcul direct" readonly>
                    <br>

                    <span  onclick="effaceRapide(5)" style=" color :aliceblue; font-size:40px; background:transparent; "> &Cross;</span>
                    <input type = "text" style="width: 30%;" list = "idproduit5" id = "Produit5" name="idProduit5"  placeholder="Chercher un produit ici ..." class="form-control">
                        <datalist id="idproduit5">
                            <?php chercherProduit(); ?>
                       </datalist>
                    <input type="hidden" id="prixU5" name="prixU5">
                    <input type="number" id="quantite5" style="width: 15%;"name="NewQuantity5" onchange="clickMoi()"placeholder="Nouvelle Quantite" class="form-control">
                    <input type="float" id = "pu5" style="width: 15%;" onchange="clickPrix()" name="PU5" placeholder="P.U reduction" class="form-control">
                    <input type="float" style="width: 7%;" class="form-control" id="diff5"  placeholder="Diff" readonly>

                    <input type="float" style="width: 20%;" class="form-control" id="demo5"  placeholder="Calcul direct" readonly>
                    <br>

                    <span  onclick="effaceRapide(6)" style=" color :aliceblue; font-size:40px; background:transparent; "> &Cross;</span>
                    <input type = "text" style="width: 30%;" list = "idproduit6" id = "Produit1" name="idProduit6"  placeholder="Chercher un produit ici ..." class="form-control">
                        <datalist id="idproduit6">
                            <?php chercherProduit(); ?>
                       </datalist>
                    <input type="hidden" id="prixU6" name="prixU6">
                    <input type="number" id="quantite6" style="width: 15%;"name="NewQuantity6" onchange="clickMoi()"placeholder="Nouvelle Quantite" class="form-control">
                    <input type="float" id = "pu6" style="width: 15%;" onchange="clickPrix()" name="PU6" placeholder="P.U reduction" class="form-control">
                    <input type="float" style="width: 7%;" class="form-control" id="diff6"  placeholder="Diff" readonly>

                    <input type="float" style="width: 20%;" class="form-control" id="demo6"  placeholder="Calcul direct" readonly>
                    <br>

                    <span  onclick="effaceRapide(7)" style=" color :aliceblue; font-size:40px; background:transparent; "> &Cross;</span>
                    <input type = "text" style="width: 30%;" list = "idproduit7" id = "Produit7" name="idProduit7"  placeholder="Chercher un produit ici ..." class="form-control">
                        <datalist id="idproduit7">
                            <?php chercherProduit(); ?>
                       </datalist>
                    <input type="hidden" id="prixU7" name="prixU7">
                    <input type="number" id="quantite7" style="width: 15%;"name="NewQuantity7" onchange="clickMoi()"placeholder="Nouvelle Quantite" class="form-control">
                    <input type="float" id = "pu7" style="width: 15%;" onchange="clickPrix()" name="PU7" placeholder="P.U reduction" class="form-control">
                    <input type="float" style="width: 7%;" class="form-control" id="diff7"  placeholder="Diff" readonly>

                    <input type="float" style="width: 20%;" class="form-control" id="demo7"  placeholder="Calcul direct" readonly>
                    <br>

                    <span  onclick="effaceRapide(8)" style=" color :aliceblue; font-size:40px; background:transparent; "> &Cross;</span>
                    <input type = "text" style="width: 30%;" list = "idproduit1" id = "Produit8" name="idProduit8"  placeholder="Chercher un produit ici ..." class="form-control">
                        <datalist id="idproduit8">
                            <?php chercherProduit(); ?>
                       </datalist>
                    <input type="hidden" id="prixU8" name="prixU8">
                    <input type="number" id="quantite8" style="width: 15%;"name="NewQuantity8" onchange="clickMoi()"placeholder="Nouvelle Quantite" class="form-control">
                    <input type="float" id = "pu8" style="width: 15%;" onchange="clickPrix()" name="PU8" placeholder="P.U reduction" class="form-control">
                    <input type="float" style="width: 7%;" class="form-control" id="diff8"  placeholder="Diff" readonly>

                    <input type="float" style="width: 20%;" class="form-control" id="demo8"  placeholder="Calcul direct" readonly>
                    <br>

                    <span  onclick="effaceRapide(9)" style=" color :aliceblue; font-size:40px; background:transparent; "> &Cross;</span>
                    <input type = "text" style="width: 30%;" list = "idproduit9" id = "Produit9" name="idProduit9"  placeholder="Chercher un produit ici ..." class="form-control">
                        <datalist id="idproduit9">
                            <?php chercherProduit(); ?>
                       </datalist>
                    <input type="hidden" id="prixU9" name="prixU9">
                    <input type="number" id="quantite9" style="width: 15%;"name="NewQuantity9" onchange="clickMoi()"placeholder="Nouvelle Quantite" class="form-control">
                    <input type="float" id = "pu9" style="width: 15%;" onchange="clickPrix()" name="PU9" placeholder="P.U reduction" class="form-control">
                    <input type="float" style="width: 7%;" class="form-control" id="diff9"  placeholder="Diff" readonly>

                    <input type="float" style="width: 20%;" class="form-control" id="demo9"  placeholder="Calcul direct" readonly>
                    <br>

                    <span  onclick="effaceRapide(10)" style=" color :aliceblue; font-size:40px; background:transparent; "> &Cross;</span>
                    <input type = "text" style="width: 30%;" list = "idproduit10" id = "Produit10" name="idProduit10"  placeholder="Chercher un produit ici ..." class="form-control">
                        <datalist id="idproduit10">
                            <?php chercherProduit(); ?>
                       </datalist>
                    <input type="hidden" id="prixU10" name="prixU10">
                    <input type="number" id="quantite10" style="width: 15%;"name="NewQuantity10" onchange="clickMoi()"placeholder="Nouvelle Quantite" class="form-control">
                    <input type="float" id = "pu10" style="width: 15%;" onchange="clickPrix()" name="PU10" placeholder="P.U reduction" class="form-control">
                    <input type="float" style="width: 7%;" class="form-control" id="diff10"  placeholder="Diff" readonly>

                    <input type="float" style="width: 20%;" class="form-control" id="demo10"  placeholder="Calcul direct" readonly>
                    <br>

                    <span  onclick="effaceRapide(11)" style=" color :aliceblue; font-size:40px; background:transparent; "> &Cross;</span>
                    <input type = "text" style="width: 30%;" list = "idproduit11" id = "Produit11" name="idProduit11"  placeholder="Chercher un produit ici ..." class="form-control">
                        <datalist id="idproduit11">
                            <?php chercherProduit(); ?>
                       </datalist>
                    <input type="hidden" id="prixU11" name="prixU11">
                    <input type="number" id="quantite11" style="width: 15%;"name="NewQuantity11" onchange="clickMoi()"placeholder="Nouvelle Quantite" class="form-control">
                    <input type="float" id = "pu11" style="width: 15%;" onchange="clickPrix()" name="PU11" placeholder="P.U reduction" class="form-control">
                    <input type="float" style="width: 7%;" class="form-control" id="diff11"  placeholder="Diff" readonly>

                    <input type="float" style="width: 20%;" class="form-control" id="demo11"  placeholder="Calcul direct" readonly>
                    <br>

                    <span  onclick="effaceRapide(12)" style=" color :aliceblue; font-size:40px; background:transparent; "> &Cross;</span>
                    <input type = "text" style="width: 30%;" list = "idproduit12" id = "Produit12" name="idProduit12"  placeholder="Chercher un produit ici ..." class="form-control">
                        <datalist id="idproduit12">
                            <?php chercherProduit(); ?>
                       </datalist>
                    <input type="hidden" id="prixU12" name="prixU12">
                    <input type="number" id="quantite12" style="width: 15%;"name="NewQuantity12" onchange="clickMoi()"placeholder="Nouvelle Quantite" class="form-control">
                    <input type="float" id = "pu12" style="width: 15%;" onchange="clickPrix()" name="PU12" placeholder="P.U reduction" class="form-control">
                    <input type="float" style="width: 7%;" class="form-control" id="diff12"  placeholder="Diff" readonly>

                    <input type="float" style="width: 20%;" class="form-control" id="demo12"  placeholder="Calcul direct" readonly>
                    <br>

                    <span  onclick="effaceRapide(13)" style=" color :aliceblue; font-size:40px; background:transparent; "> &Cross;</span>
                    <input type = "text" style="width: 30%;" list = "idproduit13" id = "Produit13" name="idProduit13"  placeholder="Chercher un produit ici ..." class="form-control">
                        <datalist id="idproduit13">
                            <?php chercherProduit(); ?>
                       </datalist>
                    <input type="hidden" id="prixU13" name="prixU13">
                    <input type="number" id="quantite13" style="width: 15%;"name="NewQuantity13" onchange="clickMoi()"placeholder="Nouvelle Quantite" class="form-control">
                    <input type="float" id = "pu13" style="width: 15%;" onchange="clickPrix()" name="PU13" placeholder="P.U reduction" class="form-control">
                    <input type="float" style="width: 7%;" class="form-control" id="diff13"  placeholder="Diff" readonly>

                    <input type="float" style="width: 20%;" class="form-control" id="demo13"  placeholder="Calcul direct" readonly>
                    <br>

                    <span  onclick="effaceRapide(14)" style=" color :aliceblue; font-size:40px; background:transparent; "> &Cross;</span>
                    <input type = "text" style="width: 30%;" list = "idproduit14" id = "Produit14" name="idProduit14"  placeholder="Chercher un produit ici ..." class="form-control">
                        <datalist id="idproduit14">
                            <?php chercherProduit(); ?>
                       </datalist>
                    <input type="hidden" id="prixU14" name="prixU14">
                    <input type="number" id="quantite14" style="width: 15%;"name="NewQuantity14" onchange="clickMoi()"placeholder="Nouvelle Quantite" class="form-control">
                    <input type="float" id = "pu14" style="width: 15%;" onchange="clickPrix()" name="PU14" placeholder="P.U reduction" class="form-control">
                    <input type="float" style="width: 7%;" class="form-control" id="diff14"  placeholder="Diff" readonly>

                    <input type="float" style="width: 20%;" class="form-control" id="demo14"  placeholder="Calcul direct" readonly>
                    <br>

                    <span  onclick="effaceRapide(15)" style=" color :aliceblue; font-size:40px; background:transparent; "> &Cross;</span>
                    <input type = "text" style="width: 30%;" list = "idproduit15" id = "Produit15" name="idProduit15"  placeholder="Chercher un produit ici ..." class="form-control">
                        <datalist id="idproduit15">
                            <?php chercherProduit(); ?>
                       </datalist>
                    <input type="hidden" id="prixU15" name="prixU15">
                    <input type="number" id="quantite15" style="width: 15%;"name="NewQuantity15" onchange="clickMoi()"placeholder="Nouvelle Quantite" class="form-control">
                    <input type="float" id = "pu15" style="width: 15%;" onchange="clickPrix()" name="PU15" placeholder="P.U reduction" class="form-control">
                    <input type="float" style="width: 7%;" class="form-control" id="diff15"  placeholder="Diff" readonly>

                    <input type="float" style="width: 20%;" class="form-control" id="demo15"  placeholder="Calcul direct" readonly>
                    <br>

                    <span  onclick="effaceRapide(16)" style=" color :aliceblue; font-size:40px; background:transparent; "> &Cross;</span>
                    <input type = "text" style="width: 30%;" list = "idproduit16" id = "Produit16" name="idProduit16"  placeholder="Chercher un produit ici ..." class="form-control">
                        <datalist id="idproduit16">
                            <?php chercherProduit(); ?>
                       </datalist>
                    <input type="hidden" id="prixU16" name="prixU16">
                    <input type="number" id="quantite16" style="width: 15%;"name="NewQuantity16" onchange="clickMoi()"placeholder="Nouvelle Quantite" class="form-control">
                    <input type="float" id = "pu16" style="width: 15%;" onchange="clickPrix()" name="PU16" placeholder="P.U reduction" class="form-control">
                    <input type="float" style="width: 7%;" class="form-control" id="diff16"  placeholder="Diff" readonly>

                    <input type="float" style="width: 20%;" class="form-control" id="demo16"  placeholder="Calcul direct" readonly>
                    <br>

                    <span  onclick="effaceRapide(17)" style=" color :aliceblue; font-size:40px; background:transparent; "> &Cross;</span>
                    <input type = "text" style="width: 30%;" list = "idproduit17" id = "Produit17" name="idProduit17"  placeholder="Chercher un produit ici ..." class="form-control">
                        <datalist id="idproduit17">
                            <?php chercherProduit(); ?>
                       </datalist>
                    <input type="hidden" id="prixU17" name="prixU17">
                    <input type="number" id="quantite17" style="width: 15%;"name="NewQuantity17" onchange="clickMoi()"placeholder="Nouvelle Quantite" class="form-control">
                    <input type="float" id = "pu17" style="width: 15%;" onchange="clickPrix()" name="PU17" placeholder="P.U reduction" class="form-control">
                    <input type="float" style="width: 7%;" class="form-control" id="diff17"  placeholder="Diff" readonly>

                    <input type="float" style="width: 20%;" class="form-control" id="demo17"  placeholder="Calcul direct" readonly>
                    <br>

                    <span  onclick="effaceRapide(18)" style=" color :aliceblue; font-size:40px; background:transparent; "> &Cross;</span>
                    <input type = "text" style="width: 30%;" list = "idproduit18" id = "Produit18" name="idProduit18"  placeholder="Chercher un produit ici ..." class="form-control">
                        <datalist id="idproduit18">
                            <?php chercherProduit(); ?>
                       </datalist>
                    <input type="hidden" id="prixU18" name="prixU18">
                    <input type="number" id="quantite18" style="width: 15%;"name="NewQuantity18" onchange="clickMoi()"placeholder="Nouvelle Quantite" class="form-control">
                    <input type="float" id = "pu18" style="width: 15%;" onchange="clickPrix()" name="PU18" placeholder="P.U reduction" class="form-control">
                    <input type="float" style="width: 7%;" class="form-control" id="diff18"  placeholder="Diff" readonly>

                    <input type="float" style="width: 20%;" class="form-control" id="demo18"  placeholder="Calcul direct" readonly>
                    <br>
                        <input type="hidden"  name="Sorte" value="1">
                        
                </p>
                </form>
            
            

            <div id="modify" class="hidform">
            <form method= "POST" action=" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
                <input type="text" id="IdentifiantM" list="modification" onchange="verificationM()"  placeholder="Rechercher ici la ligne a modifier ..." class="form-control">
                <datalist id="modification">
                    <?php modification(); ?>
                </datalist>
                <input type="hidden" id="identifM" name="Identifiant">
                <input type="text" list=idproduit00 id="ProduitM"  placeholder="Chercher un produit ici..." class="form-control">

                <datalist id="idproduit00">
                    <?php chercherProduit(); ?>
                </datalist>
                <input type="hidden" name="idProduit" id="ProduitMM" >

                <input type="float" class="form-control" id="NewQuantityM" name="NewQuantity" placeholder="Nouvelle quantite" required>
                <input type="float" class="form-control" id="PUM" name="PU" placeholder="PU s il y a changement ..." >
                
                <input type="date" id="DatesM" name="DatesD" class="form-control"> 
                <input type="submit" value="Soumettre">
                    <input type="hidden" name="Sorte" value="2">
                    
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
        <div class="tableau" style="background-color:#ddd;">
            <?php
                include 'connexion.php';
                $reqSql= ("SELECT `idDiminution`,`Nom`,`PrixVente`, `NewQuantity`, `HoldQuantity`, `Differenced`, `DatesD`, PU,Valeur  FROM Produit ,Dimiinution  WHERE Dimiinution.idProduit=Produit.idProduit order by DatesD desc, idDiminution desc limit 500");
                $result= mysqli_query($db, $reqSql);
                if(mysqli_num_rows($result)>0){
                    $valeur=0;
                    echo"<table class='table table-striped'><tr><th>identifiant</th><th>Nom Produit</th><th>Nouvelle quantite</th><th>AncienneQuantite</th><th>Difference</th><th>PU</th><th>Valeur</th><th>DatesD</th></tr>";
                    while($row= mysqli_fetch_assoc($result)){
                            $valeur=($row["PrixVente"]*$row["Differenced"]);
                            echo"<tr><td>".$row["idDiminution"]."</td><td>".$row["Nom"]."</td><td>".$row["NewQuantity"]."</td><td>".$row["HoldQuantity"]."</td><td>".$row["Differenced"]."</td><td>".$row["PU"]."</td><td>".$row["Valeur"]."</td><td>".$row["DatesD"]."</td></tr>"; 
                    }
                    echo"</table>";
                }else{echo "Une erreur s est produite ";}

            ?> 
            
        
        </div>
            
        
    </div>
    
        
</div>


<div class="footer">
        <h2>&copy; Copyrigth 2022</h2>
        <p>franck sefu +243 973359746</p>
</div>
 <script>
     document.getElementById("calculeur").addEventListener("mouseover", calcul1);
    document.getElementById("calculeur").addEventListener("mouseover", total);
    document.getElementById("calculeur").addEventListener("mouseover", verify);
    document.getElementById("envoi").addEventListener("mouseover", calcul1);
    document.getElementById("envoi").addEventListener("mouseover", verify);
    document.getElementById("envoi").addEventListener("mouseover", clickMoi);

        function verify(){
            
            for(let i= 0;i<21 ; i++){
                let lettre = "Produit"+i;
                if(document.getElementById(lettre).value !=""){
                    let enlettre = "quantite"+i;
                document.getElementById(enlettre).setAttribute("required","");
                document.getElementById(enlettre).style.borderColor="green";
                }
                
            }
            
        }
    
        function calcul1(){
            for(let j= 0;j<21 ; j++){
                let lettre = "Produit"+j;
                let valeurT =document.getElementById(lettre).value;
                let prixU;
                let prixTableux;
                let pvT;
                let ah="quantite"+j;
                let puV = "pu"+j;
                let pr = "prixU"+j;
                let quant2 =document.getElementById(ah).value;
                prixTableux = valeurT.split(":");
                let quant1 = prixTableux[4]*1;
                let prixEssaie = prixTableux[6]*1;
                let difference;
                let diffe;
                

                if(document.getElementById(puV).value != ""){
                    prixU = document.getElementById(puV).value;
                    if(document.getElementById(ah).value !=""){
                           difference = quant1 - quant2;
                            pvT = prixU * difference;
                            let demons = "demo"+j;
                             diffe = "diff"+j;
                            document.getElementById(diffe).value = quant1-quant2;
                            document.getElementById(demons).value = pvT;
                            document.getElementById(pr).value = prixU;
                            document.getElementById(demons).style.backgroundColor = "yellow";
                           
                        }else{
                            document.getElementById(enlettre).style.border="2px solid red"; 
                        }
                }else{

                    if(document.getElementById(lettre).value !=""){
                        let enlettre = "quantite"+j;
                        
                        prixU = prixTableux[6]*1;
                        if(document.getElementById(enlettre).value !=""){
                            pvT = prixEssaie * (quant1 - quant2);
                            let demons = "demo"+j;
                             diffe = "diff"+j;
                            document.getElementById(diffe).value = quant1-quant2;
                            document.getElementById(demons).value = pvT;
                            document.getElementById(demons).style.backgroundColor = "yellow";
                            document.getElementById(pr).value = prixU;
                            //document.getElementById("datesVentes").value =Date();
                            
                            
                            
                        }else{
                            document.getElementById(enlettre).style.border="2px solid red"; 
                        }
                    
                    }
                }
               
            }
           
            
        }

        function clickMoi(){
           for(let i = 0; i<21; i++){
            let ident= "Produit"+i;
               if(document.getElementById(ident).value != ""){
                    
                    let quant = "quantite"+i;
                    let comparer = document.getElementById(quant).value;
                    let motComp = document.getElementById(ident).value;
                    let comparareur = motComp.split(":");
                    let valeur = comparareur[4]*1;
                    if(valeur < comparer){
                        document.getElementById(quant).style.color = "red";
                        document.getElementById(quant).style.border = "4px solid red";
                        document.getElementById("envoi").setAttribute("disabled", "");
                    }else{
                        document.getElementById(quant).style.color = "green";
                        document.getElementById(quant).style.border = "1px solid green";
                        document.getElementById("envoi").removeAttribute("disabled");
                    }
               }
           }
        }

        function total(){
            let voyons = 0;
            for(let i = 0; i < 19; i++){
                let contenu = "demo"+i;
                let y = document.getElementById(contenu).value;
                if(y != "" ){
                
                    voyons =voyons + ((document.getElementById(contenu).value) * 1);
                    
                }
                document.getElementById("calculeur").value = voyons;
                document.getElementById("calculeur").style.backgroundColor = "yellow";
                
            }
            voyons = 0;
        }

        function effaceRapide(i){
            let Produit = "Produit"+i;
            let prixU = "prixU"+i;
            let quantite = "quantite"+i;
            let pu = "pu" + i;
            let diff = "diff"+i;
            let demo = "demo"+i;

            document.getElementById(Produit).value = "";
            document.getElementById(prixU).value = "";
            document.getElementById(quantite).value = "";
            document.getElementById(pu).value = "";
            document.getElementById(diff).value = "";
            document.getElementById(demo).value = "";
        }

        function verificationM(){
        if(document.getElementById("IdentifiantM").value != ""){
            let cont = document.getElementById("IdentifiantM").value;
            let tableau = cont.split(":");
            let idProd =tableau[2]+": Nom :"+tableau[3];
            let dateD = tableau[15];
            let nvlQ = tableau[5]*1;
            let prixU = tableau[11]*1;
            let identifiant = tableau[0]*1;
            

            document.getElementById("ProduitM").value = idProd;
            document.getElementById("PUM").value = prixU;
            document.getElementById("NewQuantityM").value = nvlQ;
            document.getElementById("DatesM").value = dateD;
            document.getElementById("identifM").value = identifiant;
        }
    }
        

 </script>
</body>
</html>