<?php
session_start();

// Check if productData is available in the session
if (isset($_SESSION['productData'])) {
    // Retrieve productData from the URL parameter
    $productDataString = $_GET['productData'] ?? '';

    // Decode the JSON string
    $productData = json_decode(urldecode($productDataString), true);

    if ($productData) {
        $totalPrice = 0;
        $totalQuantity = 0;
        ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/checkoutStyle.css">
    <title>Document</title>
</head>
<body>


    <div class="content">
        <div class="deliveryInformation">
            <div id="payContent">
                <h4 class="title">Payment Method</h4>
                <div class="clientInfo">
                    <table>
                        <tr>
                            <td>
                                <input class="nn" type="radio" name="ss" id="aa" value="onlinePayment">
                                <label class="oo" for="aa">Online Payment</label>
                            </td>
                            <td>
                                <input class="nn" type="radio" name="ss" id="dd" value="cashOnDelivery">
                                <label class="oo" for="dd" >Cash On Delivery</label>
                            </td>
                        </tr>
                    </table>
                </div>
                <small class="paymenttt"></small>
            </div>

            <h4 class="title">Delivery Information</h4>
            <div class="clientInfo">
                <table>
                    <tr class="cc">
                        <td  class="ddd">
                            <label for="name" class="ll">Name</label>
                        </td>
                        <td class="ddd">
                            <label for="email" class="ll">Email</label>
                        </td>
                    </tr>
                    <tr  class="cc">
                        <td class="ddd">
                            <input type="text" name="name" id="name" required placeholder="Mohamed Elharchi" class="ii">
                            <small class="name"></small>
                        </td>
                        <td class="ddd">
                            <input type="text" name="email" id="email" required placeholder="moharchi94@gmail.com" class="ii">
                            <small class="email"></small>
                        </td>
                    </tr>
                    <tr  class="cc">
                        <td class="ddd">
                            <label for="city" class="ll">City</label>
                        </td>
                        <td class="ddd">
                            <label for="adresse" class="ll">Adresse</label>
                        </td>
                    </tr>
                    <tr  class="cc">
                        <td class="ddd">
                            <input type="text" name="city" id="city" required placeholder="New York" class="ii" class="ii">
                            <small class="city"></small>
                        </td>
                        <td class="ddd">
                            <input type="text" name="adresse" id="adresse" required placeholder="20 Cooper Square, New York, NY 10003" class="ii">
                            <small class="adresse"></small>
                        </td>
                    </tr>
                    <tr  class="cc">
                        <td class="ddd">
                            <label for="phone" class="ll">Phone Number</label>
                        </td>
                        <td class="ddd">
                            <label for="zipcode" class="ll">Zip Code</label>
                        </td>
                        
                    </tr>
                    <tr  class="cc">
                        <td class="ddd">
                            <input type="text" name="phone" id="phone" required placeholder="(+212)696711425" maxlength="12" minlength="12" class="ii">
                            <small class="phone"></small>
                        </td>
                        <td class="ddd">
                            <input type="text" name="zipcode" id="zipcode" required placeholder="62254" maxlength="9" minlength="5" class="ii">
                            <small class="zipcode"></small>
                        </td>
                    </tr>
                    <tr  class="cc">
                        <td class="ddd" colspan="2">
                            <input type="submit" value="Confirm Info" class="btn" id="confirm-btn">
                        </td>
                    </tr>
                
                </table>
            </div>
            <div class="confirmation-message"></div>

            <div id="paypal-button-container" class="paypal-container" style="display: none;"></div>
            <div id="cash-delivery-container" class="cash-container" style="display: none;"></div>
        </div>

        <div class="orderSummary">
        <h4 class="title">Order Summary</h4>
        <?php
        foreach ($productData as $product) {
            $title = $product['title'];
            $image = $product['image'];
            $prix = $product['prix'];
            $size = $product['size'];
            $amount = $product['amount'];
            $quantity = $product['quantity'];

            $totalPrice += $amount;
            $totalQuantity += $quantity;
        ?>
        <div class="productInfo">
            <div class="info">
                <img src="<?php echo $image; ?>">
                <h5><?php echo $title; ?></h5>
                <h5> Size : <?php echo $size; ?></h5>
                <h5> Quantity : <?php echo $quantity; ?></h5>
            </div>
            <hr>
        </div>
        <?php } ?>

        <div class="totalll">
            <h4>Total Quantity: <?php echo $totalQuantity; ?></h4>
            <h4>Total Price: <?php echo $totalPrice; ?>$</h4>
        </div>
    </div>

    <div id="paypal-button-container" class="paypal-container" style="display: none;"></div>
    <div id="cash-delivery-container" class="cash-container" style="display: none;"></div>

    <script src="js/checKOutScripts.js"></script>

</body>
</html>

<?php
        // Clear the session storage after retrieving the data (optional)
        unset($_SESSION['productData']);
    } else {
        echo "Invalid product data.";
    }
} else {
    // Handle the case where productData is not set in the session
    echo "No product data available.";
}
?>