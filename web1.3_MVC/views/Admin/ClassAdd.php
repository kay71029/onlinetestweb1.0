
<!DOCTYPE html>
 
<html>
<head>
<meta charset="UTF-8">
<title>線上測驗系統</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
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
      <a class="navbar-brand" href="Main">首頁</a>
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
       <form action="Logout">
       <button class="btn btn-default navbar-btn">登出</button>
       </form>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">新增開課資訊</h3>
  </div>
</div>
  <div class="panel-body">
    
    <!--新增課程的from -->
    <form role="form" method ="post" action="AClassIn" name="faddclass" >
      <div class="form-group input-group">
        <span class="input-group-addon">開課資訊</span>
        <input type="text" class="form-control" placeholder="" name="addclass" id="addclass">
      </div>
      <button type="submit" class="btn btn-default navbar-btn" >新增</button>
    </form>
    <!--from -->
      <br>
      <br>
    <!--修改刪除課程的from -->  
    <form role="form">   
      <hr>
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">開課資訊明細</h3>
        </div>
        <div class="panel-body">
          <table class="table">
              <tr>
                <th>課程名稱</th>
                <th>修改</th>
                <th>刪除</th>
              </tr>
              <?php foreach($data as $row){?>
              <tr>
                <td>
                <?PHP echo $row['class_id']; ?>
                </td>
                <td>
                  <a href="ClassModify?number=<?PHP echo $row['number']; ?>" class="btn btn-default navbar-btn" >修改</a>
                </td>
                <td>
                  <a href="AClassDe?class_id=<?PHP echo $row['class_id']; ?>" class="btn btn-default navbar-btn" >刪除</a>
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
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>