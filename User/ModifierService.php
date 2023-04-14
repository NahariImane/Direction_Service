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
                    <h5 class="card-header">Modifier Service</h5>
                    <div class="card-body">
                        <?php
                        include('../Connexion_database.php');
                        

                            $result1 = mysqli_query($connexion ,"SELECT idService , typeService , intituleService FROM service where idService=".$_GET['id']);
                               while($ligne = mysqli_fetch_object($result1)){
                               
                                  $ID=$ligne->idService;
                                  

                                   echo '
                                            <form method="POST" action="ModifierService.php?id='.$_GET['id'].'">
                                                <div class="form-group">
                                                    <label for="intituleService" class="col-form-label">Service</label>
                                                    <input id="intituleService" name="intituleService" type="text" value="'.$ligne->intituleService.'" class="form-control" Required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="typeService" class="col-form-label">Type Service </label>
                                                    <select name="typeService" class="form-control">
                                                          <option> interne</option>
                                                          <option> externe</option>
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
                                  $Service=$_POST['intituleService'];
                                  $typeService=$_POST['typeService'];
                                 $result = mysqli_query($connexion ,"UPDATE service SET intituleService='$Service', typeService='$typeService'  where idService=$id");
                                 {
                                    echo '<script>alert(\'Modification avec succes.\');</script>';
                                    
                                    echo "<script>location.href='AfficherService.php';</script>";
                                    
                                 }
                                    
                                } 
                                else if(isset($_POST['annuler']))
                                {
                                   echo "<script>location.href='AfficherService.php';</script>";
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