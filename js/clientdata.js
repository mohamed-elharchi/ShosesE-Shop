
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
                    $('.listCard li').each(function(index) {
                        var productPrice = parseInt($(this).find('.productPrice').text());
                        var productQuantity = parseInt($(this).find('.count').text());
                        var productAmount = productPrice * productQuantity;

                        // selectedProducts.forEach(function(idproduct) {
                        //     productData.forEach(function(product) {
                        //         product.idproduct = idproduct;
                        //     });
                        // });

                        var product = { 
                            idproduct: selectedProducts[index],
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
                            var returnedProductData = response.productData;
                            console.log(returnedProductData);
                    
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

