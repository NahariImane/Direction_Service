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
                    <h5 class="card-header">Modifier Reunion</h5>
                    <div class="card-body">
                         <div class="form-group">
                            <form method="POST" action="UpdateRP.php?id='.$_GET['id'].'">
                           <LABEL FOR="Reunions" class="col-form-label"> date Reunion  : </LABEL>  
                                <select name="reunion" class="form-control" >
                                <?php 
                                   include ('../Connexion_database.php');

                                   $sql2="SELECT * from reunion order by dateReunion desc ";
                                   $res2= mysqli_query($connexion,$sql2) ;
                                   while($ligne=mysqli_fetch_array($res2)) {
                                   echo '<option value="'.$ligne['idReunion'].'">'.$ligne["dateReunion"].'</option>'; 
                                   }
                                 ?>
                               </select>
                               <div style="text-align: center;">
                                <button class="btn btn-outline-success" type="submit" name="submit">Ajouter</button>
                                <button class="btn btn-outline-danger" name="annuler">Annuler</button>
                                
                            </div>
                           </form>
                        </div>

                        <?php

                              include ('../Connexion_database.php');
                            if(isset($_POST['submit']))
                            {
                                $reunion=$_POST['reunion'];
                                if ($reunion)
                                { 
                                   $sql = "UPDATE point SET  idReunion='$reunion' where idPoint='".$_GET['id']."' ";
                                    
                                   $result1 = mysqli_query($connexion ,$sql);
                                   {
                                      echo '<script>alert(\'Ajout avec succes.\');</script>';
                                      echo "<script>location.href='AfficherSessions.php';</script>";
                                    }
                                }
                            } 
                            elseif (isset($_POST['annuler']))
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