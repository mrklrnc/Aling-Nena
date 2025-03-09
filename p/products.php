<?php
session_start();
include("php/config.php");

// Fetch products from the database
$sql = "SELECT product_name, price, quantity FROM products";
$result = $con->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Retail Store</title>
    <link rel="stylesheet" href="css/style.css">

</head>
<body id="homebody">
    <h3 id="storename">Welcome to Tindahan ni Aling Nena</h3>

    <nav class="navbar">
         <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="orders.php">Orders</a></li>
            <li><a href="products.php" class="active">Products</a></li>
            <li><a href="payments.php">Payments</a></li>
            <li class="uwi"><a href="index.php">Log out</a></li>
         </ul>

    </nav><br>

    <main>
    <h4>Products</h4>
       
    <form id="productForm">
        <div class="products">
            <div>
                <input class="prudokto" type="text" name="product_name" id="product_name" placeholder="Product Name" required>
            </div>
                
            <div>
                <input class="prudokto" type="number" name="price" step="0.1" id="price" placeholder="Price" required>
            </div>

            <div>
                <input class="prudokto" type="number" name="quantity" step="0" id="quantity" placeholder="Quantity" required>
            </div>

            <div>
                 <button type="submit" class="addprdctbtn">Add Product</button>
            </div>       
        </div>
    </form>
    <hr>
    <table border="5">
            <tr>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['product_name']}</td>
                            <td>{$row['price']}</td>
                            <td>{$row['quantity']}</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No products available</td></tr>";
            }
            ?>
        </table>
    </main>
    
</body>
</html>