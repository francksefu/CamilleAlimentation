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
        
    #calcul{
        display: none;
    }
        #nouvelPP  {
            display: none;
        }
        #modify,#ferme{
             display: none;
        }
        #delet { 
            display: none;
        }
        #region{
            display: none;
        }
        table{
            width : 100%;
        }
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
        td{
            text-align: center;
        }
    </style>
    
</head>
<body style="background: url(fond.png) no-repeat center fixed; background-size:cover">
<div  class="header" style="background-color: transparent;">
        <h1 style="text-shadow: 3px 3px 5px white;color: #fff;">Suivie d' entreprise</h1>
</div>

<div class="topnav">
    <a href="accueilEntreprise.php">Accueil</a>
    <a href="produitb.php" class="active">Produit</a>
    <a href="bonusPerte.php" >Bonus et Perte</a>
    <a href="sortie.php">Sorties</a>
    <a href="diminution.php">Diminution</a>
    <a href="Client.php">Client</a>
    <a href="detteClient.php">Dettes clients</a>
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
            document.getElementById('nouvelPP').style.display='none';document.getElementById('delet').style.display='none';"> Modifier Produit</button></li>
            <li><button class="btn btn-primary" type="button" onclick="document.getElementById('delet').style.display='block';
            document.getElementById('nouvelPP').style.display='none';document.getElementById('modify').style.display='none';"> Supprimer Produit</button></li>
            
        </ul>
        <p id="region">
        
            
            <?php 
                include "connexion.php";
    
                $nom=$prixAcht=$prixVente=$quantite="";
            
             if($_SERVER["REQUEST_POST"]=="POST"){
                    $nom=verifions($_POST["Nom"]);
                    $prixAchat=verifions($_POST["PrixAchat"]);
                    $prixVente=verifions($_POST["PrixVente"]);
                    $quantite=verifions($_POST["QuantiteStock"]);
                    $sorte=verifions($_POST["Sorte"]);
                    $identifiant=verifions($_POST["Identifiant"]);
                    
                }    
                function verifions($donne){
                    
                    $donne=htmlspecialchars($donne);
    
                    return $donne;
                }
                if(verifions($_POST["Sorte"])==1){
                $reqSql=("INSERT INTO `Produit`(`Nom`, PrixAchat, `PrixVente`, `QuantiteStock`) values('".verifions($_POST["Nom"])."','".verifions($_POST["PrixAchat"])."','".$_POST["PrixVente"]."','".$_POST["QuantiteStock"]."')");
                if(mysqli_query($db, $reqSql)){
                echo"<span id='succes'> enregistrement fait</span>";
                }else{
                echo"error : ".mysqli_error($db)."ligne155";
                }
            }
                $nomA=" ";$nomN=" ";$pAA=0;$pAAN=0;$pVA=0;$pVAN=0;$qA=0;$qAN=0;
                $updN=" ";$updPA=" ";$updPV=" ";$updQ=" ";
                if(verifions($_POST["Sorte"])==2){
                    $reqSql= ("SELECT Nom,PrixAchat,PrixVente,QuantiteStock FROM Produit WHERE idProduit =".verifions($_POST["Identifiant"])."");
                        $result= mysqli_query($db, $reqSql);
                        if(mysqli_num_rows($result)>0){
                            while($row= mysqli_fetch_assoc($result)){
                                $nomA= $row["Nom"];
                                $pAA= $row["PrixAchat"];
                                $pVA= $row["PrixVente"];
                                $qA= $row["QuantiteStock"];
                            }
                        }else{echo "Une erreur s est produite ";}
                        if(empty(verifions($_POST["Nom"]))){
                            $nomN=$nomA;
                        }else{$nomN=verifions($_POST["Nom"]);}
                        if(empty(verifions($_POST["PrixAchat"]))){
                            $pAAN=$pAA;
                        }else{$pAAN=verifions($_POST["PrixAchat"]);}
                        if(empty(verifions($_POST["PrixVente"]))){
                            $pVAN=$pVA;
                        }else{$pVAN=verifions($_POST["PrixVente"]);}
                        if(empty(verifions($_POST["QuantiteStock"]))){
                            $qAN=$qA;
                        }else{$qAN=verifions($_POST["QuantiteStock"]);}
                        $updN= ("UPDATE `Produit` SET `Nom` = '".$nomN."' WHERE `Produit`.`idProduit` = ".verifions($_POST["Identifiant"])."");
                       $updPA= ("UPDATE `Produit` SET `PrixAchat` = '".$pAAN."' WHERE `Produit`.`idProduit` = ".verifions($_POST["Identifiant"])."");
                        $updPV= ("UPDATE `Produit` SET `PrixVente` = '".$pVAN."' WHERE `Produit`.`idProduit` = ".verifions($_POST["Identifiant"])."");
                        $updQ= ("UPDATE `Produit` SET `QuantiteStock` = '".$qAN."' WHERE `Produit`.`idProduit` = ".verifions($_POST["Identifiant"])."");

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
                        echo "voici :".$nomN." pA".$pAAN." pV".$pVAN." q".$qAN;
                }
                if(verifions($_POST["Sorte"])==3){
                    $del= ("DELETE FROM Produit WHERE idProduit=".verifions($_POST["Identifiant"])."");
                    if(mysqli_query($db,$del)){echo"<span> Suppression fait</span>";}else{
                        echo"Error : ".mysqli_error($db);
                    }
                }
                function datalist(){
                    include 'connexion.php';
                    $sql = ("SELECT*FROM Produit");
                    $result = mysqli_query($db, $sql);
                            
                    if(mysqli_num_rows($result)>0){
                                        
                        while($row= mysqli_fetch_assoc($result)){
                            echo"<option value='".$row["idProduit"].":nom=:".$row["Nom"].": PV=:".$row["PrixVente"].": USD Qtite :".$row["QuantiteStock"].":PA= :".$row["PrixAchat"].": USD'>".$row["Nom"]." : ".$row["PrixVente"]." USD</option>"; 
                        }
                               
                   }else{echo "Une erreur s est produite ";}  
            
                }
                
            ?>  
            </p>
    </div>
    <div class="column2">
       
        <div class="enveloppe2">
            
                <form method= "POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
                <div id="nouvelPP" >
                        
                    <input type="text" id="Nom" name="Nom" placeholder="Nom du Produit" required class="form-control">*

                    <div class = "input-group mb-3" style="width: 30%;"> 
                        <input type="float" id="PrixAchat" name="PrixAchat" placeholder="Prix Achat" required class="form-control">
                        <div class="input-group-append"> 
                            <span class="input-group-text">Fc</span>
                        </div>
                    </div>
                    <div class = "input-group mb-3" style="width: 30%;"> 
                        <input type="float" id="PrixVente" name="PrixVente" placeholder="Prix Vente" required class="form-control">
                        <div class="input-group-append"> 
                            <span class="input-group-text">Fc</span>
                        </div>
                    </div>
                        
                        <input type="number" id="Quantite" name="QuantiteStock" placeholder="Quantite en stock" required class="form-control">
                        <input type="hidden"  name="Sorte" value="1">
                        <input type="submit" value="Soumettre" name="Submit">
                </div>
                </form>
           
            

            <div id="modify" class="hidform">
                <form method= "POST" action=" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
                    <input type="text" id="IdentifiantM" onchange="verificatM();" placeholder="Nom ou autre du produit a modifier" required class="form-control" list="identifM">*
                    <input type="hidden" id="recuperateurM" name="Identifiant">
                    <input type="text" id="NomM" name="Nom" placeholder="Nom du Produit" required class="form-control">*

                    <datalist id="identifM"><?php datalist();?></datalist>

                    <div class = "input-group mb-3" style="width: 30%;"> 
                        <input type="float" id="PrixAchatM" name="PrixAchat" placeholder="Prix Achat" required class="form-control">
                        <div class="input-group-append"> 
                            <span class="input-group-text">Fc</span>
                        </div>
                    </div>
                    <div class = "input-group mb-3" style="width: 30%;"> 
                        <input type="float" id="PrixVenteM" name="PrixVente" placeholder="Prix Vente" required class="form-control">
                        <div class="input-group-append"> 
                            <span class="input-group-text">Fc</span>
                        </div>
                    </div>
                        
                        <input type="number" id="QuantiteM" name="QuantiteStock" placeholder="Quantite en stock" required class="form-control">
                        <input type="hidden"  name="Sorte" value="2">
                        <input type="submit" name="submit" value="submit" >
                </form>
            </div>

            <div id="delet" class="hidform">
                <form method= "post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
                    
                <input type="text" id="IdentifiantS" placeholder="Nom ou autre du produit a Supprimer"list="identifS" required class="form-control">
                <input type="hidden" id="recuperateurS" name="Identifiant">
                <datalist id="identifS"><?php datalist(); ?></datalist>
                     <input type="hidden" name="Sorte" value="3">
                    <input type="submit" value="Supprimer">
                </form>
            </div>
        </div>
        
        <div class="tableau" style="background-color:#ddd;">
        <button class="btn btn-primary"style="width:30%;" onclick="document.getElementById('ferme').style.display='block';">Valeur du stock</button>
        
            <div id="ferme">
            <?php
            
                include "connexion.php";

                $prixAchatTotal = 0;
                $prixVenteTotal = 0;
                $reqSql1= ("SELECT idProduit, Nom, PrixAchat, PrixVente, QuantiteStock FROM Produit order by Nom asc");
                $result1= mysqli_query($db, $reqSql1);
                if(mysqli_num_rows($result1)>0){
                    while($row1= mysqli_fetch_assoc($result1)){
                            //echo"<tr><td>".$row["idProduit"]."</td><td>".$row["Nom"]."</td><td>".$row["PrixAchat"]."</td><td>".$row["PrixVente"]."</td><td>".$row["QuantiteStock"]."</td></tr>"; 
                        $prixAchatTotal += ($row1["PrixAchat"] * $row1["QuantiteStock"]);
                        $prixVenteTotal += ($row1["PrixVente"] * $row1["QuantiteStock"]);

                    }
                    //echo "<p style='display:none;'>";
                    echo"<p style='width:60%; margin : 5%;heigth:10%; border-radius 28px;'> PA de toute la marchandise est : ".$prixAchatTotal." Fc<br><br>";
                    echo" PV de toute la marchandise est : ".$prixVenteTotal." Fc</p>";
                    
                }else{echo "Calcul impossible ";}
                echo "</div>"; 
                   
                $reqSql= ("SELECT idProduit, Nom, PrixAchat, PrixVente, QuantiteStock FROM Produit order by Nom asc");
                $result= mysqli_query($db, $reqSql);
                if(mysqli_num_rows($result)>0){
                    echo"<table class='table table-bordered'><thead><tr><th>identifiant</th><th>Nom</th><th>Prix d Achat</th><th>Prix Vente</th><th>Quantite en Stock</th></tr></thead><tbody id='myTable'>";
                    while($row= mysqli_fetch_assoc($result)){
                            echo"<tr><td>".$row["idProduit"]."</td><td>".$row["Nom"]."</td><td>".$row["PrixAchat"]."</td><td>".$row["PrixVente"]."</td><td>".$row["QuantiteStock"]."</td></tr>"; 
                    }
                    echo"</tbody></table>";
                }else{echo "Une erreur s est produite ";}
            
            ?> 
            
        
        </div>
            
        
    </div>
    
        
</div>


<div class="footer">
        <h2>&copy copyrigth 2022</h2>
        <p>franck sefu +243 973359746</p>
</div>
<script>
    function verificatM(){
        if(document.getElementById("IdentifiantM").value != ""){
            let cont = document.getElementById("IdentifiantM").value;
            let tableau = cont.split(":");
            let nom =tableau[2];
            let prixA = tableau[8]*1;
            let prixV = tableau[4]*1;
            let quantite = tableau[6]*1;
            let identifiant = tableau[0]*1;

            document.getElementById("NomM").value = nom;
            document.getElementById("PrixAchatM").value = prixA;
            document.getElementById("QuantiteM").value = quantite;
            document.getElementById("PrixVenteM").value = prixV;
            document.getElementById("recuperateurM").value = identifiant;
        }
    }
    function verificatS(){
        if(document.getElementById("IdentifiantS").value != ""){
            let cont = document.getElementById("IdentifiantS").value;
            let tableau = cont.split(":");
            let identifiant = tableau[0]*1;
            document.getElementById("recuperateurS").value = identifiant;
        }
    }
</script>
 
</body>
</html>