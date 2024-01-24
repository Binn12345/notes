<?php 
  
    include 'dbconnection.php';
    // var_dump('<pre>',$job,$_GET,$_SESSION,$_POST);die;
    switch($_GET['job']){
        case 'logout':
            echo logout();
        break;
    }

    function logout() {
         // Unset all of the session variables.
	  
    // Finally, destroy the session.
    session_start();

    // Unset the user_authenticated session variable to log the user out
    unset($_SESSION['user_authenticated']);
      header("Location: ../?");
      exit;

    }



