<?php
  
  session_start();
  
  header('Content-Type: text/html; charset=utf-8');
  require("../mysql.inc.php");
  require('admindefense.php');
  
  
  /*--------------------------------------------------------
                 SELECT 教師資料的基本資料
                     mysql_fetch_assoc()涵式
                條件admin_id = $_SESSION['admin_id']
    ---------------------------------------------------------*/
  
  $sql_se_admin_str = "SELECT * FROM `admin` WHERE `admin_id`='".$_SESSION['admin_id']."'";
  $result_se_admin_str = mysql_query( $sql_se_admin_str);
  
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>教師後臺管理</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="../css/bootstrap.min.css" rel="stylesheet">
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
      <a class="navbar-brand" href="admin.php">首頁</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="adminModify.php">個人基本資料修改<span class="sr-only">(current)</span></a></li>
        <!--<li class="active"><a href="adminResearch.php">研究專區<span class="sr-only">(current)</span></a></li>-->
        <li class="active"><a href="adminClass.php">開課資訊<span class="sr-only">(current)</span></a></li>
      </ul>
       <form action="logout.php">
       <button class="btn btn-default navbar-btn">登出</button>
       </form>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class="row">
    <div class="col-lg-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
            基本資料
        </div>
        <div class="panel-body">
            <form role="form" action="adminModify.post.php" method="post" >
            <?php while ($row =mysql_fetch_assoc($result_se_admin_str)){?>
                <div class="form-group input-group">
                    <span class="input-group-addon">姓　　名</span>
                    <input type="text" class="form-control" name="admin_name" VALUE="<?PHP echo $row['name'];?>"> 
                </div>
                <div class="form-group input-group">
                    <span class="input-group-addon">職　　稱</span>
                    <input type="text" class="form-control" name="admin_jobtitle" VALUE="<?PHP echo $row['jobtitle'];?>"> 
                </div>
                <div class="form-group input-group">
                    <span class="input-group-addon">學　　歷</span>
                    <input type="text" class="form-control" name="admin_educational" VALUE="<?PHP echo $row['educational'];?>">
                </div>
                <div class="form-group input-group">
                    <span class="input-group-addon">辦 公 室</span>
                    <input type="text" class="form-control" name="admin_office" VALUE="<?PHP echo $row['office'];?>">
                </div>
                <div class="form-group input-group">
                    <span class="input-group-addon">校內分機</span>
                    <input type="text" class="form-control" name="admin_tel" VALUE="<?PHP echo $row['tel'];?>">
                </div>
                <div class="form-group input-group">
                    <span class="input-group-addon">信　　箱</span>
                    <input type="text" class="form-control" name="admin_email" VALUE="<?PHP echo $row['email'];?>">
                </div>
                <div class="form-group input-group">
                    <span class="input-group-addon">學術專長</span>
                    <textarea class="form-control" rows="10" name="admin_specialty"><?PHP echo $row['specialty'];?></textarea>
                </div>
                <div class="form-group input-group">
                    <span class="input-group-addon" >OFFICE HOURS</span>
                    <textarea class="form-control" rows="5" name="officetime"><?PHP echo $row['officetime'];?></textarea>
                </div>
            <?php }?>
                <button type="submit" class="btn btn-default" name= "adminMondify_ok" >確認送出</button>
                <button type="reset" class="btn btn-default">重設</button>
            </form>
        </div>
     </div>
   </div> 
</div>   
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>