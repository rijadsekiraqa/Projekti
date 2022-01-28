<?php $page = 'home';include 'includes/header.php'; ?>
<?php
//kodi per menaxhimit i slider nga backend
$connect = mysqli_connect("localhost", "root", "", "webprojekti1");
function make_query($connect)
{
	$query = "SELECT * FROM banner ORDER BY banner_id ASC";
	$result = mysqli_query($connect, $query);
	return $result;
}

function make_slide_indicators($connect)
{
	$output = ''; 
 	$count = 0;
 	$result = make_query($connect);
 	while($row = mysqli_fetch_array($result)){
  		if($count == 0){
   		$output .= '
   		<li id="none" data-target="#dynamic_slide_show" data-slide-to="'.$count.'" class="active" ></li>';
 		 }
  		else{
  			$output .= '
   			<li id="none" data-target="#dynamic_slide_show" data-slide-to="'.$count.'"></li>';
  		}
	$count = $count + 1;
}
 return $output;
}

function make_slides($connect){
	$output = '';
	$count = 0;
	$result = make_query($connect);
	while($row = mysqli_fetch_array($result)){
		if($count == 0){
   		$output .= '<div class="Slider medium-content">';
		}
 		else{
   		$output .= '<div class="Slider medium-content">';
  		}
  	$output .= '
   <img src="images/'.$row["banner_image"].'" alt="'.$row["banner_title"].'" />
	<div class="Slider">
    <h3>'.$row["banner_title"].'</h3>
	</div>
	</div>
	';
	$count = $count + 1;
}
 return $output;
}

?>
<div class="wrapper">
			<div class="LoremIpsum">
				<p>"Lorem ipsum dolor sit amet,consectetur adipiscing elit.Nunc non diam <br>
				erat.In fringilla massa ut nisi ullamcorper pellentesque,,</p>
			</div>
			<div id="Slider">
				<div id="medium-content">
					<div class="slideri">
					<?php echo make_slide_indicators($connect); ?>
						<div id="slider1" class="jSlider">
						<?php echo make_slides($connect); ?>
						</div>
						<div class="box">
							<h3>This Is a Very Long Slider Title</h3>
				   		</div>
				   		<div class="box1">
				   	 		<p>Vestibulumaccumsan egestibulum eu justo convallis <br> augue estas aenean elit intesque sed.Facilispede <br> estibulum nulla orna nisl velit.</p>
						</div>
					</div>
				</div>		
			</div>
			<div class="content">
				<div class="bottom-border1"></div>
				<div class="wrapper1">
					<div class="content-1">
						<h3>A Little About Us</h3>
						<img src="images/content-1.png">
						<p>Justoid nonummy laoreet phasellent<br>
							penatoque in antesque pellus elis eget<br>
							tincidunt. Nequatdui laorem justo a non<br>
							tellus laoreet tincidunt ut vel velit nonummy<br>
							laoreet phasellent penatoque in antesque<br>
							pellus elis eget tincidunt.<br>
							<br>
							Idenim semper pellente velis felit ac. Justoid nonummy laoreet phasellent penatoque in antesque pellus elis eget tincidunt.
						</p>
						<a href="#">Read More About Us »</a>
					</div>
					<div class="services">
						<h3>Some of Our Services</h3>
						<div class="article">
							<img src="images/services-img.png">
							<h6>Service Title</h6>
							<p>Inteligula congue id elis donec<br>
							sce sag ittis intes id laoreet<br> aenean.
							</p>
						</div>
						<div class="articles">
							<img src="images/services-img1.png">
							<h6>Service Title</h6>
							<p>Inteligula congue id elis donec<br>
							 sce sag ittis intes id laoreet<br> aenean.
							 </p>
						</div>
						<div class="articles">
							<img src="images/services-img2.png">
							<h6>Service Title</h6>
							<p>Inteligula congue id elis donec<br>
							sce sag ittis intes id laoreet<br> aenean. 
							</p>
						</div>
						<div class="articles">
							<img src="images/services-img3.png">
							<h6>Service Title</h6>
							<p>Inteligula congue id elis donec<br>
							sce sag ittis intes id laoreet<br> aenean. 
							</p>
						</div>
							<a href="#"> View All Of Our Services » </a>
					</div>
					<div class="projects">
						<h3>What Our Clients Say</h3>
						<div class="project-1">
							<img src="images/thojzat.png">
							<h3>Tommy Tanker <span>- CEO</span></h3>
							<p>Justoid nonummy laoreet phasellent<br> penatoque in antesque pellus elis eget<br> tincidunt. Nequatdui laorem justo a non<br> tellus laoreet tincidunt ut vel velit. Idenim<br> semper pellente velis felit ac nullam pretium<br> morbi lacus.
							</p>
							<a href="#">View This Project »</a>
						</div>
						<div class="project-2">
							<img src="images/thojzat.png">
							<h3>Tommy Tanker <span>- CEO</span></h3>
							<p>Justoid nonummy laoreet phasellent<br> penatoque in antesque pellus elis eget<br> tincidunt. Nequatdui laorem justo a non<br> tellus laoreet tincidunt ut vel velit. Idenim<br> semper pellente velis felit ac nullam pretium<br> morbi lacus.</p>
							<a href="#">View This Project »</a>
						</div>
					</div>
				</div>
			</div>
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