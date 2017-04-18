<?php
    
    session_start();
    //Login Form----------------------------------
   
        if (array_key_exists('email', $_POST) OR array_key_exists('password', $_POST)) {  
        
        $link = mysqli_connect("shareddb1a.hosting.stackcp.net", "appstudiodb1-34dea7", "wq7HBTkxQ+3V", "appstudiodb1-34dea7");
        
            if (mysqli_connect_error()) {
        
                die ("There was an error connecting to the database");
        
            } 
        if ($_POST['email'] == '') {
            
            //echo "<p>Email address is required.</p>";
            
        } else if ($_POST['password'] == '') {
            
            //echo "<p>Password is required.</p>";
            
        } else {
            $query = "SELECT `id` FROM `users` WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."' AND password='".mysqli_real_escape_string($link, $_POST['password'])."'";
            $result = mysqli_query($link, $query);
        
        if (mysqli_num_rows($result) == 1) {
                $_SESSION['email'] = $_POST['email'];
            header ("Location: signedin.php");
                
            } else {
                $error = '<div class="alert alert-danger" role="alert"><p><strong>Your inserted email or password is not correct!</strong></p></div>';
                //echo"<p>Wrong Password or Email, Try Again !</p>";
                }   
            }    
        }  

?>