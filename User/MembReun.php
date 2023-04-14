<?php
     session_start();  
    if(!isset($_SESSION['monlogin'])) header('location: ../Anonyme/Login.php');
?>
<!doctype html>
<html>

 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link href="../css/font.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style2.css">
    <script src="https://kit.fontawesome.com/da4d3dfc16.js" crossorigin="anonymous"></script>
    <style>
        img{
            width: 30px;
            height: 30px;
        }
    </style>
</head>

<body>
   <?php  include'Menu.php'; ?>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <div class="row">
                    <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Listes de Présence</h5>
                            
                            <div class="card-body">
                                <div class="table-responsive">
                                     <?php   
                                       include ('../Connexion_database.php');
                                         $IDR=$_GET['id'];
                                   echo' <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                              <th> Presence</th>
                                              <th>Absence S J</th>
                                              <th>Absence A J</th>
                                              <th>CIN</th>
                                              <th>Nom</th>
                                              <th>Role</th>
                                              <th>Partie Polytique</th>
                                            </tr>
                                        </thead>
                                        <tbody>';


                                        echo '<form method="POST" ENCTYPE="multipart/form-data"  class="frm3">';
                                         echo '<div style="text-align: center;">
                                                <button class="btn btn-outline-success" type="submit" name="submit">Ajouter</button>
                                                </div>';
                                      $resultat1=mysqli_query($connexion ,"SELECT m.idMembre,m.CIN,m.Nom,r.intituleR,m.partiepolytique FROM membre m,role r where m.idRole=r.idRole");
                                        while($ligne = mysqli_fetch_object($resultat1)) {
                                            $m=$ligne->idMembre;
                                            echo '<tr align="center"><td class="class2"><input name="Pre'.$m.'" id="Pr" type="radio" value="present"></td><td class="class2"><input name="Pre'.$m.'" id="Pr" type="radio" value="absSR"></td><td class="class2"><input name="Pre'.$m.'" id="Pr" type="radio" value="absAR"></td><td class="class2">'. $ligne->CIN.'</td> <td class="class3">'. $ligne->Nom.'</td><td class="class2">'. $ligne->intituleR.'</td> <td class="class3">'. $ligne->partiepolytique.'</td>   </tr> ';
                                            if(isset($_POST['submit'])){
                                                $nombr= "Pre".$m;
                                                //echo "ttttttttttttt===".$nombr;
                                                //echo "lavaleurduradio====".$_POST[$nombr];
                                                $reqInsertPresence="insert into membrereunion values('$ligne->idMembre', '$IDR','$_POST[$nombr]') ";
                                                //echo "lareq=====".$reqInsertPresence;
                                                if($res = $connexion->query($reqInsertPresence))
                                                {
                                                 echo '<script>alert(\'Ajout avec succes.\');</script>';
                                                 echo "<script>location.href='AfficherSessions.php';</script>"; 
                                                }
                                                //$resInsertPresence=mysqli_query($connexion ,$reqInsertPresence);
                                            }
                                            //else echo "form nn envoye";
                                        }

                                        echo '</form>';

                                        ?>               
                                            
                                        </tbody>
                                        
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
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