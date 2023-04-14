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
                    <h5 class="card-header">Modifier Session</h5>
                    <div class="card-body">
                        <?php
                        include('../Connexion_database.php');
                        

                            $result1 = mysqli_query($connexion ,"SELECT Nsession , typeSession , intituleSession FROM session where Nsession=".$_GET['id']);
                               $ligne = mysqli_fetch_object($result1);
                               
                                  $ID=$ligne->Nsession;
                                  

                                   echo '
                                            <form method="POST" action="ModifierSession.php?id='.$_GET['id'].'">
                                                <div class="form-group">
                                                    <label for="nomSession" class="col-form-label">Session</label>
                                                    <input id="nomSession" name="nomSession" type="text" value="'.$ligne->intituleSession.'" class="form-control" Required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="typeSes" class="col-form-label">Type Session </label>
                                                    <select name="typeSes" class="form-control">
                                                          <option>دورة عادية</option>
                                                          <option>دورة استثنائية</option>
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
                                  $Session=$_POST['nomSession'];
                                  $typeSession=$_POST['typeSes'];
                                 $result = mysqli_query($connexion ,"UPDATE session SET intituleSession='$Session', typeSession='$typeSession'  where Nsession=$id");
                                 {
                                    echo '<script>alert(\'Modification avec succes.....\');</script>';
                                    
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