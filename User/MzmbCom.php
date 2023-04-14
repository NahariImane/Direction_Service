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
    <link rel="stylesheet" href="../css/style.css">
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
                            <h5 class="card-header">Membre Commission</h5>
                           
                            <div class="card-body">
                                <div class="table-responsive">
                                     <?php   
                                       include ('../Connexion_database.php');
                                         echo'<form method="POST" action="MembCom.php?id="'.$_GET['id'].'"" >
                                         
                                       
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th>Appartient</th>
                                                <th>Role</th>
                                                <th>CIN</th>
                                                <th>Nom</th>
                                                <th>Prenom</th>
                                                <th>Partie Polytique</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                         <div style="text-align: center;">
                                            <button class="btn btn-outline-success" type="submit" name="submit">Ajouter</button>
                                            <button class="btn btn-outline-danger" name="annuler">Annuler</button>
                                            
                                        </div>';?>
                                        
                                        
                                        <?php
                                        
                                        $resultat1=mysqli_query($connexion ,"SELECT m.idMembre,m.CIN,m.Nom,r.intituleR,m.partiepolytique FROM membre m,role r where m.idRole=r.idRole");
                                        while($ligne = mysqli_fetch_object($resultat1)) {
                                            $m=$ligne->idMembre;
                                           echo' <tr align="center"><td class="class2"><input name="Pre" id="Pr" type="checkbox"  value="$m"></td><td class="class2"><input name="role'.$m.'" id="role" type="text"  ></td><td class="class2">'. $ligne->CIN.'</td> <td class="class3">'. $ligne->Nom.'</td><td class="class2">'. $ligne->intituleR.'</td> <td class="class3">'. $ligne->partiepolytique.'</td>   </tr> ';
                                            if(isset($_POST['submit'])){
                                                $role= "role'".$m."'";
                                                $idCom=$_GET['id'];
                                               if($role!=''&&$idCom!=''&&$m!='')
                                               {

                                                    $reqInsertPresence="insert into membrecommission values('$_POST[$role]',$idCom,$m) ";
                                                    $resInsertPresence=mysqli_query($connexion ,$reqInsertPresence);
                                                    
                                                    echo '<script>alert(\'Ajout avec succes .\');</script>';
                                                    echo "<script>location.href='AfficherConseil.php';</script>";   
                                                 } 
                                           else echo "form nn envoye";
                                        }
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
            <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="text-md-right footer-links d-none d-sm-block">
                                <a href="javascript: void(0);">About</a>
                                <a href="javascript: void(0);">Support</a>
                                <a href="javascript: void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
   <!-- <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/bootstrap.bundle.js"></script>
    <script src="../js/bootstrap-select.js"></script>
    <script src="../js/main-js.js"></script>
   -->
</body>
 
</html> 