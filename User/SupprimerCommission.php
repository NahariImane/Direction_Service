<?php
session_start();
if(!isset($_SESSION['monlogin'])) header('location: ../Anonyme/Login2.php');
include("../Connexion_database.php");
$select = "delete from commission where idCommission='".$_GET['id']."'";
if($query = mysqli_query($connexion,$select))
{
echo '<script>alert(\'Suppression avec succes :)\');</script>';
header('Refresh: 0; url=AfficherCommission.php');
}
else
{
echo '<script>alert(\'Une erreur est survenue Veuillez reessayer\');</script>';
header('Refresh: 0; url=AfficherCommission.php');
}
?>