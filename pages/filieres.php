<?php 
    require_once("masession.php"); 
       require_once("connexiondb.php"); 
        $nomf=isset($_GET['nomF'])?$_GET['nomF']:"";
        $niveau=isset($_GET['niveau'])?$_GET['niveau']:"all";
        $size=isset($_GET['size'])?$_GET['size']:6;
        $page=isset($_GET['page'])?$_GET['page']:1;
        $offset=($page-1)*$size;
		if($niveau=="all"){ 
				$requete=" select * from filiere
                where nomfiliere 
                like '%$nomf%' 
                limit $size 
                offset $offset ";


               $requetteCount="select count(*)  countF  from filiere
                               where nomfiliere like'%$nomf%' ";
		}else{
            
            $requete="select * from filiere		  
								where nomfiliere like '%$nomf%'
                                and niveaufiliere='$niveau'
                                limit $size
                               offset $offset ";
              $requetteCount="select count(*) countF from filiere
                               where nomfiliere like '%$nomf%'
                               and niveaufiliere='$niveau' ";
                               
        }
					
      $resultatF=$pdo->query($requete);
      $resultatCount=$pdo->query($requetteCount);
      $tabCount=$resultatCount->fetch();
      $nbrfiliere=$tabCount['countF'];
     //$nbrfiliere=$resultatCount->rowCount();
      $reste=$nbrfiliere % $size;
      if($reste===0)
         $nbrpage=$nbrfiliere / $size;
      else 
        $nbrpage=floor($nbrfiliere / $size) + 1;
?>	

<! DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <tit>Gestion des filiéres</tit>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
       
     </head>
    <body>
        <?php include("menu.php"); ?>
             <div class="container">
             <div class="panel panel-success margetop">
             <div class="panel-heading">Rechercher des filières </div>
             <div class="panel-body">
             <form method="get" action="filieres.php" class="form-inline" >
                 
                 
             <div class="form-group">   
                 <input type="text" name="nomF" placeholder="Nom de la filière" class="from-control" value="<?php echo $nomf ?>" />
             </div> 
                 
                 
				<label for="niveau"> Niveau: </label>
                  <select name="niveau" class="form-control" id="niveau"                onchange="this.form.submit()"	>


                  <option value="all">Tous</option> 
                                         
                                 <?php
                                
                                $requetefilieres = "SELECT * FROM filiere group by niveaufiliere";
                                                            
                                $resultEt=$pdo->query($requetefilieres);
                            

                                foreach ($resultEt as $row) {
                                
                                  
                                   if($niveau==$row[2]){
                                      echo "<option selected value=".$row[2]."> ".$row[2]." </option>";
                                        }
                                      
                                    else
                                        {
                                   echo "<option value=".$row[2]."> ".$row[2]." </option>";

                                           }
                                   
                                                  }
                                                
                                      ?>
								
							</select>
                        
                        <button type="submit" value="Chercher" class="btn btn-success">
                        <span class="glyphicon glyphicon-search"></span>Chercher</button>
                    	&nbsp;
                     
                <?php if($_SESSION['user']['role'] =='ADMIN') {?>
                    <a href="nouvellefiliere.php">
                    <span class="glyphicon glyphicon-plus"></span>
                    Nouvelle filière</a>
                <?php } ?>
                 
					</form>
				</div>
			</div>
                  
                  
             <div class="panel panel-primary"> 
                   <div class="panel panel-heading">liste des filières(<?php echo $nbrfiliere 
                       ?>Filières )</div>
                     <div class="panel-body">
               <table  class="table table-striped table-bordered">
              <thead>
					<tr>
						   <th>Id</th>
                           <th>Nom</th>
                           <th>Niveau</th>
                        <?php if($_SESSION['user']['role'] =='ADMIN')  { ?>
                           <th>Actions</th>
                        <?php } ?>
					</tr>
				</thead>
                  <tbody> 
                       <?php while($filiere=$resultatF->fetch()){ ?>
						<tr>
                           
							  <td> <?php echo $filiere['idfiliere'] ?></td> 
							  <td> <?php echo $filiere['nomfiliere'] ?></td> 
							  <td> <?php echo $filiere['niveaufiliere'] ?> </td>
                              <?php if($_SESSION['user']['role'] =='ADMIN')  { ?>
				        <td> 
                            
                                  
							<a href="editfiliere.php?idF=<?php echo $filiere['idfiliere'] ?>"class="glyphicon glyphicon-edit">
							</a>
                                  
							<a 
							onclick="return confirm('Voulez vous varimenr supprimer cet filière')" href="deletefiliere.php?idF=<?php echo $filiere['idfiliere'] ?>" 
							class="glyphicon glyphicon-trash">
							</a>
				        </td>
                     <?php  } ?>
                            </tr>
                           <?php } ?>
                   </tbody>
                  </table>
                    <div><ul class="pagination pagination-md">
                        <?php for($i=1;$i<=$nbrpage;$i++) { ?>
                        <li class="<?php if($i==$page) echo 'active' ?>">
                        <a href="filieres.php?page=<?php echo $i ?>&nomF=<?php echo $nomf; ?>&niveau=<?php echo $niveau; ?>">
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