<!DOCTYPE html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
	


});	

function showMessage(value){
	//alert("hej");
	$.post('forumThread.php',{'forumThread':value}, function (data) {
		location.reload();
	});	

};	
</script>
<?php
include ('../db_connection.php');
$connect = new db_connection();
//ob_start();
session_start();


?>
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
                </ul>
        </div>
        </div>
    </nav>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-6" style="font-family:'Bad Script', cursive;font-size:20px;font-weight:bold;font-style:normal;color:#22282d;border-style: dotted;">
					<h1 style= "font-family:'Bad Script', cursive;font-weight:bold;"> Trådar </h1>
					<?php
						$threds = $connect->getAllForumThread();
						for($i = 0; $i < count($threds); $i++){

							echo "<a href='javascript:void(0)' onclick='showMessage($i); '>".$threds[$i]->getThreadName()."</a><br>";
						}

					?>
					
				
				</div>
				 <div class="col-md-6" style="font-family:'Bad Script', cursive;font-size:20px;font-weight:bold;font-style:normal;color:#22282d;border-style: dotted;">
					<h1 style= "font-family:'Bad Script', cursive;font-weight:bold;"> Diskussion </h1>
					<?php
					#error_reporting(0);
						if(isset($_SESSION['forum'])){
							#$forumThreads2 = $connect->getAllForumPost();
							#var_dump($forumThreads2);
							$ptext = $connect->getPostsByThread($threds[$_SESSION['forum']]->getGameID());
							//var_dump($ptext);
							$ptitle = $connect->getPostsByThread2($threds[$_SESSION['forum']]->getGameID());
							$posted = $connect->getPostsByThread3($threds[$_SESSION['forum']]->getGameID());
							$userId = $connect->getPostsByThread4($threds[$_SESSION['forum']]->getGameID());
							#$forumThreads = $connect->getPostsByThread($threds[$_SESSION['forum']]->getGameID());	
							//var_dump($forumThreads[0]);
							if(!count($ptext) == NULL){
								for($i = 0; $i < count($ptext); $i++){
									$userName = $connect->getUserByID($userId[$i]);
									echo $ptitle[$i];
									echo "     ";
									echo $posted[$i];
									echo "     ";
									echo $userName;
									echo "<br>";
									echo $ptext[$i];
									echo "<br><br>";
									//echo var_dump($forumThreads[$i]->getTitle());
									//echo $forumThreads[$i]->getTitle()." ".$forumThreads[$i]->getPosted()."<br>".$forumThreads[$i]->getPostText()."<br><br>";
								}
							}
							session_unset();

							// destroy the session
							session_destroy(); 
							
						}
					?>
					<input type="text" placeholder="Skriv inlägg" value="" name ="publish" style = "font-family:'Bad Script', cursive;font-size:26px;font-weight:bold;font-style:normal;color:#22282d; width:100%"/>
                    <input type="submit" value="Spara inlägg" name="submit" onclick="">
				
				</div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-animation.js"></script>
</body>

</html>