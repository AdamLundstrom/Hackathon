<!DOCTYPE html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
	


});	

function showMessage(msg){
	var value = "hej";
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
                <div class="col-md-6">
					<?php
						$threds = $connect->getAllForumThread();
						for($i = 0; $i < count($threds); $i++){

							echo "<a href='javascript:void(0)' onclick='showMessage($i); '>".$threds[$i]->getThreadName()."</a><br>";
						}

					?>
					<a href = "javascript:void(0)" onclick="showMessage('msg');"> hej</a>
				
				</div>
				 <div class="col-md-6">
					<?php
						if(isset($_SESSION['forum'])){
							#$forumThreads2 = $connect->getAllForumPost();
							#var_dump($forumThreads2);
							$ptext = $connect->getPostsByThread($_SESSION['forum']);
							$ptitle = $connect->getPostsByThread2($_SESSION['forum']);
							#$forumThreads = $connect->getPostsByThread($threds[$_SESSION['forum']]->getGameID());	
							//var_dump($forumThreads[0]);
							for($i = 0; $i < count($ptext); $i++){
								echo $ptitle[$i];
								echo "<br>";
								echo $ptext[$i];
								echo "<br><br>";
								//echo var_dump($forumThreads[$i]->getTitle());
								//echo $forumThreads[$i]->getTitle()." ".$forumThreads[$i]->getPosted()."<br>".$forumThreads[$i]->getPostText()."<br><br>";
							}
							session_unset();

							// destroy the session
							session_destroy(); 
							
						}
					?>
				
				</div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-animation.js"></script>
</body>

</html>