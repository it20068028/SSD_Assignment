<!DOCTYPE html>
<html>

<head>
	<title>Product</title>
	<link rel="stylesheet" type="text/css" href="stylesheets/user2.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body> 
	
	<!--Header start-->
	<?php
		
		include_once 'header.php';
	?>

	<!--Header end-->
	
	<section id="main-sec">
		
		<div class="left-nav">
		<ul>
		<li><a href="admin.customer.php">Customers</a></li>
		<li><a  href="admin.employee.php">Employees</a></li>
		<li><a class="active" href="admin.product.php">Products</a></li>
		<li><a href="admin.orders.php">Orders</a></li>
		<li><a href="additems.php">Add Products</a></li>
		<li><a href="update.delete.php">Update/Delete Products</a></li>
		<li><a href="add.employee.php">Add Employees</a></li>
		<li><a href="admin.messages.php">Messages</a></li>
		<li><a href="admin.general.php">General</a></li>
		</ul>
		</div>
		
		<div class="o-container">
	
		<?php
		
			include_once 'includes/admin_product.php';
		?>
	
	
	
		</div>
	</section>
	
	<!--footer start-->
	
	<?php
	
		include_once 'footer.php';
	?>
	<!--footer end-->
	
</body>


</html>