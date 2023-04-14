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
                            <h5 class="card-header">Conseils</h5>
                            <div><a href="AjouterConseil.php" id="btn" class="btnAgt"><i class="fa fa-plus-circle fa-2x" aria-hidden="true"></i></a></div> 
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th>Annee Debut</th>
                                                <th>Annee Fin</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php   
                                            include ('../Connexion_database.php');
                                            $resultat1 = mysqli_query($connexion ,"SELECT idConseil , anneeDebut , anneeFin FROM conseil order by anneeDebut asc");
                                                while($ligne = mysqli_fetch_object($resultat1)) {
                                                echo '<tr align="center"><td class="class2">'. $ligne->anneeDebut.'</td> <td class="class3">'. $ligne->anneeFin.'</td><td><a onclick="deleteSes('. $ligne->idConseil.')"  name="Delete" class="cc1"><i class="fas fa-trash-alt"></i></a>&nbsp&nbsp&nbsp<a onclick="updateSes('.$ligne->idConseil.')"  name="update" class="cc2"><i class="fa fa-pencil"></i></a> &nbsp&nbsp&nbsp<a onclick="AddMembre('. $ligne->idConseil.')"  name="Add" class="cc1"><i class="fa fa-user-plus"></i></a>&nbsp&nbsp&nbsp<a onclick="AfficherMembreR('. $ligne->idConseil.')"  name="Add" class="cc1"><i class="fa fa-user-circle-o"></i></a>&nbsp&nbsp&nbsp<a  onclick="viewCons('.$ligne->idConseil.')"  name="view" class="cc2"><i class="fas fa-info-circle"></i></a>&nbsp&nbsp&nbsp<a onclick="addCom('. $ligne->idConseil.')"  name="Add" class="cc1"><i class="fas fa-plus"></i></a> <br>  </td> 
                                                     <script language="javascript">
                                                        function deleteSes(delid)
                                                        {
                                                          if(confirm("Vous voulez supprimer ce Conseil?")){
                                                            window.location.href="SupprimerConseil.php?id="+delid+" ";
                                                            return true;
                                                          }
                                                        }   
                                                        function updateSes(upid)
                                                        {
                                                          if(confirm("Vous voulez modifier ce Conseil ?")){
                                                            window.location.href="Modifierconseil.php?id="+upid+" ";
                                                            return true;
                                                          }
                                                        }   
                                                        function AfficherMembreR(vwid)
                                                        {
                                                              window.location.href="AfficherMembreR.php?id="+vwid+" ";
                                                        }
                                                         function AddMembre(adid)
                                                        {
                                                              window.location.href="AddMembre.php?id="+adid+" ";
                                                        }
                                                        function viewCons(Consid)
                                                        {
                                                              window.location.href="ViewComm.php?id="+Consid+" ";
                                                        }
                                                        function addCom(Com)
                                                        {
                                                              window.location.href="addComm.php?id="+Com+" ";
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