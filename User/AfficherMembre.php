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
                            <h5 class="card-header">Membres</h5>
                             <form method="post" action="RechercheMembre.php">
                                    <input type="text" size="50" name="RechercheM" id="t" placeholder="Rechercher " >
                                    <button type="submit" id="p"  ><i class="fa fa-search"></i> </button>   
                            </form>
                             </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th>CIN</th>
                                                <th>Nom</th>
                                                <th>Prenom</th>
                                                <th>Partie Polytique</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php   
                                            include ('../Connexion_database.php');
                                            $resultat1 = mysqli_query($connexion ,"SELECT distinct m.idMembre, m.cin, m.nom, m.prenom, m.partiepolytique FROM membre m ");
                                            while($ligne = mysqli_fetch_object($resultat1)) {
                                            echo '<tr align="center"><td class="class2">'. $ligne->cin.'</td> <td class="class3">'. $ligne->nom.'</td> <td class="class4">'. $ligne->prenom.'</td> <td class="class5">'. $ligne->partiepolytique.'</td> <td><a onclick="deleteSes('. $ligne->idMembre.')"  name="Delete" class="cc1"><i class="fas fa-trash-alt"></i></a>&nbsp&nbsp&nbsp<a onclick="updateSes('.$ligne->idMembre.')"  name="update" class="cc2"><i class="fa fa-pencil"></i></a> </td> 
                                                 <script language="javascript">
                                                        function deleteSes(delid)
                                                        {
                                                          if(confirm("Vous voulez supprimer ce membre?")){
                                                            window.location.href="supprimerMembre.php?id="+delid+" ";
                                                            return true;
                                                          }
                                                        }   
                                                        function updateSes(upid)
                                                        {
                                                          if(confirm("Vous voulez modifier ce  membre ?")){
                                                            window.location.href="ModifierMembre.php?id="+upid+" ";
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