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
                            <h5 class="card-header">Listes des Reunions</h5>
                            
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th>date Reunion</th>
                                                <th>Publique</th>
                                                <th>Session</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php   
                                            include ('../Connexion_database.php');
                                            $resultat1 = mysqli_query($connexion ,"SELECT r.idReunion , r.dateReunion , r.publique, s.intituleSession FROM reunion r , session s where s.Nsession=r.Nsession and  s.Nsession='".$_GET['id']."' ");
                                                while($ligne = mysqli_fetch_object($resultat1)) {
                                                echo '<tr align="center"><td class="class2">'. $ligne->dateReunion.'</td> <td class="class3">'. $ligne->publique.'</td> <td class="class3">'. $ligne->intituleSession.'</td> <td><a onclick="deleteSes('. $ligne->idReunion.')"  name="Delete" class="cc1"><i class="fa fa-trash-o"></i></a>&nbsp&nbsp&nbsp<a onclick="updateSes('. $ligne->idReunion.')"  name="update" class="cc2"><i class="fa fa-pencil"></i></a>&nbsp&nbsp&nbsp <a onclick="addSes('.$ligne->idReunion.')"><i class="fa fa-plus-circle"></i></a> &nbsp&nbsp&nbsp<a  onclick="viewRe('.$ligne->idReunion.')"  name="view" class="cc2"><i class="fas fa-info-circle"></i></a> &nbsp&nbsp&nbsp<a  onclick="memR('.$ligne->idReunion.')"  name="view" class="cc2"><i class="fa fa-user-circle-o"></i></a> &nbsp&nbsp&nbsp<a  onclick="SeR('.$ligne->idReunion.')"  name="view" class="cc2"><i class="fab fa-stripe-s"></i></a> <br> </td> 
                                                         <script language="javascript">
                                                            function deleteSes(delid)
                                                            {
                                                              if(confirm("Vous voulez supprimer cette  Reunion?")){
                                                                window.location.href="SupprimerReunion.php?id="+delid+" ";
                                                                return true;
                                                              }
                                                            }   
                                                            function updateSes(upid)
                                                            {
                                                              if(confirm("Vous voulez modifier cette Reunion ?")){
                                                                window.location.href="ModifierReunion.php?id="+upid+" ";
                                                                return true;
                                                              }
                                                            }   

                                                            function viewRe(vwRe)
                                                            {
                                                                  window.location.href="infoReunion.php?id="+vwRe+" ";
                                                            }
                                                             function addSes(adid)
                                                            {
                                                                  window.location.href="AddPoint.php?id="+adid+" ";
                                                            }
                                                             function memR(admr)
                                                            {
                                                                  window.location.href="MembReun.php?id="+admr+" ";
                                                            }
                                                            function SeR(adSer)
                                                            {
                                                                  window.location.href="SeReun.php?id="+adSer+" ";
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