<?php

    session_start();
    $active_email = "";
    if ($_SESSION['email']) {
        
        $active_email = $_SESSION['email'];
        
    } else {
        
        //header("Location: index.php");
        
    }


?>

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
      
        <a href="signedin.php"><img id="top_logo" src="images/top_logo.jpg" ></a>
        <div id="top_margin_left">
            <div id="top_home" class="top_menu"><a  href="signedin.php">Home</a></div>
            <div id="add_item" class="top_menu"><a class="buttons" href="add_item.php">Add Item</a></div>
            <div id="top_store" class="top_menu"><a  href="store.php">Store</a></div>
            <div id="top_signedin" class="top_menu">Welcome <?php echo $active_email ?></div>
            <div id="top_contact" class="top_menu"><a href="contact.php">Contact</a></div>
            <div id="log_out" class="top_menu" ><a href="index.php">Log Out</a></div>
        </div>
    </div>
    <div id="intro_container">
        <img id="intro_img"src="images/platform_logo.png" class="rounded mx-auto d-block" alt="Responsive image">
        <div id="intro_text1">"Dream it.Code it.Build it"</div>
        <div id="intro_text2">Let us to let your work be heard</div>
    </div>
         
 <?php
    $link = mysqli_connect("shareddb1a.hosting.stackcp.net", "appstudiodb1-34dea7", "wq7HBTkxQ+3V", "appstudiodb1-34dea7");
    if (mysqli_connect_error()) {
        
        die ("There was an error connecting to the database");
        
    }   

    $query = "SELECT * FROM products";
                
        
                
          ?> 

    
      
   
      
    
    
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
      
      
      <div id="popupBoxOnePosition">
			<div class="popupBoxWrapper">
				<div class="popupBoxContent">
                    
					<h3>Log In</h3>
                    <div >OR click on <a href="register_form.php" id="register_color">REGISTER</a> if you don't have an acount!</div>
                    
                    <form method = "post">
                        
                        <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <button id="submit-login" type="submit" class="btn btn-primary">Submit</button>
                        
                    </form>
                    <button type="submit" class="btn btn-primary" id="sign-in-close" href="javascript:void(0)" onclick="toggle_visibility('popupBoxOnePosition');">Close</button>
				</div>
			</div>
      </div>




    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script type="text/javascript" src="script.js">
    
      
    </script>
      
      
  </body>
</html>