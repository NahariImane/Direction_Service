<?php
     session_start();  
    if(!isset($_SESSION['monlogin'])) header('location: ../Anonyme/Login.php');
?>
<!doctype html>
<html>

 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link href="../css/font.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://kit.fontawesome.com/da4d3dfc16.js" crossorigin="anonymous"></script>
    <style>
        img{
            width: 30px;
            height: 30px;
        }
    </style>
</head>

<body>
   <?php  include'Menu.php'; ?>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <div class="row">
                    <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Listes des Points</h5>
                            <form method="post" action="RecherchePoint.php">
                                    <input type="text" size="50" name="RechercheP" id="t" placeholder="Rechercher " >
                                    <button type="submit" id="p"  ><i class="fa fa-search"></i> </button>   
                            </form>
                            </div> 
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                 <th>Point</th>
                                                 <th> DePachalik</th>
                                                 <th>Repporte</th>
                                                 <th>Raison de Repport</th>
                                                 <th>Rapport</th>
                                                 <th>Vote Publique</th>
                                                 <th>Date d\'envoi interne</th>
                                                 <th>Num d\'envoi interne</th>
                                                 <th>Date d\'envoi externe</th>
                                                 <th>Num d\'envoi externe</th>
                                                 <th>Applique</th>
                                                 <th>Action</th>
                                                 <th>Remarques</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php   
                                            include ('../Connexion_database.php');
                                            $resultat1 = mysqli_query($connexion ,"SELECT p.idPoint , p.intitulePoint , p.dePachalik , p.repporte, p.raisonRepport , p.rapport, p.votePublique , p.dateEnvoiInt , p.nEnvoiInt , p.dateEnvoiExt , p.app_Napp , p.action , p.remarques , p.nEnvoiExt, s.idService , r.idReunion FROM point p, service s , reunion r where p.idReunion=r.idReunion and p.idService=s.idService");
                                                while($ligne = mysqli_fetch_object($resultat1)) {
                                                echo '<tr align="center"><td class="class2">'. $ligne->intitulePoint.'</td> <td class="class3">'. $ligne->dePachalik.'</td> <td class="class4">'. $ligne->repporte.'</td> <td class="class5">'. $ligne->raisonRepport.'</td>  <td class="class5">'. $ligne->rapport.'</td> <td class="class5">'. $ligne->votePublique.'</td> <td class="class5">'. $ligne->dateEnvoiInt.'</td> <td class="class5">'. $ligne->nEnvoiInt.'</td> <td class="class5">'. $ligne->dateEnvoiExt.'</td> <td class="class5">'. $ligne->app_Napp.'</td> <td class="class5">'. $ligne->action.'</td> <td class="class5">'. $ligne->remarques.'</td> <td class="class5">'. $ligne->nEnvoiExt.'</td>  
                                                <td><a onclick="deleteSes('. $ligne->idPoint.')"  name="Delete" class="cc1"><i class="fas fa-trash-alt"></i></a>&nbsp&nbsp&nbsp<a onclick="updateSes('.$ligne->idPoint.')"  name="update" class="cc2"><i class="fa fa-pencil"></i></a> </td> 
                                                 <script language="javascript">
                                                        function deleteSes(delid)
                                                        {
                                                          if(confirm("Vous voulez supprimer ce point?")){
                                                            window.location.href="supprimerPoint.php?id="+delid+" ";
                                                            return true;
                                                          }
                                                        }   
                                                        function updateSes(upid)
                                                        {
                                                          if(confirm("Vous voulez modifier ce  point ?")){
                                                            window.location.href="ModifierPoint.php?id="+upid+" ";
                                                            return true;
                                                          }
                                                        } 
                                                     </script>         
                                             </tr>';} 
                                             ?>
                                            
                                        </tbody>
                                        
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
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