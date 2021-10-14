<?php
require_once("masession.php"); 
  require_once("connexiondb.php");
  $idf=isset($_GET['idF'])?$_GET['idF']:0;
  $requette="select * from filiere where idfiliere=$idf";
  $resultat=$pdo->query($requette);
  $filiere=$resultat->fetch();
  $nomF=$filiere['nomfiliere'];
  $niveau=$filiere['niveaufiliere'];
?>

<?php
if($_SESSION['user']['role']  =='ADMIN')
{
    ?>
<! DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <tit>Modifier filiére</tit>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>
    <body>
        
        <?php include("menu.php"); ?>
              <div class="container">
              
              
            <div class="panel panel-primary margetop"> 
              <div class="panel-heading">Modification de la  filiere </div>
              <div class="panel-body">
                
                 <form method="post" action="updatefiliere.php" class="form" >
                 <div class="form-group"> 
<!--                  <label for="niveau">Id de la filière</label><br>
 -->            <input type="hidden" name="idF"  class="from-control" value="<?php echo $idf?>"/>
                </div>
                     
             <div class="form-group"> 
                 <label for="niveau">Nom de la filière</label><br>
            <input type="text" name="nomF" class="from-control" value="<?php echo $nomF?>"/>
                </div> 
                     
                  <div class="form-group">    
				<label for="niveau"> Niveau: </label>
                  <select name="niveau" class="form-control" id="niveau">
                      
								<option value="Ingenieur"<?php if($niveau=="Ingenieur")echo "selected" ?>>Ingenieur</option>
    
								<option value="BTS"<?php if($niveau=="BTS")echo "selected" ?>>BTS</option>
    
								<option value="Licence"<?php if($niveau=="Licence")echo "selected" ?>>Licence</option>
    
								<option value="BTP"<?php if($niveau=="BTP")echo "selected" ?>>BTP</option>
    
                                 <option value="m"<?php if($niveau=="Master")echo "selected" ?>>Master</option>
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