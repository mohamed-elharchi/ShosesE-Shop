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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="js/jquery-3.7.0.js"></script>

    <style>
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
            border: 1px solid lightgray;
            border-radius: 15px; 
            margin: 15px; 
            transition:0.5s;
        }
        .main .card:hover{
            position:relative;
            width: 23%;
            border: 1px solid lightgray;
            border-radius: 15px; 
            margin: 15px; 
        }
        .main .card .image{
            width: 100%;
            height:300px;
            margin-bottom: 5px;
        }
        .main .card .image img{
            position:relative;

            width: 100%;
            height: 100%;
            border: 0px solid black;
            border-radius: 15px;
            object-fit: cover;
        }
        .main .card .infoP{
            align-items: center;
           
        }
        .title{
            color:blue;
            margin:15px;
            font-weight: bold;

        }
        .main .card .infoP p{
            font-size: 1.3rem;
            margin:15px;

        }
        .dell {
            font-size:0.7em;
            text-decoration: line-through;
        }
        .main .card .infoP .rate{
            font-size: 1rem;
            color: gold;
        }
    </style>
</head>
<body>
    <div class="main" id="articles-container">
    <?php 
                while($donnees=$req->fetch()){
            ?>
            <div class="card">
                <div class="image">
                    <img src="imagee/<?php echo $donnees["image"] ?>" alt="image product" >
                </div>

                <div class="infoP">
                    
                    <p class="title"><?php echo $donnees["title"] ?></p>
                    <p class="prixx"><?php echo $donnees["prix"]  ?> <del class="dell"><?php echo $donnees["khasm"]  ?></del></p>
                    <p class="rate">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </p> 
                </div>
                <div class=line>
                    <hr>
                </div>
                <div class="iconshop">
                    <i class="fa-solid fa-cart-shopping"></i>
                </div>

            </div>
            <?php   } ?>
    </div>

    <button id="show-more-btn">Show More</button>

    <script>
        $(document).ready(function() {
            var offset = 4; // Initial offset, assuming you fetched 4 articles initially

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
                                articlesHtml += '<i class="fa-solid fa-star"></i>';
                                articlesHtml += '</p>';
                                articlesHtml += '</div>';
                                articlesHtml += '<div class="line"><hr></div>';
                                articlesHtml += '<div class="iconshop">';
                                articlesHtml += '<i class="fa-solid fa-cart-shopping"></i>';
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
        });
    </script>
</body>
</html>
