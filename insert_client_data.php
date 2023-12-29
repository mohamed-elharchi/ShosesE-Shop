<?php
include_once "connexion.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $city = $_POST['city'];
    $adresse = $_POST['adresse'];
    $phone = $_POST['phone'];
    $zipcode = $_POST['zipcode'];
    $paymentMethod = $_POST['paymentMethod'];

    // Sanitize and validate session variables
    $totalQuantity = isset($_SESSION['totalQuantity']) ? filter_var($_SESSION['totalQuantity'], FILTER_VALIDATE_INT) : 0;
    $totalQuantity = ($totalQuantity !== false) ? $totalQuantity : 0;

    $totalPrice = isset($_SESSION['totalPrice']) ? filter_var($_SESSION['totalPrice'], FILTER_VALIDATE_FLOAT) : 0.0;
    $totalPrice = ($totalPrice !== false) ? $totalPrice : 0.0;

    if (empty($name) || empty($email) || empty($city) || empty($adresse) || empty($phone) || empty($zipcode)) {
        echo json_encode(['status' => 'error', 'message' => 'All fields are required.']);
        exit;
    }

    // Insert data into the customers table
    $sqlCustomer = "INSERT INTO customers (name, email, city, adresse, phone, zipcode) 
                    VALUES (?, ?, ?, ?, ?, ?)";
    
    $stmt = $db->prepare($sqlCustomer);
    $stmt->execute([$name, $email, $city, $adresse, $phone, $zipcode]);

    if ($stmt) {
        // Retrieve the customer_id of the inserted customer
        $customer_id = $db->lastInsertId();

        // Insert data into the orders table
        $sqlOrder = "INSERT INTO orders (customer_id, order_date, total_quantity, total_price, payment_method) 
                     VALUES (?, NOW(), ?, ?, ?)";
        
        $stmtOrder = $db->prepare($sqlOrder);
        $stmtOrder->execute([$customer_id, $totalQuantity, $totalPrice, $paymentMethod]);

// ...

                
        if ($stmtOrder) {
            // Retrieve the order_id of the inserted order
            $order_id = $db->lastInsertId();

            // Loop through product data and insert order items
            foreach ($_SESSION['productData'] as $product) {
                $idproduct = $product['idproduct'];
                $amount = $product['amount'];
                $quantity = $product['quantity'];
                $size = $product['size'];
            
                // Insert order items for each product
                $sqlOrderItem = "INSERT INTO order_items (order_id, idproduct, quantity, amount, size) 
                                VALUES (?, ?, ?, ?, ?)";
                $stmtOrderItem = $db->prepare($sqlOrderItem);
                $stmtOrderItem->execute([$order_id, $idproduct, $quantity, $amount, $size]);
            
                // Check if the order item was inserted successfully
                if (!$stmtOrderItem) {
                    // Handle the error as needed
                    echo json_encode(['status' => 'error', 'message' => 'Error inserting order item: ' . implode(' ', $stmtOrderItem->errorInfo())]);
                    exit;
                }
            }
            
            // Clear the session data after successful processing
            unset($_SESSION['productData']);

            echo json_encode(['status' => 'success', 'message' => 'Customer data and order information successfully inserted.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error inserting order information: ' . implode(' ', $stmtOrder->errorInfo())]);
        }

        // ...

    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error inserting customer data: ' . implode(' ', $stmt->errorInfo())]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}
?>
