
<?php $page = 'contact';include 'includes/header.php'; ?>

				<?php

$mysqli = new mysqli('localhost','root','','webprojekti1');
	if($mysqli->connect_errno)
	{
		echo "filed connection(".$mysqli->connect_errno.")".$mysqli->connect_error;
	}
	
	if(isset($_POST['SEND'])){
		
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		$date = $_POST['date'];
		$message = $_POST['message'];
		$gender = $_POST['gender'];
		$rate = $_POST['depertament'];
		$country = $_POST['country'];


		
	    $query = $mysqli->query("insert into  contact(name,email,phone,address,date,message,gender,rate,country) values('$name','$email','$phone','$address','$date','$message','$gender','$rate','$country')");
		 return header('Location: ./index.php');
	}
	
	
?>
				
	
		<div class="wrapper4">
			<div class="contact-section">
				<h1>Contact Us</h1>
				<form id="form" action="" method="POST">
				  	<div id="contact-form">
					    <input type="text" placeholder="Your Name"
					    name="name" 
					   	data-validation="custom" 
						data-validation-regexp="^([a-zA-Z]+)$"
						data-validation-error-msg="You did not enter a valid name">
					</div>
					<div id="contact-form">
					    <input type="email" placeholder="Your email"
						name="email" 
						data-validation="email">
					</div>
					<div id="contact-form">
				    	<input type="text"  placeholder="Your phone"
				    	name="phone"
				    	data-validation="custom"
				    	data-validation-regexp="^([0-9]+)$"
				    	data-validation-error-msg="You did not enter a valid number(0-9)">
					</div>
					<div id="contact-form">
					    <input type="text"  placeholder="Your address"
					   	name="address"
					    data-validation="required address">
					</div>
					<div id="contact-form">
						<input type="date" name="date"
						data-validation="required address">
					</div>
					<div id="contact-form">
					    <textarea name="message" placeholder="Your message"
					    data-validation="required length"
						data-validation-length="min20"
						data-validation-error-msg="You need to type at least 20 characters"></textarea>
					</div>
					<div id="contact-form">
					    <p id="genderMobile"> Please select your gender:
					    	<label><input type="radio" name="gender" value="Male">Male</label>
					    	<label><input type="radio" name="gender" value="Female"> Female</label>
						</p>
					</div>
					<div id="contact-form">
						<p>
							Rate Our Website <br>
							<label><input type="checkbox" name="depertament" value="Good">Good</label>
							<label><input type="checkbox" name="depertament" value="Very Good">Very Good</label>
							<label><input type="checkbox" name="depertament" value="Excellent">Excellent</label>
						</p>
					</div>
					<div id="contact-form">
						<p>
						Please chose your country:
							<select name="country">
								<option value="Albania">Albania</option>
								<option value="Kosovo">Kosovo</option>
								<option value="USA">USA</option>
								<option value="England">England</option>
								<option value="Germany">Germany</option>
								<option value="Spain">Spain</option>
							</select>
						</p>
					</div>
					<div id="contact-form">
				   		<input type="submit" name="SEND" value="Send">
					</div>
				</form>
				<script>
					$.validate({
					errorMessageClass: "error",
					});
				</script>
			</div>
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d188238.62125313465!2d21.004536865529758!3d42.50795280799524!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13549e8d5d607f25%3A0xa31dd05b21bd09de!2sUniversiteti+p%C3%ABr+Biznes+dhe+Teknologji!5e0!3m2!1sen!2s!4v1558218497743!5m2!1sen!2s" width="100%" height="445" frameborder="0" 
			style="border:0" allowfullscreen></iframe>
		</div>
		<?php include 'includes/footer.php'; ?>

		<div class="wrapper3">
		<div class="bottom-border3">
			<div class="copyright">
				<p>Copyright © 2013 Domain Name - All Rights Reserved</p>
				<span>
					<p>Template by OS Templates</p>
				</span>
			</div>
		</div>
	</body>
</html> 


