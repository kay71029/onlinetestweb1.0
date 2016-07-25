<?php
 
  require('adminCheckQuestion.post.php');
  require('admindefense.php');
  
?>
 
  
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>線上測驗系統</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
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
    <h3 class="panel-title">題庫管理明細</h3>
  </div>
  <div class="panel-body">
    <!-- Table -->
    <table class="table">
      <br>
      <tr>
        <td>題號</td>
        <td>題目</td>
        <td>選項A</td>
        <td>選項B</td>
        <td>選項C</td>
        <td>選項D</td>
        <td>答案</td>
        <td>修改</td>
        <td>刪除</td>
      </tr>
      <?php  while ($row =mysql_fetch_assoc($result_se_quedata_str)){ ?> 
      <tr>
        <td>
          <?PHP echo $row['q_id']; ?>
        </td>
        <td>
          <?PHP echo $row['question']; ?>
        </td>
        <td>
          <?PHP echo $row['A']; ?>
        </td>
        <td>
          <?PHP echo $row['B']; ?>
        </td>
        <td>
          <?PHP echo $row['C']; ?>
        </td>
        <td>
          <?PHP echo $row['D']; ?>
        </td>
        <td>
          <?PHP echo $row['ans']; ?>
        </td>
        <td>
        <a href= "adminCheckQuestionChepage.php?chqu_id=<?PHP echo $row['q_id']; ?>"class="btn btn-default navbar-btn" >修改</a>
        </td>
        <td>
        <a href= "adminCheckQuestion.del.php?q_id=<?PHP echo $row['q_id']; ?>"class="btn btn-default navbar-btn" >刪除</a>
        </td>
      </tr>
      <?php } ?>
    </table>
      <br>
      <br>
  </div class>   
</div><!-- /input-group -->
  <br>
  <br>
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>