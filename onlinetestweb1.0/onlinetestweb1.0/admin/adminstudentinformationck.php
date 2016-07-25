<?php
 session_start();

 header('Content-Type: text/html; charset=utf-8');
 
 require('../mysql.inc.php');
 require('admindefense.php');
  

 /*--------------------------------------------------------
                SELECT  student 資料表 
        mysql_fetch_assoc()涵式 遞減排序(show最新一筆)
     
    ---------------------------------------------------------*/
  
  $sql_se_student_str ="SELECT * FROM `student` ORDER BY `user_id` DESC";
  $result_se_student_str= mysql_query($sql_se_student_str);
    
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>線上測驗系統</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="../css/bootstrap.min.css" rel="stylesheet">
</head>
 
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
     
    <h3 class="panel-title">學生資訊</h3>
  </div>
</div>
  <div class="panel-body">
    
   <form>   
          <table class="table">
              <tr>
                <th>學號</th>
                <th>姓名</th>
                <th>刪除</th>
              </tr>
              <?php  while ($row =mysql_fetch_assoc($result_se_student_str)){ ?> 
              <tr>
                <td>
                <?PHP echo $row['user_id']; ?>
                </td>
                <td>
                <?PHP echo $row['user_name']; ?>
                </td>
                <td>
                  <a href="adminstudentinformationck.del.php?user_id=<?PHP echo $row['user_id']; ?>" class="btn btn-default navbar-btn" >刪除</a>
                </td>
              </tr>
              <?php } ?>
          </table>
            <br>
            <br>
        </div class> 
      </div>
    </form>
    <!--from -->
    
  </div class>   
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>