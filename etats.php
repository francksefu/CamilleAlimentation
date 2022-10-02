<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="etatsQ.css" media="screen" type="text/css">
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
        
        #dim1,#datep,#datepp{
            display:none;
        }
        #sort1,#sort12,#sort11,#sort21,#sort22,#sort13{
            display:none;
        }
        #detteE1 {
            display:none;
        }
        #detteC1{
            display:none;
        }
        #dim2{
            display:none;
        }
        #sort2{
            display:none;
        }
        #detteE2{
            display:none;
        }
        #detteC2{
            display:none;
        }
        #detteE1A,#detteE2A{
            display:none;
        }
        #detteE1C, #detteE2C{
            display:none;
        }
        #bonusPerte,#sort23,#bonusPerte2,#idClient{
            display: none;
        }
        #idClient0{
            display: none;
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
    </style>
    
</head>
<body style="background: url(fond3.png) no-repeat center fixed; background-size:cover">
<div  class="header" style="background-color: transparent;">
        <h1 style="text-shadow: 3px 3px 5px white;color: #fff;">Suivie d' entreprise</h1>
</div>
<?php 
    function dataClient(){
        include 'connexion.php';

      
      
          $reqSql= ("SELECT idClient, NomClient, Telephone FROM Client ");
        $result= mysqli_query($db, $reqSql);
    if(mysqli_num_rows($result)>0){
    
        while($row= mysqli_fetch_assoc($result)){
        echo"<option value='".$row["idClient"].":Nom:".$row["NomClient"]."'>".$row["NomClient"]."</option>"; 
        }

    }else{echo "Une erreur s est produite ";}  
    }
?>
<div class="topnav">
    <a href="accueilEntreprise.php">Accueil</a>
    <a href="produitb.php" >Produit</a>
    <a href="bonusPerte.php" >Bonus et Perte</a>
    <a href="sortie.php" >Sortie</a>
    <a href="diminution.php">Diminution</a>
    <a href="Client.php">Client</a>
    <a href="detteClient.php" >Dettes clients</a>
    <a href="detteEntreprise.php" >Dette Entreprise</a>
    <a href="etats.php"class="active">Les Etats</a>
    <a href="caisse.php">Caisse</a>
    
</div>
<div class="row">
  <div class="col-md-3" style="background-color:transparent;" id="conteneur1">
   <ul>
    <li class="dropdown"><button class=" btn btn-primary dropbtn">Diminution ou ventes</button>
      <div class="dropdown-content">
        <button  type="button" 
      onclick="document.getElementById('dim1').style.display='block';
      document.getElementById('sort1').style.display='none';document.getElementById('detteE1').style.display='none';document.getElementById('detteC1').style.display='none';document.getElementById('sort11').style.display='none';document.getElementById('sort12').style.display='none';document.getElementById('detteE1A').style.display='none';document.getElementById('detteE1C').style.display='none';document.getElementById('bonusPerte').style.display='none';document.getElementById('sort13').style.display='none';document.getElementById('idClient').style.display='none'; document.getElementById('idClient0').style.display='none'">Diminution</button>
      </div>
    </li>
    <li class="dropdown"><button class="btn btn-primary dropbtn">Sorties</button>
      <div class="dropdown-content">
          <button type="button"onclick="document.getElementById('sort1').style.display='block';
            document.getElementById('dim1').style.display='none';;document.getElementById('detteE1').style.display='none';document.getElementById('detteC1').style.display='none';document.getElementById('sort11').style.display='none';document.getElementById('sort12').style.display='none';document.getElementById('detteE1A').style.display='none';document.getElementById('detteE1C').style.display='none';document.getElementById('bonusPerte').style.display='none';document.getElementById('sort13').style.display='none';document.getElementById('idClient').style.display='none'; document.getElementById('idClient0').style.display='none'">Toutes les sorties</button>
          <button type="button" onclick="document.getElementById('detteC1').style.display='none';
            document.getElementById('sort1').style.display='none';document.getElementById('dim1').style.display='none';document.getElementById('detteE1').style.display='none';document.getElementById('sort11').style.display='block';document.getElementById('sort12').style.display='none';document.getElementById('detteE1A').style.display='none';document.getElementById('detteE1C').style.display='none';document.getElementById('bonusPerte').style.display='none';document.getElementById('sort13').style.display='none';document.getElementById('idClient').style.display='none'; document.getElementById('idClient0').style.display='none'">Trie par dette</button>
          <button type="button" onclick="document.getElementById('detteC1').style.display='none';
            document.getElementById('sort1').style.display='none';document.getElementById('dim1').style.display='none';document.getElementById('detteE1').style.display='none';document.getElementById('sort11').style.display='none';document.getElementById('sort12').style.display='block';document.getElementById('detteE1A').style.display='none';document.getElementById('detteE1C').style.display='none';document.getElementById('bonusPerte').style.display='none';document.getElementById('sort13').style.display='none';document.getElementById('idClient').style.display='none'; document.getElementById('idClient0').style.display='none'">Trie par depense(achat)</button>
          <button type="button" onclick="document.getElementById('detteC1').style.display='none';
            document.getElementById('sort1').style.display='none';document.getElementById('dim1').style.display='none';document.getElementById('detteE1').style.display='none';document.getElementById('sort11').style.display='none';document.getElementById('sort12').style.display='none';document.getElementById('detteE1A').style.display='none';document.getElementById('detteE1C').style.display='none';document.getElementById('bonusPerte').style.display='none';document.getElementById('sort13').style.display='block';document.getElementById('idClient').style.display='none';  document.getElementById('idClient0').style.display='none'">Trie par charge</button>
       </div>
    </li>
    <li><button class="btn btn-primary" type="button" onclick="document.getElementById('detteC1').style.display='none';
            document.getElementById('sort1').style.display='none';document.getElementById('dim1').style.display='none';document.getElementById('detteE1').style.display='none';document.getElementById('sort11').style.display='none';document.getElementById('sort12').style.display='none';document.getElementById('detteE1A').style.display='none';document.getElementById('detteE1C').style.display='none';document.getElementById('bonusPerte').style.display='none';document.getElementById('sort13').style.display='none';document.getElementById('idClient').style.display='none'; document.getElementById('idClient0').style.display='block'">Dette client des factures non paie</button></li>

    <li class="dropdown"><button class="btn btn-primary dropbtn">Dettes de l entreprise</button>
      <div class="dropdown-content"> 
         <button type="button"onclick="document.getElementById('detteE1').style.display='block';
            document.getElementById('sort1').style.display='none';document.getElementById('dim1').style.display='none';document.getElementById('detteC1').style.display='none';document.getElementById('sort11').style.display='none';document.getElementById('sort12').style.display='none';document.getElementById('detteE1A').style.display='none';document.getElementById('detteE1C').style.display='none';document.getElementById('bonusPerte').style.display='none';document.getElementById('sort13').style.display='none';document.getElementById('idClient').style.display='none'; document.getElementById('idClient0').style.display='none'">Toutes les dettes de l entreprise</button>
        <button type="button" onclick="document.getElementById('detteC1').style.display='none';
            document.getElementById('sort1').style.display='none';document.getElementById('dim1').style.display='none';document.getElementById('detteE1').style.display='none';document.getElementById('sort11').style.display='none';document.getElementById('sort12').style.display='none';document.getElementById('detteE1A').style.display='block';document.getElementById('detteE1C').style.display='none';document.getElementById('bonusPerte').style.display='none';document.getElementById('sort13').style.display='none';document.getElementById('idClient').style.display='none'; document.getElementById('idClient0').style.display='none'">Trie par Argent</button>
       <button type="button" onclick="document.getElementById('detteC1').style.display='none';
            document.getElementById('sort1').style.display='none';document.getElementById('dim1').style.display='none';document.getElementById('detteE1').style.display='none';document.getElementById('sort11').style.display='none';document.getElementById('sort12').style.display='none';document.getElementById('detteE1A').style.display='none';document.getElementById('detteE1C').style.display='block';document.getElementById('bonusPerte').style.display='none';document.getElementById('sort13').style.display='none';document.getElementById('idClient').style.display='none'; document.getElementById('idClient0').style.display='none'">Trie par Consignation</button>
      </div>
    </li>

    <li class="dropdown"><button class="btn btn-primary dropbtn">Dettes des clients</button>
      <div class="dropdown-content">
         <button type="button" onclick="document.getElementById('detteC1').style.display='block';
            document.getElementById('sort1').style.display='none';document.getElementById('dim1').style.display='none';document.getElementById('detteE1').style.display='none';document.getElementById('sort11').style.display='none';document.getElementById('sort12').style.display='none';document.getElementById('detteE1A').style.display='none';document.getElementById('detteE1C').style.display='none';document.getElementById('bonusPerte').style.display='none';document.getElementById('sort13').style.display='none';document.getElementById('idClient').style.display='none'; document.getElementById('idClient0').style.display='none'">Dette des clients</button>
         <button type="button" 
            onclick="document.getElementById('dim1').style.display='none';
            document.getElementById('sort1').style.display='none';document.getElementById('detteE1').style.display='none';document.getElementById('detteC1').style.display='none';document.getElementById('sort11').style.display='none';document.getElementById('sort12').style.display='none';document.getElementById('detteE1A').style.display='none';document.getElementById('detteE1C').style.display='none';document.getElementById('bonusPerte').style.display='none';document.getElementById('sort13').style.display='none';document.getElementById('idClient').style.display='block'; document.getElementById('idClient0').style.display='none'">Dette des client par client</button>
      </div>
    </li>
      <li><button type="button" class="btn btn-primary" onclick="document.getElementById('detteC1').style.display='none';
      document.getElementById('sort1').style.display='none';document.getElementById('dim1').style.display='none';document.getElementById('detteE1').style.display='none';document.getElementById('sort11').style.display='none';document.getElementById('sort12').style.display='none';document.getElementById('detteE1A').style.display='none';document.getElementById('detteE1C').style.display='none';document.getElementById('bonusPerte').style.display='block';document.getElementById('sort13').style.display='none';document.getElementById('idClient').style.display='none'; document.getElementById('idClient0').style.display='none'">Voir vos bonus et vos pertes(accident de travail)</button>
      
    </ul>
  </div> 
  <div class="col-md-6">
  <div id="env1"  style="background-color:transparent;">
  
      <div class="enveloppe2"style="background-color:transparent;">
            <div id="dim1">
                
                <form method="post" action="<?php echo htmlspecialchars("traitement.php");?>">
                    <br><label for="Dim"><p>Mettez la date a laquelle vous voulez voir la diminution des produits</p></label><br>
                    <input type="date" id="Dim" name="Diminution1">
                    <input type="hidden" name="Envoie" value="dim1">
                    <input type="submit" value="Soumettre">
                </form>
            </div>
            <div id="sort1">
                
                <form method="post" action="<?php echo htmlspecialchars("traitement.php");?>">
                    <br><label for="Sort"><p>Mettez la date a laquelle vous voulez voir  vos sorties d Argent</p></label><br>
                    <input type="date" id="Sort" name="Sortie1">
                    <input type="hidden" name="Envoie" value="sort1">
                    <input type="submit" value="Soumettre">
                </form>
            </div>
            <div id="sort13">
                
                <form method="post" action="<?php echo htmlspecialchars("traitement.php");?>">
                    <br><label for="Sort"><p>Mettez la date a laquelle vous voulez voir  vos sorties d argent trie par charge </p></label><br>
                    <input type="date" id="Sort" name="Sortie1">
                    <input type="hidden" name="Envoie" value="charge">
                    <input type="submit" value="Soumettre">
                </form>
            </div>
            <div id="sort11">
                
                <form method="post" action="<?php echo htmlspecialchars("traitement.php");?>">
                    <br><label for="Sort"><p>Mettez la date a laquelle vous voulez voir  vos sorties d argent trie par dette </p></label><br>
                    <input type="date" id="Sort" name="Sortie1">
                    <input type="hidden" name="Envoie" value="dette">
                    <input type="submit" value="Soumettre">
                </form>
            </div>
            <div id="sort12">
                
                <form method="post" action="<?php echo htmlspecialchars("traitement.php");?>">
                    <br><label for="Sort"><p>Mettez la date a laquelle vous voulez voir  vos sorties d argent trie par depense</p></label><br>
                    <input type="date" id="Sort" name="Sortie1">
                    <input type="hidden" name="Envoie" value="depense">
                    <input type="submit" value="Soumettre">
                </form>
            </div>
            <div id="detteE1">
                
                <form method="post" action="<?php echo htmlspecialchars("traitement.php");?>">
                    <br><label for="DetteE"><p>Mettez la date a laquelle vous voulez voir  les dettes pris par l entreprise </p></label><br>
                    <input type="date" id="DetteE" name="DetteEntreprise1">
                    <input type="hidden" name="Envoie" value="detteE1">
                    <input type="submit" value="Soumettre">
                </form>
            </div>
            <div id="detteE1A">
                
                <form method="post" action="<?php echo htmlspecialchars("traitement.php");?>">
                    <br><label for="DetteE"><p>Mettez la date a laquelle vous voulez voir  les dettes pris par l entreprise </p></label><br>
                    <input type="date" id="DetteE" name="DetteEntreprise1">
                    <input type="hidden" name="Envoie" value="detteE1A">
                    <input type="submit" value="Soumettre">
                </form>
            </div>
            <div id="detteE1C">
                
                <form method="post" action="<?php echo htmlspecialchars("traitement.php");?>">
                    <br><label for="DetteE"><p>Mettez la date a laquelle vous voulez voir  les dettes pris par l entreprise </p></label><br>
                    <input type="date" id="DetteE" name="DetteEntreprise1">
                    <input type="hidden" name="Envoie" value="detteE1C">
                    <input type="submit" value="Soumettre">
                </form>
            </div>
            <div id="datepp">
                
                <form method="post" action="<?php echo htmlspecialchars("traitement.php");?>">
                    <br><label for="DetteE"><p>Mettez la date a laquelle vous voulez voir  les dettes pris par l entreprise mais payee via la date precedente </p></label><br>
                    <input type="date" id="DetteE" name="DetteEntreprise1">
                    <input type="hidden" name="Envoie" value="datepp">
                    <input type="submit" value="Soumettre">
                </form>
            </div>
            <div id="detteC1">
                
                <form method="post" action="<?php echo htmlspecialchars("traitement.php");?>">
                    <br><label for="DetteC"><p>Mettez la date a laquelle vous voulez voir  les dettes des clients</p> </label><br>
                    <input type="date" id="DetteC" name="DetteClient1">
                    <input type="hidden" name="Envoie" value="detteC1">
                    <input type="submit" value="Soumettre">
                </form>
            </div>
            <div id="idClient">
                
                <form method="post" action="<?php echo htmlspecialchars("traitement.php");?>">
                    <br><label for="DetteC"><p>Mettez l identifiant du client</p> </label><br>
                    <input type="text" list=client onchange="verificatM();" id="idClient000" placeholder="cherchez ici le client">
                    <input type="hidden" name="idClient1" id="idClient1">
                    <datalist id="client">
                            
                            <?php
                            dataClient();
                             
                            ?>
                        </datalist>
                    <input type="hidden" name="Envoie" value="idClient">
                    <input type="submit" value="Soumettre">
                </form>
            </div>

            <div id="idClient0">
                
                <form method="post" action="<?php echo htmlspecialchars("traitement.php");?>">
                    <br><label for="DetteC"><p>Mettez l identifiant du client</p> </label><br>
                    <input type="text" list=client0  onchange="verificatM0();" id="idClient00" placeholder="cherchez ici le client">
                    <input type="hidden" name="idClient10" id="idClient10">
                    <datalist id="client0">
                            
                            <?php
                            dataClient();
                              
                            ?>
                        </datalist>
                    <input type="hidden" name="Envoie" value="idClient0">
                    <input type="submit" value="Soumettre">
                </form>
            </div>

            <div id="bonusPerte">
                
                <form method="post" action="<?php echo htmlspecialchars("traitement.php");?>">
                    <br><label for="bonusPert"><p>Mettez la date a laquelle vous voulez voir  les bonus et les pertes</p> </label><br>
                    <input type="date" id="bonusPert" name="BonusPerte">
                    <input type="hidden" name="Envoie" value="bonusPerte1">
                    <input type="submit" value="Soumettre">
                </form>
            </div>
      </div>
      <div id="env2" class="enveloppe2">
        <div id="dim2">
                
                <form method="post" action="<?php echo htmlspecialchars("traitement.php");?>">
                    <br><label for="Dim2"><p>Mettez la date a laquelle vous voulez voir la diminution des produits</p></label><br>
                    <br>1ere date  :<br><input type="date" id="Dim2" name="Diminution21">
                    <br>2ieme date :<br><input type="date" id="Dim2" name="Diminution22">
                    <input type="hidden" name="Envoie" value="dim2">
                    <input type="submit" value="Soumettre">
                </form>
            </div>
            <div id="sort2">
                
                <form method="post" action="<?php echo htmlspecialchars("traitement.php");?>">
                    <br><label for="Sort2"><p>Mettez la date a laquelle vous voulez voir  vos sorties d Argent</p></label><br>
                    <br>1ere date  :<br><input type="date" id="Sort2" name="Sortie21">
                    <br>2ieme date  :<br><input type="date" id="Sort2" name="Sortie22">
                    <input type="hidden" name="Envoie" value="sort2">
                    <input type="submit" value="Soumettre">
                </form>
            </div>
            <div id="datep">
                
                <form method="post" action="<?php echo htmlspecialchars("traitement.php");?>">
                    <br><label for="Sort"><p>Mettez la date a laquelle vous voulez voir  vos sorties d Argent des dettes precedentes</p></label><br>
                    <input type="date" id="Sort" name="Sortie1">
                    <input type="hidden" name="Envoie" value="datep">
                    <input type="submit" value="Soumettre">
                </form>
            </div>
            <div id="sort21">
                
                <form method="post" action="<?php echo htmlspecialchars("traitement.php");?>">
                    <br><label for="Sort"><p>Mettez la date a laquelle vous voulez voir  vos sorties d argent trie par dette </p></label><br>
                    <br>1ere date  :<br><input type="date" id="Sort2" name="Sortie21">
                    <br>2ieme date  :<br><input type="date" id="Sort2" name="Sortie22">
                    <input type="hidden" name="Envoie" value="dette2">
                    <input type="submit" value="Soumettre">
                </form>
            </div>
            <div id="sort22">
                
                <form method="post" action="<?php echo htmlspecialchars("traitement.php");?>">
                    <br><label for="Sort"><p>Mettez la date a laquelle vous voulez voir  vos sorties d argent trie par depense</p></label><br>
                    <br>1ere date  :<br><input type="date" id="Sort2" name="Sortie21">
                    <br>2ieme date  :<br><input type="date" id="Sor2" name="Sortie22">
                    <input type="hidden" name="Envoie" value="depense2">
                    <input type="submit" value="Soumettre">
                </form>
            </div>
            <div id="sort23">
                
                <form method="post" action="<?php echo htmlspecialchars("traitement.php");?>">
                    <br><label for="Sort"><p>Mettez la date a laquelle vous voulez voir  vos sorties d argent trie par charge</p></label><br>
                    <br>1ere date  :<br><input type="date" id="Sort2" name="Sortie21">
                    <br>2ieme date  :<br><input type="date" id="Sor2" name="Sortie22">
                    <input type="hidden" name="Envoie" value="charge2">
                    <input type="submit" value="Soumettre">
                </form>
            </div>
            <div id="detteE2">
                
                <form method="post" action="<?php echo htmlspecialchars("traitement.php");?>">
                    <br><label for="DetteE2"><p> la date a laquelle vous voulez voir  les dettes pris par l entreprise </p></label><br>
                    <br>1ere date  :<br><input type="date" id="DetteE2" name="DetteEntreprise21">
                    <br>2ieme date  :<br><input type="date" id="DetteE2" name="DetteEntreprise22">
                    <input type="hidden" name="Envoie" value="detteE2">
                    <input type="submit" value="Soumettre">
                </form>
            </div>
            <div id="detteE2A">
                
                <form method="post" action="<?php echo htmlspecialchars("traitement.php");?>">
                    <br><label for="DetteE"><p>Mettez la date a laquelle vous voulez voir  les dettes pris par l entreprise trie par argent </p></label><br>
                    <br>1ere date  :<br><input type="date" id="DetteE2" name="DetteEntreprise21">
                    <br>2ieme date  :<br><input type="date" id="DetteE2" name="DetteEntreprise22">
                    <input type="hidden" name="Envoie" value="detteE2A">
                    <input type="submit" value="Soumettre">
                </form>
            </div>
            <div id="detteE2C">
                
                <form method="post" action="<?php echo htmlspecialchars("traitement.php");?>">
                    <br><label for="DetteE"><p>Mettez la date a laquelle vous voulez voir  les dettes pris par l entreprise trie par consignation </p></label><br>
                    <br>1ere date  :<br><input type="date" id="DetteE2" name="DetteEntreprise21">
                    <br>2ieme date  :<br><input type="date" id="DetteE2" name="DetteEntreprise22">
                    <input type="hidden" name="Envoie" value="detteE2C">
                    <input type="submit" value="Soumettre">
                </form>
            </div>
            <div id="bonusPerte2">
                
                <form method="post" action="<?php echo htmlspecialchars("traitement.php");?>">
                    <br><label for="DetteE"><p>Mettez la date a laquelle vous voulez voir  vos bonus et vos pertes </p></label><br>
                    <br>1ere date  :<br><input type="date" id="" name="BonusPerte21">
                    <br>2ieme date  :<br><input type="date" id="" name="BonusPerte22">
                    <input type="hidden" name="Envoie" value="bonusPerte2">
                    <input type="submit" value="Soumettre">
                </form>
            </div>
            <div id="detteC2">
                
                <form method="post" action="<?php echo htmlspecialchars("traitement.php");?>">
                    <br><label for="DetteC2"><p>Mettez la date a laquelle vous voulez voir  les dettes des clients </p></label><br>
                    <br>1ere date  :<br><input type="date" id="DetteC2" name="DetteClient21">
                    <br>2ieme date  :<br><input type="date" id="DetteC2" name="DetteClient22">
                    <input type="hidden" name="Envoie" value="detteC2">
                    <input type="submit" value="Soumettre">
                </form>
            </div>
      </div>
  </div>
  </div>
  <div class="col-md-3" id="conteneur3">
  <ul>
    
      <li><button class = "btn btn-primary" type="button" 
      onclick="document.getElementById('dim2').style.display='block';
      document.getElementById('sort2').style.display='none';document.getElementById('detteE2').style.display='none';document.getElementById('detteC2').style.display='none';document.getElementById('sort21').style.display='none';document.getElementById('sort22').style.display='none';document.getElementById('detteE2A').style.display='none';document.getElementById('detteE2C').style.display='none';document.getElementById('sort23').style.display='none';document.getElementById('bonusPerte2').style.display='none';document.getElementById('datep').style.display='none';document.getElementById('datepp').style.display='none'">Diminution</button></li>
      
      <li class="dropdown"><button class="btn btn-primary dropbtn">Sortie</button>
        <div class="dropdown-content">
          <button type="button"onclick=" document.getElementById('sort2').style.display='block';
            document.getElementById('dim2').style.display='none';;document.getElementById('detteE2').style.display='none';document.getElementById('detteC2').style.display='none';document.getElementById('sort21').style.display='none';document.getElementById('sort22').style.display='none';document.getElementById('detteE2A').style.display='none';document.getElementById('detteE2C').style.display='none';document.getElementById('sort23').style.display='none';document.getElementById('bonusPerte2').style.display='none';document.getElementById('datep').style.display='none';document.getElementById('datepp').style.display='none'">Toutes les sortie</button>
          <button type="button" onclick="document.getElementById('detteC2').style.display='none';
            document.getElementById('sort2').style.display='none';document.getElementById('dim2').style.display='none';document.getElementById('detteE2').style.display='none';document.getElementById('sort21').style.display='block';document.getElementById('sort22').style.display='none';document.getElementById('detteE2A').style.display='none';document.getElementById('detteE2C').style.display='none';document.getElementById('sort23').style.display='none';document.getElementById('bonusPerte2').style.display='none';document.getElementById('datep').style.display='none';document.getElementById('datepp').style.display='none'">Trie par dette</button>
          <button type="button" onclick=" ;document.getElementById('detteC2').style.display='none';
            document.getElementById('sort2').style.display='none';document.getElementById('dim2').style.display='none';document.getElementById('detteE2').style.display='none';document.getElementById('sort21').style.display='none';document.getElementById('sort22').style.display='block';document.getElementById('detteE2A').style.display='none';document.getElementById('detteE2C').style.display='none';document.getElementById('sort23').style.display='none';document.getElementById('bonusPerte2').style.display='none';document.getElementById('datep').style.display='none';document.getElementById('datepp').style.display='none'">Trie par depense(achat)</button>
          <button type="button" onclick=" document.getElementById('detteC2').style.display='none';
            document.getElementById('sort2').style.display='none';document.getElementById('dim2').style.display='none';document.getElementById('detteE2').style.display='none';document.getElementById('sort21').style.display='none';document.getElementById('sort22').style.display='none';document.getElementById('detteE2A').style.display='none';document.getElementById('detteE2C').style.display='none';document.getElementById('sort23').style.display='block';document.getElementById('bonusPerte2').style.display='none';document.getElementById('datep').style.display='none';document.getElementById('datepp').style.display='none'">Trie par charge</button>
        </div>
      </li>
      <li class="dropdown"><button class="btn btn-primary dropbtn">Sortie</button>
        <div class="dropdown-content">
          <button type="button"onclick=" document.getElementById('detteE2').style.display='block';
            document.getElementById('sort2').style.display='none';document.getElementById('dim2').style.display='none';document.getElementById('detteC2').style.display='none';document.getElementById('sort21').style.display='none';document.getElementById('sort22').style.display='none';document.getElementById('detteE2A').style.display='none';document.getElementById('detteE2C').style.display='none';document.getElementById('sort23').style.display='none';document.getElementById('bonusPerte2').style.display='none';document.getElementById('datep').style.display='none';document.getElementById('datepp').style.display='none'">Toutes les dette de l entreprise</button>
          <button type="button" onclick=" document.getElementById('detteC2').style.display='none';
            document.getElementById('sort2').style.display='none';document.getElementById('dim2').style.display='none';document.getElementById('detteE2').style.display='none';document.getElementById('sort21').style.display='none';document.getElementById('sort22').style.display='none';document.getElementById('detteE2A').style.display='block';document.getElementById('detteE2C').style.display='none';document.getElementById('sort23').style.display='none';document.getElementById('bonusPerte2').style.display='none';document.getElementById('datep').style.display='none';document.getElementById('datepp').style.display='none'">Trie par Argent</button>
          <button type="button" onclick=" document.getElementById('detteC2').style.display='none';
            document.getElementById('sort2').style.display='none';document.getElementById('dim2').style.display='none';document.getElementById('detteE2').style.display='none';document.getElementById('sort21').style.display='none';document.getElementById('sort22').style.display='none';document.getElementById('detteE2A').style.display='none';document.getElementById('detteE2C').style.display='block';document.getElementById('sort23').style.display='none';document.getElementById('bonusPerte2').style.display='none';document.getElementById('datep').style.display='none';document.getElementById('datepp').style.display='none'">Trie par Consignation</button>
        </div>
      </li>
      <li><button type="button"class="btn btn-primary" onclick="document.getElementById('detteC2').style.display='block';
      document.getElementById('sort2').style.display='none';document.getElementById('dim2').style.display='none';document.getElementById('detteE2').style.display='none';document.getElementById('sort21').style.display='none';document.getElementById('sort22').style.display='none';document.getElementById('detteE2A').style.display='none';document.getElementById('detteE2C').style.display='none';document.getElementById('sort23').style.display='none';document.getElementById('bonusPerte2').style.display='none';document.getElementById('datep').style.display='none';document.getElementById('datepp').style.display='none'">Dette des clients</button></li>
      <li><button type="button" class="btn btn-primary" onclick="document.getElementById('detteC2').style.display='none';
      document.getElementById('sort2').style.display='none';document.getElementById('dim2').style.display='none';document.getElementById('detteE2').style.display='none';document.getElementById('sort21').style.display='none';document.getElementById('sort22').style.display='none';document.getElementById('detteE2A').style.display='none';document.getElementById('detteE2C').style.display='none';document.getElementById('sort23').style.display='none';document.getElementById('bonusPerte2').style.display='block';document.getElementById('datep').style.display='none';document.getElementById('datepp').style.display='none'">Bonus et pertes</button></li>
      
    </ul>
  </div> 
</div>
  <div class="footer">
        <h2>&copy;Copyrigth</h2>
        <p style="border:none;">franck sefu +243 973359746</p>
</div>
<script>
    function verificatM(){
        if(document.getElementById("idClient000").value != ""){
            let cont = document.getElementById("idClient000").value;
            let tableau = cont.split(":");
            let identifiant = tableau[0]*1;

           
            document.getElementById("idClient1").value = identifiant;
        }
    }

    function verificatM0(){
        if(document.getElementById("idClient00").value != ""){
            let cont = document.getElementById("idClient00").value;
            let tableau = cont.split(":");
            let identifiant = tableau[0]*1;

            
            document.getElementById("idClient10").value = identifiant;
        }
    }
</script>
</body>
</html>