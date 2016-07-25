<?php
  
  session_start();
  
   
  require('../mysql.inc.php');
  require('admindefense.php');
   
  /*--------------------------------------------------------
                SELECT class資料表 
             <select class> 使用
    ---------------------------------------------------------*/
  
  $sql_se_class_str ="SELECT `number`, `class_id` FROM `class`  ORDER BY `number` ";
  $result_se_class_str = mysql_query($sql_se_class_str);
    
  
  
    

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>線上測驗系統</title>
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
        <li class="active"><a href="adminClass.php">開課資訊<span class="sr-only">(current)</span></a></li>
        <li class="active"><a href="adminstudentinformation.php">學生資訊<span class="sr-only">(current)</span></a></li>
        <li class="active"><a href="adminstudentinformationck.php">學生資訊查看<span class="sr-only">(current)</span></a></li>
        <li class="active"><a href="adminStudent.php">新增課程學生資料<span class="sr-only">(current)</span></a></li>
        <li class="active"><a href="adminCheckstudent.php">查看課程學生<span class="sr-only">(current)</span></a></li>
        <li class="active"><a href="adminQuestion.php">新增題目<span class="sr-only">(current)</span></a></li>
        <li class="active"><a href="adminCheckQuestion.php">查看題庫<span class="sr-only">(current)</span></a></li>
        <li class="active"><a href="adminScore.php">查詢成績<span class="sr-only">(current)</span></a></li>
      </ul>
       <form action="logout.php">
       <button class="btn btn-default navbar-btn">登出</button>
       </form>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">新增課程學生資料</h3>
        </div>
    </div>
        <div class="panel-body">
          <form action="adminStudent.post.php" method="post" >
              <select class="form-control" name= "number">
                 <?php  while ($row =mysql_fetch_assoc($result_se_class_str)){  
                             echo  "<option  value= {$row[number]}>{$row[number]}--{$row['class_id']}</option>";
                        }
                 ?>
              </select>
                    <br>
                 <div class="form-group input-group">
                    <span class="input-group-addon">學號</span>
                    <input type="text" class="form-control"  aria-describedby="basic-addon1" name="user_id">
                 </div>
                <!--<div class="form-group input-group">-->
                <!--    <span class="input-group-addon">姓名</span>-->
                <!--    <input type="text" class="form-control"  aria-describedby="basic-addon1" name="user_name">-->
                <!--</div>-->
                     <br>
                  <button type="submit" class="btn btn-default navbar-btn">新增</button>
          </form>
            
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>