<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <style>
        @import url(https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css);
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "montserrat", sans-serif;
        }
        body {
            min-height: 100vh;
            width: 100%;
            background-image: url(contactImage/contact.jpg);
            background-size: cover;
            background-position:center;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .container {
           
            width:70%;
            background-image: linear-gradient(rgba(228, 110, 228, 0.15),rgba(80, 181, 204, 0.20));
            border-radius: 15px;
            box-shadow: 
                0px 2px 10px rgba(228, 110, 228, 0.15), 
                0px 10px 20px rgba(228, 110, 228, 0.29), 
                0px 30px 50px 1px rgba(80, 181, 204, 0.20);
            padding: 20px 50px 30px 40px;
            height: 70%;
        }
        .container .content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width:100%;
        }
   

        .container .content .form-side {
            width: 60%;
            margin-left: 12px;
        }
        .content .form-side .contact-txt {
            font-size: 23px;
            font-weight: 600;
            color: whitesmoke;
            display: flex;
            justify-content: center;
        }
        .form-side .input-div {
            height: 55px;
            width: 100%;
            margin: 12px 0;
        }
        .form-side .input-div input,
        .form-side .input-div textarea {
            height: 100%;
            width: 100%;
            border: none;
            outline: none;
            font-size: 16px;
            background: #f0f1f8;
            border-radius: 6px;
            padding: 0 15px;
            resize: none;
        }
        .form-side .message-box {
            min-height: 110px;
        }
        .form-side .input-div textarea {
            padding-top: 6px;
        }
        .form-side .button {
            display: inline-block;
            margin-top: 15px;
            display: flex;
            justify-content: center;
        }
        .form-side .button input[type="submit"] {
            color: #fff;
            font-size: 18px;
            outline: none;
            border: none;
            padding: 12px 45px;
            border-radius: 6px;
            background: #DF1C;
            
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .button input[type="button"]:hover {
            background:#DF3a;
        }
        .ver-line{
            border-left: 1px solid rgb(0, 0, 0);
            height: 300px;
            position: absolute;
            left:42%;
            margin-left: -3px;
           
        }

        i{
            margin-right: 10px;
        }
        .say{
            color: #DF2C45;
            padding-bottom: 35px;
        }
        h2 {
            color: #fff;
        }
        h4 {
            color: #525051;
        }
        .homme{
         
        }
        .nav-side  {
            margin-left:15px;
            width:100%;
            padding:15px;
            background:white;
            border-radius:15px;
        }
        .nav-side a {
            text-decoration:none;
            color:black;
            font-size:20px;
            display:flex;
            justify-content:center;
        }


     
        @media (max-width: 950px) {
        .container {
            width: 90%;
            padding: 30px 40px 40px 35px;
        }
        .container .content .form-side {
            width: 75%;
            margin-left: 55px;
        }
        .ver-line{
            border-left: none;
            border-bottom: 1px solid black;
            width: 70%;
            position: absolute;
            left: 16.5%;
            top: 15%;
            
           
        }
        .button{
            margin-bottom: 35px;
        }
        .container .content {
            flex-direction: column-reverse;
        }
    
     
        
        }

        @media (max-width: 820px) {
        .container {
            margin: 40px 0;
            height: 100%;
        }
        .container .content {
            flex-direction: column-reverse;
        }
    
     
        .container .content .form-side {
            width: 100%;
            margin-left: 0;
        }
        }
   

     

   

 
    </style>
</head>
<body>
  
    <div class="container">
        
        <div class="content">
        
            <div class="sayhi-side">
                <h1 class="say">Say Hi!</h1><br>
                <h2><i class="fa-solid fa-envelope fa-shake"></i>Email Address:</h2>
                <h4>hello@reallygreatsite.com</h4><br>
                <h2><i class="fa-solid fa-phone fa-shake"></i>Phone Number:</h2>
                <h4>(+212) 697-4228</h4>
            </div>
            <div class="ver-line"></div>

            <div class="form-side">
                <div class="contact-txt"><h1>Contact Us</h1></div>
                <h3></h3>

                <form action="" method="post">
                    <div class="input-div">
                        <input type="text" placeholder="Name" name="nom" required/>
                    </div>
                    
                    <div class="input-div">
                        <input type="text" placeholder="Email" name="email" required />
                    </div>

                    <div class="input-div textarea">
                        <textarea placeholder="Message" name="message" required></textarea>
                    </div>

                    <div class="button">
                        <input type="submit" value="Send Now" name="dddd"/>
                        <div class="homme">
                            <nav class="nav-side">
                                <a href="clientpage.php">
                                    Home
                                </a>
                            </nav>
                        </div>
                    </div>
                 
                </form>
            </div>
        </div>
    </div>
    <?php

        if(isset($_POST["dddd"])){
            if(isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['message']) && !empty($_POST['nom']) && !empty($_POST['email'])&& !empty($_POST['message'])){
                include_once "connexion.php";
                $sql = "insert into contact (name, email, message) value(?,?,?)";
                $req = $db->prepare($sql);
                $req->execute(array($_POST["nom"],$_POST["email"],$_POST["message"]));
                if($req){
                    // header("location: clientpage.php");
                }
                else{
                    echo 'error';
                }
            }

            else{
                echo "Veuillez remplir tous les champs !";
            }
        }
    ?>

</body>
</html>