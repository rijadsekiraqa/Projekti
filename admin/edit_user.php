<?php include 'includes/header.php'; 

  

                 $dbconn=mysqli_connect("localhost", "root", "", "webprojekti1");
                 if(!$dbconn){
                     die("Gabim" . mysqli_error($dbconn));
                 }

                if(isset($_GET['aid'])){
                    $aid=$_GET['aid'];
                    $sql="SELECT id, first_name, last_name, email, username, password,user_role FROM users WHERE id = $aid";
                    $anetaret=mysqli_query($dbconn,$sql);
                    $userdata=mysqli_fetch_assoc($anetaret);
                    $first_name=$userdata['first_name'];
                    $last_name= $userdata['last_name'];
                    $email= $userdata['email'];
                    $username= $userdata['username'];
                    $password= $userdata['password'];
                    $user_role= $userdata['user_role'];
                }
                if (isset($_POST['modifiko_anetar'])) {
                    $anetariid=$_POST['anetariid'];
                    $first_name=$_POST['first_name'];
                    $last_name=$_POST['last_name'];
                    $email=$_POST['email'];
                    $username=$_POST['username'];
                    $password=$_POST['password'];
                    $user_role=$_POST['user_role'];
                    
                   

                    $sql="UPDATE users SET first_name='$first_name', last_name='$last_name', 
                          email='$email', username='$username',password='$password',user_role='$user_role' WHERE id=$anetariid";
                    $modifiko_anetar=mysqli_query($dbconn,$sql);
                    if($modifiko_anetar){
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
     <input type="hidden" name="anetariid" value="<?php if(!empty($aid)) echo $aid;?>"><br>
          </div>    
      <div class="container">
  <input type="text" placeholder="First Name" 
            name="first_name" value="<?php if(!empty($first_name)) echo $first_name;?>"
            data-validation="required length" 
            data-validation-length="min5">
          </div>
          <div class="container">
    <input type="text" placeholder="Last Name" 
            name="last_name"  value="<?php if(!empty($last_name)) echo $last_name;?>"
            data-validation="required length"
            data-validation-length="min5">
          </div>
        <div class="container">
         <input type="text" placeholder="Username"  
            name="username" value="<?php if(!empty($username)) echo $username;?>"
            data-validation="required length" 
            data-validation-length="min5">
            </div>
          
            <div class="container">         
            <input type="email" placeholder="Email"  
            name="email" value="<?php if(!empty($email)) echo $email;?>"
            data-validation="required length"
            data-validation-length="min5">
            </div>

            <div class="container">   
            <input type="password" placeholder="Password" 
            name="password"  value="<?php if(!empty($password)) echo $password;?>"
            data-validation="required length"
            data-validation-length="min5">
            </div>

            <div class="container">
      <label for="user_role">User Role:</label>
      <select name="user_role" id="user_role">
        <option value="1">Admin</option>
        <option value="2">User</option>
      </select>
    </div>
         
           <div class="container">
           <input type="submit" name="modifiko_anetar" value="Ruaj">
           </div>
          </form>
        
  

    <script>
          $.validate({
          errorMessageClass: "error",
          });
        </script>