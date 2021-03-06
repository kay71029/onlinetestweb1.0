<?php
  include("adminQuestion.post.php");
   require('admindefense.php');
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
    <h3 class="panel-title">新增題目</h3>
  </div>
     <br>
  <div class="panel-body">
   <form method ="post" action="adminQuestion.post.php" >
   
     <p>Question:</p> <br>
    <textarea cols="100" rows="10" name="question"></textarea>
    <br>
    <hr>
    <p>選 項 A:</p> <br>
    <textarea cols="100" rows="2" name="Ans_A"></textarea>
    <br>
    
     <p>選 項 B:</p> <br>
    <textarea cols="100" rows="2" name="Ans_B"></textarea>
    <br>
     
     <p>選 項 C:</p> <br>
    <textarea cols="100" rows="2" name="Ans_C"></textarea>
    <br>
     
     <p>選 項 D:</p> <br>
    <textarea cols="100" rows="2" name="Ans_D"></textarea>
    <br>
     <p>答案</p> <br>
    <textarea cols="50" rows="2" name="Ans"></textarea>
    <br>
     <br>
      <button type="submit" class="btn btn-default" name = "question_ok">送出</button>  
    </form>
   
   </div>
</div>
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>