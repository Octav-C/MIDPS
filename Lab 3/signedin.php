<?php

    session_start();
    
    if ($_SESSION['email']) {
        
        echo $_SESSION['email'];
        
    } else {
        
        header("Location: index.php");
        
    }


?>