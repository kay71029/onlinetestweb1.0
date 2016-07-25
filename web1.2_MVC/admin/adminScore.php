<?php

  session_start();
  
  header('Content-Type: text/html; charset=utf-8');
  require("../mysql.inc.php");
  require('admindefense.php');

  /*--------------------------------------------------------
                    SELECT DISTINCT cl.ci資料表
  ---------------------------------------------------------*/ 
   
    
  $sql_sedi_cicl ="SELECT DISTINCT cl.class_id
              from class_information ci, class cl
              where ci.number=cl.number ";
  $result_sedi_cicl = mysql_query($sql_sedi_cicl);
    
    
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>線上測驗系統</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
<script type="text/javascript" src="../assets/js/jquery.js"></script>
 <script type="text/javascript">
  
    $(document).ready(init);


      function init() {
      	$("#class_name").change(letterChange);
      	 
      	letterChange();
      }
      
      function letterChange() {
      	// var s = $("#letter option:selected").val();
      	var s = $("#class_name option:selected").text();
      			
      $.get('adminScore.post.php?class_name=' + s, letterChangeDataBack)
      }
      
      function letterChangeDataBack(data) {
      	$("#recode_score").html(data);
      } 
</script>

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
    <h3 class="panel-title">成績查詢</h3>
  </div>
<div class="panel-body">
      <div class="row">
        <div class="col-lg-6">
          <!--<form role="form" method="post" action="">-->
            <div class="form-group">
              <select class="form-control" name= "class_name" id ="class_name" onchange="check()">
                 <?php  while ($row =mysql_fetch_assoc($result_sedi_cicl)){ ?>   
                  <option><?PHP echo $row['class_id']; ?></option>
                 <?php } ?>
              </select>
            </div>
          <!--</form>-->
        </div>
      </div>
</div>
  <br>
  <br>
  <div class="panel panel-default">

  <br>
  <div id="recode_score"> </div>
  </div>    
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>