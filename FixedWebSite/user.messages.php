<!DOCTYPE html>
<html>

<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="stylesheets/user2.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body> 

	<?php
		
		include_once 'header.php';
	?>

	<!--HEADER END-->
	
	<section id="main-sec">
		
	<div class="left-nav">
		<ul>
		<li><a href="user-general.php">General</a></li>
		<li><a href="user-order.php">Orders</a></li>
		<li><a class="active" href="user.messages.php">Messages</a></li>
		</ul>
		</div>
		
		<div class="o-container">
	
		<?php
		
			include_once 'includes/user_messages.php';
		?>
	
	
	
		</div>
	</section>
	
	<!--FOOTER START-->
	
	<?php
	
		include_once 'footer.php';
	?>
	
</body>


</html>