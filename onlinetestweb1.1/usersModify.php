<?php

  session_start();
  
  require('mysql.inc.php');
  require('defense.php');
  
   //--------------------------------------------------------
   //              SELECT student資料表
   //---------------------------------------------------------
   $sql_se_student_se_str = "SELECT * FROM `student` WHERE `user_id`= ? ";
   $result_se_student_str =  $db->prepare( $sql_se_student_se_str);
   $result_se_student_str ->bindParam(1, $_SESSION['user_id'], PDO::PARAM_STR);
   $result_se_student_str ->execute();
   $result_se = $result_se_student_str->fetchAll();
   // echo  $_SESSION['user_id'];
   //var_dump($result_se); 除錯
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>線上測驗系統</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/bootstrap.min.css" rel="stylesheet">
<script src="js/bootstrap.js"></script>
<script src="js/jquery.js"></script>
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
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title" >修改基本資料</h3>
  </div>
    <br>
    <br>
  <div class="panel-body">
   
    <form method = "post" action ="userModifypost.php">    
        <?php foreach($result_se as $row){?>
        <div class="input-group input-group-lg"> 
           <span class="input-group-addon" id="sizing-addon1">學號</span></span>
           <input type="text" class="form-control" VALUE="<?PHP echo $row['user_id'];?>" placeholder="UserID" aria-describedby="sizing-addon1" name="fid" disabled required >
        </div>
          <br>
        <div class="input-group input-group-lg"> 
            <span class="input-group-addon" id="sizing-addon1">姓名</span></span>
            <input type="text" class="form-control" VALUE="<?PHP echo $row['user_name'];?>" placeholder="UserName" aria-describedby="sizing-addon2" name="fname" disabled required  >
        </div>
          <br>
        <div class="input-group input-group-lg"> 
            <span class="input-group-addon" id="sizing-addon1">密   碼</span></span>
            <input type="password" class="form-control" VALUE="<?PHP echo $row['user_password'];?>" placeholder="Password" aria-describedby="sizing-addon3" name="fpwd" required="">
        </div>
          <br>
        <div class="input-group input-group-lg"> 
            <span class="input-group-addon" id="sizing-addon1">確認密碼</span></span>
            <input type="password" class="form-control" placeholder="Password" aria-describedby="sizing-addon4" name="cpwd" required="">
        </div>
          <br>
        <div class="input-group input-group-lg"> 
            <span class="input-group-addon" id="sizing-addon1">信箱</span></span>
            <input type="email" class="form-control" VALUE="<?PHP echo $row['user_email'];?>" placeholder="Email" aria-describedby="sizing-addon5" name="femail" required="">
        </div>
          <br>
          <div class="input-group input-group-lg"> 
            <span class="input-group-addon" id="sizing-addon1">電話</span></span>
            <input type="text" class="form-control" VALUE="<?PHP echo $row['user_tel'];?>" placeholder="0910-123456" aria-describedby="sizing-addon5" name="ftel" required="" pattern="[0-9]{20}">
        </div>
        <?php }?>
          <br>
          <br>
          <div class="btn-group btn-group-justified" role="group" aria-label="...">
          <div class="btn-group" role="group">
            <button type="submit" class="btn btn-default" data-toggle="modal" data-target="#myModal" name="user_modify_ok">送出</button>
          </div>
        </div>
      </form>  
  </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

</div>
</body>
</html>
 