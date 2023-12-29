<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post" id="addToCartForm">
    <button type="submit" class="addto" name="ddd" value="<?=$donnees['idproduct']?>" onclick="addToCart(event)">
        <i class="fa-solid fa-cart-shopping"></i>
    </button>
</form>

<script>
    function addToCart(event) {
        event.preventDefault(); // Prevent default form submission

        // Access the form and its values
        var form = document.getElementById('addToCartForm');
        var productId = form.elements['ddd'].value;

        // Perform further actions with the productId
        console.log('Selected product ID:', productId);

        // You can make an AJAX request or perform other operations here
    }
</script>

</body>
</html>