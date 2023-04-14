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
                    <h5 class="card-header">Ajouter nouvelle session</h5>
                    <div class="card-body">
                        <form method="POST" action="AjouterSessions.php" >
                            <div class="form-group">
                                <label for="intituleSession" class="col-form-label">Session</label>
                                <input id="intituleSession"  name="intituleS" type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="typeSession" class="col-form-label">Type Session</label>
                                <select name="typeS" class="form-control">
                                      <option>normal </option>
                                      <option>exceptionnelle</option>
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
                                    $type=$_POST['typeS'];
                                    $intitule=$_POST['intituleS'];
                                    if($type&&$intitule)
                                    { 
                                       $sql = "INSERT INTO session(Nsession,typeSession,intituleSession) values ('','$type','$intitule')";
                                        // On envoie la requête
                                       $result = mysqli_query($connexion ,"INSERT INTO session(Nsession,typeSession,intituleSession) values ('','$type','$intitule')");
                                       {
                                          echo '<script>alert(\'Session bien ajoutée.\');</script>';
                                          echo "<script>location.href='AjouterReunion.php';</script>";
                                        }
                                    }
                                }
                                else if(isset($_POST['annuler'])){
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