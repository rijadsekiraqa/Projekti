<?php
    include 'includes/header.php';

    $first_name = $last_name = $username = $email = $password = $confirm_password = "";
    $first_name_err = $last_name_err = $username_err = $email_err = $password_err = $confirm_password_err = "";
     
    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){
       
        if(empty(trim($_POST['first_name']))){
            $first_name_err = "Please enter your first name.";     
        } elseif(!preg_match ("/^[a-zA-Z\s]+$/",trim($_POST['first_name']))){
            $first_name_err = "First name must be all characters";
        } else{
            $first_name = trim($_POST['first_name']);
        }
    
        if(empty(trim($_POST['last_name']))){
            $last_name_err = "Please enter your last name.";     
        } elseif(!preg_match ("/^[a-zA-Z\s]+$/",trim($_POST['last_name']))){
            $last_name_err = "Last name must be all characters";
        } else{
            $last_name = trim($_POST['last_name']);
        }
    
    
        if(empty(trim($_POST['email']))){
            $email_err = "Please enter your email.";     
        } elseif(!isValidEmail($_POST['email'])){
            $email_err = "Email format is invalid.";
        } else{
            $email = trim($_POST['email']);
        }
    
    
    
        if(empty(trim($_POST["username"]))){
            $username_err = "Please enter a username.";
        } else{
            // Prepare a select statement
            $sql = "SELECT id FROM users WHERE username = ?";
            
            if($stmt = mysqli_prepare($connection, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $param_username);
                
                // Set parameters
                $param_username = trim($_POST["username"]);
                
                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    /* store result */
                    mysqli_stmt_store_result($stmt);
                    
                    if(mysqli_stmt_num_rows($stmt) == 1){
                        $username_err = "This username is already taken.";
                    } else{
                        $username = trim($_POST["username"]);
                    }
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }
            }
             
            // Close statement
            mysqli_stmt_close($stmt);
        }
    
    
        
        // Validate password
        if(empty(trim($_POST['password']))){
            $password_err = "Please enter a password.";     
        } elseif(strlen(trim($_POST['password'])) < 6){
            $password_err = "Password must have at least 6 characters.";
        } else{
            $password = trim($_POST['password']);
        }
        
        // Validate confirm password
        if(empty(trim($_POST["confirm_password"]))){
            $confirm_password_err = 'Please confirm password.';     
        } else{
            $confirm_password = trim($_POST['confirm_password']);
            if($password != $confirm_password){
                $confirm_password_err = 'Password did not match.';
            }
        }
    
       
        
        // Check input errors before inserting in database
        if(empty($first_name_err) && empty($last_name_err) && empty($email_err) && empty($username_err) && empty($password_err) && empty($confirm_password_err)){
            
            // Prepare an insert statement
            $sql = "INSERT INTO users (first_name, last_name, email, username, password) VALUES (?, ?, ?, ?, ?)";
    
            if($stmt = mysqli_prepare($connection, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "sssss", $param_first_name, $param_last_name, $param_email, $param_username, $param_password);
                
                // Set parameters
                $param_first_name = $first_name;
                $param_last_name = $last_name;
                $param_email = $email;
                $param_username = $username;
                $param_password = password_hash($password, PASSWORD_DEFAULT);
                
                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    // Redirect to login page
                    header("location: login.php");
                } else{
                    echo "Something went wrong. Please try again later.";
                }
            }
             
            // Close statement
            mysqli_stmt_close($stmt);
        }
        
        // Close connection
        mysqli_close($connection);
    }
      function isValidEmail($email) {
          return filter_var($email, FILTER_VALIDATE_EMAIL)
            && preg_match('/@.+\./', $email);
      }
    
?>
<!DOCTYPE html>
<html>
<head>
  <title>CLEARCUT</title>
  <link rel="stylesheet" type="text/css" href="css/style.css"/>
  <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
</head>
<body>

  
  <div class="imgcontainer">
    <img src="images/img_avatar2.png" alt="Avatar" class="avatar">
  </div>
     <form id="loginform1"  method="POST">

      <div class="container">
  <input type="text" placeholder="First Name" value="<?php echo $first_name ?>" 
            name="first_name"
            data-validation="required length" 
            data-validation-length="min5">
            <span><?php echo $first_name_err ?></span>
          </div>
          <div class="container">
  <input type="text" placeholder="Last Name" value="<?php echo $last_name ?>"
            name="last_name"
            data-validation="required length"
            data-validation-length="min5">
            <span><?php echo $last_name_err ?></span>
          </div>
        <div class="container">
   <input type="text" placeholder="Username" value="<?php echo $username ?>"
            name="username"
            data-validation="required length" 
            data-validation-length="min5">
            <span><?php echo $username_err ?></span>
            </div>
          
            <div class="container">
   <input type="email" placeholder="Email" value="<?php echo $email ?>"
            name="email"
            data-validation="required length"
            data-validation-length="min5">
            <span><?php echo $email_err ?></span>
            </div>

            <div class="container">
   <input type="password" placeholder="Password" value="<?php echo $password ?>"
            name="password"
            data-validation="required length"
            data-validation-length="min5">
            <span><?php echo $password_err ?></span>
            </div>

            <div class="container">
   <input type="password" placeholder="Confirm Password" 
            name="confirm_password"
            data-validation="required length"
            data-validation-length="min5">
            </div>


         
           <div class="container">
           <p><a href="login.php"><button type="submit" name="submitted">Sign Up</a></p></button>
        

           </div>
           </form>
					
           
    
					
  

    <script>
    
					$.validate({
					errorMessageClass: "error",
					});
				</script>
</body>
</html>
