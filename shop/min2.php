<?php
$server_name="localhost";
$username="root";
$password="";
$database_name="user_db";
$conn=mysqli_connect($server_name,$username,$password,$database_name);
if(!$conn)
{
    die("Connection Failed:".mysqli_connect_error());
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FITFEUL</title>
    <style>
        /* CSS styles */
        body {
            background-color: #f2f2f2;
            color: #333;
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
            position: relative;
        }
        h1 {
            font-size: 2em;
            margin-top: 0;
        }
        h2 {
            font-size: 1.5em;
            margin-bottom: 5px;
        }
        .discount-message {
            color: #F73471;
            font-weight: bold;
            margin: 10px 0;
        }
        .product-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 20px;
        }
        .product {
            flex-basis: 45%;
            margin-bottom: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .product-img {
            width: 100%;
            height: auto;
            object-fit: cover;
            transition: transform 0.3s ease-in-out;
        }
        .product-img:hover {
            transform: scale(1.05);
        }
        .details {
            padding: 15px;
        }
        select, button {
            margin-top: 10px;
            padding: 8px 15px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button {
            background-color: #F73471;
            color: #fff;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #ad4466;
        }
        #cart-button {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 10px 20px;
            font-size: 16px;
            background-color: #F73471;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            z-index: 999;
        }
        #cart {
            position: fixed;
            top: 80px;
            right: 20px;
            display: none;
            padding: 15px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            z-index: 999;
        }
        #order-button {
            background-color: #F73471;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        #order-button:hover {
            background-color: #ad4466;
        }
        footer {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <header>
        <h1>FITFUEL</h1>
        <h2>Shop</h2>
        <p style="color: white; font-weight: bold;">Get a 7% discount on every 12th of each month!</p>
    </header>
    <div class="product-container">
        <?php
        // PHP code to retrieve item details from the database 
        $items = array(
            array("item_name" => "Shirt", "item_price" => 6000, "item_id" => 1, "quantity_available" => 6),
            array("item_name" => "Pants", "item_price" => 5000, "item_id" => 2, "quantity_available" => 8),
            array("item_name" => "Yoga Mat", "item_price" => 1900, "item_id" => 3, "quantity_available" => 9),
            array("item_name" => "Hoodie", "item_price" => 18000, "item_id" => 4, "quantity_available" => 7),
            array("item_name" => "Zipper", "item_price" => 13000, "item_id" => 5, "quantity_available" => 3),
            array("item_name" => "Duffle Bag", "item_price" => 7890, "item_id" => 6, "quantity_available" => 2),
            array("item_name" => "FlipFlops", "item_price" => 2450, "item_id" => 7, "quantity_available" => 5)
        );

        foreach ($items as $item) {
            echo '<div class="product">';
            echo '<img src="' . $item["item_name"] . '.jpeg" alt="' . $item["item_name"] . '" class="product-img">';
            echo '<div class="details">';
            echo '<h3>' . $item["item_name"] . '</h3>';
            echo '<p>Price: ' . $item["item_price"] . '</p>';
            echo '<p>Quantity Available: <span id="' . $item["item_name"] . '-quantity">' . $item["quantity_available"] . '</span></p>';
            echo '<label for="' . $item["item_name"] . '-size">Select Size:</label>';
            echo '<select id="' . $item["item_name"] . '-size">';

            // Add options for sizes
            switch ($item["item_name"]) {
                case "Shirt":
                    echo '<option value="Small">Small</option>';
                    echo '<option value="Medium">Medium</option>';
                    echo '<option value="Large">Large</option>';
                    break;
                case "Pants":
                    echo '<option value="30inch">30inch</option>';
                    echo '<option value="32inch">32inch</option>';
                    echo '<option value="34inch">34inch</option>';
                    break;
                case "Yoga Mat":
                    echo '<option value="Standard">Standard</option>';
                    echo '<option value="Extra Large">Extra Large</option>';
                    break;
                case "Hoodie":
                    echo '<option value="Small">Small</option>';
                    echo '<option value="Medium">Medium</option>';
                    echo '<option value="Large">Large</option>';
                    break;
                case "Zipper":
                    echo '<option value="Small">Small</option>';
                    echo '<option value="Medium">Medium</option>';
                    echo '<option value="Large">Large</option>';
                    break;
                case "Duffle Bag":
                    echo '<option value="Standard">Standard</option>';
                    break;
                case "FlipFlops":
                    echo '<option value="38">38</option>';
                    echo '<option value="39">39</option>';
                    echo '<option value="40">40</option>';
                    echo '<option value="41">41</option>';
                    echo '<option value="42">42</option>';
                    echo '<option value="43">43</option>';
                    break;
                // Add cases for other items here
                //default:
                //       echo '<option value="One Size">One Size</option>'; // Default option
            }

            echo '</select>';
            echo '<button onclick="addToCart(\'' . $item["item_name"] . '\', \'' . $item["item_name"] . '-size\', ' . $item["item_price"] . ', ' . $item["item_id"] . ')">Add to Cart</button>';
            echo '</div></div>';
        }

        ?>
    </div>
    
    <button onclick="viewCart()" id="cart-button">View Cart</button>
    <div id="cart">
        <h3>Cart</h3>
        <ul id="cart-items"></ul>
        <p id="discount-message" style="font-weight: bold;"></p>
        <button onclick="showOrderPopup()" id="order-button">Order Now</button>    </div>
    <footer>
        <p>Address: 123 Example Street, City, Country</p>
        <p>Contact Number: +1234567890</p>
        <p>Email: example@example.com</p>
        <p>Fax Number: +1234567890</p>
        <p>Location: Latitude, Longitude</p>
    </footer>

    <script>
        // JavaScript code
        function addToCart(itemName, sizeId, price, itemId) {
            var size = document.getElementById(sizeId).value;
            var quantity = 1; // Default quantity
            
            // Get the current quantity available
            var quantityAvailable = parseInt(document.getElementById(itemName + '-quantity').textContent);
            
            // Check if quantity is available
            if (quantityAvailable < quantity) {
                alert("Quantity unavailable!");
                return;
            }
            
            // Decrease the quantity available
            document.getElementById(itemName + '-quantity').textContent = quantityAvailable - quantity;

            var cartItems = document.getElementById("cart-items").getElementsByTagName("li");

            // Check if the item already exists in the cart
            var existingItem = Array.from(cartItems).find(function(item) {
                return item.dataset.name === itemName && item.dataset.size === size;
            });

            if (existingItem) {
                // If the item already exists, increment its quantity and update the total price
                var quantityElement = existingItem.querySelector(".quantity");
                var quantity = parseInt(quantityElement.textContent);
                quantityElement.textContent = quantity + 1;

                var totalPriceElement = existingItem.querySelector(".total-price");
                var totalPrice = parseInt(totalPriceElement.textContent) + price;
                totalPriceElement.textContent = totalPrice;
            } else {
                // If the item does not exist, add it to the cart
                var cartList = document.getElementById("cart-items");
                var newItem = document.createElement("li");
                newItem.dataset.name = itemName;
                newItem.dataset.size = size;
                newItem.innerHTML = itemName + " - " + size + " - <span class='quantity'>1</span> x $" + price + " = $<span class='total-price'>" + price + "</span>";
                cartList.appendChild(newItem);
            }
        }

        function viewCart() {
            var cart = document.getElementById("cart");
            if (cart.style.display === "block") {
                cart.style.display = "none";
            } else {
                cart.style.display = "block";
                calculateTotal(); // Call calculateTotal function to update the total price when the cart is displayed
            }
        }
        window.addEventListener('scroll', function() {
            var cartButton = document.getElementById('cart-button');
            var headerHeight = document.querySelector('header').offsetHeight;

            if (window.scrollY > headerHeight) {
                cartButton.style.top = '0'; // Set the top position to 0 when scrolled past the header
            } else {
                cartButton.style.top = '40px'; // Set the top position back to its original value
            }
        });

        
        function showOrderPopup() {
    var name = prompt("Please enter your name:");
    if (name != null && name != "") {
        var cartItems = document.getElementById("cart-items").getElementsByTagName("li");
        var totalPrice = 0;
        Array.from(cartItems).forEach(function(item) {
            var price = parseInt(item.querySelector(".total-price").textContent);
            totalPrice += price;
        });

        var orderId = generateOrderId();

        // Send order data to process_order.php using AJAX
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "index.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Response from the server
                alert(xhr.responseText);
            }
        };
        xhr.send("name=" + name + "&totalPrice=" + totalPrice + "&orderId=" + orderId);
        
        // Show order confirmation message
        alert("Thank you, " + name + "! Your order has been placed.\n\nTotal Price: $" + totalPrice.toFixed(2) + "\nOrder ID: " + orderId);
        // Reset the cart or perform any other necessary action
    } else {
        // User cancelled or did not enter a name
        alert("Please enter a valid name.");
    }
}

 
  function generateOrderId() {
    var characters = '0123456789';
    var orderIdLength = 5;
    var orderId = '';
    for (var i = 0; i < orderIdLength; i++) {
        orderId += characters.charAt(Math.floor(Math.random() * characters.length));
    }
    return orderId;
}
        
    </script>
    </body>
</html>
