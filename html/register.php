<?php
    include_once '../db_connection.php';
    if(isset($_POST["submit"])){
        $db->addUser($_POST["username"], $_POST["password"], $_POST["email"]);
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hack</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aguafina+Script">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bad+Script">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Belleza">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Grand+Hotel">
    <link rel="stylesheet" href="assets/css/Footer-Basic.css">
    <link rel="stylesheet" href="assets/css/Highlight-Blue.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button1.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body><img src="assets/img/PROTO.png">
    <nav class="navbar navbar-default navigation-clean-button">
        <div class="container">
            <div class="navbar-header"><a class="navbar-brand" href="index.php" data-bs-hover-animate="bounce" style="font-family:'Grand Hotel', cursive;font-weight:bold;font-style:normal;font-size:27px;">Hem </a><button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button></div>
            <div
                class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav"></ul>
                <p class="navbar-text navbar-right actions"><a class="navbar-link login" href="login.php" data-bs-hover-animate="bounce" style="font-family:'Bad Script', cursive;font-weight:bold;font-size:18px;font-style:normal;color:#22282d;">Logga in</a> <a class="btn btn-default action-button"
                        role="button" href="register.php" data-bs-hover-animate="bounce" style="font-family:'Bad Script', cursive;background-color:#354c6f;font-size:16px;font-weight:bold;">Registrera </a></p>
                <ul class="nav navbar-nav">
                    <li role="presentation"><a href="forum.php" data-bs-hover-animate="bounce" style="font-family:'Bad Script', cursive;font-size:18px;font-weight:bold;font-style:normal;color:#22282d;">Forum </a></li>
                    <li role="presentation"><a href="categories.php" data-bs-hover-animate="bounce" style="font-family:'Bad Script', cursive;font-weight:bold;font-size:18px;font-style:normal;color:#22282d;">Kategori</a></li>
                    <li role="presentation"><a href="news.php" data-bs-hover-animate="bounce" style="font-family:'Bad Script', cursive;font-weight:bold;font-size:18px;font-style:normal;color:#22282d;">Nyheter</a></li>
                </ul>
        </div>
        </div>
    </nav>
    <div class="register-photo">
        <div class="form-container">
            <div class="image-holder" style="background-image:url(&quot;assets/img/dosain.png&quot;);width:493px;background-size:contain;"></div>
            <form action="register.php" method="post" style="width:485px;">
                <h2 class="text-center" style="font-family:'Bad Script', cursive;"><strong>Skapa</strong> ett konto.</h2>
                <div class="form-group"><input class="form-control" type="text" name="username" required="" placeholder="Användarnamn" maxlength="30" minlength="1" style="font-family:'Bad Script', cursive;color:#22282d;font-size:18px;font-weight:bold;"></div>
                <div class="form-group"><input class="form-control" type="email" name="email" required="" placeholder="Mejladress" maxlength="30" minlength="1" inputmode="email" style="font-family:'Bad Script', cursive;color:#22282d;font-size:18px;font-weight:bold;"></div>
                <div class="form-group"><input class="form-control" type="password" name="password" required="" placeholder="Lösenord" maxlength="30" minlength="1" style="font-family:'Bad Script', cursive;color:#22282d;font-size:18px;font-weight:bold;"></div>
        <div class="form-group"><button class="btn btn-primary btn-block" type="submit" name="submit" style="font-family:'Bad Script', cursive;background-color:#354c6f;font-size:19px;font-weight:bold;" >Registrera </button></div>
        <a href="login.php" class="already" style="font-family:'Bad Script', cursive;font-weight:bold;font-size:14px;">Har du redan ett konto? Logga in här.</a></form>
    </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-animation.js"></script>
</body>

</html>