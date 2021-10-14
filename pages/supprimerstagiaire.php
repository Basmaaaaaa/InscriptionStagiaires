<?php
    session_start();
    if(isset($_SESSION['user'])){
      require_once('connexiondb.php');
      $idS=isset($_GET['idS'])?$_GET['idS']:0;
      $requette="delete from stagiaire  where idstagiaire=?" ;
      $parametre=array($idS);
      $resultat=$pdo->prepare($requette);
      $resultat->execute($parametre);
      header('location:stagiaires.php');
    }else{
        header('location:login.php');
        
    }
?>


