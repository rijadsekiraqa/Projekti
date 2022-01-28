<?php $page = 'news';
include 'includes/header.php'
 
 ?>

<?php
	
	session_start();
	$mysqli = new mysqli('localhost','root','','webprojekti1');
	if($mysqli->connect_errno)
	{
		echo "filed connection(".$mysqli->connect_errno.")".$mysqli->connect_error;
	}
	if(isset($_POST['RuajFoton'])){
		$target = "images/".basename($_FILES['image']['name']);
		$image = $_FILES['image']['name'];
		$sql="update news set  image='$image'	where id='1'";
		mysqli_query($mysqli,$sql);
		if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
			
			$msg="image umpoadded sukses";
		}
		else		{
			$msg="jo ka problem";
		}
		
	}
	if(isset($_POST['save'])){
		
		$titulli= $_POST['titulli'];
		$pargrafi1= $_POST['pargrafi1'];
		//$sql="INSERT INTO news (image, pargrafi1) VALUES ('$image','$pargrafi1')";
		$sql="update news set  titulli='$titulli',pargrafi1='$pargrafi1' 	where id='1'";
		mysqli_query($mysqli,$sql);
		
		
	}
	//pjesa te news
	if(isset($_POST['RuajFotonP1'])){
		$target = "images/".basename($_FILES['image1']['name']);
		
		$projekt1Foto = $_FILES['image1']['name'];
		$sql="update news set  projekt1Foto='$projekt1Foto'	where id='1'";
		mysqli_query($mysqli,$sql);
		if(move_uploaded_file($_FILES['image1']['tmp_name'], $target)){
			
			$msg="image umpoadded sukses";
		}
		else		{
			$msg="jo ka problem";
		}
		
	}
	if(isset($_POST['RuajFotonP2'])){
		$target = "images/".basename($_FILES['image2']['name']);
		
		$projekt2Foto = $_FILES['image2']['name'];
		$sql="update news set  projekt2Foto='$projekt2Foto'	where id='1'";
		mysqli_query($mysqli,$sql);
		if(move_uploaded_file($_FILES['image2']['tmp_name'], $target)){
			
			$msg="image umpoadded sukses";
		}
		else		{
			$msg="jo ka problem";
		}
		
	}
	
	if(isset($_POST['RuajFotonP3'])){
		$target = "images/".basename($_FILES['ok']['name']);
		
		$projektFoto3 = $_FILES['ok']['name'];
		$sql="update news set  projektFoto3='$projektFoto3'	where id='1'";
		mysqli_query($mysqli,$sql);
		if(move_uploaded_file($_FILES['ok']['tmp_name'], $target)){
			
			$msg="image umpoadded sukses";
		}
		else		{
			$msg="jo ka problem";
		}
		
	}
	
	if(isset($_POST['RuajFotonP4'])){
		$target = "images/".basename($_FILES['image']['name']);
		
		$projekt4Foto = $_FILES['image']['name'];
		$sql="update news set  projekt4Foto='$projekt4Foto'	where id='1'";
		mysqli_query($mysqli,$sql);
		if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
			
			$msg="image umpoadded sukses";
		}
		else		{
			$msg="jo ka problem";
		}
		
	}
	if(isset($_POST['Ruajprojekt1Paragrafi'])){
		
		$projekt1Titulli= $_POST['projekt1Titulli'];
		$projekt1Paragrafi= $_POST['projekt1Paragrafi'];
		
		
		$projekt2Titulli= $_POST['projekt2Titulli'];
		$projekt2Paragrafi= $_POST['projekt2Paragrafi'];
		
		$projekt3Titulli= $_POST['projekt3Titulli'];
		$projekt3Paragrafi= $_POST['projekt3Paragrafi'];
		
		$projekt4Titulli= $_POST['projekt4Titulli'];
		$projekt4Paragrafi= $_POST['projekt4Paragrafi'];
		
		//$sql="INSERT INTO news (image, pargrafi1) VALUES ('$image','$pargrafi1')";
		$sql="update news set  projekt1Paragrafi='$projekt1Paragrafi',projekt1Titulli='$projekt1Titulli',projekt2Titulli='$projekt2Titulli',projekt2Paragrafi='$projekt2Paragrafi',projekt3Titulli='$projekt3Titulli',projekt3Paragrafi='$projekt3Paragrafi',projekt4Titulli='$projekt4Titulli',projekt4Paragrafi='$projekt4Paragrafi'	where id='1'";
		mysqli_query($mysqli,$sql);
		
		
	}
	
?>
<html>
<head>
	<title>Home</title>
	<meta charset="utf-8" />
	<link type="text/css" rel="stylesheet" href="css/news.css">
</head>
<body>
<div class="wrapper" >

			
			<div id="about" style="height:500px;">
		
				<form method="post" action="news.php" enctype="multipart/form-data" >
					<?php foreach($mysqli->query('SELECT * FROM  news where id=1') as $row) {?>
				
					<img alt="contentFoto" src="images/<?php echo  $row['image']; ?>" style="width:550px; height:400px; float:left;  padding-right: 5;" > 
						
					
					<h2><textarea  name="titulli" style="width:300px; height:50px; float:left;" > <?php echo  $row['titulli']; ?></textarea></h2>																					
					 
					<p style="font-size:18px; text-align:left;  float: left; margin-top: 10px;"> <textarea  name="pargrafi1" style="width:300px; height:300px;" > <?php echo  $row['pargrafi1'];}?></textarea></p>
					
					
					<div style="width:100%; float:left; background-color:#a0db8e; height:50px; border-radius:3px ; ">
						<div style="margin-top:10px; margin-left:10px;">	
							<input style="float:left; " type="file" size="60" name="image" value="File" >
							<button style="float:left;" type="submit" name="RuajFoton" >RuajFoton</button>
							<button  style="float:left; margin-left:300px;"  type="submit" name="save" >Ruaj Paragrafin</button>
						</div>
					</div>
					
					
					</form>
			</div>
			<div id="content">
			<form method="post" action="news.php" enctype="multipart/form-data" >
					<?php foreach($mysqli->query('SELECT * FROM  news where id=1') as $row) {?>
				
				<div class="contetPjeset">
					<p > <textarea  name="projekt1Titulli" style="width:190px; height:30px;" > <?php echo  $row['projekt1Titulli'];?></textarea></p>
					
					<div class="contentFig">	
						<img alt="contentFoto" src="images/<?php echo  $row['projekt1Foto']; ?>" style="width:190px; height:100px;" > 
					</div>
					
					<p class="paragraf"> <textarea  name="projekt1Paragrafi" style="width:190px; height:100px;" > <?php echo  $row['projekt1Paragrafi'];?></textarea></p>
					
					<input style="float:left; " type="file" size="60" name="image1" value="File" >
							<button style="float:left; width:80px;" type="submit" name="RuajFotonP1" >RuajFoton</button>
							<button  style="float:right; width:110px; "  type="submit" name="Ruajprojekt1Paragrafi" >Ruaj Paragrafin</button>
					
				</div>
				
				<div class="contetPjeset">
					<p > <textarea  name="projekt2Titulli" style="width:190px; height:30px;" > <?php echo  $row['projekt2Titulli'];?></textarea></p>
					
					<div class="contentFig">	
						<img alt="contentFoto" src="images/<?php echo  $row['projekt2Foto']; ?>" style="width:190px; height:100px;" > 
					</div>
					
					<p class="paragraf"> <textarea  name="projekt2Paragrafi" style="width:190px; height:100px;" > <?php echo  $row['projekt2Paragrafi'];?></textarea></p>
					
					<input style="float:left; " type="file" size="60" name="image2" value="File" >
							<button style="float:left; width:80px;" type="submit" name="RuajFotonP2" >RuajFoton</button>
							<button  style="float:right; width:110px; "  type="submit" name="Ruajprojekt1Paragrafi" >Ruaj Paragrafin</button>
					
				</div>
				
				<div class="contetPjeset">
					<p > <textarea  name="projekt3Titulli" style="width:190px; height:30px;" > <?php echo  $row['projekt3Titulli'];?></textarea></p>
					
					<div class="contentFig">	
						<img alt="contentFoto" src="images/<?php echo  $row['projektFoto3']; ?>" style="width:190px; height:100px;" > 
					</div>
					
					<p class="paragraf"> <textarea  name="projekt3Paragrafi" style="width:190px; height:100px;" > <?php echo  $row['projekt3Paragrafi'];?></textarea></p>
					
					<input style="float:left; " type="file" size="60" name="ok" value="File" >
							<button style="float:left; width:80px;" type="submit" name="RuajFotonP3" >RuajFoton</button>
							<button  style="float:right; width:110px; "  type="submit" name="Ruajprojekt1Paragrafi" >Ruaj Paragrafin</button>
					
				</div>
				
					<div class="contetPjeset">
					<p > <textarea  name="projekt4Titulli" style="width:190px; height:30px;" > <?php echo  $row['projekt4Titulli'];?></textarea></p>
					
					<div class="contentFig">	
						<img alt="contentFoto" src="images/<?php echo  $row['projekt4Foto']; ?>" style="width:190px; height:100px;" > 
					</div>
					
					<p class="paragraf"> <textarea  name="projekt4Paragrafi" style="width:190px; height:100px;" > <?php echo  $row['projekt4Paragrafi'];?></textarea></p>
					
					<input style="float:left; " type="file" size="60" name="image" value="File" >
							<button style="float:left; width:80px;" type="submit" name="RuajFotonP4" >RuajFoton</button>
							<button  style="float:right; width:110px; "  type="submit" name="Ruajprojekt1Paragrafi" >Ruaj Paragrafin</button>
					
				</div>
					<?php }?>
			</form>
			</div>
			
			
					
			
</body>
</html>