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
                    <h5 class="card-header">Modifier Conseil</h5>
                    <div class="card-body">
                        <?php
                        include('../Connexion_database.php');
                        

                            $result1 = mysqli_query($connexion ,"SELECT idConseil , anneeDebut , anneeFin FROM conseil where idConseil='".$_GET['id']."'  order by anneeDebut asc");
                               while($ligne = mysqli_fetch_object($result1)){
                               
                                  $ID=$ligne->idConseil;
                                  

                                   echo '
                                            <form method="POST" action="ModifierConseil.php?id='.$_GET['id'].'">
                                                <div class="form-group">
                                                    <label for="anneD" class="col-form-label">anneeDebut</label>
                                                    <input id="anneD" name="AnneeD" type="text" value="'.$ligne->anneeDebut.'" class="form-control" Required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="anneF" class="col-form-label">anneeFin</label>
                                                    <input id="anneF" name="AnneeF" type="text" value="'.$ligne->anneeFin.'" class="form-control" Required>
                                                </div>
                                                
                                                <div style="text-align: center;">
                                                    <button class="btn btn-outline-success" type="submit" name="submit">Modifier</button>
                                                    <button class="btn btn-outline-danger" type="submit" name="annuler">Annuler</button>   
                                                </div>
                                                
                                            </form>';}
                                            ?>
                                        <?php
                                            if(isset($_POST['submit']))
                                            {
                                              $id=$_GET['id'];
                                              $anneeDebut=$_POST['AnneeD'];
                                              $anneeFin=$_POST['AnneeF'];
                                             $result = mysqli_query($connexion ,"UPDATE conseil SET anneeDebut='$anneeDebut', anneeFin='$anneeFin'  where idConseil=$id");
                                             {
                                                echo '<script>alert(\'Modification avec succes.\');</script>';
                                                
                                                echo "<script>location.href='AfficherConseil.php';</script>";
                                                
                                             }
                                                
                                            } 
                                            else if(isset($_POST['annuler']))
                                            {
                                               echo "<script>location.href='AfficherConseil.php';</script>";
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