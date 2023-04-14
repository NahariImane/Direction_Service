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
                    <h5 class="card-header">Modifier Membre</h5>
                    <div class="card-body">
                        <?php
                        include('../Connexion_database.php');
                        

                            $result1 = mysqli_query($connexion ,"SELECT distinct m.idMembre, m.cin, m.nom, m.prenom, m.partiepolytique FROM membre m where idMembre=".$_GET['id']);
                               while($ligne = mysqli_fetch_object($result1)){
                               
                                  $ID=$ligne->idMembre;
                                  

                                   echo '
                                            <form method="POST" action="Modifiermembre.php?id='.$_GET['id'].'">
                                                <div class="form-group">
                                                    <label for="CIN" class="col-form-label">CIN</label>
                                                    <input id="CIN" name="cinM" type="text" value="'.$ligne->cin.'" class="form-control" Required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="Nom" class="col-form-label">Nom</label>
                                                    <input id="Nom" name="NomM" type="text" value="'.$ligne->nom.'" class="form-control" Required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="Prenom" class="col-form-label">Prenom</label>
                                                    <input id="Prenom" name="PrenomM" type="text" value="'.$ligne->prenom.'" class="form-control" Required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="Partie" class="col-form-label">partie Polytique</label>
                                                    <input id="Partie" name="PartieP" type="text" value="'.$ligne->partiepolytique.'" class="form-control" Required>
                                                </div>
                                               
                                                <div style="text-align: center;">
                                                    <button class="btn btn-outline-success" type="submit" name="submit">Modifier</button>
                                                    <button class="btn btn-outline-danger" type="submit" name="annuler">Annuler</button>   
                                                </div>
                                                
                                            </form>';
                                            if(isset($_POST['submit']))
                                {
                                  $id=$_GET['id'];
                                  $cin=$_POST['cinM'];
                                  $Nom=$_POST['NomM'];
                                  $Prenom=$_POST['PrenomM'];
                                  $Partie=$_POST['PartieP'];
                                  
                                 $result = mysqli_query($connexion ,"UPDATE membre SET CIN='$cin',Nom='$Nom',Prenom='$Prenom',partiepolytique='Partie' where idMembre=$id");
                                 {
                                    echo '<script>alert(\'Modification avec succes.\');</script>';
                                    
                                    echo "<script>location.href='AfficherMembre.php';</script>";
                                    
                                 }
                                    
                                } 
                                else if(isset($_POST['annuler']))
                                {
                                   echo "<script>location.href='AfficherMembre  .php';</script>";
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