<?php include 'includes/header.php'; 

	

                 $dbconn=mysqli_connect("localhost", "root", "", "webprojekti1");
                 if(!$dbconn){
                     die("Gabim" . mysqli_error($dbconn));
                 }

                if(isset($_GET['pid'])){
                    $pid=$_GET['pid'];
                    $sql="SELECT id, title, description, photo FROM products WHERE id = $pid";
                    $produktet=mysqli_query($dbconn,$sql);
                    $productdata=mysqli_fetch_assoc($produktet);
                    $title=$productdata['title'];
                    $description= $productdata['description'];
                    $photo= $productdata['photo'];
                }
                if (isset($_POST['edit_product'])) {
                    $projektiid=$_POST['projektiid'];
                    $title=$_POST['title'];
                    $description=$_POST['description'];
                    $photo=$_POST['photo'];
                    
                   

                    $sql="UPDATE products SET title='$title', description='$description', 
                          photo='$photo' WHERE id=$projektiid";
                    $edit_product=mysqli_query($dbconn,$sql);
                    if($edit_product){
                        echo "Anetari u ruajt me sukses";
                    }else{
                        die("Gabim" . mysqli_error($dbconn));
                    }

                }
            ?>
<div class="imgcontainer">
    <img src="images/img_avatar2.png" alt="Avatar" class="avatar">
  </div>
     <form id="loginform1"  method="POST">

     <div class="container">
     <input type="hidden" name="projektiid" value="<?php if(!empty($pid)) echo $pid;?>"><br>
          </div>    
      <div class="container">

      <div class="container" >
     <input type="text" placeholder="Title" 
     name="title" value="<?php if(!empty($title)) echo $title;?>"><br>
          </div>    
      <div class="container">
  <input type="text" placeholder="Description" 
            name="description" value="<?php if(!empty($description)) echo $description;?>"
            data-validation="required length" 
            data-validation-length="min5">
          </div>
          <div class="container">
    <input type="file" placeholder="Photo" 
            name="photo"  value="<?php if(!empty($photo)) echo $photo;?>">
          </div>
       
         
           <div class="container">
           <input type="submit" name="edit_product" value="UPDATE">
           </div>
					</form>
				
  

    <script>
					$.validate({
					errorMessageClass: "error",
					});
				</script>