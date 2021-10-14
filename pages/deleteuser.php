<?php
 
require_once("masession.php"); 
if($_SESSION['user']['role']  =='ADMIN')
{
    require_once('connexiondb.php');
    $idU=isset($_GET['idU'])?$_GET['idU']:0;
    $requette="delete from utilisateur  where iduser=?" ;
    $parametre=array($idU);
    $resultat=$pdo->prepare($requette);
    $resultat->execute($parametre);
    header('location:utilisateurs.php');
}
 
?>


