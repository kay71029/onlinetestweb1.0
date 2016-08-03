
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
      <a class="navbar-brand" href="Main">首頁</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="Modify">修改個人基本資料<span class="sr-only">(current)</span></a></li>
        <li><a href="Score">查詢成績</a></li>
      </ul>
       <form action="Logout">
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
      <form role="form" method ="post" action="../Exam/Exam">
        <div class="form-group">
            <select class="form-control" name ="class_choice">
               <?php foreach($data as $row){?>
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
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>