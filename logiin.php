<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background: #FBC050;
            font-family:sans-serif;
            display: flex;
            min-height: 90vh;
            width:100%;
        }
        .login {
            width: 30%;
            color: white;
            background:-webkit-linear-gradient(to right, #FBC023, #FBC900);
            background:linear-gradient(to right, #FBd050, #FBC023);
            margin: auto;
            box-shadow: 
                0px 2px 10px rgba(0,0,0,0.2), 
                0px 10px 20px rgba(0,0,0,0.3), 
                0px 30px 60px 1px rgba(0,0,0,0.5);
            border-radius: 8px;
            padding: 50px;
        }
        .login .head {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login .head .company {
            font-size: 2.5em;
        }
        .login .msg {
            text-align: center;
            font-size: 1.5em
        }
        .login .form .text {
            border: none;
            background: none;
            box-shadow: 0px 2px 0px 0px white;
            width: 100%;
            color: white;
            font-size: 1em;
            outline: none;
        }
        .login .form .text::placeholder {
            color:  black;
        }
        .login .form input[type=password].password {
            border: none;
            background: none;
            box-shadow: 0px 2px 0px 0px white;
            width: 100%;
            color: black;
            font-size: 1em;
            outline: none;
            margin-bottom: 20px;
            margin-top: 20px;
        }
        .login .form .password::placeholder {
            color: black;
        }
        .login .form .btn-login {
            background: none;
            text-decoration: none;
            color: white;
            box-shadow: 0px 0px 0px 2px white;
            border:none;
            border-radius: 5px;
            padding: 10px 2.5em;
            transition: 0.5s;
            font-size:1.2em;
        }
        .login .form .btn-login:hover {
            background: white;
            color: dimgray;
            transition: 0.5s;
        }
        .login  {
            text-decoration: none;
            color: white;
            float: right;
        }
        footer {
            position: absolute;
            color: #136a8a;
            bottom: 10px;
            padding-left: 20px;
        }
        footer p {
            display: inline;
        }
        footer a {
            color: green;
            text-decoration: none;
        }
        footer a:hover {
            text-decoration: underline;
        }
        footer .heart {
            color: #B22222;
            font-size: 1.5em
        }
        .error{
            display: flex;
            justify-content: center;
            color:red;
        }
    </style>
</head>
<body>

    <section class='login' id='login'>
        <div class='head'>
            <h1 class='company'> Admins Login</h1>
        </div>
        <p class='msg'>Welcome Back</p>
        <div class='form'>
            <form method="post">
                <input type="text" placeholder='Emial' name="email" class='text' id='username' required><br>
                <input type="password" placeholder='**********' name="pwd" class='password'><br>
                <input type="submit" value="login" name="login" class='btn-login' id='do-login'>
            </form>
           
        </div>


    <?php

        if(isset($_POST["login"])){
            include "connexion.php" ;
            $sql="SELECT * FROM admiin WHERE emaila=:email AND pwda=:pwd";
            $req=$db->prepare($sql);
            $req->bindParam("email", $_POST["email"]);
            $req->bindParam("pwd", $_POST["pwd"]);
            $req->execute();
            if($req->rowCount()===1){
                while($donnees=$req->fetch()){
                    session_start();
                    $_SESSION["emaila"]=$donnees["emaila"];
                    $_SESSION["idproduct"]=$donnees["idproduct"];
                    $_SESSION["noma"]=$donnees["noma"];
                    $_SESSION["imagea"]=$donnees["imagea"];
               
              }
                header ("location:dashboard.php");
                
            }
            else{
                echo "<h1 class='error'>Incorrect Email or Password</h>";
            }

        }
    ?>
    </section>

</body>
</html>