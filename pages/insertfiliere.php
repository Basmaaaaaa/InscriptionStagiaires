<?php
require_once("masession.php"); 
  require_once("connexiondb.php");
  if($_SESSION['user']['role']  =='ADMIN')
{
  $nomf=isset($_POST['nomF'])?$_POST['nomF']:"";
  $niveau=isset($_POST['niveau'])?$_POST['niveau']:"";
  $requette="insert into filiere(nomfiliere,niveaufiliere) values(?,?)";
  $parametre=array($nomf,$niveau);
  $resultat=$pdo->prepare($requette);
  $resultat->execute($parametre);
  header('location:filieres.php');
}
else
{

  header('location:erreur.php');

}



?>