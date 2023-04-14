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
                            <h5 class="card-header">Liste des Commisions</h5>
                        </div> 
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                         <?php   
                                              include ('../Connexion_database.php');
                                       echo' <thead>
                                            <tr>
                                                <th>Commisions</th>
                                              
                                            </tr>
                                        </thead>
                                        <tbody>';
                                        $resultat1 = mysqli_query($connexion ,"SELECT c.idCommission , c.intituleCom , c.idConseil FROM commission c, conseil co where c.idConseil=co.idConseil and  c.idConseil='".$_GET['id']."' ");
                                        while($ligne = mysqli_fetch_object($resultat1)) {
                                        echo'<tr align="center"><td class="class2">'. $ligne->intituleCom.'</td> <td> <a  onclick="memCom('.$ligne->idCommission.')"  name="view" class="cc2"><i class="fa fa-user-circle-o"></i></a> </td> 

                                         <script language="javascript">
                                         function memCom(mC)
                                            {
                                                  window.location.href="MembCom.php?id="+mC+" ";
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