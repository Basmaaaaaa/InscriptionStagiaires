<?php
require_once("masession.php"); 
  require_once('connexiondb.php');
  $iduser=isset($_GET['idU'])?$_GET['idU']:0;
  $etat=isset($_GET['etat'])?$_GET['etat']:0;
  if($etat==1)
      $newEtat=0;
  else
      $newEtat=1;
      $requette="update utilisateur set etat=?  where etat=?";
      $parametre=array($iduser,$newEtat);
      $resultat=$pdo->prepare($requette);
      $resultat->execute($parametre);
      header('location:utilisateurs.php');
?>
