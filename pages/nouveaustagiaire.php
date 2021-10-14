<?php
require_once("masession.php"); 
  require_once('connexiondb.php');
  $requetteF="select * from filiere  ";
  $resultatF=$pdo->query($requetteF);
  
?>
<! DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <tit>Nouveau stagiaire</tit>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>
    <body>
        
        <?php include("menu.php"); ?>
              <div class="container">
              <div class="panel panel-primary margetop"> 
              <div class="panel-heading">Ajout d'un stagiaire </div>
              <div class="panel-body">
              <form method="post" action="insertstagiaire.php" class="form" >
              
                     
             <div class="form-group"> 
                 <label for="nom">Nom du stagiaire :</label>
                 <input type="text" name="nom" placeholder="nom" class="from-control" />
              </div> 
                
            <div class="form-group"> 
                 <label for="prenom">Prénom du stagiaire :</label>
                 <input type="text" name="prenom" placeholder="prenom" class="from-control"/>
            </div> 
                  
            <div class="form-group"> 
                 <label for="civilite">Civilité :</label>
                 <div class="radio">
                 <label><input type="radio" name="civilite"  value="F" checked/>F</label><br>
                 <label><input type="radio" name="civilite"  value="M"/>M</label>
                </div>
            </div> 
                  
                     
            <div class="form-group">    
				<label for="idfiliere"> Filière: </label>
                <select name="idfiliere" class="form-control" id="idfiliere">
                  <?php while($filiere=$resultatF->fetch()) { ?>
                  <option value="<?php echo $filiere['idfiliere'] ?>">
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