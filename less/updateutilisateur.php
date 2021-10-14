<?php
  require_once('connexiondb.php');
  $iduser=isset($_POST['idU'])?$_POST['idU']:0;
  $login=isset($_POST['login'])?$_POST['login']:"";
  $email=isset($_POST['email'])?$_POST['email']:"";
  $role=isset($_POST['role'])?$_POST['role']:1;
  $requette="update utilisateur set login=? , email=? ,role=? where iduser=?";
  $parametre=array($login,$email,$role,$iduser);
  $resultat=$pdo->prepare($requette);
  $resultat->execute($parametre);


  header('location:utilisateurs.php');
?>
