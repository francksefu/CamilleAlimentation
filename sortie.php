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
        #voirTextArea{
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
    <a href="sortie.php" class="active">Sortie</a>
    <a href="diminution.php">Diminution</a>
    <a href="Client.php">Client</a>
    <a href="detteClient.php" >Dettes clients</a>
    <a href="detteEntreprise.php" >Dette Entreprise</a>
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
            $db_username='root';
            $db_password='';
            $db_name='ControleEntreprise';
            $db_host='locahost';
    

            $db=mysqli_connect("localhost", "root", "", "ControleEntreprise")
                or die('Ne peux pas se connecter a la base de donnee'); 
            

            if($_SERVER["REQUEST_POST"]=="POST"){
                    $idClient=verifions($_POST["TypeD"]);
                    $valeurDette=verifions($_POST["Montant"]);
                    $il_pris_quoi=verifions($_POST["il_pris_quoi"]);
                    $datesD=verifions($_POST["DatesD"]);
                    $sorte=verifions($_POST["Sorte"]);
                    $identifiant=verifions($_POST["Identifiant"]);
                    
            }    
                function verifions($donne){
                    
                    $donne=htmlspecialchars($donne);
    
                    return $donne;
                }
            if(verifions($_POST["Sorte"])==1){
                if(empty(verifions($_POST["DatesP"]))) {   
                    $reqSql=("INSERT INTO `Sortie`(`TypeD`, `Montant`,`il_pris_quoi`,`DatesD`) 
                    values('".verifions($_POST["TypeD"])."','".verifions($_POST["Montant"])."','".verifions($_POST["il_pris_quoi"])."','".verifions($_POST["DatesD"])."')");
                    if(mysqli_query($db, $reqSql)){
                    echo"<span id='succes'> enregistrement fait</span>";
                    }else{
                    echo"error : ".mysqli_error($db)."ligne155";
                    }
                }else{
                    $reqSql=("INSERT INTO `Sortie`(`TypeD`, `Montant`,`il_pris_quoi`,`DatesD`,DatesP) 
                    values('".verifions($_POST["TypeD"])."','".verifions($_POST["Montant"])."','".verifions($_POST["il_pris_quoi"])."','".verifions($_POST["DatesD"])."','".verifions($_POST["DatesP"])."')");
                    if(mysqli_query($db, $reqSql)){
                    echo"<span id='succes'> enregistrement fait</span>";
                    }else{
                    echo"error : ".mysqli_error($db)."ligne155";
                    }
                }    
            }
                $typeDA=" ";$typeDN=" ";$montantA=0;$montantN=0;$il_pris_quoiA=" ";$il_pris_quoiN=" ";$datesDA=" ";$datesDN=" ";$datesPA=" ";$datesPN=" ";
                $updN=" ";$updPA=" ";$updPV=" ";$updQ=" ";
                if(verifions($_POST["Sorte"])==2){
                    $reqSql= ("SELECT TypeD,Montant,il_pris_quoi,DatesD,DatesP FROM Sortie  WHERE idSortie =".verifions($_POST["Identifiant"])."");
                        $result= mysqli_query($db, $reqSql);
                        if(mysqli_num_rows($result)>0){
                            while($row= mysqli_fetch_assoc($result)){
                                $typeDA= $row["TypeD"];          
                                $montantA= $row["Montant"];
                                
                                $il_pris_quoiA= $row["il_pris_quoi"];
                                $datesDA= $row["DatesD"];
                                $datesPA= $row["DatesP"];
                            }
                        }else{echo "Une erreur s est produite ";}
                        if(empty(verifions($_POST["TypeD"]))){
                            $typeDN=$typeDA;
                        }else{$typeDN=verifions($_POST["TypeD"]);}
                        
                        if(empty(verifions($_POST["Montant"]))){
                            $montantN=$montantA;
                        }else{$montantN=verifions($_POST["Montant"]);}
                        
                        if(empty(verifions($_POST["il_pris_quoi"]))){
                            $il_pris_quoiN=$il_pris_quoiA;
                        }else{$il_pris_quoiN=verifions($_POST["il_pris_quoi"]);}
                        if(empty(verifions($_POST["DatesD"]))){
                            $datesDN=$datesDA;
                        }else{$datesDN=verifions($_POST["DatesD"]);}
                        if(empty(verifions($_POST["DatesP"]))){
                            $datesPN=NULL;
                        }else{$datesPN=verifions($_POST["DatesP"]);}
                            
                            
                        

                        $updN= ("UPDATE `Sortie` SET `TypeD` = '".$typeDN."' WHERE `Sortie`.`idSortie` = ".verifions($_POST["Identifiant"])."");
                       $updPA= ("UPDATE `Sortie` SET `Montant` = '".$montantN."' WHERE `Sortie`.`idSortie` = ".verifions($_POST["Identifiant"])."");
                        $updil= ("UPDATE `Sortie` SET `il_pris_quoi` = '".$il_pris_quoiN."' WHERE `Sortie`.`idSortie` = ".verifions($_POST["Identifiant"])."");
                        $updDa= ("UPDATE `Sortie` SET `DatesD` = '".$datesDN."' WHERE `Sortie`.`idSortie` = ".verifions($_POST["Identifiant"])."");
                        $updDp= ("UPDATE `Sortie` SET `DatesP` = '".$datesPN."' WHERE `Sortie`.`idSortie` = ".verifions($_POST["Identifiant"])."");

                        if(mysqli_query($db,$updN)){echo"";}else{
                            echo"Error : ".mysqli_error($db);
                        }
                        if(mysqli_query($db,$updPA)){echo"";}else{
                            echo"Error : ".mysqli_error($db);
                        }
                        
                        
                        if(mysqli_query($db,$updil)){echo"";}else{
                            echo"Error : ".mysqli_error($db);
                        }
                        if(mysqli_query($db,$updDa)){echo"";}else{
                            echo"Error : ".mysqli_error($db);
                        }
                        if(mysqli_query($db,$updDp)){echo"";}else{
                            
                        }
                        
                        echo "voici :".$typeDN." vD".$montantN."  q".$datesPN;
                }
                if(verifions($_POST["Sorte"])==3){
                    $del= ("DELETE FROM Sortie WHERE idSortie=".verifions($_POST["Identifiant"])."");
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
                <div id="nouvelPP" >
                        
                        <select class="custom-select" style="width: 30%;" id="TypeD" name="TypeD">
                            <option value="Aucun">Aucun</option>
                            <option value="Depense">Depense(Achat)</option>
                            <option value="Dette">Dette</option>
                            <option value="Charge">Charge</option>
                        </select>
                        
                   
                        <input type="float" class="form-control" id="Montant" name="Montant" placeholder="mettez ici le montant sortie" required>FC
                        
                        
                        <textarea id="il_pris_quoi" class="form-control" style="width: 30%;" name="il_pris_quoi" rows="5" cols="40">motif:</textarea>
                        <br><label for="DatesD">Date</label><br>
                        <input type="date" class="form-control" id="DatesD" name="DatesD">
                        <br><label for="DatesP"><p class="text-warning">Date Precedente<br> <i>laisser ce champs vide si cette sortie ne concerne pas la revenue de la date precedante</i></p></label><br>
                        <input type="date" id="DatesP" name="DatesP">  
                
                        <input type="hidden"  name="Sorte" value="1">
                        <input type="submit" name="submit" value="submit" >
            </div>
                </form>
            
            

            <div id="modify" class="hidform">
                <form method= "POST" action=" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
                    <input type="number" name="Identifiant" placeholder="Identifiant" required><br>
                    
                    <select class="custom-select" style="width: 30%;" id="TypeD"  name="TypeD"  >
                        <option value="Aucun">Aucun</option>
                        <option value="Depense">Depense(Achat)</option>
                        <option value="Dette">Dette</option>
                        <option value="Charge">Charge</option>
                    </select>
                    
                        <input type="float" class="form-control" id="Montant" name="Montant" placeholder="mettez ici le montant sortie" >FC
                        
                        
                        <textarea class="form-control" style="width: 30%;" style="width: 30%;" id="il_pris_quoi" name="il_pris_quoi" rows="5" cols="40"></textarea>
                        
                        <input type="date" class="form-control" id="DatesD" name="DatesD">
                        <p class="text-warning">Date Precedente<br> <i>laisser ce champs vide si cette sortie ne concerne pas la revenue de la date precedante</i></p></label><br>
                        
                        <input type="date" class="form-control" id="DatesP" name="DatesP">  
                
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
        <div class="tableau" style="background-color:#ddd;">
            <?php
                $db_username= 'root';
                $db_password= '';
                $db_name= 'ControleEntreprise';
                $db_host= 'localhost';
            
                $db= mysqli_connect ($db_host, $db_username, $db_password, $db_name )
                        or die('Ne peux pas se connecter a la base de donnee');
                        
                $reqSql= ("SELECT idSortie,TypeD,  Montant,il_pris_quoi, DatesD,DatesP FROM Sortie order by DatesD desc ");
                $result= mysqli_query($db, $reqSql);
                if(mysqli_num_rows($result)>0){
                    echo"<table class='table table-bordered'><tr><th>identifiant</th><th>Type </th><th>Montant </th><th>Motif </th><th>DatesD</th><th>Dates Precedente</th></tr>";
                    while($row= mysqli_fetch_assoc($result)){
                            echo"<tr><td>".$row["idSortie"]."</td><td>".$row["TypeD"]."</td><td>".$row["Montant"]."</td><td>".$row["il_pris_quoi"]."</td><td>".$row["DatesD"]."</td><td>".$row["DatesP"]."</td></tr>"; 
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

