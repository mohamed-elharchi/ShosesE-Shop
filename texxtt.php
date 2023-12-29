<?php 
include_once "connexion.php";

$sql = "SELECT * FROM article WHERE typee='FeaturedProducts' limit 4";
$req = $db->prepare($sql);
$req->execute();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Playfair+Display:ital,wght@0,900;1,900&family=Source+Sans+Pro:wght@400;600;700;900&display=swap" rel="stylesheet">
    <script src="js/jquery-3.7.0.js"></script>

    <style>
        @import url(https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css);

@import url(https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css);


*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
   
}
body{
    position:relative;
}
.main{
    position:relative;
    width: 100%;
    margin: 30px auto;
    display: flex;
    flex-wrap:wrap;
    justify-content: space-between;            
}
.main .card{
    position:relative;
    width: 22%;
    border: 0px solid black;
    border-radius: 15px; 
    margin: 15px; 
    margin-bottom:18px;
    transition:0.5s;
}
.main .card:hover{
    position:relative;
    width: 22%;
    border: 1px solid lightgray;
    border-radius: 15px; 
    margin: 15px; 
}
.main .card .image{
    width: 100%;
    height:300px;
    margin-bottom: 5px;
    overflow: hidden;

}
.main .card .image img{
    position:relative;
    width: 100%;
    height: 100%;
    border: 0px solid black;
    border-radius: 15px;
    object-fit: scale-down;
}
.main .card .infoP{
    align-items: center;
   
}
.title{
    color:black;
    margin:10px;
    font-weight: 500;

}
.main .card .infoP p{
    font-size: 1.2rem;
    margin:10px;

}
.dell {
    font-size:0.7em;
    text-decoration: line-through;
}
.main .card .infoP .rate{
    font-size: 1rem;
    color: grey;
}
.allP h1{
    margin:15px;
    font-weight: bold; 
}
.line hr{
    width:90%;
    position:relative;
    top:50%;
    left:50%;
    transform:translate(-50% ,-50%);
    color:black;
    margin-top:20px;
    margin-bottom:20px;
}

a{
    text-decoration:none;
    font-weight: bold;
    color:black;

}

.logo{
    width:9%;
    height: 110px;
    cursor: pointer;
}
.logo img {
    width: 100%;
    height: 100%;
    background-size: cover;
    border-radius: 15px;
    background-position:center;
}
header{
    display: flex;
    background-color: white;
    justify-content:space-between;
    align-items:center;
    border: none;
    border-bottom:1px solid grey;
    margin-bottom:20px;
    box-shadow: 0px 1px 6px  grey;
}
.nav-side  {
    margin-right:30px;
    position: relative;
}
.line {
    position: absolute;
    bottom: -2px;
    left: 0;
    width: 0;
    height: 2px;
    background-color: #ff0000;
    transition: width 0.3s ease-out;
}

.iconshop {
    display:flex;
    justify-content:end ;
}
.iconshop i {
    padding:15px;
    margin-left:15px;
    margin-right:15px;
    cursor: pointer;


}
.nav-side a {
    position: relative;
    z-index: 1;
    margin-right:10px;
    text-decoration: none;
    color: #000000;
    padding: 0 10px;
}

.nav-side a:hover .line {
    width: 100%;
}
.nav-side  i{
    padding:15px;
    margin:2px;
    cursor: pointer;
    font-size:1.3em;
}
.nav-side  i:hover{
    color: #528779
}
.nav-side  span{
    background: red;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    color: #fff;
    position: absolute;
    top: 0px;
    left: 96%;
    padding:0px 5px;
}
/* add to cart css */
.cart{
    position: fixed;
    top:0;
    left:100%;
    width: 500px;
    background-color: #453E3B;
    height: 100vh;
    transition: 0.5s;
    overflow-y: auto;
}
.active .cart{
    left: calc(100% - 500px);
}
.active .container{
    transform: translateX(-200px);
}
.active header{
    transform: translateX(-200px);
}
.cart h1{
    justify-content:center;
    color: white;
    font-weight: 100;
    margin: 0;
    padding: 0 20px;
    height: 80px;
    display: flex;
    align-items: center;
}
.cart .checkOut{
    position: fixed;
    bottom: 0;
    width:40.2%;
    display: grid;
    grid-template-columns: repeat(2, 1fr);

}
.cart .closeShopping{
    margin:-9px;
    padding:25px;
}
.cart .closeShopping i{
    font-size:1.2em;
}
.cart .checkOut div{
    background-color: #e8f25e;
    width: 100%;
    height: 70px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-weight: bold;
    cursor: pointer;
}
.cart .checkOut div:nth-child(2){
    background-color: grey;
    color: #fff;
}
.cart .checkOut div:nth-child(2):hover{
    background-color: #00D100;
    color: black;
}
.listCard li{
            display: grid;
            grid-template-columns: 100px repeat(3, 1fr);
            color: black;
            row-gap: 10px;
            margin:15px;
        }
        .listCard li div{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .listCard li img{
            width: 100%;
        }
        .listCard li .sell{
            margin-left:10px;
            margin-right:20px;

        }
   
        .listCard li button{
            background-color: grey;
            border: none;
            padding:5px 10px;
            margin: 0 10px;
            font-size:1em;
            cursor: pointer;
        }
        .listCard .count{
            margin: 0 10px;
        }

        .ShowMore{
            width:100%;
            display:flex;
            justify-content:center;
            margin-bottom:2.5%;
        }
        .ShowMore .btn-show-more {
            width:15%;
            height: 40px;
            border:1px solid white;           
            border-radius:15px;
            cursor: pointer;
            font-size:1em;
            background:grey

            
        }
        .ShowMore .btn-show-more:hover{
            color:white;
            background:black
        }
/*la fin  add to cart css */    </style>
</head>
<body>
    <header>
        <div class="logo">
            <img src="imagee/logo.png" alt="logo">
        </div>

        <nav class="nav-side">
            <a href="clientpage.php">
                Home
                <div class="line"></div>
            </a>

            <a href="#men">
                Men
                <div class="line"></div>
            </a>

            <a href="#">
                Women
                <div class="line"></div>
            </a>

            <a href="#Featured Products">
                Featured Products
                <div class="line"></div>
            </a>

            <a href="contact.php">
                Contact As
                <div class="line"></div>
            </a>

            <i class="fa-solid fa-user"></i>
            <i id="opencard" class="fa-solid fa-cart-shopping"></i>
            <span id="quantity">0</span>
        </nav>
    </header>

    <div class="container">
        <div class="allP">
            <h1 id="FeaturedProducts">Featured Products</h1>
        </div>

        <div class="main" id="articles-container">
            <?php 
                while ($donnees = $req->fetch()){
            ?>
                <div class="card">
                    <div class="image">
                        <img src="imagee/<?php echo $donnees["image"]; ?>" alt="image product">
                    </div>
                    <div class="infoP">
                        <p class="title"><?php echo $donnees["title"]; ?></p>
                        <p class="prixx"><?php echo $donnees["prix"]; ?><span class="prixx">dh</span></p>
                        <del class="dell"><?php echo $donnees["khasm"]; ?></del>
                        <p class="rate">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </p>
                        <div class="iconshop">
                            <!-- <form action="" method="post" > -->
                                <button  class="addto" name="ddd" data-idproduct="<?=$donnees['idproduct']?>">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                </button>
                            <!-- </form> -->
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

        <div class="ShowMore">
            <button id="show-more-btn" class="btn-show-more">Show More</button>
        </div>
        
        <script>
        $(document).ready(function() {
            var offset = 4;

            $('#show-more-btn').on('click', function() {
                $.ajax({
                    url: 'fetch_articles.php',
                    type: 'GET',
                    data: { offset: offset },
                    dataType: 'json',
                    success: function(response) {
                        if (response.length > 0) {
                            var articlesHtml = '';

                            response.forEach(function(article) {
                                articlesHtml += '<div class="card">';
                                articlesHtml += '<div class="image">';
                                articlesHtml += '<img src="imagee/' + article.image + '" alt="image product">';
                                articlesHtml += '</div>';
                                articlesHtml += '<div class="infoP">';
                                articlesHtml += '<p class="title">' + article.title + '</p>';
                                articlesHtml += '<p class="prixx">' + article.prix + ' <del class="dell">' + article.khasm + '</del></p>';
                                articlesHtml += '<p class="rate">';
                                articlesHtml += '<i class="fa-solid fa-star"></i>';
                                articlesHtml += '<i class="fa-solid fa-star"></i>';
                                articlesHtml += '<i class="fa-solid fa-star"></i>';
                                articlesHtml += '<i class="fa-solid fa-star"></i>';
                                articlesHtml += '<i class="fa-solid fa-star-half"></i>';
                                articlesHtml += '</p>';
                                articlesHtml += '</div>';
                                articlesHtml += '<div class="line"><hr></div>';
                                articlesHtml += '<div class="iconshop">';
                                articlesHtml += '<button class="addto" name="ddd" data-idproduct="' + article.idproduct + '">';
                                articlesHtml += '<i class="fa-solid fa-cart-shopping"></i>';
                                articlesHtml += '</button>';
                                articlesHtml += '</div>';
                                articlesHtml += '</div>';
                            });

                            $('#articles-container').append(articlesHtml);
                            offset += response.length;
                        } else {
                            $('#show-more-btn').hide();
                        }
                    },
                    error: function() {
                        console.log('Error occurred while fetching articles.');
                    }
                });
            });
            $(document).on('click', '.addto', function() {
                var idProduct = $(this).data('idproduct');
                console.log('idProduct:', idProduct);

                // Send the idProduct value to PHP using AJAX
                $.ajax({
                    url: 'addtocarddd.php',
                    type: 'POST',
                    data: { idproduct: idProduct },
                    dataType: 'json',
                    success: function(response) {
                        console.log('Response:', response);
                        var data = response;;
                        for (var i = 0; i < data.length; i++) {
                            var product = data[i];
                            var image = product.image;
                            var title = product.title;
                            var prix = product.prix;
                            var isProductInCart = false;

                            $('.listCard li').each(function() {
                                if ($(this).find('.title').text() === title) {
                                    isProductInCart = true;
                                    return false;
                                }
                            });

                            if (!isProductInCart) {
                                var productElement = $('<li>');
                                productElement.append('<div class="image"><img src="imagee/' + image + '"></div>');
                                productElement.append('<div class="title">' + title + '</div>');
                                productElement.append('<div class="prix productPrice">' + prix + 'dh</div>'); // Add 'productPrice' class
                                productElement.append('<div><label for="">size:</label><select name="sel" id="sel" class="sell"><option value="40">39</option><option value="40">39</option><option value="40">40</option><option value="40">41</option><option value="40">42</option><option value="40">43</option></select><button class="minus">-</button><div class="count">1</div><button class="plus">+</button></div>');

                                $('.listCard').append(productElement);
                                totalQuantity += 1; // Update total quantity
                                $('#quantity').text(totalQuantity);
                                updateTotalPrice(); // Update total price
                            }
                        }

                    },
                    error: function() {
                        console.log('Error occurred while adding to cart.');
                    }
                });
            });
            function updateTotalPrice() {
                var totalPrice = 0;
                $('.listCard li').each(function() {
                    var productPrice = parseInt($(this).find('.productPrice').text());
                    var productQuantity = parseInt($(this).find('.count').text());
                    totalPrice += productPrice * productQuantity;
                });
                $('.total').text(totalPrice);
            }
   
        });

    </script>
 
    </div>
   <script>
        var totalQuantity = 0;
        var totalPrice = 0;

        $(document).ready(function() {
            $('.addto').click(function() {
                var idproduct = $(this).data('idproduct');

                $.ajax({
                    type: 'POST',
                    url: 'addtocarddd.php',
                    data: { idproduct: idproduct },
                    success: function(response) {
                        var data = JSON.parse(response);
                        for (var i = 0; i < data.length; i++) {
                            var product = data[i];
                            var image = product.image;
                            var title = product.title;
                            var prix = product.prix;
                            var isProductInCart = false;

                            $('.listCard li').each(function() {
                                if ($(this).find('.title').text() === title) {
                                    isProductInCart = true;
                                    return false;
                                }
                            });

                            if (!isProductInCart) {
                                var productElement = $('<li>');
                                productElement.append('<div class="image"><img src="imagee/' + image + '"></div>');
                                productElement.append('<div class="title">' + title + '</div>');
                                productElement.append('<div class="prix productPrice">' + prix + 'dh</div>'); // Add 'productPrice' class
                                productElement.append('<div><label for="">size:</label><select name="sel" id="sel" class="sell"><option value="40">39</option><option value="40">39</option><option value="40">40</option><option value="40">41</option><option value="40">42</option><option value="40">43</option></select><button class="minus">-</button><div class="count">1</div><button class="plus">+</button></div>');

                                $('.listCard').append(productElement);
                                totalQuantity += 1; // Update total quantity
                                $('#quantity').text(totalQuantity);
                                updateTotalPrice(); // Update total price
                            }
                        }
                    }
                });
            });

            $(document).on('click', '.minus', function() {
                var countElement = $(this).next('.count');
                var count = parseInt(countElement.text());

                if (count > 1) {
                    countElement.text(count - 1);
                    updateTotalPrice(); // Update total price
                } else {
                    var productElement = $(this).closest('li');
                    productElement.remove();
                    totalQuantity -= 1; // Decrease total quantity
                    $('#quantity').text(totalQuantity); // Update the displayed count
                    updateTotalPrice(); // Update total price
                }
            });

            $(document).on('click', '.plus', function() {
                var countElement = $(this).prev('.count');
                var count = parseInt(countElement.text());
                countElement.text(count + 1);
                updateTotalPrice(); // Update total price
            });

            function updateTotalPrice() {
                var totalPrice = 0;
                $('.listCard li').each(function() {
                    var productPrice = parseInt($(this).find('.productPrice').text());
                    var productQuantity = parseInt($(this).find('.count').text());
                    totalPrice += productPrice * productQuantity;
                });
                $('.total').text(totalPrice);
            }
        });

</script>


    <div class="cart">
        <div class="closeShopping"><i class="fa-solid fa-circle-xmark"></i></div>
        <h1>Card</h1>
       
        <ul class="listCard">

        </ul>
        
        <div class="checkOut">

            <div class="total">0</div>
            <div>CheckOut</div>
        </div>
    </div>


        <script src="js/AddToCardt.js"></script>

</body>