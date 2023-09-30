<?php

	include_once 'config.php';

	//validating user access type

	$account_type = $_SESSION['u_acc_type'];

	if($account_type=="Customer"){
		echo "<h1>Access Denied</h1>";
	}else{


?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="stylesheets/admin_product.css">
</head>

<body>
<table id="customers">
  <tr>
    <th>Customer ID</th>
    <th>Email</th>
	<th>User Name</th>
    <th>First Name</th>
	<th>Last Name</th>
	<th>Address</th>
	<th>Contact No</th>
	<th>Delete</th>
  </tr>
    <?php
		$sql = "SELECT * FROM customers WHERE actype ='Customer';";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		
		if($resultCheck > 0) {
			while($row = mysqli_fetch_assoc($result)){
    ?>
	<?php //this outputs has been validated for XSS ?>
   <tr>    
    <td><?php echo htmlspecialchars($row['customer_id'],ENT_QUOTES,'UTF-8');?></td> 
    <td><?php echo htmlspecialchars($row['email'],ENT_QUOTES,'UTF-8');?></td> 
    <td><?php echo htmlspecialchars($row['user_name'],ENT_QUOTES,'UTF-8');?></td>
    <td><?php echo htmlspecialchars($row['first_name'],ENT_QUOTES,'UTF-8');?></td>
    <td><?php echo htmlspecialchars($row['last_name'],ENT_QUOTES,'UTF-8');?></td>
    <td><?php echo htmlspecialchars($row['address'],ENT_QUOTES,'UTF-8');?></td> 
    <td><?php echo htmlspecialchars($row['contact_no'],ENT_QUOTES,'UTF-8');?></td>
	<td><a  class="add x" href="includes/delete_customer.php?id=<?php echo $row['customer_id']; ?>">Delete</a></td>
  </tr>
  
  <?php } }
  
  if(isset($_POST['delete'])) {
		
	$pid = $_POST['customer_id'];
	
	$sql = "DELETE FROM customers WHERE customer_id='$pid'";
						
	if ( $conn->query($sql) === TRUE ) {
						
		$message = "Successfully deleted!";
		echo "<script type='text/javascript'>alert('$message');
			   window.location.href='../admin.customer.php';</script>";
	}else {
							
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	
}
 
}?>
</table>

</body>
</html>