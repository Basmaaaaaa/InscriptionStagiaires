<?php
require_once("masession.php"); 
if($_SESSION['user']['role']  =='ADMIN')
{
  require_once('connexiondb.php');
  $idF=isset($_POST['idF'])?$_POST['idF']:0;
  $nomf=isset($_POST['nomF'])?$_POST['nomF']:"";
  $niveau=isset($_POST['niveau'])?strtoupper($_POST['niveau']):"";
  $requette="update filiere set nomfiliere=? , niveaufiliere=? where idfiliere=?";
  $parametre=array($nomf,$niveau,$idF);
  $resultat=$pdo->prepare($requette);
  $resultat->execute($parametre);

}
header('location:filieres.php');


?>