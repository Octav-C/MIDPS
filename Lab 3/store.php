<?php

    session_start();
    $active_email = "";
    if ($_SESSION['email']) {
        
        $active_email = $_SESSION['email'];
        
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
            <div id="add_item" class="top_menu"><a  href="javascript:void(0)" onclick="toggle_visibility('popupBoxOnePosition');">Add Item</a></div>
            <div id="top_store" class="top_menu"><a class="buttons" href="store.php">Store</a></div>
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
                
        if($result = mysqli_query($link, $query)){
            echo '<div id="all_apps">';
            while ($row = mysqli_fetch_array($result)){
                if($row['product_platform'] == "Android" ){
                echo <<<EOT
                     
                         <table class="hide_table_android">
                         <tbody class="hide_table_android">
                          <tr >
                            <td><img class="app_img"  src="{$row['product_img_name']}" ></td>
                          <tr>

                            <th>{$row['product_name']}</th>
                          </tr>
                          <tr>
                            <td><span class="apps_detail app_detail_backcol">Type:{$row['product_type']}</span></td>
                          </tr>
                          <tr>
                            <td><span class="apps_detail app_detail_backcol">Platform:{$row['product_platform']}</span></td>
                          </tr>
                          </tbody>
                        </table> 
EOT;
                }else if($row['product_platform'] == "iOs"){
                    echo <<<EOT
                         <table class="hide_table_ios">
                         <tbody class="hide_table_ios">
                          <tr >
                            <td><img class="app_img"  src="{$row['product_img_name']}" ></td>
                          <tr>

                            <th>{$row['product_name']}</th>
                          </tr>
                          <tr>
                            <td><span class="apps_detail app_detail_backcol">Type:{$row['product_type']}</span></td>
                          </tr>
                          <tr>
                            <td><span  class="apps_detail app_detail_backcol">Platform:{$row['product_platform']}</span></td>
                          </tr>
                          </tbody>
                        </table> 
                        
EOT;
                }else
                    echo <<<EOT
                         <table >
                         <tbody >
                          <tr >
                            <td><img class="app_img"  src="{$row['product_img_name']}" ></td>
                          <tr>

                            <th>{$row['product_name']}</th>
                          </tr>
                          <tr>
                            <td><span class="apps_detail app_detail_backcol">Type:{$row['product_type']}</span></td>
                          </tr>
                          <tr>
                            <td><span  class="apps_detail app_detail_backcol">Platform:{$row['product_platform']}</span></td>
                          </tr>
                          </tbody>
                        </table> 
EOT;
            }
                echo '</div>'; //android_apps close
        
            echo '</div>';  //all_apps close
            }
                
          ?> 
      <div id="app_ios_butt"><button href="javascript:void(0)" onclick="ios_or_android('hide_table_android')" type="button" class="btn btn-primary size_but" data-toggle="button" aria-pressed="false" autocomplete="off">
        iOs 
</button></div> 
        <div id="app_android_butt"><button href="javascript:void(0)" onclick="ios_or_android('hide_table_ios')" type="button" class="btn btn-primary size_but " data-toggle="button" aria-pressed="false" autocomplete="off">
  Android
</button></div>
    
      
   
      
    
    
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
                    
					<h3>Add your app</h3>
                    <div id="add_item_info">Complete all the blanks with necessary information!</div>
                    <div id="app_error"><? echo $error.$successMessage; ?></div>
                    
                    <form method = "post">
                        
                        <div class="form-group row">
                          <label for="product_code" class="col-2 col-form-label">ID</label>
                          <div class="col-10">
                            <input name="product_code" class="form-control" type="text" placeholder="Product Code" id="product_code">
                          </div>
                        </div>
                        
                        <div class="form-group row">
                          <label for="product_name" class="col-2 col-form-label">Name</label>
                          <div class="col-10">
                            <input name="product_name" class="form-control" type="text" placeholder="App name" id="product_name">
                          </div>
                        </div>
                        
                        <div class="form-group row">
                          <label for="product_description" class="col-2 col-form-label">Description</label>
                          <div class="col-10">
                            <input name="product_description" class="form-control" type="text" placeholder="Short App Description" id="product_description">
                          </div>
                        </div>
                         <div class="form-group row">
                          <label for="product_image" class="col-2 col-form-label">Image</label>
                          <div class="col-10">
                            <input name="product_image" class="form-control" type="text" placeholder="App Image Link" id="product_image">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="product_price" class="col-2 col-form-label">Price</label>
                          <div class="col-10">
                            <input  name="product_price" class="form-control" type="number" min="0" step="any" placeholder="0.0" id="product_price">
                          </div>
                        </div>
                        <div class="form-group">
                        <label for="product_platform">Platform</label>
                        <select name="product_platform" class="form-control" id="product_platform">
                          <option>iOs</option>
                          <option>Android</option>
                          <option>iOs/Android</option>
                        </select>
                       </div>
                        <div class="form-group row">
                          <label for="product_type" class="col-2 col-form-label">Type</label>
                          <div class="col-10">
                            <input name="product_type" class="form-control" type="text" placeholder="Ex.Game" id="product_type">
                          </div>
                        </div>
                        
                        
                        <button type="submit" id="add_submit" class="btn btn-primary">Submit</button>
                    </form>
                    <button type="submit" class="btn btn-primary" id="sign-in-close" href="javascript:void(0)" onclick="toggle_visibility('popupBoxOnePosition');">Close</button>
                        
				</div>
			</div>
      </div>
      
      <?php
      //ADDING ITEMS ON WEBSITE
        if ($_POST['product_code'] AND $_POST['product_name'] AND $_POST['product_description'] AND $_POST['product_image'] AND $_POST['product_price'] AND $_POST['product_platform'] AND $_POST['product_type']){
            $link = mysqli_connect("shareddb1a.hosting.stackcp.net", "appstudiodb1-34dea7", "wq7HBTkxQ+3V", "appstudiodb1-34dea7");
            if (mysqli_connect_error()) {
        
                die ("There was an error connecting to the database");
        
            } 
             $query = "SELECT `id` FROM `products` WHERE product_code = '".mysqli_real_escape_string($link, $_POST['product_code'])."'";
             $result = mysqli_query($link, $query);
            if (mysqli_num_rows($result) > 0) {
                
                $error .= 'That Product ID is already exist!<br>';
                 if ($error != "") {
            
                    $error = '<div class="alert alert-danger" role="alert"><p>There were error(s) in your form:</p>' . $error . '</div>';
                 }
            } else {
                $query = "INSERT INTO `products`(`product_code`, `product_name`, `product_desc`, `product_img_name`, `price`, `product_platform`, `product_type`) VALUES ('".mysqli_real_escape_string($link, $_POST['product_code'])."', '".mysqli_real_escape_string($link, $_POST['product_name'])."','".mysqli_real_escape_string($link, $_POST['product_description'])."','".mysqli_real_escape_string($link, $_POST['product_image'])."','".mysqli_real_escape_string($link, $_POST['product_price'])."','".mysqli_real_escape_string($link, $_POST['product_platform'])."','".mysqli_real_escape_string($link, $_POST['product_type'])."')";
                if (mysqli_query($link, $query)) {
                    
                    $successMessage = '<div class="alert alert-success" role="alert">You have been added successfully!</div>';
            } else {
                    
                    $error = 'There was a problem with your item, please try again later!<br>' ;
                }   
            }      
        }
      
      ?>




    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script type="text/javascript" src="script.js">
    
      
    </script>
      
      
  </body>
</html>