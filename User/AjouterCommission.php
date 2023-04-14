<?php
     session_start();  
    if(!isset($_SESSION['monlogin'])) header('location: ../Anonyme/Login2.php');
?>
<!doctype html>
<html lang="en">

 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-select.css">
    <link href="../css/font.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://kit.fontawesome.com/da4d3dfc16.js" crossorigin="anonymous"></script>
    <style>
        .selectpicker{
            width: 900px;
           
        }
    </style>
</head>

<body>
    <!-- ============================================================== -->
        <?php  include'Menu.php'; ?>
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                
                <div class="card">
                    <h5 class="card-header">Ajouter Commission</h5>
                    <div class="card-body">
                        
                        
                        <form method="POST" action="AjouterCommission.php" >

                            <div class="form-group">
                                <label for="intituleCom" class="col-form-label">intitule Commission</label>
                                <input id="intituleCom"  name="intituleC" type="text" class="form-control" required>
                            </div>
                             <div class="form-group">
                                <LABEL FOR="Conseil" class="col-form-label"> Conseil  : </LABEL>  
                                    
                                   <select name="dateC" class="form-control" > 
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
                                <button class="btn btn-outline-success" type="submit" name="submit">Ajouter</button>
                                <button class="btn btn-outline-danger" name="annuler">Annuler</button>
                                
                            </div>
                            
                            </form>

                            <?php
                                include ('../Connexion_database.php');
                                if(isset($_POST['submit']))
                                {
                                $idC=$_POST['dateC'];
                                $intitule=$_POST['intituleC'];
                                if ($idC&&$intitule)
                                { 
                                   $sql = "INSERT INTO commission(idCommission,intituleCom,idConseil) values ('' ,'$intitule' ,'$idC')";
                                    // On envoie la requête
                                   if($res = $connexion->query($sql))
                                   {
                                      echo '<script>alert(\'Ajout avec succes .\');</script>';
                                      echo "<script>location.href='AfficherCommission.php';</script>";
                                    }
                                }

                                }
                                else if(isset($_POST['annuler'])){
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