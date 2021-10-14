<?php
    
require_once("masession.php"); 
?>
<?php
if($_SESSION['user']['role']  =='ADMIN')
{
    ?>
<! DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <tit>Nouvelle filiére</tit>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>
    <body>
        
        <?php include("menu.php"); ?>
              <div class="container">
              <div class="panel panel-primary margetop"> 
              <div class="panel-heading">Veuillez saisir les données de la nouvelle  filiere </div>
              <div class="panel-body">
                
                 <form method="post" action="insertfiliere.php" class="form" >
             <div class="form-group"> 
                 <label for="niveau">Nom de la filière</label><br>
            <input type="text" name="nomF" placeholder="Nom de la filière" class="from-control"  />
                </div>   
                  <div class="form-group">    
				<label for="niveau"> Niveau: </label>
                  <select name="niveau" class="form-control" id="niveau">
								<option value="Ingenieur" selected>Ingenieur</option>
								<option value="BTS">BTS</option>
								<option value="Licence">Licence</option>
								<option value="BTP">BTP</option>
                                 <option value="Master">Master</option>
							</select>
                        </div>
                        <button type="submit" value="Chercher" class="btn btn-success">
                        <span class="glyphicon glyphicon-save"></span>Enregistrer</button>
                    
					</form>
                </div>
              </div>
                 
            
    </body>
</HTML>
<?php
}
else
{

  header('location:erreur.php');

}
?>