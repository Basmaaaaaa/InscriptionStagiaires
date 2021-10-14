<?php
  session_start();
  require_once('connexiondb.php');

  $login=isset($_POST['login'])?$_POST['login']:"";
  $pwd=isset($_POST['pwd'])?$_POST['pwd']:""; 
  $requetteUser ="SELECT * FROM utilisateur WHERE login='$login' and pwd=MD5('$pwd');";
        $resultatUser = $pdo->prepare($requetteUser);
        $resultatUser->execute();
        $utilisateur= $resultatUser->fetch();
  if ( $resultatUser->rowCount() >= 1) {
  
       if($utilisateur['etat']==1){
           $_SESSION['user']=$utilisateur;
           header('location:../index.php');
       }
       else{
           $_SESSION['errorlogin']="<strong>Erreur</strong> : votre compte est désactivé<br> Il faut contacter l'administrateur";
           header('location:login.php');
       }    
   }
   else{
       $_SESSION['errorlogin']="<strong>Erreur</strong> : login ou mot de passe incorrect";
           header('location:login.php');
       
   }
  
?>