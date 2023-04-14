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
                    <h5 class="card-header">Service reunion</h5>
                    <div class="card-body">
                        <?php
                        echo '
                        <form method="POST" action="SeReun.php?id='.$_GET['id'].'" >';?>
                           
                            <div class="form-group">
                                <label for="serv" class="col-form-label">Service</label>
                                <select name="Service" class="form-control">
                                       <?php 
                                           include ('../Connexion_database.php');

                                           $sql2="SELECT * from service";
                                           $res2= mysqli_query($connexion,$sql2) ;
                                           while($ligne=mysqli_fetch_array($res2)) {
                                           echo '<option value="'.$ligne['idService'].'">'.$ligne["intituleService"].'</option>'; 
                                           }
                                        ?>
                                </select><br>
                                
                            </div>
                             <div class="form-group">
                                <label for="NomM" class="col-form-label">Representant :</label>
                               <input id="NomM"  name="NomMembre" type="text" class="form-control" required>                   
                            </div>
                            <div class="form-group">
                                <label for="present" class="col-form-label"> Present</label>
                                <select name="pres" class="form-control">
                                      <option> oui </option>
                                      <option>  non </option>
                                </select><br>   
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
                                    $Ser=$_POST['Service'];
                                    $Rep=$_POST['NomMembre'];
                                    $Presence=$_POST['pres'];
                                    $IDR=$_GET['id'];

                                if ($Ser&&$Rep&&$Presence&&$IDR)
                                { 
                                     $sql = "INSERT INTO servicereunion(idService,idReunion,representant,present) values ('$Ser','$IDR','$Rep' ,'$Presence')";
                                        // On envoie la requête
                                       if($res = $connexion->query($sql))
                                       {
                                     echo '<script>alert(\'Ajout avec succes.\');</script>';
                                     echo "<script>location.href='AfficherSessions.php';</script>"; 
                                    }
                                }
                                }elseif (isset($_POST['annuler'])) {
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