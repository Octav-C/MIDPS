<?php

    session_start();
    
    if (array_key_exists('reg_email', $_POST) AND array_key_exists('reg_password', $_POST)) {    
        $link = mysqli_connect("shareddb1a.hosting.stackcp.net", "appstudiodb1-34dea7", "wq7HBTkxQ+3V", "appstudiodb1-34dea7");
            if (mysqli_connect_error()) {
        
                die ("There was an error connecting to the database");
        
            } 
        
            $query = "SELECT `id` FROM `users` WHERE email = '".mysqli_real_escape_string($link, $_POST['reg_email'])."'";
            $result = mysqli_query($link, $query);
       
        if (mysqli_num_rows($result) > 0) {
                
                $error .= 'That email is already been taken!<br>';
                 if ($error != "") {
            
                    $error = '<div class="alert alert-danger" role="alert"><p>There were error(s) in your form:</p>' . $error . '</div>';
            
                 }
            } else {
        $query = "INSERT INTO `users` (`email`, `password`) VALUES ('".mysqli_real_escape_string($link, $_POST['reg_email'])."', '".mysqli_real_escape_string($link, $_POST['reg_password'])."')";
        if (mysqli_query($link, $query)) {
                    
                    $_SESSION['reg_email'] = $_POST['reg_email'];
                    $successMessage = '<div class="alert alert-success" role="alert">You have been registered successfully!</div>';
                   
                    
                } else {
                    
                    $error = 'There was a problem registering, please try again later!<br>' ;
                }   
            
            }    
        }         
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>AppStudioDevelopment</title>
    <link rel="icon" type="image/png" href="images/top_logo.png"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">


  </head>




  <body>
      
    <div id="top_bar" class="container">
      
        <a href="index.php"><img id="top_logo" src="images/top_logo.jpg" ></a>
        <div id="top_margin_left">
            <div id="top_home" class="top_menu"><a href="index.php">Home</a></div>
            <div id="top_store" class="top_menu"><a href="store.php">Store</a></div>
            <div id="top_signin" class="top_menu"><a href="sign_in.php">Sign In</a></div>
            <div id="top_contact" class="top_menu"><a class="buttons" href="contact.php">Contact</a></div>
        </div>
    </div>
      
    <div id="intro_container">
        <img id="intro_img"src="images/platform_logo.png" class="rounded mx-auto d-block" alt="Responsive image">
        <div id="intro_text1">"Dream it.Code it.Build it"</div>
        <div id="intro_text2">Let us to let your work be heard</div>
    </div>
      
    <div class="container" id="contact_form">
      
    <h1>Register</h1>
      
      <div id="error"><? echo $error.$successMessage; ?></div>
      
      <form method="post">
          <fieldset class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="reg_email" name="reg_email" placeholder="Enter email">
            <small class="text-muted">We'll never share your email with anyone else.</small>
          </fieldset>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" name="reg_password" id="reg_password" placeholder="Password">
          </div>
          
  <button type="submit" id="reg_submit" class="btn btn-primary">Submit</button>
        </form>
        </div>  
      
    <div id="half_bot_container">
        <div id="get_started_container">
            <div id="getstarted">
                <span id="getstarted_text1">Get Started</span>
            </div>
        </div>
        <div id="blue_bottom">

        </div>
        <img id="bot_img"src="images/develop_logo.png" class="rounded mx-auto d-block" alt="Responsive image">
        
    </div>
    <div id="bot_container">
        <div id="left_text">
            <div id="left">
                <span id="bot_text">Who are we?<br></span>
                <span id="edit_left">We are the best project in which we make your dream come true. We do all our best to develop your app and help in your ideas.</span>
            </div>
            <div id="right">
                <span id="findus">Find us<br></span>
                <img id="face_logo"  src="images/facebook_logo.png">
                <span id="face_id">AppStudioDev</span>
            </div>
        </div>
    </div> 
    
    <script type="text/javascript" src="script.js"></script>




    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script type="text/javascript" src="script.js"></script>
      
    <script type="text/javascript">
        
        
        
    </script>
      
  </body>
</html>