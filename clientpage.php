<?php 
    include_once "connexion.php" ;

    $sql = "SELECT * FROM article WHERE typee='FeaturedProducts' LIMIT 4";
    $req=$db->prepare($sql);
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
    <!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> -->

    <link rel="stylesheet" href="css/styleee.css">
</head>
<body>
    <div class="first_off">
    <?php
                $sql="SELECT * FROM discount WHERE `when` = 'header' ORDER BY id DESC LIMIT 1";
                $reqq=$db->prepare($sql);
                $reqq->execute();
               while($donnees=$reqq->fetch()){

            ?>
        <p> <?php  echo $donnees["title"] ?> </p>
        <?php }?>
    </div>
    <header id="headerr">
        <div class="logo">
            <h1 class="logo-text"><span>U</span>rban <span>S</span>trides</h1>
            <!-- <img src="imagee/logo.png" alt="logo"> -->
        </div>

        <nav class="nav-side">
            <div class="linksMenu">
                <a href="clientpage.php" class="navlink" >
                    Home
                    <div class="line"></div>
                </a>

                <!-- <a href="#men" class="navlink">
                    Men
                    <div class="line"></div>
                </a> -->

                <a href="#Unique Shoes" class="navlink">
                    Unique Shoes
                    <div class="line"></div>
                </a>

                <a href="#Featured Products" class="navlink" >
                    Best Seller
                    <div class="line"></div>
                </a>


                <!-- <a href="contact.php" class="navlink">
                    Contact As
                    <div class="line"></div>
                </a>
                 -->
            </div>
           
  
        <div class="menuu">
            <span class="barr"></span>
            <span class="barr"></span>
            <span class="barr"></span>
        </div>

    </nav>
        <div class="nav-icon">
           
            <i class="fa-solid fa-magnifying-glass search__btn"  id="search-btn"></i>
            <span class="line3amodi"></span>
            <i class="fa-solid fa-user"></i>
            <i id="opencard" class="fa-solid fa-cart-shopping"></i>
            <span id="quantity" class="quantity">0</span>
        </div>
    </header>
    <div class="searchh" id="searchh">
        <div class="search" id="search">
            <h3>Urban Strides</h3>
            <form action="" class="search__form">
                <i class="fa-solid fa-magnifying-glass search__icon"></i>
                <input type="search" placeholder="search bar" class="search__input">
            </form>
            <i class="fa-solid fa-x search__close" id="search-close" ></i>
        </div>
        <!-- <div class="search-items">
            <div class="search_card">
                <img src="img/p3.png" alt="">
                <h3>mohamed elarchi</h3>
                
            </div>
            <div class="search_card">
                <img src="img/p3.png" alt="">
                <h3>mohamed elarchi</h3>
                
            </div>
            <div class="search_card">
                <img src="img/p3.png" alt="">
                <h3>mohamed elarchi</h3>
                
            </div>
            <div class="search_card">
                <img src="img/p3.png" alt="">
                <h3>mohamed elarchi</h3>
                
            </div>
         
        </div> -->
    </div>
<?php 
            $sql="SELECT * FROM firstpage ORDER BY id DESC LIMIT 1";
            $reqq=$db->prepare($sql);
            $reqq->execute();
           while($donnees=$reqq->fetch()){

        ?>
    <div class="firstPage" style="background-image: url('<?php echo $donnees["homeImage"]; ?>');">
        
        <div class="offside1" >
            <h1><?php  echo $donnees["title"] ?></h1>
            <h4><?php  echo $donnees["subTitle"] ?></h4>
            <p><?php  echo $donnees["description"] ?></p>
            <div class='newp'>
                <div class="newpi1">
                    <img src="<?php  echo $donnees["imageOne"] ?>" alt="">
                </div>
                <div class="newpi1">
                    <img src="<?php  echo $donnees["imageTwo"] ?>" alt="">
                </div>
            </div>
            <button class="newpBtn">SHOP HERE</button>
        </div>
        <div class="offside2">
            <div class="aa1">
                <i class="fa-solid fa-shoe-prints"></i>
                <h3><?php  echo $donnees["txt1"] ?></h3>
            </div>
            <div class="aa2">
                <i class="fa-solid fa-feather"></i>
                <h3><?php  echo $donnees["txt2"] ?></h3>
            </div>
        </div>
        <?php }?>
    </div>
    

    <script>
    window.onscroll = function() { scrollFunction() };

    function scrollFunction() {
      var navbar = document.getElementById("headerr");

      if (document.body.scrollTop > 40 || document.documentElement.scrollTop > 40) {
        navbar.classList.add("fixed");
        navbar.style.top = "0";
      } else {
        navbar.classList.remove("fixed");
        navbar.style.top = "50px"; /* Move it back above the viewport */
      }
    }


  </script>

        <div class="siteInfo">
            <div class="siteInfo_elemnt">
                <i class="fa-solid fa-circle-check"></i>
                <h5>ORIGINAL PRODUCT</h5>
            </div>
            <div class="siteInfo_elemnt">
                <i class="fa-solid fa-regular fa-bag-shopping"></i>
                <h5>INTERESTING PROMO & DEALS</h5>
            </div>
            <div class="siteInfo_elemnt">
                <i class="fa-solid fa-hand-holding-dollar"></i>
                <h5>30 DAYS MONEY-BACK GUARANTEE</h5>
            </div>
            <div class="siteInfo_elemnt">
                <i class="fa-solid fa-award"></i>
                <h5>EXPEREINCED SELLER</h5>
            </div>
        </div>
<!-- contenttttttttttttttttttttttttttttttttttttttt -->
                

    <div class="container"> <!-- div li jama3 kolxi ma3ada pop up li kaynin-->

        <!-- slid1 dfddddddddddddddddddddddddddddddddddddddddddddddd -->

        <div class="firstSlid">
            <!-- <div class="leftside">
                <img src="imagee/bb.jpg" alt="">
                <h1>Stylish shoes for <br> Women</h1>
            </div>
            <div class="rigthside">
                <img src="imagee/c.jpg" alt="">
                <h1 class="Sport">Sports Wear</h1>

                <img src="imagee/a.jpg" alt="">
                <h1 class="Fashion">Fashion Shoes</h1>

            </div> -->
            <div class="Categories">
                <div class="leftLine"></div>
                <h2><pre>  </pre> Shoes Categories <pre>  </pre></h2>
                <div class="rightLine"></div>
                
            </div>
            <div class="cateImage">
                <img src="img/mens.png" alt="img1" >
                <img src="img/womens.png" alt="img2" >
                <img src="img/1.7.jpg" alt="img3" >
            </div>
            <button class="menBTN">MEN<i class="fa-solid fa-arrow-right"></i></button>
            <button class="womenBTN">WOMEN<i class="fa-solid fa-arrow-right"></i></button>
            <button class="sportBTN">SPORT<i class="fa-solid fa-arrow-right"></i></button>
        </div>

        <!-- discount dfddddddddddddddddddddddddddddddddddddddddddddddd -->

        <!-- <div class="offer">
            <?php
            //    $sql="SELECT * from discount  ORDER BY id DESC LIMIT 1";
            //    $reqq=$db->prepare($sql);
            //    $reqq->execute();
            //   while($donnees=$reqq->fetch()){

            ?>
            <div class="oftxt" >
            
                <h1><?php // echo $donnees["title"] ?></h1>
                <h3><?php // echo $donnees["subtitle"] ?></h3>
            </div>
            <?php // } ?>
            <div class="ofbtn">
                <a href="contact.php"><button class="bttn">Email Me</button></a>
            </div>

        </div> -->
        <div class="hotproduct">
            
            
            <div class="H_P_Cart">
                    <img src="img/p1.png" alt="">
                    <h3 class="title">NIKA – SKORTA S BLACK</h3>
                    <h3 class="prix">$20.00</h3>
                    <button>SELECT OPTION</button>
            </div>
            <div class="H_P_Cart">
                    <img src="img/p2.png" alt="">
                    <h3 class="title">NIKA – SKORTA S BLACK</h3>
                    <h3 class="prix">$20.00</h3>
                    <button>SELECT OPTION</button>
            </div>
            <div class="H_P_Cart">
                    <img src="img/p3.png" alt="">
                    <h3 class="title">NIKA – SKORTA S BLACK</h3>
                    <h3 class="prix">$20.00</h3>
                    <button>SELECT OPTION</button>
            </div>
            <div class="H_P_Cart">
                    <img src="img/p4.png" alt="">
                    <h3 class="title">NIKA – SKORTA S BLACK</h3>
                    <h3 class="prix">$20.00</h3>
                    <button>SELECT OPTION</button>
            </div>
                
                
            
            <div class="hotPside">
                    <h2 class="tttppp">HOT PRODUCT. <span> </span><i class="fa-solid fa-fire"></i></h2>
                    <p>Lorem ipsum dolor sit amet,
                        consectetur adipiscing elit.
                        Ut elit tellus, luctus nec
                        ullamcorper mattis, pulvinar dapibus 
                        leo.
                    </p>
                    <button>SEE MORE <i class="fa-solid fa-arrow-right"></i></button>
                </div>
        </div>

                <!-- Featured Products dfddddddddddddddddddddddddddddddddddddddddddddddd -->

        <div class="allP">
            <h1 id="Featured Products">Best Seller</h1>
        </div>

        <div class="main" id="articles-container">
            <?php 
                while($donnees=$req->fetch()){
            ?>
            <div class="card">
                <div class="image">
                    <img src="imagee/<?php echo $donnees["image"] ?>" alt="image product" >
                </div>

                <div class="infoP">
                        <p class="title"><?php echo $donnees["title"]; ?></p>
                        <p class="prixx"><?php echo $donnees["prix"]; ?><span class="prixx">$</span><span><del class="dell"><?php echo $donnees["khasm"]; ?></del></span></p>
                        
                        <p class="rate">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </p>
                        <div class="iconshop">
                                <button  class="addto" name="ddd" data-idproduct="<?=$donnees['idproduct']?>">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                </button>
                        </div>
                    </div>

            </div>
            <?php   } ?>

        </div>

        <div class="ShowMore">
            <button id="show-more-btn" class="btn-show-more">Show More <i class="fa-solid fa-arrow-down"></i></button>
        </div>
        <div id="loading-spinner" class="spinner hidden">
            
        </div>
        

        
        <script>
                // $(document).ready(function() {
            // var offset = 4;

            // $('#show-more-btn').on('click', function() {
            //     $.ajax({
            //         url: 'fetch_articles.php',
            //         type: 'GET',
            //         data: { offset: offset },
            //         dataType: 'json',
            //         success: function(response) {
            //             console.log(response)
            //             if (response.length > 0) {
            //                 var articlesHtml = '';

            //                 response.forEach(function(article) {
            //                     console.log(article)
            //                     articlesHtml += '<div class="card">';
            //                     articlesHtml += '<div class="image">';
            //                     articlesHtml += '<img src="imagee/' + article.image + '" alt="image product">';
            //                     articlesHtml += '</div>';
            //                     articlesHtml += '<div class="infoP">';
            //                     articlesHtml += '<p class="title">' + article.title + '</p>';
            //                     articlesHtml += '<p class="prixx">' + article.prix + ' <del class="dell">' + article.khasm + '</del></p>';
            //                     articlesHtml += '<p class="rate">';
            //                     articlesHtml += '<i class="fa-solid fa-star"></i>';
            //                     articlesHtml += '<i class="fa-solid fa-star"></i>';
            //                     articlesHtml += '<i class="fa-solid fa-star"></i>';
            //                     articlesHtml += '<i class="fa-solid fa-star"></i>';
            //                     articlesHtml += '<i class="fa-solid fa-star-half"></i>';
            //                     articlesHtml += '</p>';
            //                     articlesHtml += '</div>';
            //                     articlesHtml += '<div class="line"><hr></div>';
            //                     articlesHtml += '<div class="iconshop">';
            //                     articlesHtml += '<button class="addto" name="ddd" data-idproduct="' + article.idproduct + '">';
            //                     articlesHtml += '<i class="fa-solid fa-cart-shopping"></i>';
            //                     articlesHtml += '</button>';
            //                     articlesHtml += '</div>';
            //                     articlesHtml += '</div>';
            //                 });

            //                 $('#articles-container').append(articlesHtml);
            //                 offset += response.length;
            //             } else {
            //                 $('#show-more-btn').hide();
            //             }
            //         },
            //         error: function(error) {
            //             console.log(error);
            //         }
            //     });
            // });
            // var idproduct
            // $(document).on('click', '.addto', function() {
            //     var clickedProductId  = $(this).data('idproduct');

            //     // Send the idProduct value to PHP using AJAXxxxxxxxxxxxx
            //     $.ajax({
            //         url: 'addtocarddd.php',
            //         type: 'POST',
            //         data: { idproduct: clickedProductId },
            //         dataType: 'json',
            //         success: function(response) {
            //             console.log('Response:', response);
            //             var data = response;;
            //             for (var i = 0; i < data.length; i++) {
            //                 var product = data[i];
            //                 var image = product.image;
            //                 var title = product.title;
            //                 var currentIdProduct = product.idproduct;
            //                 var prix = product.prix;
            //                 var isProductInCart = false;

            //                 $('.listCard li').each(function() {
            //                     if ($(this).find('.title').text() === title) {
            //                         isProductInCart = true;
            //                         return false;
            //                     }
            //                 });

            //                 if (!isProductInCart) {
            //                     var productElement = $('<li>');
            //                     productElement.append('<div class="image"><img src="imagee/' + image + '"></div>');
            //                     productElement.append('<div class="title">' + title + '</div>');
            //                     productElement.append('<div class="prix productPrice">' + prix + '$</div>'); 
            //                     productElement.append('<div><label for="">size:</label><select name="sel" id="sel" class="sell"><option value="39">39</option><option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option></select><button class="minus">-</button><div class="count">1</div><button class="plus">+</button></div>');

            //                     $('.listCard').append(productElement);
            //                     totalQuantity += 1; 
            //                     $('#quantity').text(totalQuantity);
            //                     updateTotalPrice();
            //                 }
            //                 idproduct = currentIdProduct;

            //             }

            //         },
            //         error: function() {
            //             console.log('Error occurred while adding to cart.');
            //         }
            //     });
            // });
            // function updateTotalPrice() {
            //     var totalPrice = 0;
            //     $('.listCard li').each(function() {
            //         var productPrice = parseInt($(this).find('.productPrice').text());
            //         var productQuantity = parseInt($(this).find('.count').text());
            //         totalPrice += productPrice * productQuantity;
            //     });
            //     $('.total').text(totalPrice);
            // }
   
        // });

    </script>

 
        <!-- slid2 dfddddddddddddddddddddddddddddddddddddddddddddddd -->

        <div class="collection">
            
            <div class="side1">
                <img src="img/nike-just-do-it.jpg" alt="">
                <div class="leftSide">
                    <h5>new arrivals</h5>
                    <h3>Air Jordan 1s</h3>
                    <button>SHOP</button>
                </div>
                
            </div>
            <div class="side2">
                <img src="img/nike-just-do-it (1).jpg" alt="">
                <div class="rightSide">
                    <h5>hook fleece</h5>
                    <h3>Air Taitan</h3>
                    <button>SHOP</button>
                </div>
              
            </div>

        </div>


        <!-- men shoes dfddddddddddddddddddddddddddddddddddddddddddddddd -->

        <div class="allP">
            <h1 id="men">Men Shoes</h1>
        </div>
        <?php 
        $sql = "SELECT * FROM article WHERE typee='Men' LIMIT 4";
        $req=$db->prepare($sql);
        $req->execute();
        ?>
        <div class="main" id="articles-containerMen">
            <?php 
                while($donnees=$req->fetch()){
            ?>
            <div class="card">
                <div class="image">
                    <img src="imagee/<?php echo $donnees["image"] ?>" alt="image product" >
                </div>

                <div class="infoP">
                    
                    <p class="title"><?php echo $donnees["title"] ?></p>
                    <p class="prixx"><?php echo $donnees["prix"]  ?><span class="prixx" >$</span></p> 
                    <del class="dell"><?php echo $donnees["khasm"]  ?></del>
                    <p class="rate">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half"></i>
                    </p> 
                </div>
                <div class=line>
                    <hr>
                </div>
                <div class="iconshop">
                    <button  class="addto" name="ddd" data-idproduct="<?=$donnees['idproduct']?>">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </button>                
                </div>

            </div>
            <?php   } ?>

        
        </div>
        <div class="ShowMore">
            <button id="show-more-btn-men" class="btn-show-more">Show More  <i class="fa-solid fa-arrow-down"></i></button>
        </div>
        <div id="loading-spinne" class="spinner hidden">
            
            </div>
        <script>
// $(document).ready(function() {
//             var offset = 4;

//             $('#show-more-btn-men').on('click', function() {
//                 $.ajax({
//                     url: 'fetch_articlesMen.php',
//                     type: 'GET',
//                     data: { offset: offset },
//                     dataType: 'json',
//                     success: function(response) {
//                         if (response.length > 0) {
//                             var articlesHtml = '';
//                             response.forEach(function(article) {
//                                 articlesHtml += '<div class="card">';
//                                 articlesHtml += '<div class="image">';
//                                 articlesHtml += '<img src="imagee/' + article.image + '" alt="image product">';
//                                 articlesHtml += '</div>';
//                                 articlesHtml += '<div class="infoP">';
//                                 articlesHtml += '<p class="title">' + article.title + '</p>';
//                                 articlesHtml += '<p class="prixx">' + article.prix + ' <del class="dell">' + article.khasm + '</del></p>';
//                                 articlesHtml += '<p class="rate">';
//                                 articlesHtml += '<i class="fa-solid fa-star"></i>';
//                                 articlesHtml += '<i class="fa-solid fa-star"></i>';
//                                 articlesHtml += '<i class="fa-solid fa-star"></i>';
//                                 articlesHtml += '<i class="fa-solid fa-star"></i>';
//                                 articlesHtml += '<i class="fa-solid fa-star-half"></i>';
//                                 articlesHtml += '</p>';
//                                 articlesHtml += '</div>';
//                                 articlesHtml += '<div class="line"><hr></div>';
//                                 articlesHtml += '<div class="iconshop">';
//                                 articlesHtml += '<button class="addto" name="ddd" data-idproduct="' + article.idproduct + '">';
//                                 articlesHtml += '<i class="fa-solid fa-cart-shopping"></i>';
//                                 articlesHtml += '</button>';
//                                 articlesHtml += '</div>';
//                                 articlesHtml += '</div>';
//                             });
//                             $('#articles-containerMen').append(articlesHtml);
//                             offset += response.length;
//                         } else {
//                             $('#show-more-btn-men').hide();
//                         }
//                     },
//                     error: function() {
//                         console.log('Error occurred while fetching articles.');
//                     }
//                 });
//             });
//         });
    </script>
        <!-- Unique Shoes dfddddddddddddddddddddddddddddddddddddddddddddddd -->

        <div class="allP">
            <h1 id="Unique Shoes">Unique Shoes</h1>
        </div>
        <div class="wrapper">
            <i id="left" class="fa-solid fa-angle-left"></i>
            <ul class="carousel">

            <?php 

                $sql = "SELECT * FROM article WHERE typee='unique'";
                $res=$db->prepare($sql);
                $res->execute();
                while($donnees=$res->fetch()){
                ?>
                <li class="card">
                    <div class="img"><img src="imagee/<?php echo $donnees["image"] ?>" alt="img" draggable="false"></div>
                </li>
                <?php   } ?>
                
            </ul>
            <i id="right" class="fa-solid fa-angle-right"></i>
            </div>

 

    </div>

    <script>
        // var totalQuantity = 0;
        // var totalPrice = 0;

        // $(document).ready(function() {
            // var idproduct;
            // $('.addto').click(function() {
            //     var clickedProductId = $(this).data('idproduct');

            //     $.ajax({
            //         type: 'POST',
            //         url: 'addtocarddd.php',
            //         data: { idproduct: clickedProductId },
            //         success: function(response) {
            //             var data = JSON.parse(response);
            //             for (var i = 0; i < data.length; i++) {
            //                 var product = data[i];
            //                 var image = product.image;
            //                 var title = product.title;
            //                 var currentIdProduct = product.idproduct;
            //                 var prix = product.prix;

            //                 var isProductInCart = false;
            //                 $('.listCard li').each(function() {
            //                     if ($(this).find('.title').text() === title) {
            //                         isProductInCart = true;
            //                         return false;
            //                     }
            //                 });

            //                 if (!isProductInCart) {
            //                     var productElement = $('<li>');
            //                     productElement.append('<div class="image"><img src="imagee/' + image + '"></div>');
            //                     productElement.append('<div class="title">' + title + '</div>');
            //                     productElement.append('<div class="prix productPrice">' + prix + '$</div>'); 
            //                     productElement.append('<div><label for="">size:</label><select name="sel" id="sel" class="sell"><option value="39">39</option><option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option></select><button class="minus">-</button><div class="count">1</div><button class="plus">+</button></div>');

            //                     $('.listCard').append(productElement);
            //                     totalQuantity += 1; 
            //                     $('#quantity').text(totalQuantity);
            //                     updateTotalPrice(); 
            //                 }
            //                 idproduct = currentIdProduct;
            //             }
            //         }
            //     });
            // });

            // $(document).on('click', '.minus', function() {
            //     var countElement = $(this).next('.count');
            //     var count = parseInt(countElement.text());

            //     if (count > 1) {
            //         countElement.text(count - 1);
            //         updateTotalPrice(); 
            //     } else {
            //         var productElement = $(this).closest('li');
            //         productElement.remove();
            //         totalQuantity -= 1; 
            //         $('#quantity').text(totalQuantity); 
            //         updateTotalPrice(); 
            //     }
            // });

            // $(document).on('click', '.plus', function() {
            //     var countElement = $(this).prev('.count');
            //     var count = parseInt(countElement.text());
            //     countElement.text(count + 1);
            //     updateTotalPrice(); 
            // });

            // function updateTotalPrice() {
            //     var totalPrice = 0;
            //     $('.listCard li').each(function() {
            //         var productPrice = parseInt($(this).find('.productPrice').text());
            //         var productQuantity = parseInt($(this).find('.count').text());
            //         totalPrice += productPrice * productQuantity;
            //     });
            //     $('.total').text(totalPrice);
            // }
        // });
</script>
        <!-- women Shoes fffffffffffffffffffffffffffffffffffffffffffffff -->
        <div class="allP">
            <h1 id="Women">Women Shoes</h1>
        </div>
        <?php 
        $sql = "SELECT * FROM article WHERE typee='Women' LIMIT 4";
        $req=$db->prepare($sql);
        $req->execute();
        ?>
        <div class="main" id="articles-containerWomen">
            <?php 
                while($donnees=$req->fetch()){
            ?>
            <div class="card">
                <div class="image">
                    <img src="imagee/<?php echo $donnees["image"] ?>" alt="image product" >
                </div>

                <div class="infoP">
                    
                    <p class="title"><?php echo $donnees["title"] ?></p>
                    <p class="prixx"><?php echo $donnees["prix"]  ?><span class="prixx" >$</span></p> 
                    <del class="dell"><?php echo $donnees["khasm"]  ?></del>
                    <p class="rate">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half"></i>
                    </p> 
                </div>
                <div class=line>
                    <hr>
                </div>
                <div class="iconshop">
                    <button  class="addto" name="ddd" data-idproduct="<?=$donnees['idproduct']?>">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </button>                
                </div>

            </div>
            <?php   } ?>

        
        </div>


        <div class="ShowMore" id='show-more'>
            <button id="show-more-btn-Women" class="btn-show-more">Show More  <i class="fa-solid fa-arrow-down"></i></button>
        </div>
        <div id="loading-spinn" class="spinner hidden">
            
            </div>
        <script>
// $(document).ready(function() {
//             var offset = 4;

//             $('#show-more-btn-Women').on('click', function() {
//                 $.ajax({
//                     url: 'fetch_articlesWomen.php',
//                     type: 'GET',
//                     data: { offset: offset },
//                     dataType: 'json',
//                     success: function(response) {
//                         if (response.length > 0) {
//                             var articlesHtml = '';

//                             response.forEach(function(article) {
//                                 articlesHtml += '<div class="card">';
//                                 articlesHtml += '<div class="image">';
//                                 articlesHtml += '<img src="imagee/' + article.image + '" alt="image product">';
//                                 articlesHtml += '</div>';
//                                 articlesHtml += '<div class="infoP">';
//                                 articlesHtml += '<p class="title">' + article.title + '</p>';
//                                 articlesHtml += '<p class="prixx">' + article.prix + ' <del class="dell">' + article.khasm + '</del></p>';
//                                 articlesHtml += '<p class="rate">';
//                                 articlesHtml += '<i class="fa-solid fa-star"></i>';
//                                 articlesHtml += '<i class="fa-solid fa-star"></i>';
//                                 articlesHtml += '<i class="fa-solid fa-star"></i>';
//                                 articlesHtml += '<i class="fa-solid fa-star"></i>';
//                                 articlesHtml += '<i class="fa-solid fa-star-half"></i>';
//                                 articlesHtml += '</p>';
//                                 articlesHtml += '</div>';
//                                 articlesHtml += '<div class="line"><hr></div>';
//                                 articlesHtml += '<div class="iconshop">';
//                                 articlesHtml += '<button class="addto" name="ddd" data-idproduct="' + article.idproduct + '">';
//                                 articlesHtml += '<i class="fa-solid fa-cart-shopping"></i>';
//                                 articlesHtml += '</button>';
//                                 articlesHtml += '</div>';
//                                 articlesHtml += '</div>';
//                             });
//                             $('#articles-containerWomen').append(articlesHtml);
//                             offset += response.length;
//                         } else {
//                             $('#show-more-btn-Women').hide();
//                         }
//                     },
//                     error: function() {
//                         console.log('Error occurred while fetching articles.');
//                     }
//                 });
//             });
//         });
    </script>





    <div class="cart">
        <div class="closeShopping"><i class="fa-solid fa-circle-xmark"></i></div>
        <h1>Card</h1>
        <ul class="listCard">
            <h3 class="cartEmpty"></h3>
        </ul>
        <div class="checkOut">

            <div class="total">0</div>
            <div class="dsq">
                <button id="checkOutBtn">Check Out</button>
            </div>
        </div>
    </div>
    <!-- <script>

        var totalQuantity = 0;
        var totalPrice = 0;
        $(document).ready(function() {
            var selectedProducts = [];
            var offset = 4;
            $('#show-more-btn').on('click', function() {
                $.ajax({
                    url: 'fetch_articles.php',
                    type: 'GET',
                    data: { offset: offset },
                    dataType: 'json',
                    success: function(response) {
                        console.log(response)
                        if (response.length > 0) {
                            var articlesHtml = '';

                            response.forEach(function(article) {
                                console.log(article)
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
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
            $(document).on('click', '.addto', function() {
                var clickedProductId  = $(this).data('idproduct');
                idproduct = clickedProductId;

                // Send the idProduct value to PHP using AJAXxxxxxxxxxxxx
                $.ajax({
                    url: 'addtocarddd.php',
                    type: 'POST',
                    data: { idproduct: clickedProductId },
                    dataType: 'json',
                    success: function(response) {
                        console.log('Response:', response);
                        var data = response;;
                        for (var i = 0; i < data.length; i++) {
                            var product = data[i];
                            var image = product.image;
                            var title = product.title;
                            var idproduct = product.idproduct;
                            var prix = product.prix;
                            var isProductInCart = false;
                            if (selectedProducts.indexOf(idproduct) === -1) {
                                selectedProducts.push(idproduct);
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
                                    productElement.append('<div class="prix productPrice">' + prix + '$</div>'); 
                                    productElement.append('<div><label for="">size:</label><select name="sel" id="sel" class="sell"><option value="39">39</option><option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option></select><button class="minus">-</button><div class="count">1</div><button class="plus">+</button></div>');

                                    $('.listCard').append(productElement);
                                    totalQuantity += 1; 
                                    $('#quantity').text(totalQuantity);
                                    updateTotalPrice();
                                }
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
            // 111111111111111111111111111111111111111111111111111111111111111111
            var offset = 4;
            $('#show-more-btn-men').on('click', function() {
                $.ajax({
                    url: 'fetch_articlesMen.php',
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
                            $('#articles-containerMen').append(articlesHtml);
                            offset += response.length;
                        } else {
                            $('#show-more-btn-men').hide();
                        }
                    },
                    error: function() {
                        console.log('Error occurred while fetching articles.');
                    }
                });
            });
            // 222222222222222222222222222222222222222222222222222222222


            $('.addto').click(function() {
                var clickedProductId = $(this).data('idproduct');
                idproduct = clickedProductId;

                $.ajax({
                    type: 'POST',
                    url: 'addtocarddd.php',
                    data: { idproduct: clickedProductId },
                    success: function(response) {
                        var data = JSON.parse(response);
                        for (var i = 0; i < data.length; i++) {
                            var product = data[i];
                            var image = product.image;
                            var title = product.title;
                            var idproduct = product.idproduct;
                            var prix = product.prix;
                            if (selectedProducts.indexOf(idproduct) === -1) {
                                selectedProducts.push(idproduct);

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
                                    productElement.append('<div class="prix productPrice">' + prix + '$</div>'); 
                                    productElement.append('<div><label for="">size:</label><select name="sel" id="sel" class="sell"><option value="39">39</option><option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option></select><button class="minus">-</button><div class="count">1</div><button class="plus">+</button></div>');

                                    $('.listCard').append(productElement);
                                    totalQuantity += 1; 
                                    $('#quantity').text(totalQuantity);
                                    updateTotalPrice(); 
                                }
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
                    updateTotalPrice(); 
                } else {
                    var productElement = $(this).closest('li');
                    productElement.remove();
                    totalQuantity -= 1; 
                    $('#quantity').text(totalQuantity); 
                    updateTotalPrice(); 
                }
            });

            $(document).on('click', '.plus', function() {
                var countElement = $(this).prev('.count');
                var count = parseInt(countElement.text());
                countElement.text(count + 1);
                updateTotalPrice(); 
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
            // 33333333333333333333333333333333333333333333333333333333
            var offset = 4;

$('#show-more-btn-Women').on('click', function() {
    $.ajax({
        url: 'fetch_articlesWomen.php',
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
                $('#articles-containerWomen').append(articlesHtml);
                offset += response.length;
            } else {
                $('#show-more-btn-Women').hide();
            }
        },
        error: function() {
            console.log('Error occurred while fetching articles.');
        }
    });
});

















            // var paypalButtonRendered = false;aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
            $('#checkOutBtn').click(function() {
                console.log("Selected idproducts:", selectedProducts);

                var listItemCount = $('.listCard li').length;
                
                if (listItemCount === 0) {
                    $('.cartEmpty').html('Your cart is empty..');
                } else {
                    var productData = []; 
                    $('.listCard li').each(function() {
                        var productPrice = parseInt($(this).find('.productPrice').text());
                        var productQuantity = parseInt($(this).find('.count').text());
                        var productAmount = productPrice * productQuantity;
                      

                        var product = { 
                            idproduct: selectedProducts,
                            title: $(this).find('.title').text(),
                            image: $(this).find('.image img').attr('src'),
                            prix: $(this).find('.prix').text(),
                            amount: productAmount,
                            quantity: productQuantity,
                            size: $(this).find('#sel').val()
                        };
                        productData.push(product); 
                    });
                    
                    $.ajax({
                        type: 'POST',
                        url: 'checkoutPage.php',
                        data: { 
                            products: JSON.stringify(productData)
                         },
                        success: function(response) {
                            console.log(response);
                            $('#displayDataDiv').html(response);
                            $('.container').hide();
                            $('.allP').hide();
                            $('#articles-containerWomen').hide();
                            $('#show-more').hide();
                            $('.cart').hide();
                            $(document).ready(function() { 
                                $('body.active .container').css("left", "0");
                                $('body.active header').css("transform", "translateX(-0px)"); 
                                $('#opencard').css();                        
                            });


                            // var totalPrice = 0;
                            //     $('.listCard li').each(function() {
                            //         var productPrice = parseInt($(this).find('.productPrice').text());
                            //         var productQuantity = parseInt($(this).find('.count').text());
                            //         totalPrice += productPrice * productQuantity;
                            //     });
                            // if (!paypalButtonRendered) {
                            //     var currencyCode = "USD";
                            //     renderPayPalButton(totalPrice, currencyCode)
                            //     paypalButtonRendered = true;
                            // }

                        }
                    });
                }
            });
        });
    </script> -->

    <div id="displayDataDiv"></div>
    <div id="ppp"></div>

    <!-- <script src="js/addToCardt.js"></script> -->
    <script src="js/Clientdata.js"></script>
    <script src="https://www.paypal.com/sdk/js?client-id=AV-pW4-8aoU0V_VF-eODSI8iGQ1cMQNTd1ETR6sx-uPykg0OLktUN2hDd9EZkeuOPUfBIhQ1K5ZbjE9F"></script>
    <script src="js/scrol-slid.js"></script>
    
    <script src="js/menuTogle.js"></script>
        
</body>
</html>