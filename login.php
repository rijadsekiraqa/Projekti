<?php 

include 'core/Database.php';

// Define variables and initialize with empty values
$username = $password = "";
$user_role = 1;
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = 'Please enter username.';
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST['password']))){
        $password_err = 'Please enter your password.';
    } else{
        $password = trim($_POST['password']);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        
        $sql = "SELECT username, password, user_role FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($connection, $sql)){
            
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;

            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    
                    mysqli_stmt_bind_result($stmt, $username, $hashed_password, $user_role);

                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            
                            session_start();
                            $_SESSION['username'] = $username;
                            $_SESSION['user_role'] = $user_role;    
                            header("location: index.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = 'The password you entered was not valid.';
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = 'No account found with that username.';
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($connection);
}

?>
<!DOCTYPE html>
<html>
<head>
  <head>
  <title>CLEARCUT</title>
  <link rel="stylesheet" type="text/css" href="css/style.css"/>
  <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
</head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Create User</title>
    <link rel="stylesheet" href="">
</head>
<body>


  <body>

  
  <div class="imgcontainer">
    <img src="images/img_avatar2.png" alt="Avatar" class="avatar">
  </div>
  <form id="loginform1" method="POST">

<div class="container">
  <input type="text" placeholder="Username" value="<?php echo $username?>"
            name="username" 
            data-validation="custom" 
            data-validation-regexp="^([a-zA-Z0-9]+)$"
            data-validation-error-msg="You did not enter a valid username">
                        <span><?php echo $username_err ?></span>
          </div>
     <div class="container">
   <input type="password" placeholder="Password" value="<?php echo $password ?>"
            name="password"
            data-validation="required length"
            data-validation-length="min6"
            data-validation-error-msg="You need to type at least 6 characters">
            <span><?php echo $password_err ?></span>
            </div>
<div class="container">
   <button type="submit" name="submitted">Login</button>

     <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me </label>
    </div>
             <div class="container1">
        <button type="submit" name="submitted"><a href="signup.php">Sign Up</a></button>
        
          </div>
    </form>

    <script>
          $.validate({
          errorMessageClass: "error",
          });
        </script>
</body>
</html>
