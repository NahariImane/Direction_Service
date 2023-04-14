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
                    <h5 class="card-header">Ajouter Conseil</h5>
                    <div class="card-body">
                        <form method="POST" action="AjouterConseil.php" >
                            <div class="form-group">
                                <LABEL FOR="anneeDebut" class="col-form-label"> Date Debut: </LABEL> <BR>
                                <input type="text" name="Debut" id="anneeDebut" class="form-control" required><br>
                            </div>

                            <div class="form-group">
                                <LABEL FOR="anneeFin" class="col-form-label"> Date Fin : </LABEL> <BR>
                                <input type="text" name="Fin" id="anneeFin" class="form-control" required><br>
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
                                    $dateD=$_POST['Debut'];
                                    $dateDebut=date('Y-m-d',strtotime($dateD));
                                    $dateF=$_POST['Fin'];
                                    $dateFin=date('Y-m-d',strtotime($dateF));
                                    if($dateDebut&&$dateFin)
                                    { 
                                      
                                       $result = mysqli_query($connexion ,"INSERT INTO conseil(idConseil,anneeDebut,anneeFin) values ('','$dateDebut','$dateFin')");
                                       {
                                          echo '<script>alert(\'Conseil bien ajouté.\');</script>';
                                          echo "<script>location.href='AfficherConseil.php';</script>";
                                        }
                                    }
                                }
                                else if(isset($_POST['annuler'])){
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