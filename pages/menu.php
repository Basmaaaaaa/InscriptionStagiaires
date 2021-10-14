<?php 
    require_once("masession.php"); 
?>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluide">
        <div class="navbar-header">
            <a href="../index.php" class="navbar-brand">Gestion des stagiaires</a>
        </div>
        
<ul class="nav navbar-nav">
    <li><a href="stagiaires.php"> &nbsp; les stagiaires<i class="fa fa-vcard"></i></a></li>
    <li><a href="filieres.php">&nbsp; les filières<i class="fa fa-tags"></i></a></li>
    <li><a href="utilisateurs.php">&nbsp; les utilisateurs<i class="fa fa-users"></i></a></li>
</ul>
        
<ul class="nav navbar-nav navbar-right">
    
    <li><a href="editeruser.php"?idU=<?php echo $_SESSION['user']['iduser'] ?>><i class="fa fa-user-circle-o">
    </i> <?php echo ' '.$_SESSION['user']['login'] ?></a></li>
    
    <li><a href="Sedeconnecter.php"><i class="fa fa-sign-out">
    </i>&nbsp;&nbsp; Se déconnecter</a></li>
   
</ul>

</div>
</nav> 
