<?php 
ob_start();
    include "connexion.php" ;
    session_start();
    if(empty($_SESSION["emaila"])){
        header ("location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        @import url(https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap);
        @import url(https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css);

        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Ubuntu', sans-serif ;
        }
        :root{
            --blue: #FBC023;
            --white: #fff;
            --grey: #f5f5f5;
            --black1: #222;
            --black2: #999;
        }
        body{
            min-height: 100vh;
            overflow-x: hidden;
        }
        .container{
            position: relative;
            width: 100%;
        }
        .navigation{
            position: fixed;
            width:300px;
            height: 100vh;
            background-color: var(--blue);
            border-left: 10px solid  var(--blue);
            transition: 0.5s;
            overflow: hidden;
        }
        .navigation.active{
            width: 80px;
        }
        .navigation ul {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
        }
        .navigation ul li {
            position: relative;
            width: 100%;
            list-style: none;
            border-top-left-radius: 30px;
            border-bottom-left-radius: 30px;
        }
        .navigation ul li:hover{
            background-color: var(--white);
        }
        .navigation ul li:nth-child(1){
            margin-bottom: 40px;
            pointer-events: none;
        }
        .navigation ul li a{
            position: relative;
            display: block;
            width: 100%;
            display: flex;
            text-decoration: none;
            color: var(--white);


        }
        .navigation ul li:hover a{
            color: var(--blue);
        }
        .navigation ul li a .icon{
            position: relative;
            display: block;
            margin-top: 6px;
            min-width: 60px;
            height: 60px;
            line-height: 70px;
            text-align: center;
        }
        .navigation ul li a .logoo{
            margin:7px;
            position: relative;
            display: block;
            min-width: 60px;
            height: 60px;
            /* line-height: 59px; */
            text-align: center;
        }
        .navigation ul li a .logoo img{
            border-radius:50%;
            background-color:

        }
        .navigation ul li a .icon ion-icon{
            font-size: 1.75em;
        }
        .navigation ul li a .title{
            position: relative;
            display: block;
            padding: 0 15px;
            height: 60px;
            line-height: 60px;
            font-size: 1.05em;
            font-weight: 500;
            text-align: start;
            white-space: nowrap;
        }
        .navigation ul li:hover a::before{
            content: '';
            position: absolute;
            right: 0;
            top: -50px;
            width: 50px;
            height: 50px;
            background: transparent;
            border-radius: 50%;
            box-shadow: 35px 35px 0 10px var(--white);
            pointer-events: none;
        }
        .navigation ul li:hover a::after{
            content: '';
            position: absolute;
            right: 0;
            bottom: -50px;
            width: 50px;
            height: 50px;
            background: transparent;
            border-radius: 50%;
            box-shadow: 35px -35px 0 10px var(--white);
            pointer-events: none;
        }

        /* main css */

        .main{
            position: absolute;
            width: calc(100% - 300px);
            left: 300px;
            min-height: 100vh;
            background: var(--white);
            
               

        }
        .main.active{
            width: calc(100% - 80px);
            left: 80px;
        }
        .topbar{
            width: 100%;
            height: 65px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding:0 10px;
            box-shadow:  0px 2px 10px rgba(0, 0, 0, 0.2);
        }
    
        .toggleer{
            position: relative;
            width: 60px;
            height: 60px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 2.5em;
            cursor: pointer;
        }
        .search{
            position: relative;
            width: 400px;
            margin: 0 10px;
        }

        .search label{
            position: relative;
            width: 100%;

        }
        .search label input {
            width: 100%;
            height: 35px;
            border-radius: 40px;
            padding: 5px 20px;
            padding-left: 40px;
            outline: none;
            border: 1px solid var(--black2);
        }
        .search label ion-icon{
            position: absolute;
            top: 0;
            left: 10px;
            font-size: 1.2em;
        }
        .user {
            position: relative;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            overflow: hidden;
            cursor: pointer;
        }
        .user img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;

        }
        .allcart{
            position: relative;
            width: 100%;
            padding: 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .allcart .card{
            position: relative;
            background: var(--white);
            border-radius: 20px;
            width: 23%;
            padding: 30px;
            display: flex;
            cursor: pointer;
            justify-content: space-between;
            box-shadow: 0 5px 10px rgba(0,0,0,0.8);
        }
        .allcart .card .number {
            position: relative;
            color: var(--blue);
            font-weight: 500;
            font-size: 2.5em;
        }
        .allcart .card .name{
            color: var(--black2);
            font-size: 1.1em;
        }
        .allcart .card .ico{
            color: var(--black2);
            font-size: 2em;
        }
        .allcart .card:hover{
            background-color: var(--blue);
        }
        .allcart .card:hover .number,
        .allcart .card:hover .name,
        .allcart .card:hover .ico{
            color: var(--white);
        }
       


        /* pop up side */
        .left{
            display: flex;
            flex-direction:column ;
            height: 97vh;
            position: absolute;
            top:-150%;  
            opacity:0;  
            transform:translate(-10% ,-50%) scale(1);
            align-items: center;
            justify-content: center;
            flex-direction:column ;
            color: white;
            background:-webkit-linear-gradient(to right, #FBC023, #Faf523);
            background:linear-gradient(to right,#FBC023, #Faf523);
            margin: auto;
            box-shadow: 
                0px 2px 10px rgba(0,0,0,0.2), 
                0px 10px 20px rgba(0,0,0,0.3), 
                0px 30px 60px 1px rgba(0,0,0,0.5);
            border-radius: 8px;
            padding: 50px;
            transition:top 0ms ease-in-out 200ms;

      }
        .lefft{
            display: flex;
            flex-direction:column ;
            height: auto;
            position: absolute;
            top:-150%;
            opacity:0;
            transform:translate(-10% ,-50%) scale(1);
            align-items: center;
            justify-content: center;
            flex-direction:column ;
            color: white;
            background:-webkit-linear-gradient(to right, #FBC023, #Faf523);
            background:linear-gradient(to right,#FBC023, #Faf523);
            margin: auto;
            box-shadow: 
                0px 2px 10px rgba(0,0,0,0.2), 
                0px 10px 20px rgba(0,0,0,0.3), 
                0px 30px 60px 1px rgba(0,0,0,0.5);
            border-radius: 8px;
            padding: 50px;
            transition:top 0ms ease-in-out 200ms;

      }
      .tabb{
        border-spacing:20px;
      }
        .leftt{
            display: flex;
            flex-direction:column ;
            height: auto;
            position: relative;
            top:-150%;
            align-items: center;
            justify-content: center;
            flex-direction:column ;
            color: white;
            background:-webkit-linear-gradient(to right, #FBC023, #Faf523);
            background:linear-gradient(to right,#FBC023, #Faf523);
            margin: 20px;
            box-shadow: 
                0px 2px 10px rgba(0,0,0,0.2), 
                0px 10px 20px rgba(0,0,0,0.3), 
                0px 30px 60px 1px rgba(0,0,0,0.5);
            border-radius:15px;
            padding: 50px;
            transition:top 0ms ease-in-out 200ms;

      }
        .left.active{
            position: fixed;
            left: 50%; 
            top:50%;
            opacity: 1;
            transform:translate(-50% ,-50%) scale(1);
            transition: top 0ms ease-in-out 0ms;
                       
            position: fixed;
        }
    
        .lefft.aactive{
            position: fixed;
            left: 50%; 
            top:50%;
            opacity: 1;
            transform:translate(-50% ,-50%) scale(1);
            transition: top 0ms ease-in-out 0ms;
                       
            position: fixed;
        }
    
        .inputt ,.sel{
            position:relative;
            width: auto;
            padding: 15px;
            margin: 3px;
            border: 1px solid var(--blue);
            background-color: var(--white);
            border-radius: 15px;
        }
        .btnn {
            position:relative;
            width: 100%;
            padding: 15px;
            margin: 3px;
            border: 1px solid var(--blue);
            background-color: var(--white);
            border-radius: 15px;
        }
        
        .inputt:focus, .btnn:focus, .sel:focus{
            outline: none;

        }

        #fileza{
            padding:15px;
            border: 1px solid var(--blue);
            background-color: var(--white);
            border-radius: 15px;
            color:grey;
        }

      
        .aa{
            margin-top: 34px;
        }
        .bien{
            display: flex;
            justify-content: center;
            color:red;
        }
        .bieen{
            display: flex;
            justify-content: center;
            color:orange;
        }
  
        .btnn  {
            background: #4141e9;
            text-decoration: none;
            color: white;
            border-radius: 15px;
            font-size: 1.5em;
            padding: 10px ;
            transition: 0.5s;
        }
        .btnn:hover {
            background: #3030a8;
            color: dimgray;
            transition: 0.5s;
        }
    
        .ffgg {
            font-size:1.5em;
            color:black;
            position: absolute;
            left:93%;
            top:1%;
        }
        .infoPro{
            width:27%;
            position:absolute;
            opacity:0; 
            left:-172%;
            margin-right:15px;
            background: var(--grey);
            border-radius:15px;
            box-shadow:  0px 2px 10px rgba(0, 0, 0, 0.2);
            display:flex;
            flex-direction: column;
        }
        .infoPro.active{
            position:fixed;
            opacity:1;
            position:relative;
            left:72%;

        }
        .close-btn-infoPro i{
            position:fixed;
            left:96%;
            
        }
        
        .infoPro .in {
            margin:15px;
            font-size:1.1em;
            font-weight: 500;
            display:flex;
            justify-content: center;
            align-items:center;
        }
        .nomP , .emailP {
            margin-left:8px;
            font-size:1em;
            color:var(--blue)
        }
        .infoPro .in a{
            text-decoration:none; 
            margin-bottom:10px;
            padding:13px;
            border-radius:15px;
            background-color: #3030a8;
            color:var(--white)

        }
        .infoPro .in a:hover{
            background:#4141e9;
        }
        .dtt {
            padding-top:10px;
        }
  
        /* pop up side */
        .txt-allproduct {
            font-weight: 600;
            font-size: 1.5em;
            padding-left: 10px;
            color: var(--black1);
        }
        .msg {
            width: calc(100% -300px);
            margin:35px;
            display:flex;
            justify-content:center;
         
        }
        .msg table {
            border-collapse: collapse;
            border-radius:15px;
            width:95%;


        }
        .msg table .tr1 th{
            padding:20px;
        }
        .msg table .tr1{
            border-radius:15px;
            background:var(--grey);
            box-shadow:0 5px 6px -2px gray;        
            
        }
        .msg table .tr2{
            border-bottom:1px solid black;
            background:var(--white);
            padding:15px;

        
        }



        @media screen and (max-width: 1033px){
            .allcart .card {
                width: 45%;
                margin-top: 10px;
                margin-bottom: 10px;
            }
       
            .infoPro.active{
                width:40%;
                position:relative;
                left:59%;
            }
            .allcart {
                justify-content: space-evenly;
            }
            .product-cart .cartP {
                width: 45%;
                margin-bottom: 15px;
            }
            .product-cart {
                justify-content: space-evenly;
            }
            
     

        }
        @media screen and (max-width: 670px){
            .infoPro.active{
                width:50%;
                position:relative;
                left:49%;
            }
        }
        @media screen and (max-width: 550px){
            .product-cart .cartP {
                width: 80%;
                margin-bottom: 15px;
            }
            .infoPro.active{
                width:80%;
                position:relative;
                left:10%;
            }
          
           
        }
        @media screen and (max-width: 490px){
            .allcart .card {
                width: 80%;
                margin-top: 10px;
                margin-bottom: 10px;
            }
        }

        


        
   
        







    </style>
</head>
<body class="bod">
    
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="dashboard.php">
                        <span class="logoo"><img src="imagee/logo.png" alt="" width="100%" height="100%"></span>
                        <span class="title">Dashboard</span> 
                    </a>
                </li>
                <li>
                    <a href="dashboard.php">
                        <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                        <span class="title">Home</span>
                    </a>
                </li>
                <li>
                    <a href="contact-side.php">
                        <span class="icon"><ion-icon name="archive-outline"></ion-icon></span>
                        <span class="title">Messages </span>
                    </a>
                </li>
                <li>
                    <a href="" id="add-to" class="Add-P-btn">
                        <span class="icon"><ion-icon name="bag-add-outline"></ion-icon></span>
                        <span class="title" id="btn-add">Add Product</span>
                    </a>
                </li>
                <li>
                    <a href="" id="add-too" class="Add-o-btn">
                        <span class="icon"><ion-icon name="analytics-outline"></ion-icon></span>
                        <span class="title" id="offrr">Add offer</span>
                    </a>
                </li>
                <li>
                    <a href="editProfile.php">
                        <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                        <span class="title">profile</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="icon"><ion-icon name="information-circle-outline"></ion-icon></span>
                        <span class="title">Help</span>
                    </a>
                </li>
                <li>
                    <a href="sign-out.php">
                        <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                        <span class="title">Sign out</span>
                    </a>
                </li>
            </ul>
        </div>

        
        <div class="main">
            <div class="topbar">
                <div class="toggleer" id="toggle">
                    <ion-icon name="menu-outline"></ion-icon>

                </div>

    
                <div class="search">
                    <label for="">
                        <input type="text" placeholder="Search Here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>
    
                <div class="user">
                    <img class="pro" src="image/<?php echo $_SESSION["imagea"] ?>" alt="profile-image">
                </div>
            </div>


    <!-- info dash -->


            <div class="allcart">
                <!-- sles -->
                <div class="card">
                    <div>
                        <div class="number">60</div>
                        <div class="name">Selles</div>
                    </div>
                    <div class="ico">
                        <ion-icon name="cart-outline"></ion-icon>
                    </div>
                </div>
                <!-- orders -->
                <div class="card">
                    <div>
                        <div class="number">31</div>
                        <div class="name">Purchase Orders</div>
                    </div>
                    <div class="ico">
                        <ion-icon name="bag-check-outline"></ion-icon>                
                    </div>
                </div>
                <!-- addtocart -->
                <div class="card">
                    <div>
                        <div class="number">10</div>
                        <div class="name">Add To Cart</div>
                    </div>
                    <div class="ico">
                        <ion-icon name="bag-add-outline"></ion-icon>                    
                    </div>
                </div>
                <!-- ernning -->
                <div class="card">
                    <div>
                        <div class="number">3500$</div>
                        <div class="name">Profits</div>
                    </div>
                    <div class="ico">
                        <ion-icon name="cash-outline"></ion-icon>
                    </div>
                </div>
            </div>


            <div class="txt-allproduct">Edit page :</div>
            <div class="leftt">
                <h2>Edit profile info</h2>
                    <div class="aa">
                        <form  method="post" >
                            <table class='dfg'>
                            <?php 
                                include "connexion.php" ;
                                $emaill = $_SESSION["emaila"];
                                $sql = "select * from admiin where emaila='$emaill'";
                                $req = $db->prepare($sql);
                                $req->execute();
                                while($donnees=$req->fetch()){
                            ?>

                                <tr>
                                    <td>
                                        <label for=""><i class="fa-solid fa-user er" style="color: #ffffff;"></i> <span class="infper"><?php echo $donnees['noma'] ?></span></label>
                                    </td>
                                    <td> 
                                        <input class="inputt" type="text" name="name" placeholder="Edit Name" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for=""><i class="fa-solid fa-envelope er" style="color: #ffffff;"></i><span class="infper"><?php echo $donnees['emaila'] ?></span></label>
                                    </td>
                                    <td>
                                        <input class="inputt pricee" type="text" name="email" placeholder="Edit email" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for=""><i class="fa-solid fa-lock er" style="color: #ffffff;"></i><span class="infper"><?php echo $donnees['pwda'] ?></span></label>
                                    </td>
                                    <td>
                                        <input class="inputt pricee" type="text" name="pwd" placeholder="Edit Password" required>
                                    </td>
                                </tr>
                                <?php } ?>
                                    
                            </table>
                        <input class="inputt btnn" type="submit" value="Save Edit" name="ddde" >
                    </form> 

                    <?php
            
                    if(isset($_POST['ddde'])){
                        include('connexion.php');
                        $emailaa=$_SESSION["emaila"];
                        if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['pwd'])){
                            $sql="UPDATE admiin SET  noma=?, emaila=?, pwda=? where emaila=?";
                            $req=$db->prepare($sql);
                            $req->execute(array($_POST['name'],$_POST['email'],$_POST["pwd"],$emailaa));
                            if($req){
                                header("location: login.php");
                            }else{
                                echo " not edit";
                            }
                        }
                        else{
                            echo "<h2 class='bieen'>Please complete all fields !</h2>";
                        }}
                    ?>
            
                    </div>
            </div> 
            
    <!-- manidiv -->
        </div> 
    
<!-- containerdiv -->
    </div>
     
 
 
    <div class="infoPro">

        <div class="close-btn-infoPro"><i class="fa-sharp fa-regular fa-circle-xmark ffgg"></i></div>
        <div class="in dtt">Hello<i class="fa-solid fa-hand-wave"></i></div>
        <div class="in">Name:<span class="nomP"><?php echo $_SESSION["noma"] ?></span></div>
        <div class="in">Email:<span class="emailP"><?php echo $_SESSION["emaila"] ?></span></div>
        <div class="in"><a href="sign-out.php">Sign Out</a> </div>
    </div>





<div class="left">
      <div class="close-btn"><i class="fa-sharp fa-regular fa-circle-xmark ffgg"></i></div>
      <h2>Add Product</h2>
        <div class="aa">
            <form action="" class="form" method="post" >
                <table class="tabb">
                    <!-- <tr>
                        <td>
                            <label for="">Id Product:</label>
                        </td>
                        <td> 
                            <input class="inputt" type="text" name="id" placeholder="id of product" required>
                        </td>
                    </tr> -->
                    <tr>
                        <td>
                            <label for="">Title:</label>
                        </td>
                        <td> 
                            <input class="inputt" type="text" name="title" placeholder="Tile of product" required>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="">Price:</label>
                        </td>
                        <td>
                            <input class="inputt" type="text" name="price" placeholder="dh" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="">Discount:</label>
                        </td>
                        <td>
                            <input class="inputt" type="text" name="khasm" placeholder="dh" required>
                        </td>
                    </tr>

                    <tr >
                        <td>
                            <label for="">Product Image:</label>
                        </td>
                        <td >
                            <input class="inputt" type="file" id="file" name="image" placeholder="Product pictures" required style="display: none">
                            <label for="file"  id="fileza"><span class="span-choose-file">Choose Product pictures</span></label>
                        </td>
                    </tr>             
                    <tr>
                        <td>
                            <label for="">Type:</label>
                        </td>
                        <td>
                            <select name="type" class="sel">
                                <option value="Men">Men</option>
                                <option value="Women">Women</option>
                                <option value="FeaturedProducts">Featured Products</option>
                                <option value="unique">Unique </option>
                            </select>
                        </td>
                    </tr>
                </table>
                <input class="inputt btnn" type="submit" value="Create product" name="Createproduct" >
            </form> 
        </div>

   <?php
   include "connexion.php";

      if(isset($_POST['Createproduct'])){
            $sql="insert into article ( title, prix, khasm, image, typee) value(?,?,?,?,?)";
            $req=$db->prepare($sql);
            $req->execute(array($_POST["title"],$_POST["price"],$_POST["khasm"],$_POST["image"],$_POST["type"]));
            if($req){
               echo"<h1 class='bien'> Well Add</h1>";
            }else{
               echo "<h1 class='bien'>Error</h1>";
            }
        }
         else{
            echo "<h2 class='bieen'>Please complete all fields !</h2>";
        }
      
   ?>
   </div>
   <!-- pop up side ADD product fin -->



    <!-- apop up side add offer -->
    <div class="lefft">
      <div class="close-bttn"><i class="fa-sharp fa-regular fa-circle-xmark ffgg"></i></div>
      <h2>Add discount</h2>
         <div class="aa">
            <form action="" class="form" method="post" >
               <table class="tabb">
                    <tr>
                        <td>
                            <label for="">Discount Title</label>
                        </td>
                        <td> 
                            <input class="inputt " type="text" name="title" placeholder="Title" required>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="">Discount Subtitle</label>
                        </td>
                        <td >
                            
                            <input class="inputt " type="text" name="subtitle" placeholder="subtitle" required >
                        </td>
                    </tr>
                </table>
               <input class="inputt btnn" type="submit" value="Add offer" name="ggh" >
            </form> 
         </div>
         <?php
        include "connexion.php";
         if(isset($_POST['ggh'])){
            $sql="INSERT INTO discount (title, subtitle) value(?,?)";
            $req=$db->prepare($sql);
            $req->execute(array($_POST["title"],$_POST["subtitle"]));
            if($req){
               echo"<h1 class='bien'> Well Add</h1>";
            }else{
               echo "<h1 class='bien'>Error</h1>";
            }
        }
         else{
            echo "<h2 class='bieen'>Please complete all fields !</h2>";
        }
   ?>
   </div>






    

    
    <script>
        let toggle=document.querySelector(".toggleer");
        let navigation=document.querySelector(".navigation");
        let main=document.querySelector(".main");
        let addtoc=document.querySelector(".addtoc");
        toggle.onclick = function(){
            navigation.classList.toggle('active');
            main.classList.toggle('active');

        }
     
        document.querySelector('#btn-add').addEventListener("click", function(){
            document.querySelector(".left").classList.add("active");
        })
        document.querySelector('.close-btn').addEventListener("click", function(){
            document.querySelector(".left").classList.remove("active");
        })


        document.querySelector('#offrr').addEventListener("click", function(){
            document.querySelector(".lefft").classList.add("aactive");
        })
        document.querySelector('.close-bttn').addEventListener("click", function(){
            document.querySelector(".lefft").classList.remove("aactive");
        })


        document.querySelector('.user').addEventListener("click", function(){
            document.querySelector(".infoPro").classList.add("active");
        })
        document.querySelector('.close-btn-infoPro').addEventListener("click", function(){
            document.querySelector(".infoPro").classList.remove("active");
        })


        let dd=document.querySelector("#add-to");
        dd.onclick = function(e){
            e.preventDefault();
        }
        let ff=document.querySelector("#add-too");
        ff.onclick = function(e){
            e.preventDefault();
        }


    </script>
    





    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>