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
                    <h5 class="card-header">Ajouter nouvelle reunion</h5>
                    <div class="card-body">
                        <?php
                        echo '
                        <form method="POST" action="AddReunion.php?id='.$_GET['id'].'" >
                            <div class="form-group">
                                <label for="dateR" class="col-form-label">date Reunion</label>
                               <!-- <input id="dateR"  name="dateR" type="text" class="form-control" required>-->
                                <div class="form-group">
                                    <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                                        <input type="text"  name="dateR" class="form-control datetimepicker-input" data-target="#datetimepicker4"  required="" />
                                        <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="publique" class="col-form-label">Publique</label>
                                <select name="pubR" class="form-control">
                                      <option> نعم   </option>
                                      <option>  لا </option>
                                </select><br>
                                
                            </div>
                            
                            <div style="text-align: center;">
                                <button class="btn btn-outline-success" type="submit" name="submit">Ajouter</button>
                                <button class="btn btn-outline-danger" name="annuler">Annuler</button>
                                
                            </div>
                            
                            </form>';
                            ?>
                            <?php
                                include ('../Connexion_database.php');
                                 if(isset($_POST['submit']))
                                {
                                $date2=$_POST['dateR'];
                                $date=date('Y-m-d',strtotime($date2));
                            
                                $publique=$_POST['pubR'];
                                $Ses=$_GET['id'];

                                if ($date&&$publique&&$Ses)
                                { 
                                     $sql = "INSERT INTO reunion(idReunion,dateReunion, publique,Nsession) values ('','$date','$publique' ,'$Ses')";
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