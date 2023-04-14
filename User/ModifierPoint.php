<?php
     session_start();  
    if(!isset($_SESSION['monlogin'])) header('location: ../Anonyme/Login.php');
?>
<!doctype html>
<html >

 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link href="../css/font.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://kit.fontawesome.com/da4d3dfc16.js" crossorigin="anonymous"></script>
    
</head>

<body>
    <?php  include'Menu.php'; ?>
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                
                <div class="card">
                    <h5 class="card-header">Modifier Point</h5>
                    <div class="card-body">
                        <?php
                        include('../Connexion_database.php');
                          $idd=$_GET['id'];
                             $result1 = mysqli_query($connexion ,"SELECT p.idPoint , p.intitulePoint , p.dePachalik , p.repporte, p.raisonRepport , p.rapport, p.votePublique , p.dateEnvoiInt , p.nEnvoiInt , p.dateEnvoiExt , p.app_Napp , p.action , p.remarques , p.nEnvoiExt, s.idService , r.idReunion FROM point p, service s , reunion r where p.idReunion=r.idReunion and p.idService=s.idService and p.idPoint='".$idd."'");
                                while($ligne = mysqli_fetch_object($result1))
                                {                                
                                
                                   $ID=$ligne->idPoint;
                                  

                                   echo '
                                            <form method="POST" action="ModifierPoint.php?id='.$_GET['id'].'">
                                                <div class="form-group">
                                                    <label for="intitulePoint" class="col-form-label">Point :</label>
                                                   <input id="intitulePoint"  name="intituleP" type="text" class="form-control" value="'.$ligne->intitulePoint.'">                   
                                                </div>
                                                <div class="form-group">
                                                    <label for="pachalik" class="col-form-label"> De pachalik</label>
                                                    <select name="typeP" class="form-control">
                                                          <option> oui </option>
                                                          <option>  non </option>
                                                    </select><br>   
                                                </div>
                                                <div class="form-group">
                                                    <label for="Repporte" class="col-form-label"> Repporte</label>
                                                    <select name="choix" class="form-control">
                                                          <option> oui </option>
                                                          <option>  non </option>
                                                    </select><br>    
                                                </div>
                                                <div class="form-group">
                                                    <label for="RaisonRepporte" class="col-form-label">Raison Repporte :</label>
                                                   <input id="RaisonRepporte"  name="raison" type="text" class="form-control" value="'.$ligne->raisonRepport.'">                   
                                                </div>
                                                 <div class="form-group">
                                                    <label for="Rapport" class="col-form-label">Rapport :</label>
                                                   <input id="Rapport"  name="rap" type="text" class="form-control" value="'.$ligne->rapport.'">                   
                                                </div>
                                                <div class="form-group">
                                                   <LABEL FOR="VotePublique" class="col-form-label"> Vote  : </LABEL> <BR>
                                                   <input type="text" name="vote" id="VotePublique" class="form-control" value="'.$ligne->votePublique.'"><br>
                                               </div>

                                               <div class="form-group">
                                                <LABEL FOR="DateEnvoiInt" class="col-form-label"> Date Envoi Int  : </LABEL> <BR>
                                              <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                                                            <input type="text"  name="dateEI" class="form-control datetimepicker-input" data-target="#datetimepicker4"  value="'.$ligne->dateEnvoiInt.'" />
                                                            <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
                                                                <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                                            </div>
                                                        </div>
                                                </div>

                                                <div class="form-group">
                                                <LABEL FOR="nEnvoiInt" class="col-form-label"> Num d\'envoi interne  : </LABEL> <BR>
                                               <input type="text" name="NumEnvoiInt" id="nEnvoiInt" class="form-control" value="'.$ligne->nEnvoiInt.'"><br>
                                               </div>

                                              <div class="form-group">
                                                <LABEL FOR="DateEnvoiExt" class="col-form-label"> Date Envoi Ext  : </LABEL> <BR>
                                               <input type="text" name="dateEEx" id="DateEnvoiExt" class="form-control" value="'.$ligne->dateEnvoiExt.'">

                                               <div class="form-group">       
                                                <LABEL FOR="nEnvoiEext" class="col-form-label"> Num d\'envoi externe  : </LABEL> <BR>
                                               <input type="text" name="NumEnvoiExt" id="nEnvoiExt" class="form-control" value="'.$ligne->nEnvoiExt.'"><br>
                                               </div>

                                               <div class="form-group" >
                                                <LABEL FOR="App" class="col-form-label"> App ou Napp  : </LABEL> <BR>
                                                <select name="ap" class="form-control">
                                                  <option>  oui  </option>
                                                  <option>  non </option>
                                                </select><br>
                                                </div>

                                                <div class="form-group">
                                               <LABEL FOR="action" class="col-form-label"> action  : </LABEL> <BR>
                                               <input type="text" name="ac" id="action" class="form-control" value="'.$ligne->action.'" ><br>
                                                </div>

                                              <div class="form-group">
                                               <LABEL FOR="Remarques" class="col-form-label"> Remarques  : </LABEL> <BR>
                                               <input type="text" name="Rem" id="Remarques" class="form-control" value="'.$ligne->remarques.'"><br>
                                            </div>
                                            
                                            <div class="form-group">
                                            <LABEL FOR="Services" class="col-form-label"> Service  : </LABEL>  
                                                <a href="AjouterService.php" class="ajt"><i class="fa fa-plus"></i>Ajouter Service</a><BR>
                                               <select name="Service" class="form-control" >';}?>
                                                <?php 
                                                include ('../Connexion_database.php');
                                                  $sql2="SELECT * from Service";
                                                  $res2= mysqli_query($connexion,$sql2) ;
                                                  while($ligne=mysqli_fetch_array($res2)) {
                                                  echo'<option value="'.$ligne['idService'].'">'.$ligne["intituleService"].'</option>'; 
                                                  }
                                                  ?>
                                              </select>

                                           </div>

                                                <div style="text-align: center;">
                                                    <button class="btn btn-outline-success" type="submit" name="submit">Ajouter</button>
                                                    <button class="btn btn-outline-danger" name="annuler">Annuler</button>
                                                    
                                                </div>
                                            </form>
                                <?php
                                        
                                        
                                if(isset($_POST['submit']))
                                {
                                  {
                                      $id=$ID;
                                      $Point=$_POST['intituleP'];
                                      $dePachalik=$_POST['typeP'];
                                      $Repporte=$_POST['choix'];
                                      $raisonRepport=$_POST['raison'];
                                      $rapport=$_POST['rap'];
                                      $votePublique=$_POST['vote'];
                                      $dateE=$_POST['dateEI'];
                                      $dateEnvoiInt=date('Y-m-d',strtotime($dateE));
                                      $nEnvoiInt=$_POST['NumEnvoiInt'];
                                      $dateEx=$_POST['dateEEx'];
                                      $dateEnvoiExt=date('Y-m-d',strtotime($dateEx));
                                      $nEnvoiExt=$_POST['NumEnvoiExt'];
                                      $App=$_POST['ap'];
                                      $action=$_POST['ac'];
                                      $remarques=$_POST['Rem'];
                                      $Service=$_POST['Service'];
                                     $result = mysqli_query($connexion ,"UPDATE point SET intitulePoint='$Point', dePachalik='$dePachalik', repporte='$Repporte', raisonRepport='raisonRepport' , rapport='$rapport', votePublique='$votePublique' , dateEnvoiInt='$dateEnvoiInt' , nEnvoiInt='$nEnvoiInt' , dateEnvoiExt='$dateEnvoiExt' , app_Napp='$App' , action='$action' , remarques='$remarques' , nEnvoiExt='$nEnvoiExt', idService='$Service'  where idPoint=$id");
                                     {
                                        echo '<script>alert(\'Modification avec succes.\');</script>';
                                         echo "<script>location.href='AfficherSessions.php';</script>";
                                     }
                                        
                                    }  
                                } 
                                else if(isset($_POST['annuler']))
                                {
                                   echo "<script>location.href='AfficherSessions.php';</script>";
                                }          
                            
                                
  
                                
                        ?>
                    </div>
            </div>
        </div>
             <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <?php include 'footer.php';?>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
    </div>
    
</body>
 
</html>