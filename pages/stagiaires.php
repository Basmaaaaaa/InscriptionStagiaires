<?php 
        require_once("masession.php"); 
        require_once("connexiondb.php");
        $nomPrenom=isset($_GET['nomPrenom'])?$_GET['nomPrenom']:"";
        $idfiliere=isset($_GET['idfiliere'])?$_GET['idfiliere']:0;
        $size=isset($_GET['size'])?$_GET['size']:3;
        $page=isset($_GET['page'])?$_GET['page']:1;
        $offset=($page-1)*$size;
        $requetteFiliere="select * from filiere ";
        if($idfiliere==0){ 
            $requeteStagiaire=" select s.idstagiaire,s.nom,s.prenom,f.nomfiliere,f.idfiliere 
                               from filiere as f,stagiaire as s 	  
								where f.idfiliere=s.idfiliere
                                and (nom like '%$nomPrenom%' or prenom like '%$nomPrenom%')
                                order by idstagiaire
                                limit $size
                                 offset $offset ";
            
            $requetteCount="select count(*) countS  from stagiaire
                               where nom like '%$nomPrenom%' or prenom like '%$nomPrenom%' ";
            
		}else{$requeteStagiaire="select s.idstagiaire,s.nom,s.prenom,f.nomfiliere,f.idfiliere 
            from filiere as f,stagiaire as s 	  
								where f.idfiliere=s.idfiliere
                                and (nom like '%$nomPrenom%' or prenom like '%$nomPrenom%') 
                                and f.idfiliere=$idfiliere
                                order by idstagiaire
                                limit $size
                                offset $offset";
              
              $requetteCount="select count(*) countS from stagiaire
                               where (nom like '%$nomPrenom%' or prenom like '%$nomPrenom%' )
                               and idfiliere=$idfiliere ";
                               
        }
			
      $resultatF=$pdo->query($requetteFiliere);
      $resultatS=$pdo->query($requeteStagiaire);
      $resultatCount=$pdo->query($requetteCount);

      $tabCount=$resultatCount->fetch();
      $nbrstagiaire=$tabCount['countS'];
      $reste=$nbrstagiaire % $size ;
      if($reste===0)
         $nbrpage=$nbrstagiaire / $size;
      else 
        $nbrpage=floor($nbrstagiaire/$size)+1;
?>	
<! DOCYTPE HTML>
<HTML>
	<head>
        <meta charset="utf-8">
        <tit>Gestion des Stagiaires</tit>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"> 
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
     </head>
    <body>
        <?php include("menu.php"); ?>
             <div class="container">
             <div class="panel panel-success margetop">
             <div class="panel-heading">Rechercher des stagiaires </div>
             <div class="panel-body">
                 
<!-- ******************** Début Formulaire de recherche des stagiaires **************-->
                 
             <form method="get" action="stagiaires.php " class="form-inline" >
             <div class="form-group">   
            <input type="text" name="nomPrenom" 
                   placeholder="Nom et Prenom " 
                   class="from-control" value="<?php echo $nomPrenom ?>" />
                </div>  
                 
                 
				<label for="idfiliere"> Filière: </label>
                  <select name="idfiliere" class="form-control" id="idfiliere"                onchange="this.form.submit()"	>
                    <option value=0>Toutes les filières</option>
					<?php  while($filiere=$resultatF->fetch()){ ?>
                      <option value="<?php echo $filiere['idfiliere'] ?>"
                      <?php  if($filiere['idfiliere'] === $idfiliere) echo "selected" ?>>
                      <?php echo $filiere['nomfiliere'] ?>
                      </option>
                      <?php } ?>
                      
				  </select>
                        
                        <button type="submit" value="Chercher" class="btn btn-success">
                        <span class="glyphicon glyphicon-search"></span>Chercher</button>

                    	&nbsp;
                        <?PHP
                          if($_SESSION['user']['role']  =='ADMIN')
                           {
                           ?>
                    <a href="nouveaustagiaire.php"><span class="glyphicon glyphicon-plus"></span>Nouveau Stagiaire</a>
                    <?php } ?>
					</form>
<!-- ******************** Fin Formulaire de recherche des stagiaires ***************** -->
				</div>
			</div>
              <div class="panel panel-primary"> 
                   <div class="panel panel-heading">liste des Stagiaires(<?php echo $nbrstagiaire ?> Stagiaires )</div>
                     <div class="panel-body">
               <table  class="table table-striped table-bordered">
              <thead>
					<tr>
						  <th>Id Stagiaire</th>
                          <th>Nom</th>
                          <th>Prénom</th>
                          <th>Filière</th>
                          <?PHP
                          if($_SESSION['user']['role'] =='ADMIN')
                           {
                           ?>
                          <th>Actions</th>
                          <?php } ?>
					</tr>
				</thead>
                <tbody> 
                      <?php while($stagiaire=$resultatS->fetch()) { ?>
						<tr>
							<td> <?php echo $stagiaire['idstagiaire'] ?></td> 
							<td> <?php echo $stagiaire['nom'] ?></td> 
							<td> <?php echo $stagiaire['prenom'] ?></td>
                            <td> <?php echo $stagiaire['nomfiliere'] ?></td>
                            <?PHP
                          if($_SESSION['user']['role']  =='ADMIN')
                           {
                           ?>
							<td> 
								
                               <a href="editstagiaire.php?idS=<?php echo $stagiaire['idstagiaire'] 
                              ?>">
                                <span class="glyphicon glyphicon-edit"></span>
								</a>
                                &nbsp;
								<a 
								   onclick="return confirm('Voulez vous vraiment supprimer ce stagiaire')" href="deleteStagiaire.php?idS=<?php echo $stagiaire['idstagiaire'] ?>"> 
									<span class="glyphicon glyphicon-trash"></span>
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
                         <a href="stagiaires.php?page=<?php echo $i; ?>&nomPrenom=
                         <?php echo $nomPrenom ?>&idfiliere=<?php echo $idfiliere ?>">
                         <?php echo $i; ?>
                        </a>
                       </li>
                        <?php } ?>
                        </ul>
                    </div>     
                </div>
            </div>
        </div>
</body>   
</HTML>
	