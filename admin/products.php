<?php $page = 'products';
include 'includes/header.php'; 
?> 

	

		<div class="containertable">
			<div class="wrapper">
		<a href="add_product.php" class="add-button" id="useradd">ADD PRODUCTS</a>
		<table id="users">
				<tr>
					<th>ID</th>
					<th>Title</th>
					<th>Description</th>
					<th>Photo</th>
					<th>Actions</th>
					</tr>
                <?php
                    $dbconn=mysqli_connect("localhost", "root", "", "webprojekti1");
                    if(!$dbconn){
                        die("Gabim" . mysqli_error($dbconn));
                    }
                    $sql="SELECT id,title, description, photo FROM products";
                    $produktet=mysqli_query($dbconn,$sql);
                    $i=0;
                    while($produkti=mysqli_fetch_assoc($produktet)){
                        $pid=$produkti['id'];
                        // print_r($anetari);
                        // echo "<br>";
                        if($i%2==0){
                        echo "<tr>";
                        }else{
                            echo "<tr class='alt'>";
						}
						echo "<td>". $produkti['id'] . "</td>";
                        echo "<td>". $produkti['title'] . "</td>";
                        echo "<td>". $produkti['description'] ."</td>";
						echo "<td>". $produkti['photo'] ."</td>";
						echo "<td><a href='edit_product.php?pid={$pid}'>Edit</a></td>";
                        
                        $i++;
				?>
					
					<td><a href="javascript:confirmDelete('delete_product.php?pid=<?php echo $pid; ?>')">
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