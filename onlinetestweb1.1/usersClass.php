<?php

  session_start();
  
  require('mysql.inc.php');
  require('defense.php');
  
  
     /*--------------------------------------------------------
                  SELECT cl.ci 資料表 
                條件設定 --鎖定使用者
      ---------------------------------------------------------*/
  
  $sql_se_cicl_sestr ="SELECT `cl`.`class_id`
                       FROM `class_information` `ci`, `class` `cl`
                       WHERE `ci`.`number` = `cl`.`number` and `ci`.`user_id` = ? ";
  $result_se_cicl_sestr =  $db->prepare( $sql_se_cicl_sestr);
  $result_se_cicl_sestr ->bindParam(1, $_SESSION['user_id'], PDO::PARAM_STR);
  $result_se_cicl_sestr->execute();
  $result_se =$result_se_cicl_sestr->fetchAll();
  
  
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
        <li><a href="usersScore.php">查詢成績</a></li>
      </ul>
       <form action="logout.php">
         <button class="btn btn-default navbar-btn">登出</button>
       </form>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">課程選擇</h3>
  </div>
<div class="panel-body">
  <div class="row">
    <div class="col-lg-6">
      <form role="form" method ="post" action="exam.php">
        <div class="form-group">
            <select class="form-control" name ="class_choice">
              <?php foreach($result_se as $row){?>
              <option><?PHP echo $row['class_id']; ?></option>
              <?php } ?>
            </select>
        </div>
        <br>
        <button type="subimt" class="btn btn-default navbar-btn" >開始測驗</button>
      </form>
    </div>
</div>
</div>
</div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>