<?php $page = 'contact';
include 'includes/header.php'
 
 ?>


<div class="containertable">
			<div class="wrapper">
<table id="users">
    <tr>
        <th>ID</th>
        <th>NAME</th>
        <th>EMAIL</th>
        <th>PHONE</th>
        <th>ADDRESS</th>
        <th>DATE</th>
        <th>MESSAGE</th>
        <th>GENDER</th>
        <th>RATE</th>
        </tr>
    <?php
        $dbconn=mysqli_connect("localhost", "root", "", "webprojekti1");
        if(!$dbconn){
            die("Gabim" . mysqli_error($dbconn));
        }
        $sql="SELECT id,name, email, phone, address,date,message,gender,rate FROM contact";
        $result=mysqli_query($dbconn,$sql);
        while($row=mysqli_fetch_assoc($result)){
            echo "<td>". $row['id'] . "</td>";
            echo "<td>". $row['name'] . "</td>";
            echo "<td>". $row['email'] . "</td>";
            echo "<td>". $row['phone'] ."</td>";
            echo "<td>". $row['address'] ."</td>";
            echo "<td>". $row['date'] ."</td>";
            echo "<td>". $row['message'] ."</td>";
            echo "<td>". $row['gender'] ."</td>";
            echo "<td>". $row['rate'] ."</td>";
            
    ?>
        
        </tr>
        <?php }
        
        ?> 
    
    

   
</table>

</div>
</div>



