<?php
require_once("masession.php"); 
  require_once("connexiondb.php");
  $nom=isset($_POST['nom'])?$_POST['nom']:"";
  $prenom=isset($_POST['prenom'])?$_POST['prenom']:"";
  $civilite=isset($_POST['civilite'])?$_POST['civilite']:"F";
  $idfiliere=isset($_POST['idfiliere'])?$_POST['idfiliere']:1;
  


  $requette="insert into stagiaire (nom,prenom,civilite,idfiliere) values(?,?,?,?)" ;
  $parametre=array($nom,$prenom,$civilite,$idfiliere);
  $resultat=$pdo->prepare($requette);
  $resultat->execute($parametre);


  header('location:stagiaires.php');
?>
