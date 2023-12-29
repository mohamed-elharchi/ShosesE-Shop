<?php
session_start();
include_once "connexion.php";
if (isset($_POST['products'])) {
    $productData = json_decode($_POST['products'], true);
    // error_log('productData: ' . json_encode($productData));
    $totalPrice = 0;
    $totalQuantity = 0;
    echo '<div class="content">

    
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
                    <label class="oo" for="dd" >cash On Delivery</label>
                </td> 
            </tr>
        </table>
    </div>
    <small class="paymenttt"></small>

    </div>';
    
    echo '
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
    <div class="confirmation-message"></div>';
    
    
    echo '
        <div id="paypal-button-container" class="paypal-container" style="display: none;"></div>
        <div id="cash-delivery-container" class="cash-container" style="display: none;"></div>';

    echo '</div>';
   

    echo '<div class="orderSummary">';
    echo '<h4 class="title">Order Summary</h4>';
    $_SESSION['productData'] = [];

    foreach ($productData as $product) {
        // Use the product's id directly if it's a single value
        $idproducts = $product['idproduct'];
        $title = $product['title'];
        $image = $product['image'];
        $prix = $product['prix'];
        $size = $product['size'];
        $amount = $product['amount'];
        $quantity = $product['quantity'];
    
        $totalPrice += $amount;
        $totalQuantity += $quantity;
        $_SESSION['totalQuantity'] = $totalQuantity;
        $_SESSION['totalPrice'] = $totalPrice;
    
        echo '<div class="productInfo">
            <div class="info">
                <img src="' . $image . '">
                <h5>' . $title . '</h5>
                <h5> Size : ' . $size . '</h5>
                <h5> Quantity :' . $quantity . '</h5>
            </div>
            <hr>
        </div>';
    
        // Add product data to $_SESSION['productData']
        $_SESSION['productData'][] = [
            'idproduct' => $idproducts,
            'amount' => $amount,
            'quantity' => $quantity,
            'size' => $size,
        ];
    }

    echo '<div class="totalll">
        <h4>Total Quantity: ' . $totalQuantity . '</h4>
        <h4>Total Price: ' . $totalPrice . '$</h4>
    </div>';

    echo '</div></div>';

    renderPayPalButton($totalPrice);
    echo '<link rel="stylesheet" href="css/checkoutstyle.css">';
    echo '<script src="js/checKOutscripts.js"></script>';
    echo json_encode(['status' => 'success', 'message' => 'Order processed successfully', 'productData' => $productData]);
    exit;
}



function renderPayPalButton($totalPrice)
{
    echo '<script>';
    echo 'paypal.Buttons({';
    echo 'createOrder: function(data, actions) {';
    echo 'return actions.order.create({';
    echo 'purchase_units: [{';
    echo 'amount: {';
    echo 'value:"' . $totalPrice . '"';
    echo '}}]});';
    echo '},';
    echo 'onApprove: function(data,actions){';
    echo 'return actions.order.capture().then(function(details){';
    echo 'console.log(details)';
    echo '})';
    echo '}';
    echo '}).render("#paypal-button-container");';
    echo '</script>';
}

?>










<?php
    // echo '<script src="https://www.paypal.com/sdk/js?client-id=AV-pW4-8aoU0V_VF-eODSI8iGQ1cMQNTd1ETR6sx-uPykg0OLktUN2hDd9EZkeuOPUfBIhQ1K5ZbjE9F"></script>';
    // echo '<script>';
    // echo 'paypal.Buttons({';
    // echo 'createOrder: function(data, actions) {';
    // echo 'return actions.order.create({';
    // echo 'purchase_units: [{';
    // echo 'amount: {';
    // echo 'value:"299.99"';
    // echo '}}]});';
    // echo '},';
    // echo 'onApprove: function(data,actions){';
    // echo 'return actions.order.capture().then(function(details){';
    // echo 'console.log(details)';
    // echo '})';
    // echo '}';
    // echo '}).render("#paypal-button-container");';
    // echo '</script>';






        // include_once "connexion.php";

    // $expectedToken = 'AZERTYUI4F4F1D'; 
    // $validReferrer = 'http://localhost/php/gestion/ecom/clientpage.php'; 

    // if ($_SERVER['HTTP_REFERER'] !== $validReferrer || !isset($_GET['token']) || $_GET['token'] !== $expectedToken) {
    //     header("Location: clientpage.php"); 
    //     exit;
    // }

    // if (isset($_POST['products'])) {
    //     $productData = json_decode($_POST['products'], true);

    //     $totalPrice = 0; 
    //     $totalQuantity = 0; 

    //     foreach ($productData as $product) {
    //         $title = $product['title'];
    //         $image = $product['image'];
    //         $prix = $product['prix'];
    //         $size = $product['size'];
    //         $amount = $product['amount'];
    //         $quantity = $product['quantity'];

    //         $totalPrice += $amount; 
    //         $totalQuantity += $quantity; 
            
    //         echo 'title: ' . $title . '<br>';
    //         echo 'Image: ' . $image . '<br>';
    //         echo 'Price: ' . $prix . '<br>';
    //         echo 'Size: ' . $size . '<br>';
    //         echo 'Amount: ' . $amount . '<br>';
    //         echo 'Quantity: ' . $quantity . '<br>';
    //         echo '<br>';
    //     }
        
    //     echo 'Total Price ' . $totalPrice . '<br>';
    //     echo 'Total Quantity: ' . $totalQuantity . '<br>';
    // }
    // 
    ?>







