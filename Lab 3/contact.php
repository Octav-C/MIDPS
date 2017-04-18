<?php
     
    include 'sign_in.php'; 

    if ($_POST['subject'] OR $_POST['content'] OR $_POST['email']) {
        $error = ""; $successMessage = "";
        if (!$_POST["email"]) {
            
            $error .= "An email address is required.<br>";
            
        }
        
        if (!$_POST["content"]) {
            
            $error .= "The content field is required.<br>";
            
        }
        
        if (!$_POST["subject"]) {
            
            $error .= "The subject is required.<br>";
            
        }
        
        if ($_POST['email'] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {
            
            $error .= "The email address is invalid.<br>";
            
        }
        
        if ($error != "") {
            
            $error = '<div class="alert alert-danger" role="alert"><p>There were error(s) in your form:</p>' . $error . '</div>';
            
        } else {
            
            $emailTo = "rickpap09@gmail.com";
            
            $subject = $_POST['subject'];
            
            $content = $_POST['content'];
            
            $headers = "From: ".$_POST['email'];
            
            if (mail($emailTo, $subject, $content, $headers)) {
                
                $successMessage = '<div class="alert alert-success" role="alert">Your message was sent, we\'ll get back to you! With regards, AppStudioDev Team!</div>';
                
                
            } else {
                
                $error = '<div class="alert alert-danger" role="alert"><p><strong>Your message couldn\'t be sent - please try again later</div>';   
            }   
        }
    }
session_start();
    if($_SESSION['email']){
        $active_email = $_SESSION['email'];
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
      
        <a href="signedin.php"><img id="top_logo" src="images/top_logo.jpg" ></a>
        <div id="top_margin_left">
            <div id="top_home" class="top_menu"><a href="signedin.php">Home</a></div>
            <div id="top_store" class="top_menu"><a href="signedin.php">Store</a></div>
            <div id="top_signedin" class="top_menu" href="javascript:void(0)" onclick="signed_in_visibility('top_signedin');">Welcome <?php echo $active_email ?></div>
            <div id="top_contact" class="top_menu"><a class="buttons" href="contact.php">Contact</a></div>
            <div id="log_out" class="top_menu" ><a href="index.php">Log Out</a></div>
        </div>
    </div>
      
    <div id="intro_container">
        <img id="intro_img"src="images/platform_logo.png" class="rounded mx-auto d-block" alt="Responsive image">
        <div id="intro_text1">"Dream it.Code it.Build it"</div>
        <div id="intro_text2">Let us to let your work be heard</div>
    </div>
      <div id="login_error_container">
     
          <?php echo $error; ?>
        </div>
      
    <div class="container" id="contact_form">
      
    <h1>Get in touch!</h1>
      
      <div id="error"><? echo $error.$successMessage; ?></div>
      
      <form method="post">
  <fieldset class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
    <small class="text-muted">We'll never share your email with anyone else.</small>
  </fieldset>
  <fieldset class="form-group">
    <label for="subject">Subject</label>
    <input type="text" class="form-control" id="subject" name="subject" >
  </fieldset>
  <fieldset class="form-group">
    <label for="exampleTextarea">What would you like to ask us?</label>
    <textarea class="form-control" id="content" name="content" rows="3"></textarea>
  </fieldset>
  <button type="submit" id="submit" class="btn btn-primary">Submit</button>
        </form>
          
        </div>  
      
    <div id="half_bot_container">
        <div id="get_started_container">
            <div id="getstarted">
                <span id="getstarted_text"><a href="register_form.php">Get Started</a></span>
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
      <div id="popupBoxOnePosition">
			<div class="popupBoxWrapper">
				<div class="popupBoxContent">
                    
					<h3>Log In</h3>
                    <div >OR click on <a href="register_form.php" id="register_color">REGISTER</a> if you don't have an acount!</div>
                    <div id="login_error"></div>
                    <form method = "post">
                        
                        <div class="form-group">
                        <label for="exemail">Email address</label>
                        <input name="email" type="email" class="form-control" id="exemail" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                        <label for="password">Password</label>
                        <input name="password" type="password" class="form-control" id="password" placeholder="Password">
                        </div>
                        <button id="submit_login" type="submit" class="btn btn-primary">Submit</button>
                        
                    </form>
                    <button type="submit" class="btn btn-primary" id="sign-in-close" href="javascript:void(0)" onclick="toggle_visibility('popupBoxOnePosition');">Close</button>
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