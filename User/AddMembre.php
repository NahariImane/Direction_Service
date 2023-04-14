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
                    <h5 class="card-header">Ajouter Membre</h5>
                    <div class="card-body">
                        <?php
                        echo'
                        <form method="POST" action="AddMembre.php?id='.$_GET['id'].'" >
                            <div class="form-group">
                                <label for="CIN" class="col-form-label">CIN :</label>
                               <input id="CIN"  name="cinMembre" type="text" class="form-control" required>                   
                            </div>
                            <div class="form-group">
                                <label for="NomM" class="col-form-label">Nom :</label>
                               <input id="NomM"  name="NomMembre" type="text" class="form-control" required>                   
                            </div>
                            <div class="form-group">
                                <label for="PreomM" class="col-form-label">Prenom :</label>
                               <input id="PreomM"  name="PrenomMembre" type="text" class="form-control" required>                   
                            </div>
                            <div class="form-group">
                                <label for="PPM" class="col-form-label">partiepolytique :</label>
                               <input id="PPM"  name="PPMembre" type="text" class="form-control" required>                   
                            </div>
                             
                            
                        <div class="form-group">
                        <LABEL FOR="Roles" class="col-form-label"> Role  : </LABEL>  
                            <a href="AjouterRole.php" class="ajt"><i class="fa fa-plus"></i>Ajouter Role</a><BR>
                           <select name="role" class="form-control" >'; ?>
                            <?php 
                               include ('../Connexion_database.php');

                               $sql2="SELECT * from Role";
                               $res2= mysqli_query($connexion,$sql2) ;
                               while($ligne=mysqli_fetch_array($res2)) {
                               echo'<option value="'.$ligne['idRole'].'">'.$ligne["intituleR"].'</option> ';
                               }
                             ?>
                           </select>
                            <?php
                              include ('../Connexion_database.php');
                              echo '<input id="ConseilId" name="ConId" type="hidden" value="'.$_GET['id'].'" > <br>';
                           ?>

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
                                     $cin=$_POST['cinMembre'];
                                     $Nom=$_POST['NomMembre'];
                                     $Prenom=$_POST['PrenomMembre'];
                                     $Partie=$_POST['PPMembre'];
                                     $roleM=$_POST['role'];
                                     $IDCon=$_POST['ConId'];


                                    if ($cin&&$Nom&& $Prenom&&$Partie)
                                    { 
                                       $sql = "INSERT INTO membre(idMembre,cin, nom , prenom, partiepolytique, idRole) values ('','$cin' , '$Nom' , '$Prenom' , 'Partie', '$roleM')";
                                      
                                        // On envoie la requête
                                       if($res=$connexion->query($sql))
                                       {
                                          echo '<script>alert(\' Ajout avec succes.\');</script>';
                                        }
                                    }

                                     $req= "select max(idMembre) from membre ";
                                    $result=mysqli_query($connexion ,$req);
                                    $ligne= mysqli_fetch_array($result);
                                    $Membre=$ligne['max(idMembre)'];
                                     $IDCon=$_POST['ConId'];

                                     if ($Membre&&$IDCon) 
                                     {
                                        $requete ="INSERT INTO membreConseil (idMembre , idConseil) values ('$Membre','$IDCon')";
                                        if ($result=$connexion->query($requete))
                                        {
                                             echo '<script>alert(\' Ajout avec succes.\');</script>';
                                          echo "<script>location.href='AfficherConseil.php';</script>";
                                        }
                                        else
                                       {
                                          echo '<script>alert(\'Erreur! Veuillez réessayer );</script>'; 
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