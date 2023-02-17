<?php
session_start();
include('db.php');

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}

$query = "SELECT * FROM products";
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
</head>
<body>
    <h1>Products</h1>

    <p>Welcome, <?php echo $_SESSION['username']; ?>!</p>

    <a href="add_product.php">Add Product</a>

    <table>
        <tr>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['price']; ?></td>
                <td><a href="edit_product.php?id=<?php echo $row['id']; ?>">Edit</a> | <a href="delete_product.php?id=<?php echo $row['id']; ?>">Delete</a></td>
            </tr>
        <?php } ?>
    </table>

    <a href="logout.php">Logout</a>
</body>
</html>
