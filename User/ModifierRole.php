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
                    <h5 class="card-header">Modifier Role</h5>
                    <div class="card-body">
                        <?php
                        include('../Connexion_database.php');
                        

                            $result1 = mysqli_query($connexion ,"SELECT idRole,intituleR FROM role where idRole=".$_GET['id']);
                               while($ligne = mysqli_fetch_object($result1)){
                               
                                  $ID=$ligne->idRole;
                                  

                                   echo '
                                            <form method="POST" action="ModifierRole.php?id='.$_GET['id'].'">
                                                <div class="form-group">
                                                    <label for="intitulRole" class="col-form-label">Role</label>
                                                    <input id="intituleRole" name="role" type="text" value="'.$ligne->intituleR.'" class="form-control" Required>
                                                </div>
                                               
                                                <div style="text-align: center;">
                                                    <button class="btn btn-outline-success" type="submit" name="submit">Modifier</button>
                                                    <button class="btn btn-outline-danger" type="submit" name="annuler">Annuler</button>   
                                                </div>
                                                
                                            </form>';
                                            if(isset($_POST['submit']))
                                {
                                  $id=$_GET['id'];
                                  $Irole=$_POST['role'];
                                  
                                 $result = mysqli_query($connexion ,"UPDATE role SET intituleR='$Irole' where idRole=$id");
                                 {
                                    echo '<script>alert(\'Modification avec succes.\');</script>';
                                    
                                    echo "<script>location.href='AfficherRole.php';</script>";
                                    
                                 }
                                    
                                } 
                                else if(isset($_POST['annuler']))
                                {
                                   echo "<script>location.href='AfficherRole.php';</script>";
                                }          
                            
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