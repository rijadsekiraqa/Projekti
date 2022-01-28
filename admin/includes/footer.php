<html>
<head>
	<title>CLEARCUT</title>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<link href="https://fonts.googleapis.com/css?family=Work+Sans:400,300,600,400italic,700" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700" rel="stylesheet">
	<script src="js/jquery-1.11.3.min.js"></script>
	<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
	
</head>
<div id="footer">
			<div class="wrapper2">
				<div class="company">
					<h5>Company Details</h5>
					<div class="bottom-border2"></div>
					<p>Company Name <br> Street Name & Number <br> Town <br> Postcode/Zip<br>
					<br>
					Tel:xxxx xxxxxxxxxx <br>
					Fax:xxxx xxxxxxxxxx <br>
					Email:<span id="Tekst1"><a href="#">contact@mydomain.com</a></span></p>
					<p>Office Hours<br>
					Monday - Friday:08:00-17:30 <br>
					Saturday:08:00-13:00 <br> </p>
				</div>
				<div class="social-media">
					<h5>Stay Social</h5>
					<div class="bottom-border2"></div>
					<div class="logo1">
						<img src="images/linkedin.png">
						<p><a href="#">Get linked up in Linkedin</a></p>
					</div>
					<div class="logo1">
						<img src="images/twitter.png">
						<p><a href="#">Keep up with our Tweets</a></p>
					</div>
					<div class="logo1">
						<img src="images/pinterest.png">
						<p><a href="#">Photos on pinterest</a></p>
					</div>
					<div class="logo1">
						<img src="images/rssfeed.png">
						<p><a href="#">RSS Feed</a></p>
					</div>
				</div>
				<div class="from-blog">
					<h5>From The Blog</h5>
					<div class="bottom-border2"></div>
					<div class="blog1">
						<h4>Blog Post Title</h4>
						<p>Posted by Admin on 00.00.0000  </p>
						<span>
							<p>Vestibulumaccumsan egestibulum eu justo convallis augue estas aenean elit intesque sed facilispede estibulum.</p>
						</span>
						<a href="#">Read More»</a>
					</div>
					<div class="blog2">
						<h4>Blog Post Title</h4>
						<p>Posted by Admin on 00.00.0000  </p> 
						<span>
							<p>Vestibulumaccumsan egestibulum eu justo convallis augue estas aenean elit intesque sed facilispede estibulum.</p>
						</span>
					<a href="#">Read More»</a>
					</div>
				</div>
				<div class="Contact-Us">
					<h5>Contact Us</h5>
					<div class="bottom-border2"></div>
					<form role="form">
						<div id="loginformFirst">
						<input type="text" placeholder="Name"
						name="Name" 
						data-validation="custom" 
						data-validation-regexp="^([a-zA-Z]+)$"
						data-validation-error-msg="You did not enter a valid name">
						</div>
						<div id="loginform">
						<input type="text" placeholder="Email"
						data-validation="email">
						</div>
						<div id="loginform">
						<input type="text" id="message"placeholder="Message"
						data-validation="required length"
						data-validation-length="min64"
						data-validation-error-msg="You need to type at least 64 characters">
						<input type="submit" id="submit" value="SUBMIT">
						</div>
					</form>
					<script>
						$.validate({
						errorMessageClass: "error",
						});
					</script>	
				</div>
			</div>
		</div>