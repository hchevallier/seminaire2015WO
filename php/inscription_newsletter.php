<?php

session_start();

if(isset($_POST['submit'])) {
  if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['mail'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $mail = $_POST['mail'];
    	
    $requete = "SELECT mail FROM `newsletter`";
    try {
      $response = $connexion->prepare($requete);
      $response->execute();
    }
    catch (Exception $e) {
      echo $e->getMessage();
    }
    
    $data = $response->fetchAll();
    $row_array = array();
    $mail_array = array();
    
    foreach($data as $row) {
      $row_array['mail'] = $row['mail'];
      if($row_array['mail'] == $mail) {
        $mail_exists = true;
      }
    }
    
    if($mai_exists == true) {
      echo ("Le mail ".$mail." a déjà été utilisé");
    } else {
      foreach ($_POST['category'] as $cat) {
        echo ("La checkbox ".$cat." a été cochée");
      }
    }
    
    
  } else {
    echo ("Veuillez remplir le formulaire svp");
  }
} else {
  echo ("Le formulaire n'a pas été remplis");
}
?>
