<?php
    include_once '../db_connection.php';
    session_start();
    $_SESSION["loggedin"] = FALSE;
    if(isset($_POST["submit"])){
        #$db->addUser($_POST["username"], $_POST["password"], $_POST["email"]);
        
        $user = $db->getUser("Alice");
        echo $user->getUserName();
        if($_POST["email"] == $user->getEmail() && $_POST["password"] == $user->getuserPassword("AA")) {
            $_SESSION["loggedin"] = TRUE;
            echo "Seger";
            #skicka vidare
        }
        echo $_POST["email"];
        echo $_POST["password"];
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
    <div class="login-clean">
        <form action "login.php" method="post">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><i class="icon ion-ios-contact-outline" style="color:#354c6f;font-size:130px;"></i></div>
            <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Mejladress" style="font-family:'Bad Script', cursive;font-weight:bold;color:rgb(34,40,45);font-size:18px;"></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Lösenord" style="font-family:'Bad Script', cursive;color:#22282d;font-weight:bold;font-size:18px;"></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit" name="submit" style="background-color:#354c6f;font-family:'Bad Script', cursive;font-weight:bold;font-size:18px;">Logga in</button></div><a href="#" class="forgot" style="font-family:'Bad Script', cursive;font-weight:bold;font-size:14px;">Gllömt lösenord?</a></form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-animation.js"></script>
</body>

</html>