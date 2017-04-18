$("#submit").click(function(e) {
              
              var error = "";
              
              if ($("#email").val() == "") {
                  
                  error += "The email field is required.<br>"
                  
              }
              
              if ($("#subject").val() == "") {
                  
                  error += "The subject field is required.<br>"
                  
              }
              
              if ($("#content").val() == "") {
                  
                  error += "The content field is required.<br>"
                  
              }
              
              if (error != "") {
                  
                 $("#error").html('<div class="alert alert-danger" role="alert"><p><strong>There were error(s) in your form:</strong></p>' + error + '</div>');
                  
                  return false;
                  
              } else {
                  
                  return true;
                  
              }
          })

$("#reg_submit").click(function(e) {
              
              var error = "";
              
              if ($("#reg_email").val() == "") {
                  
                  error += "The email field is required.<br>"
                  
              }
              
              if ($("#reg_password").val() == "") {
                  
                  error += "The password field is required.<br>"
                  
              }

              if (error != "") {
                  
                 $("#error").html('<div class="alert alert-danger" role="alert"><p><strong>There were error(s) in your form:</strong></p>' + error + '</div>');
                  
                  return false;
                  
              } else {
                  
                  return true;
                  
              }
          })

$("#submit_login").click(function(e) {
              
              var error = "";
              
              if ($("#exemail").val() == "") {
                  
                  error += "The email field is required.<br>"
                  
              }
              
              if ($("#password").val() == "") {
                  
                  error += "The password field is required.<br>"
                  
              }

              if (error != "") {
                  
                 $("#login_error").html('<div class="alert alert-danger" role="alert"><p><strong>There were error(s) in your form:</strong></p>' + error + '</div>');
                  
                  return false;
                  
              } else {
                  
                  return true;
                  
              }
          })

$("#submit_login0").click(function(e) {
              
              var error = "";
              
              if ($("#exemail").val() == "") {
                  
                  error += "The email field is required.<br>"
                  
              }
              
              if ($("#password").val() == "") {
                  
                  error += "The password field is required.<br>"
                  
              }

              if (error != "") {
                  
                 $("#login_error").html('<div class="alert alert-danger" role="alert"><p><strong>There were error(s) in your form:</strong></p>' + error + '</div>');
                  
                  return false;
                  
              } else {
                  
                  return true;
                  
              }
          })

$("#add_submit").click(function(e) {
              
              var error = "";
              
              if ($("#product_code").val() == "") {
                  
                  error += "The ID field is required.<br>"
                  
              }
              
              if ($("#product_name").val() == "") {
                  
                  error += "The Name field is required.<br>"
                  
              }
              if ($("#product_description").val() == "") {
                  
                  error += "The Description field is required.<br>"
                  
              }
              if ($("#product_image").val() == "") {
                  
                  error += "The Image link field is required.<br>"
                  
              }
              if ($("#product_price").val() == "") {
                  
                  error += "The price field is required.<br>"
                  
              }
              if ($("#product_platform").val() == "") {
                  
                  error += "The platform field is required.<br>"
                  
              }
              if ($("#product_type").val() == "") {
                  
                  error += "The type field is required.<br>"
                  
              }
    
    

              if (error != "") {
                  
                 $("#app_error").html('<div class="alert alert-danger" role="alert"><p><strong>There were error(s) in your form:</strong></p>' + error + '</div>');
                  
                  return false;
                  
              } else {
                  
                  return true;
                  
              }
          })



function toggle_visibility(id) {
    var e = document.getElementById(id);
    
    if(e.style.display == 'block')
        e.style.display = 'none';
    else
        e.style.display = 'block';
}

function ios_or_android(id) {
    var e = document.querySelectorAll("." + id);
    var i;
    for (i = 0; i < e.length; i++) {
       if(e[i].style.display == '')
            e[i].style.display = 'none';
        else
            e[i].style.display = '';
        }
}


