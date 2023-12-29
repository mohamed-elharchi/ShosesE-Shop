<?php

if (isset($_POST['idproduct'])) {
    $idproduct = $_POST['idproduct'];

    $isInCart = checkProductInCart($idproduct);

    echo json_encode(array('inCart' => $isInCart));
} else {
    echo json_encode(array('error' => 'Product ID is missing.'));
}

function checkProductInCart($idproduct) {
    
    session_start();
    if (isset($_SESSION['cart'])) {
        $cart = $_SESSION['cart'];
        return in_array($idproduct, $cart);
    }

    return false;
}
?>
