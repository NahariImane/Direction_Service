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
                            <h5 class="card-header">Commissions</h5>
                            <div><a href="AjouterCommission.php" id="btn" class="btnAgt"><i class="fa fa-plus-circle fa-2x" aria-hidden="true"></i></a></div> 
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th>Commission</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php   
                                            include ('../Connexion_database.php');
                                            $resultat1 = mysqli_query($connexion ,"SELECT distinct c.idCommission , c.intituleCom  FROM commission c " );
                                               while($ligne = mysqli_fetch_object($resultat1)) {
                                               echo '<tr align="center"><td class="class2">'. $ligne->intituleCom.'</td>  <td><a onclick="deleteSes('. $ligne->idCommission.')"  name="Delete" class="cc1"><i class="fas fa-trash-alt"></i></a>&nbsp&nbsp&nbsp<a onclick="updateSes('.$ligne->idCommission.')"  name="update" class="cc2"><i class="fa fa-pencil"></i></a> </td> 
                                                 <script language="javascript">
                                                        function deleteSes(delid)
                                                        {
                                                          if(confirm("Vous voulez supprimer cette commission?")){
                                                            window.location.href="SupprimerCommission.php?id="+delid+" ";
                                                            return true;
                                                          }
                                                        }   
                                                        function updateSes(upid)
                                                        {
                                                          if(confirm("Vous voulez modifier cette commission?")){
                                                            window.location.href="ModifierCommission.php?id="+upid+" ";
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