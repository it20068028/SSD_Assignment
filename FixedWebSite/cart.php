<?php
	if (isset($_POST["add_to_cart"]))
	{
		$name=$_POST['value_pass_name'];
		$price=$_POST['value_pass_price'];
		$quantity=$_POST['value_pass_quantity'];
		$con=new mysqli('localhost','root','rbr2373','pharmacy');
		
		if($con->connect_error)
		{
			die("cnnect error...!");
		}
		
		else
		{
			//echo "connect success...!!";
		}
		
		$sql= "INSERT INTO cart(name,price,product_quantity) VALUES('$name','$price','$quantity')";
		
		
		if($con->query($sql))
		{
			//echo"success";
			
			echo"<script>alert('Success..!!');</script>";
			
		}
		else
		{
			echo "error";
		}
		
		
		
	}
?>