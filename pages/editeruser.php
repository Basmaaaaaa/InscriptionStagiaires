<?php
  require_once("masession.php"); 
  require_once('connexiondb.php');
  $iduser=isset($_GET['idU'])?$_GET['idU']:0;

  $requetteUser="select * from utilisateur where iduser=$iduser";
  $resultatUser=$pdo->query($requetteUser);
  $utilisateur=$resultatUser->fetch();
  $login=$utilisateur['login'];
  $email=$utilisateur['email'];
  $role=strtoupper($utilisateur['role']);
 
?>
<! DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <tit>Modifier un utilisateur</tit>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>
    <body>
        
        <?php include("menu.php"); ?>
              <div class="container">
              <div class="panel panel-primary margetop"> 
              <div class="panel-heading">Modification d'un utilisateur </div>
              <div class="panel-body">
              <form method="post" action="updateutilisateur.php" class="form" >
                
                  
               <div class="form-group"> 
                
                 <input type="hidden" name="iduser"  class="from-control"
                 value="<?php echo $iduser ?>"/>
               </div>
               
                  
             <div class="form-group"> 
                 <label for="login">login:</label>
                 <input type="text" name="login" placeholder="login" class="from-control" value="<?php echo $login ?>"/>
              </div> 
                  
                  
              <div class="form-group"> 
                 <label for="email">Email:</label>
                 <input type="email" name="login" placeholder="email" class="from-control" value="<?php echo $email ?>"/>
              </div> 
                  
               
              <div class="form-group"> 
                 <select name="role" class="form-control">
                     <option value="ADMIN" <?php if($role=="ADMIN") echo "selected"?>>Administrateur</option>
                      <option value="VISITEUR" <?php if($role=="VISITEUR") echo "selected"?>>Visiteur</option>
                 </select>
              </div> 
        
                  
             <button type="submit" value="Chercher" class="btn btn-success">
             <span class="glyphicon glyphicon-save"></span>Enregistrer</button>
                  &nbsp;&nbsp; 
                  
             <a href="updateMDP.php?idU=<?php echo $iduser ?>">Changer le mot de passe</a>
                    
					</form>
                </div>
              </div>
        </div>
     </body>
</HTML>