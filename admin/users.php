<?php $page = 'users';
include 'includes/header.php'; 
?> 

	

		<div class="containertable">
			<div class="wrapper">
		<a href="add_users.php" class="add-button" id="useradd">ADD USER</a>
		<table id="users">
				<tr>
					<th>ID</th>
					<th>FirstName</th>
					<th>LastName</th>
					<th>E-MAIL</th>
					<th>Username</th>
					<th>Role</th>
					<th>Actions</th>
					</tr>
                <?php
                    $dbconn=mysqli_connect("localhost", "root", "", "webprojekti1");
                    if(!$dbconn){
                        die("Gabim" . mysqli_error($dbconn));
                    }
                    $sql="SELECT id,first_name, last_name, email, username, user_role FROM users";
                    $anetaret=mysqli_query($dbconn,$sql);
                    $i=0;
                    while($anetari=mysqli_fetch_assoc($anetaret)){
                        $aid=$anetari['id'];
                        // print_r($anetari);
                        // echo "<br>";
                        if($i%2==0){
                        echo "<tr>";
                        }else{
                            echo "<tr class='alt'>";
						}
						echo "<td>". $anetari['id'] . "</td>";
                        echo "<td>". $anetari['first_name'] . "</td>";
                        echo "<td>". $anetari['last_name'] ."</td>";
                        echo "<td>". $anetari['email'] ."</td>";
						echo "<td>". $anetari['username'] ."</td>";
						echo "<td>". $anetari['user_role'] ."</td>";
						echo "<td><a href='edit_user.php?aid={$aid}'>Edit</a></td>";
                        
                        $i++;
				?>
					
					<td><a href="javascript:confirmDelete('delete_user.php?aid=<?php echo $aid; ?>')">
					Delete</a></td> 
					</tr>
					<?php }
					
					?> 
				
				
			
               
			</table>

	</div>
	</div>

<?php include 'includes/footer.php' ?>


<script>
function confirmDelete(delUrl) {
    if (confirm("Are you sure you want to delete")) {
    document.location = delUrl;
    }
}
</script>