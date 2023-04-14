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
                        <?php
                        include('../Connexion_database.php');
                        

                            $result1 = mysqli_query($connexion ,"SELECT r.idReunion , r.dateReunion , r.publique, s.intituleSession FROM reunion r , session s where s.Nsession=r.Nsession and idReunion='".$_GET['id']."'");
                               $ligne = mysqli_fetch_object($result1);
                               
                                  $ID=$ligne->idReunion;
                                                              

                                   echo '
                                            <form method="POST" action="ModifierReunion.php?id='.$_GET['id'].'">
                                                <div class="form-group">
                                                    <label for="dateReunion" class="col-form-label">date Reunion</label>
                                                    <input id="dateReunion" name="dateReunion" type="text" value="'.$ligne->dateReunion.'" class="form-control" Required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="publique" class="col-form-label">publique </label>
                                                    <select name="publique" class="form-control">
                                                          <option> نعم   </option>
                                                          <option>  لا </option>
                                                    </select><br>
                                                   
                                                </div>
                                                <div style="text-align: center;">
                                                    <button class="btn btn-outline-success" type="submit" name="submit">Modifier</button>
                                                    <button class="btn btn-outline-danger" type="submit" name="annuler">Annuler</button>   
                                                </div>
                                                
                                            </form>';
                                            if(isset($_POST['submit']))
                                {
                                  $id=$_GET['id'];
                                  $date2=$_POST['dateReunion'];
                                  $date=date('Y-m-d',strtotime($date2));
                                  $pub=$_POST['publique'];
                                 $result = mysqli_query($connexion ,"UPDATE reunion SET dateReunion='$date' , publique='$pub'   where idReunion=$id");
                                 {
                                    echo '<script>alert(\'Modification avec succes :)\');</script>';
                                    
                                    echo "<script>location.href='AfficherSessions.php';</script>";
                                    
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