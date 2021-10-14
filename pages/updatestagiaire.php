<?php
require_once("masession.php"); 
  require_once('connexiondb.php');
  $idS=isset($_POST['idS'])?$_POST['idS']:0;
  $nom=isset($_POST['nom'])?$_POST['nom']:"";
  $prenom=isset($_POST['prenom'])?$_POST['prenom']:"";
  $civilite=isset($_POST['civilite'])?$_POST['civilite']:"F";
  $idfiliere=isset($_POST['idfiliere'])?$_POST['idfiliere']:1;
  


  $requette="update stagiaire set nom=? , prenom=? ,civilite=?,idfiliere=? where idstagiaire=?";
  $parametre=array($nom,$prenom,$civilite,$idfiliere,$idS);
  $resultat=$pdo->prepare($requette);
  $resultat->execute($parametre);


  header('location:stagiaires.php');
?>
