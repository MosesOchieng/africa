<!DOCTYPE html>
<html>
    <head>
        <title>Sellers Page</title>
        <style>		body {
			font-family: Arial, sans-serif;
			background-color: #f2f2f2;
		}

		h1 {
			text-align: center;
			color: #333;
			margin-top: 50px;
		}

		form {
			max-width: 600px;
			margin: 0 auto;
			padding: 20px;
			background-color: #fff;
			border-radius: 5px;
			box-shadow: 0 0 10px rgba(0,0,0,0.2);
		}

		label {
			display: block;
			margin-top: 20px;
			font-size: 18px;
			font-weight: bold;
			color: #555;
		}

		input[type="text"], textarea {
			display: block;
			width: 100%;
			padding: 10px;
			margin-top: 5px;
			font-size: 16px;
			border: none;
			border-radius: 3px;
			background-color: #f9f9f9;
		}

		button[type="submit"] {
			display: block;
			margin-top: 20px;
			padding: 10px 20px;
			font-size: 18px;
			font-weight: bold;
			color: #fff;
			background-color: #007bff;
			border: none;
			border-radius: 3px;
			cursor: pointer;
		}
</style>
    </head>
    <body>
    <form action="add_product.php" method="POST">
    <label for="name">Product Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="description">Product Description:</label>
    <textarea id="description" name="description" required></textarea>

    <label for="price">Price:</label>
    <input type="number" id="price" name="price" required>

    <button type="submit" name="submit">Add Product</button>
</form>

    </body>
</html>