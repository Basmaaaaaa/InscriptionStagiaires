<?php
require_once("masession.php"); 
require_once('connexiondb.php');

  $iduser=isset($_POST['iduser'])?$_POST['iduser']:0;
  $login=isset($_POST['login'])?$_POST['login']:"";
  $email=isset($_POST['email'])?strtoupper($_POST['email']):"";

  $requette="update utilisateur set login=? , email=? where iduser=?";
  $parametre=array($login,$email,$iduser);
  $resultat=$pdo->prepare($requette);
  $resultat->execute($parametre);
  header('location:login.php');


?>