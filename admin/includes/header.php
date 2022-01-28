<?php include '../core/Database.php' ?>
<html>
<head>
	<title>CLEARCUT</title>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<link href="https://fonts.googleapis.com/css?family=Work+Sans:400,300,600,400italic,700" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700" rel="stylesheet">
	<script src="js/jquery-1.11.3.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="js/jquery.jSlider.js"></script>
	<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
	


</head>
	<body>
		<div id="header">
			<div class="backGroundWhite">
				<div class="logo">
					<h3>CLEARCUT</h3>
					<p>Free PSD Website Template</p>
				</div>
			
				<div class="menu">
					<ul>

						<li class="<?php if($page=='home'){echo 'active';}?>"><a href="index.php">HOME</a></li>
						<li class="<?php if($page=='users'){echo 'active';}?>"><a href="users.php">USERS</a></li>
						<li class="<?php if($page=='contact'){echo 'active';}?>"><a href="contact.php">CONTACT</a></li>
						<li class="<?php if($page=='products'){echo 'active';}?>"><a href="products.php">PRODUCTS</a></li>
						<li class="<?php if($page=='news'){echo 'active';}?>"><a href="news.php">NEWS</a></li>
						
			            
			            					
			
					</ul>
				</div>
				
				<div class="bottom-border">
				</div>
			</div>
		</div>