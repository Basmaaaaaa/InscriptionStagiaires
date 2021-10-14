<?php
session_start();
if($_SESSION['user']['role']  =='ADMIN')
{
if(isset($_SESSION['user'])){
  require_once('connexiondb.php');
  $idF=isset($_GET['idF'])?$_GET['idF']:0;
  $requetteStage="select count(*) countStage from stagiaire where idfiliere=$idF";
  $resultatStage=$pdo->query($requetteStage);
  $tabCountStag=$resultatStage->fetch();
  $nbrStage=$tabCountStag['countStage'];
  
 if($nbrStage==0){
    $requette="delete from filiere  where idfiliere=?" ;
    $parametre=array($idF);
    $resultat=$pdo->prepare($requette);
    $resultat->execute($parametre);
    header('location:filieres.php');
    }else{
      $msg="suppresion impossible : vous devez supprimer tous les stagiaires inscris dans cette filière";
      header("location:alerte.php?message=$msg");
    }}else{
      header('location:login.php');
}
}
else
{

  header('location:erreur.php');

}

?>


