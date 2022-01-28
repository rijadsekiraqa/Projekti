<?php include 'includes/header.php'; 

	
$title = $description = $photo  = "";
$title_err = $description_err = $photo = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
   
    if(empty(trim($_POST['title']))){
        $title_err = "Please enter a title.";     
    } elseif(!preg_match ("/^[a-zA-Z\s]+$/",trim($_POST['title']))){
        $title_err = "First title must be all letters.";
    } else{
        $title = trim($_POST['title']);
    }

    

    if(empty(trim($_POST['description']))){
        $description_err = "Please enter a description.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM products WHERE description = ?";
        
        if($stmt = mysqli_prepare($connection, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_description);
            
            // Set parameters
            $param_description = trim($_POST["description"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $description_err = "This description is already taken.";
                } else{
                    $description = trim($_POST["description"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
    
    }


  
   


    
    // Check input errors before inserting in database
    if(empty($title_err) && empty($description_err) && empty($photo_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO products (title, description, photo) VALUES (?, ?, ?)";

            
        if($stmt = mysqli_prepare($connection, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssi", $param_title, $param_description, $param_photo);
            
            $param_title = $title;
            $param_description = $description;
            $param_photo = $photo;

            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: products.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
      
    }
    
    // Close connection
    mysqli_close($connection);
}
	

?>


<div class="imgcontainer">
    <img src="images/img_avatar2.png" alt="Avatar" class="avatar">
  </div>
     <form id="loginform1"  method="POST">
      <div class="container" >
     <input type="text" placeholder="Title" 
         name="title">
     <span><?php echo $title_err ?></span>
          </div>    
      <div class="container">
  <input type="text" placeholder="Description" 
            name="description">
            <span><?php echo $description_err ?></span>
          </div>

          <div class="container">
  <input type="file" placeholder="Photo" 
            name="photo">
          </div>
  
           <div class="container">
           <button type="submit" name="submitted">Add Product</p></button>
           </div>
					</form>
				
  

    <script>
					$.validate({
					errorMessageClass: "error",
					});
				</script>