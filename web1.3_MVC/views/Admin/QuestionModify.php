
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
        <li class="active"><a href="ClassAdd">開課資訊<span class="sr-only">(current)</span></a></li>
        <li class="active"><a href="StudentAdd">學生資訊<span class="sr-only">(current)</span></a></li>
        <li class="active"><a href="StudentCheck">學生資訊查看<span class="sr-only">(current)</span></a></li>
        <li class="active"><a href="ClassInforAdd">新增課程學生資料<span class="sr-only">(current)</span></a></li>
        <li class="active"><a href="ClassInforCheck">查看課程學生<span class="sr-only">(current)</span></a></li>
        <li class="active"><a href="QuestionAdd">新增題目<span class="sr-only">(current)</span></a></li>
        <li class="active"><a href="QuestionCheck">查看題庫<span class="sr-only">(current)</span></a></li>
        <li class="active"><a href="ScoreCheck">查詢成績<span class="sr-only">(current)</span></a></li>
      </ul>
       <form action="logout.php">
       <button class="btn btn-default navbar-btn">登出</button>
       </form>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">修改題目</h3>
  </div>
    <div class="panel-body">
      
      <form method ="post" action="QuestionUp">
         <?php foreach($data as $row){?>
        <p>Question:</p> <br>
        <textarea cols="100" rows="10" name="question" ><?PHP echo $row['question']; ?></textarea>
        <br>
        <hr>
         <p>選 項 A:</p> <br>
        <textarea cols="100" rows="2" name="Ans_A"><?PHP echo $row['A']; ?></textarea>
        <br>
      
         <p>選 項 B:</p> <br>
        <textarea cols="100" rows="2" name="Ans_B"><?PHP echo $row['B']; ?></textarea>
        <br>
         
         <p>選 項 C:</p> <br>
        <textarea cols="100" rows="2" name="Ans_C"><?PHP echo $row['C']; ?></textarea>
        <br>
         
         <p>選 項 D:</p> <br>
        <textarea cols="100" rows="2" name="Ans_D"><?PHP echo $row['D']; ?></textarea>
        <br>
        
         <p>答案</p> <br>
        <textarea cols="50" rows="2" name="Ans"><?PHP echo $row['ans']; ?></textarea>
        <br>
         <br>
        <input type="hidden" name="chqu_id" value="<?PHP echo $row["q_id"]; ?>">
        <button type ="submit"class="btn btn-default navbar-btn">修改</button>
       <?php }?>
      </form> 
      
    </div>      
</div class>   
 

    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>