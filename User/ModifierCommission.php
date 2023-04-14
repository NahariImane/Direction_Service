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
                    <h5 class="card-header">Modifier Commission</h5>
                    <div class="card-body">
                        <?php
                        include('../Connexion_database.php');
                        

                            $result1 = mysqli_query($connexion ,"SELECT distinct c.idCommission , c.intituleCom ,c.idConseil  FROM commission c where idCommission=".$_GET['id']);
                               while($ligne = mysqli_fetch_object($result1)){
                               
                                  $ID=$ligne->idCommission;
                                  

                                   echo '
                                            <form method="POST" action="ModifierCommission.php?id='.$_GET['id'].'">
                                                <div class="form-group">
                                                    <label for="intituleCommission" class="col-form-label">Service</label>
                                                    <input id="intituleCommission" name="intituleC" type="text" value="'.$ligne->intituleCom.'" class="form-control" Required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="dateC" class="col-form-label">Conseil </label>
                                                    <select name="dateC" class="form-control">';}?>
                                                          <?php 
                                                           include ('../Connexion_database.php');

                                                           $sql2="SELECT * from conseil";
                                                           $res2= mysqli_query($connexion,$sql2) ;
                                                           while($ligne=mysqli_fetch_array($res2)) {
                                                          echo' <option value="'.$ligne['idConseil'].'">'.$ligne["anneeDebut"].'</option>';
                                                           }
                                                         ?>
                                                       </select>
                                                </div>
                                                <div style="text-align: center;">
                                                    <button class="btn btn-outline-success" type="submit" name="submit">Modifier</button>
                                                    <button class="btn btn-outline-danger" type="submit" name="annuler">Annuler</button>   
                                                </div>
                                                
                                            </form>
                                        <?php
                                            if(isset($_POST['submit']))
                                            {
                                              $id=$_GET['id'];
                                              $Comm=$_POST['intituleC'];
                                              $Cons=$_POST['dateC'];
                                             $result = mysqli_query($connexion ,"UPDATE commission SET intituleCom='$Comm', idConseil='$Cons'  where idCommission=$id");
                                             {
                                                echo '<script>alert(\'Modification avec succes.\');</script>';
                                                
                                                echo "<script>location.href='AfficherCommission.php';</script>";
                                                
                                             }
                                                
                                            } 
                                            else if(isset($_POST['annuler']))
                                            {
                                               echo "<script>location.href='AfficherCommission.php';</script>";
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