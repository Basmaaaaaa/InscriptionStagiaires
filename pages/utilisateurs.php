<?php
   require_once("masession.php");  
    require_once("connexiondb.php");
    $login=isset($_GET['login'])?$_GET['login']:"";
    $size=isset($_GET['size'])?$_GET['size']:4;
    $page=isset($_GET['page'])?$_GET['page']:1;
    $offset=($page-1)*$size;
    $requeteUser=" select * from utilisateur where login like '%$login%'
    limit $size  offset $offset";

    $requetteCount="select * from utilisateur where login like '%$login%' ";
    $resultatUser=$pdo->query($requeteUser);
    //$nbrUser=$resultatUser->rowCount();
    $resultatCount=$pdo->query($requetteCount);
    $nbrUser=$resultatCount->rowCount();
    //$tabCount=$resultatCount->fetch();
    //$nbrUser=$tabCount['countU'];
    $reste=$nbrUser % $size;
    if($reste===0)
       $nbrpage=$nbrUser/$size;
    else 
       $nbrpage=floor($nbrUser/$size)+1;
?>	
<! DOCYTPE HTML>
<HTML>
	<head>
        <meta charset="utf-8">
        <tit>Gestion des Utilisateurs</tit>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"> 
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
     </head>
    <body>
        <?php include("menu.php"); ?>
             <div class="container">
             <div class="panel panel-success margetop">
             <div class="panel-heading">Recherche des Utilisateurs </div>
             <div class="panel-body">
                 
<!-- ******************** Début Formulaire de recherche des utilisateurs **************-->
                 
             <form method="get" action="utilisateurs.php " class="form-inline" >
             <div class="form-group">   
                   <input type="text" name="login" placeholder="login" class="from-control" value="<?php echo $login ?>" />
                </div>        
				    <button type="submit" value="Chercher" class="btn btn-success">
                    <span class="glyphicon glyphicon-search"></span>Chercher</button>
                </form>
<!-- ******************** Fin Formulaire de recherche des utilisateurs ***************** -->
				</div>
			</div>
              <div class="panel panel-primary"> 
                   <div class="panel panel-heading">liste des utilisateurs(<?php echo $nbrUser ?> Utilisaturs )</div>
                     <div class="panel-body">
               <table  class="table table-striped table-bordered">
              <thead>
					<tr>
						  <th>Login</th>
                          <th>Email</th>
                          <th>Role</th>
                            <?PHP
                          if($_SESSION['user']['role'] =='ADMIN')
                           {
                           ?>
                          <th>Actions</th>
                          <?php } ?>
					</tr>
				</thead>
                <tbody> 
                      <?php while($user=$resultatUser->fetch()) { ?>
						<tr class="<?php echo $user['etat']==1 ? 'success':'danger' ?>">
							
							<td> <?php echo $user['login'] ?></td> 
                            <td> <?php echo $user['email'] ?></td>
							<td> <?php echo $user['role'] ?></td>
                           
                           <?php
                           if($_SESSION['user']['role'] =='ADMIN')
                           {
                           ?>
                           <td> 
				              <a href="editeruser.php?idU=<?php echo $user['iduser'] ?>">
                                 <span class="glyphicon glyphicon-edit"></span>
				              </a>
                                &nbsp;&nbsp;
                                
								<a 
								   onclick="return confirm('Voulez vous vraiment supprimer cet utilisateur')" href="deleteuser.php?idU=<?php echo $user['iduser'] ?>"> 
									<span class="glyphicon glyphicon-trash"></span>
									</a>
                                 &nbsp;&nbsp;
                               
 <a href="activeruser.php?idU=<?php echo $user['iduser'] ?>&etat=<?php echo $user['etat'] ?>">
                               <?php if($user['etat']==1) 
                                        echo '<span class="glyphicon glyphicon-remove"></span>';
                                     else
                                        echo '<span class="glyphicon glyphicon-ok"></span>';
                               ?>
                              </a>
                              </td>
                              <?php } ?>
								
                             </tr>
                           <?php } ?>
                   </tbody>
                  </table>
                    <div><ul class="pagination">
                        <?php for($i=1;$i<=$nbrpage;$i++) { ?>
                        <li class="<?php if($i==$page) echo 'active' ?>">
                    <a href="utilisateurs.php?page=<?php echo $i; ?>&login=<?php echo $login ?>"><?php echo $i; ?>
                        </a>
                       </li>
                        <?php } ?></ul>
                    </div>     
                </div>
            </div>
        </div>
</body>   
</HTML>
	