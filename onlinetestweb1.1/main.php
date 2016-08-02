<?php
  session_start();

  require("defense.php");
  
  
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>線上測驗系統</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-inverse" align=right>
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="main.php">首頁</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="usersModify.php">修改個人基本資料<span class="sr-only">(current)</span></a></li>
        <li class="active"><a href="usersScore.php">查詢成績<span class="sr-only">(current)</span></a></li>
      </ul>
         <form action="logout.php">
       <button class="btn btn-default navbar-btn">登出</button>
         </form>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
  <div class="jumbotron">
    <h1>Hello, <?php echo $_SESSION['user_id'] ?></h1>
      <p>測驗開始請勿隨意登出</p>
      <p><a class="btn btn-primary btn-lg" href="usersClass.php" role="button">測驗開始</a></p>
  </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>