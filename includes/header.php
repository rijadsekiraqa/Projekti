<?php require_once './core/Database.php'; 

session_start();

?>
<html>
<head>
	<title>CLEARCUT</title>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
		<link rel="stylesheet" type="text/css" href="css/jSlider.css" />
		<link href="https://fonts.googleapis.com/css?family=Work+Sans:400,300,600,400italic,700" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700" rel="stylesheet">
		<script src="js/jquery-1.11.3.min.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="text/javascript" src="js/jquery.jSlider.js"></script>
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
		<script type="text/javascript">
	        $(document).on('click', '.menu ul li',function(){
	        $(this).addClass('active').siblings().removeClass('active');
	        });
	    </script>


</head>
	<body>
		<div id="header">
			<div class="backGroundWhite">
				<div class="logo">
					<h3>CLEARCUT</h3>
					<p>Free PSD Website Template</p>
				</div>
				<div class="login-button">
						

                    <?php 	

		if(isset($_SESSION['username']) && isset($_SESSION['user_role'])){
			if($_SESSION['user_role'] == 1){
				echo "<a id='logout' href='logout.php'>Log Out</a>";
				echo "<a href='#'>Welcome, " . $_SESSION['username'] . "</a>";
				echo "<a id='admin-panel' href='admin/index.php'>Admin Dashboard</a>";
			}else{	
				echo "<a id='logout' href='logout.php'>Log Out</a>";
				echo "<a href='#'>Welcome, " . $_SESSION['username'] . "</a>";
			}
		} else {
			echo "<a id='login-link' href='login.php'>Login</a>";

		}
		session_destroy(); 
		?>
			
                </div>
				<div class="menu">
					<ul>

						<li class="<?php if($page=='home'){echo 'active';}?>"><a href="index.php">HOME</a></li>
						<li class="<?php if($page=='news'){echo 'active';}?>"><a href="news.php">NEWS</a></li>
						<li class="<?php if($page=='#'){echo 'active';}?>"><a href="#">GALLERY</a></li>
						<li class="<?php if($page=='project'){echo 'active';}?>"><a href="project.php">PROJECTS</a></li>
			            <li class="<?php if($page=='contact'){echo 'active';}?>"><a href="contactus.php">CONTACT US</a></li>
			            <li class="<?php if($page=='about'){echo 'active';}?>"><a href="aboutus.php">ABOUT</a></li>						
								

		
					</ul>
				</div>
				
				<div class="bottom-border">
				</div>
			</div>
		</div>