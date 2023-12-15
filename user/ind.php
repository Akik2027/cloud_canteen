<!DOCTYPE html>
<html lang="en">
<!--divinectorweb.com-->
<head>
	<meta charset="UTF-8">
	<title>How to create a website Layout| Owl carousel full width image slider</title>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&display=swap" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" rel="stylesheet">
	<link href="style.css" rel="stylesheet">
</head>
<body>
	
	<div id="wrapper">
		<div class="owl-carousel" id="slider-area">
			<div style="background-image: url(food_image/fd1.jpg)"></div>
			<div style="background-image: url(food_image/food2.jpg)"></div>
			<div style="background-image: url(food_image/food3.jpg)"></div>
			<div style="background-image: url(food_image/food4.jpg)"></div>
		</div>
		<div class="slider-text">
		<div><?php
		//	include('search.php');
			?>
		</div>
		
			<p style="font-family: italic; font-size:550%;color: #fff;">YOUR BELLY KNOWS BEST !! 😜😜</p><a href="#footer">Contuct Us</a> <a class="btn" href="#menu-container">Order Now</a>
		</div>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
	<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script> 
	<script>
	$('#slider-area').owlCarousel({
	   loop: true,
	   autoplay: true,
	   responsive: {
	       0: {
	           items: 1
	       },
	       600: {
	           items: 1
	       },
	       1000: {
	           items: 1
	       }
	   }
	})        
	</script>
	<container>
	
	</container>
</body>
</html>
