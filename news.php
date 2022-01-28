<?php $page = 'news';
include 'includes/header.php'?>
<?php
	session_start();
	$mysqli = new mysqli('localhost','root','','webprojekti1');
	if($mysqli->connect_errno)
	{
		echo "filed connection(".$mysqli->connect_errno.")".$mysqli->connect_error;
	}
	
	
				
?>

<html>
<head>
	<title>Home</title>
	<meta charset="utf-8" />
	<link type="text/css" rel="stylesheet" href="admin/css/news.css">
</head>
<body>
<div class="wrapper" style=" height: 1050px;;">

			
			<div id="about">
			<?php foreach($mysqli->query('SELECT * FROM  news where id=1') as $row) { ?>
				<img alt="contentFoto" src="admin/images/<?php echo  $row['image']; ?>" style="width:550px; height:400px; float:left;  padding-right: 5;" > 
					<h2><?php echo  $row['titulli'];?></h2>
					<p style="font-size:18px; text-align:left; "><?php echo  $row['pargrafi1'];} ?></p>
			</div>
			<div id="content">
			<?php foreach($mysqli->query('SELECT * FROM  news where id=1') as $row) {?>
				<div class="contetPjeset">
					<p><?php echo  $row['projekt1Titulli'];?></p>
					<div class="contentFig">	
						<img alt="contentFoto" src="admin/images/<?php echo  $row['projekt1Foto']; ?>" style="width:190px; height:100px;" > 
					</div>
					
					<p class="paragraf"><?php echo  $row['projekt1Paragrafi']; ?></p>
				
					
				</div>
				
				<div class="contetPjeset">
					<p><?php echo  $row['projekt2Titulli'];?></p>
					<div class="contentFig">	
						<img alt="contentFoto" src="admin/images/<?php echo  $row['projekt2Foto']; ?>" style="width:190px; height:100px;" > 
					</div>
					
					<p class="paragraf"><?php echo  $row['projekt2Paragrafi']; ?></p>
					
					
				</div>
				
				<div class="contetPjeset">
					<p><?php echo  $row['projekt3Titulli'];?></p>
					<div class="contentFig">	
						<img alt="contentFoto" src="admin/images/<?php echo  $row['projektFoto3']; ?>" style="width:190px; height:100px;" > 
					</div>
					
					<p class="paragraf"><?php echo  $row['projekt3Paragrafi']; ?></p>
					
					
				</div>
				
				<div class="contetPjeset">
					<p><?php echo  $row['projekt4Titulli'];?></p>
					<div class="contentFig">	
						<img alt="contentFoto" src="admin/images/<?php echo  $row['projekt4Foto']; ?>" style="width:190px; height:100px;" > 
					</div>
					
					<p class="paragraf"><?php echo  $row['projekt4Paragrafi']; ?></p>
				
					
				</div>
				<?php }?>
			</div>
			
			
						<script>
				var slideIndex = 1;
				showSlides(slideIndex);

				function plusSlides(n) {
				  showSlides(slideIndex += n);
				}

				function currentSlide(n) {
				  showSlides(slideIndex = n);
				}

				function showSlides(n) {
				  var i;
				  var slides = document.getElementsByClassName("mySlides");
				  var dots = document.getElementsByClassName("dot");
				  if (n > slides.length) {slideIndex = 1}    
				  if (n < 1) {slideIndex = slides.length}
				  for (i = 0; i < slides.length; i++) {
					  slides[i].style.display = "none";  
				  }
				  for (i = 0; i < dots.length; i++) {
					  dots[i].className = dots[i].className.replace(" active", "");
				  }
				  slides[slideIndex-1].style.display = "block";  
				  dots[slideIndex-1].className += " active";
				}
				</script>
			
</body>
</html>