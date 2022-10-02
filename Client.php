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
            /* c est cette largeur que j ai modifier*/
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
    <a href="produitb.php" >Produit</a>
    <a href="bonusPerte.php" >Bonus et Perte</a>
    <a href="sortie.php">Sortie</a>
    <a href="diminution.php">Diminution</a>
    <a href="Client.php" class="active">Client</a>
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
            document.getElementById('nouvelPP').style.display='none';document.getElementById('delet').style.display='none';"> Modifier </button></li>
            <li><button class="btn btn-primary" type="button" onclick="document.getElementById('delet').style.display='block';
            document.getElementById('nouvelPP').style.display='none';document.getElementById('modify').style.display='none';"> Supprimer </button></li>
            
        </ul>
        <p id="region">
            <?php 
            
            include 'connexion.php';
            $nom=$telephone="";
            
            if($_SERVER["REQUEST_POST"]=="POST"){
                    $nom=verifions($_POST["NomClient"]);
                    $prixAchat=verifions($_POST["Telephone"]);
                    
                    $sorte=verifions($_POST["Sorte"]);
                    $identifiant=verifions($_POST["Identifiant"]);
                    
            }    
                function verifions($donne){
                    
                    $donne=htmlspecialchars($donne);
    
                    return $donne;
                }
                if(verifions($_POST["Sorte"])==1){
                $reqSql=("INSERT INTO `Client`(`NomClient`, Telephone) values('".verifions($_POST["NomClient"])."','".verifions($_POST["Telephone"])."')");
                if(mysqli_query($db, $reqSql)){
                echo"<span id='succes'> enregistrement fait</span>";
                }else{
                echo"error : ".mysqli_error($db)."ligne155";
                }
            }
                $nomA=" ";$nomN=" ";$telephoneA=0;$telephoneN=0;;
                $updN=" ";$updPA=" ";$updPV=" ";$updQ=" ";
                if(verifions($_POST["Sorte"])==2){
                    $reqSql= ("SELECT NomClient,Telephone FROM Client WHERE idClient =".verifions($_POST["Identifiant"])."");
                        $result= mysqli_query($db, $reqSql);
                        if(mysqli_num_rows($result)>0){
                            while($row= mysqli_fetch_assoc($result)){
                                $nomA= $row["NomClient"];
                                $telephoneA= $row["Telephone"];
                                
                            }
                        }else{echo "Une erreur s est produite ";}
                        if(empty(verifions($_POST["NomClient"]))){
                            $nomN=$nomA;
                        }else{$nomN=verifions($_POST["NomClient"]);}
                        if(empty(verifions($_POST["Telephone"]))){
                            $telephoneN=$telephoneA;
                        }else{$telephoneN=verifions($_POST["Telephone"]);}
                        
                        $updN= ("UPDATE `Client` SET `NomClient` = '".$nomN."' WHERE `Client`.`idClient` = ".verifions($_POST["Identifiant"])."");
                       $updPA= ("UPDATE `Client` SET `Telephone` = '".$telephoneN."' WHERE `Client`.`idClient` = ".verifions($_POST["Identifiant"])."");
                        

                        if(mysqli_query($db,$updN)){echo"";}else{
                            echo"Error : ".mysqli_error($db);
                        }
                        if(mysqli_query($db,$updPA)){echo"";}else{
                            echo"Error : ".mysqli_error($db);
                        }
                        
                        echo "voici :".$nomN." telepphone".$telephoneN;
                }
                if(verifions($_POST["Sorte"])==3){
                    $del= ("DELETE FROM Client WHERE idClient=".verifions($_POST["Identifiant"])."");
                    if(mysqli_query($db,$del)){echo"<span> Suppression fait</span>";}else{
                        echo"Error : ".mysqli_error($db);
                    }
                }
                
                
            ?>  
            </p>
    </div>
    <div class="column2">
        
        <div class="enveloppe2">
            
                <form method= "POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
                <p id="nouvelPP" >
                        
                        <input type="text" class="form-control" id="Nom" name="NomClient" placeholder="Nom du client" required>*
                    
                        <input type="text" id="Telephone" class="form-control" name="Telephone" placeholder="Numero de Telephone" >FC
                        
                        <input type="hidden"  name="Sorte" value="1">
                        <input type="submit" name="submit" value="submit" >
                </p>
                </form>
            
            

            <div id="modify" class="hidform">
                <form method= "POST" action=" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
                     <input type="number" name="Identifiant" placeholder="Identifiant"><br>
                    
                <input type="text" class="form-control" id="Nom" name="NomClient" placeholder="Nom du client" ><br>
                    
                    <input type="text" class="form-control" id="telephone" name="Telephone" placeholder="Telephone"  >FC<br>
                    
                    <input type="hidden" name="Sorte" value="2">
                    <input type="submit" value="soumettre">
                </form>
            </div>

            <div id="delet" class="hidform">
                <form method= "post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
                    
                Identifiant <input type="number" class="form-control"  id="Identifiant" name="Identifiant" placeholder="identifiant" required>
                    <input type="hidden" name="Sorte" value="3">
                    <input type="submit" value="Supprimer">
                </form>
            </div>
        </div>
        <div class="tableau" style="background-color:#ddd;">
            <?php
                include 'connexion.php';
                        
                $reqSql= ("SELECT idClient, NomClient, Telephone FROM Client order by NomClient ");
                $result= mysqli_query($db, $reqSql);
                if(mysqli_num_rows($result)>0){
                    echo"<table id='Customers'><tr><th>identifiant</th><th>Nom du client</th><th>Telephone</th></tr>";
                    while($row= mysqli_fetch_assoc($result)){
                            echo"<tr><td>".$row["idClient"]."</td><td>".$row["NomClient"]."</td><td>".$row["Telephone"]."</td></tr>"; 
                    }
                    echo"</table>";
                }else{echo "Une erreur s est produite ";}

            ?> 
            
        
        </div>
            
        
    </div>
    
        
</div>


<div class="footer">
        <h2>&copy Copyrigth 2022</h2>
        <p>franck sefu +243 973359746</p>
</div>
 
</body>
</html>