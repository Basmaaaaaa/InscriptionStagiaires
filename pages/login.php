<?php
    session_start();
    if(isset($_SESSION['errorlogin']))
        $erreurlogin=$_SESSION['errorlogin'];
    else{
        $erreurlogin="";
    }
    session_destroy();
         
?>
<! DOCTYPE HTML>
<HTML>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
    </head>
    <body>
             <div class="container col-lg-4 col-md-offset-3 col-md-6">
              <div class="panel panel-primary margetop"> 
              <div class="panel-heading">Se Connecter</div>
              <div class="panel-body">
                  
              <form method="post" action="seConnecter.php" class="form" >
              <?php if(!empty($erreurlogin))  { ?>
              <div class="alert alert-danger">
                  <?php echo $erreurlogin ?>
              </div>
               <?php  } ?>
                  
             <div class="form-group"> 
                 <label for="login">login :</label>
                 <input type="text" name="login" placeholder="login" class="from-control" />
              </div> 
                
            <div class="form-group"> 
                 <label for="pwd">Mot de Passe :</label>
                 <input type="password" name="pwd" placeholder="mot de passe" class="from-control"/>
            </div>
                  
             <button type="submit" value="Chercher" class="btn btn-success">
              <span class="glyphicon glyphicon-log-in"></span>&nbsp;&nbsp;Se Connecter</button>
                    
					</form>
                </div>
              </div>
        </div>
     </body>
</HTML>