 
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
      <a class="navbar-brand" href="../User/Main">首頁</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="../User/Modify">修改個人基本資料<span class="sr-only">(current)</span></a></li>
        <li><a href="../User/Score">查詢成績</a></li>
      </ul>
       <form action="Logout">
         <button class="btn btn-default navbar-btn">登出</button>
       </form>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">測驗開始</h3>
  </div>
  <div class="panel-body">
  <form name="form" method="post" action="GetScore" >
    
      <p>考試科目:</p> <?php echo $_POST['number'].$_POST['class_choice'];?><!---usersClass課程名稱--->
      <br>
      <p>考試時間</P> <?php echo $datetime = date("Y/m/d H:i");?><!---系統時間--->
        
      
      <input type="hidden" name="datetime" value="<?php echo $datetime = date("Y/m/d H:i");?>"> 
      
      <input type="hidden" name="classnumber" value="<?php echo $_POST['number'].$_POST['class_choice'];?>">
      <br>
      <br>
      <br>
     
    <p><?php echo $data[0][0].".".$data[0][1]?></p>
    <input type="hidden" name="number" value="<?php echo $data[0][0]?>">
    <input type=radio name=op$no value=A ><?php echo $data[0][2]?><p>
    <input type=radio name=op$no value=B><?php echo $data[0][3]?><p>
    <input type=radio name=op$no value=C><?php echo $data[0][4]?><p>
    <input type=radio name=op$no value=D><?php echo $data[0][5]?><p>
    <input type="hidden" name="Ans" value="<?php echo $data[0][6]?>">    
    
    <p><?php echo $data[1][0].".".$data[1][1]?></p>
    <input type="hidden" name="number1" value="<?php echo $data[1][0]?>">
    <input type=radio name=op$no1 value=A ><?php echo $data[1][2]?><p>
    <input type=radio name=op$no1 value=B><?php echo $data[1][3]?><p>
    <input type=radio name=op$no1 value=C><?php echo $data[1][4]?><p>
    <input type=radio name=op$no1 value=D><?php echo $data[1][5]?><p>
    <input type="hidden" name="Ans1" value="<?php echo $data[1][6]?>">       
    
    <p><?php echo $data[2][0].".".$data[2][1]?></p>
    <input type="hidden" name="number2" value="<?php echo $data[2][0]?>">
    <input type=radio name=op$no2 value=A ><?php echo $data[2][2]?><p>
    <input type=radio name=op$no2 value=B><?php echo $data[2][3]?><p>
    <input type=radio name=op$no2 value=C><?php echo $data[2][4]?><p>
    <input type=radio name=op$no2 value=D><?php echo $data[2][5]?><p>
    <input type="hidden" name="Ans2" value="<?php echo $data[2][6]?>">        
    
    <p><?php echo $data[3][0].".".$data[3][1]?></p>
    <input type="hidden" name="number3" value="<?php echo $data[3][0]?>">
    <input type=radio name=op$no3 value=A ><?php echo $data[3][2]?><p>
    <input type=radio name=op$no3 value=B><?php echo $data[3][3]?><p>
    <input type=radio name=op$no3 value=C><?php echo $data[3][4]?><p>
    <input type=radio name=op$no3 value=D><?php echo $data[3][5]?><p>
    <input type="hidden" name="Ans3" value="<?php echo $data[3][6]?>">        
    
    <p><?php echo $data[4][0].".".$data[4][1]?></p>
    <input type="hidden" name="number4" value="<?php echo $data[4][0]?>">
    <input type=radio name=op$no4 value=A ><?php echo $data[4][2]?><p>
    <input type=radio name=op$no4 value=B><?php echo $data[4][3]?><p>
    <input type=radio name=op$no4 value=C><?php echo $data[4][4]?><p>
    <input type=radio name=op$no4 value=D><?php echo $data[4][5]?><p>
    <input type="hidden" name="Ans4" value="<?php echo $data[4][6]?>">    
            
      
      <div class="form-group">
     
      </div>
      <p><input type="submit" name="sub"/></p></a></p>
      <p><input type="reset" name="sub"/></p></a></p>
    </form>  
     
 </div>
</div>
</body>