<?php
session_start();
include('db.php');

if(isset($_POST['add_to_cart'])){
	$id = $_POST['id'];
	$name = $_POST['name'];
	$price = $_POST['price'];
	
	if(isset($_SESSION['cart'])){
		$cart = $_SESSION['cart'];
	} else {
		$cart = array();
	}

	$cart[$id] = array(
		"id" => $id,
		"name" => $name,
		"price" => $price
	);

	$_SESSION['cart'] = $cart;
}

if(isset($_POST['update_cart'])){
	$cart = $_SESSION['cart'];

	foreach($_POST['qty'] as $key => $value){
		if($value==0){
			unset($cart[$key]);
		} else {
			$cart[$key]['qty'] = $value;
		}
	}

	$_SESSION['cart'] = $cart;
}

if(isset($_POST['place_order'])){
	$cart = $_SESSION['cart'];

	$query = "INSERT INTO orders (customer_id, order_date) VALUES ('1', NOW())";
	mysqli_query($con, $query);
	$order_id = mysqli_insert_id($con);

	foreach($cart as $item){
		$product_id = $item['id'];
		$qty = $item['qty'];
		$price = $item['price'];

		$query = "INSERT INTO order_items (order_id, product_id, qty, price) VALUES ('$order_id', '$product_id', '$qty', '$price')";
		mysqli_query($con, $query);
	}

	unset($_SESSION['cart']);
	header('Location: thank_you.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Shopping Cart</title>
</head>
