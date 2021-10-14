<?php
require_once("masession.php"); 
  require_once("connexiondb.php");
  $idS=isset($_GET['idS'])?$_GET['idS']:0;

  $requetteS="select * from stagiaire where idstagiaire=$idS";
  $resultatS=$pdo->query($requetteS);
  $stagiaire=$resultatS->fetch();

  $nom=$stagiaire['nom'];
  $prenom=$stagiaire['prenom'];
  $civilite=strtoupper ($stagiaire['civilite']);
  
  $idfiliere=$stagiaire['idfiliere'];

  $requetteF="select * from filiere ";
  $resultatF=$pdo->query($requetteF);
  
?>
<! DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <tit>Modifier stagiaire</tit>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>
    <body>
        
        <?php include("menu.php"); ?>
              <div class="container">
              <div class="panel panel-primary margetop"> 
              <div class="panel-heading">Modification du stagiaire </div>
              <div class="panel-body">
              <form method="post" action="updatefiliere.php" class="form" >
                     
               <div class="form-group"> 
                 <label for="idS">Id du stagiaire:<?php echo $idS ?></label>
                 <input type="hidden" name="idS"  class="from-control"
                 value="<?php echo $idS ?>"/>
               </div>
                     
             <div class="form-group"> 
                 <label for="nom">Nom du stagiaire :</label>
                 <input type="text" name="nom" placeholder="nom" class="from-control" value="<?php echo $nom ?>"/>
              </div> 
                
            <div class="form-group"> 
                 <label for="prenom">Prénom du stagiaire :</label>
                 <input type="text" name="prenom" placeholder="prenom" class="from-control" value="<?php echo $prenom ?>"/>
            </div> 
                  
            <div class="form-group"> 
                 <label for="civilite">Civilité :</label>
                 <div class="radio">
                 <label><input type="radio" name="civilite"  value="F"
                 <?php if($civilite==="F") echo "checked" ?>checked/>F</label><br>
                 <label><input type="radio" name="civilite"  value="M"
                 <?php if($civilite==="M") echo "checked" ?>/>M</label>
                </div>
            </div> 
                  
                     
            <div class="form-group">    
				<label for="idfiliere"> Filière: </label>
                <select name="idfiliere" class="form-control" id="idfiliere">
                  <?php while($filiere=$resultatF->fetch()) { ?>
                  <option value="<?php echo $filiere['idfiliere'] ?>"
                  <?php if($idfiliere===$filiere['idfiliere']) echo "selected" ?>>
                   <?php echo $filiere['nomfiliere'] ?></option>
				    <?php }?>
				</select>
              </div>
                        <button type="submit" value="Chercher" class="btn btn-success">
                        <span class="glyphicon glyphicon-save"></span>Enregistrer</button>
                    
					</form>
                </div>
              </div>
        </div>
     </body>
</HTML>