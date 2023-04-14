<?php
$connexion = mysqli_connect("localhost","root","");
  if( !$connexion) 
  { 
   echo "Desolé, connexion à localhost impossible"; 
   exit; 
  }
 if( !mysqli_select_db($connexion,'direction_service')) 
 { 
  echo "Désolé, accès à la base direction_service impossible";  
  exit;
 }
?>