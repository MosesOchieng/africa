<?php
session_start();
include('db.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Products</title>
</head>
<body>

	<h1>Products</h1>

	<?php
		$query = "SELECT * FROM products";
		$result = mysqli_query($con, $query);
		while($row = mysqli_fetch_array($result)) {
	?>

		<h3><?php echo $row['name']; ?></h3>
		<p><?php echo $row['description']; ?></p>
		<p>Price: $<?php echo $row['price']; ?></p>
		<img src="<?php echo $row['image']; ?>" width="100" height="100">
		<form method="post" action="cart.php">
			<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
			<input type="hidden" name="name" value="<?php echo $row['name']; ?>">
			<input type="hidden" name="price" value="<?php echo $row['price']; ?>">
			<input type="submit" name="add_to_cart" value="Add to Cart">
		</form>

	<?php } ?>

</body>
</html>
