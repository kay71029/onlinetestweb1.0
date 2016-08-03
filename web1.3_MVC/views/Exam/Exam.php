<?php
  session_start();
  
  header('Content-Type: text/html; charset=utf-8');
  include("mysql.inc.php");
  require('defense.php');
 
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
      
      <p>考試科目:</p><?php echo $_POST['class_choice']; ?><!---usersClass課程名稱--->
      <br>
      <p>考試時間</P> <?php echo $datetime = date("Y/m/d H:i");?><!---系統時間--->
      <br>
      <br>
      <br>
     <form action="GetScore" method="post">
      <div class="form-group">
        <?php 
        //-----------------------------------------------------------------------------------------
        //    get_random_nunber() 取得題庫的題目筆數
        //   產生五個不會重複的亂數存到  $para_number_array[]陣列
        //    宣告空的陣列[0,0,0,0,0] 將亂數放入
        //------------------------------------------------------------------------------------------
            function get_random_nunber($para_number_array)
            {
               // 取得目前的題庫題目數目 
             $str_sql_calc_no_of_qut= "SELECT COUNT(*) FROM `questiondata`";
             $rec_set_int_no_of_qut= mysql_query($str_sql_calc_no_of_qut);
             $int_no_of_qut =1;
    
                  while ($row = mysql_fetch_array($rec_set_int_no_of_qut))
                  {
                  //echo $row[0];//資料庫總筆數
                      $int_no_of_qut = $row[0];
                  } 
              
                 // 產生五個不會重複的亂數存到  $para_number_array[]陣列
                mt_srand((double)microtime()*1000000);//以時間當亂數種子
                $gonb=5;
                $a=0;
                while( !$para_number_array[$a] ){
                    
                    if( $a > $gonb-1 ) break;
                    $sn = mt_rand(1,(int)$int_no_of_qut); 
                    
                    //判斷亂數有沒有在陣列
                    if(!in_array($sn,$para_number_array)){
                    $para_number_array[$a]=$sn;
                    $a++;
                    }
                }
                return $para_number_array;
             }
             $rand_no_array = array(0,0,0,0,0);//先宣告空的陣列
            
             $rand_no_array = get_random_nunber($rand_no_array );
        //-----------------------------------------------------------------------------------------
        //   根據亂數陣列抓題目$i-1  ---因為陣列元素從0起算 ，撈出題目跟選項
        //    跑for迴圈將題目列出來
        //    $loopcounter++;//用來動態產生群族編號
        //------------------------------------------------------------------------------------------      
             
            
              $loopcounter = 0;
          for($i=1;$i<=5;$i++){
           
            //根據亂數陣列抓題目$i-1  ---因為陣列元素從0起算 勞出題目跟選項
            
             $question_data ="SELECT question, A, B,C, D from questiondata where q_id= {$rand_no_array[ $i-1 ]}";
             //echo $question_data;
            $question_r = mysql_query($question_data);
            //顯示題目
            
            while ($row1 = mysql_fetch_array ($question_r))
            {
               echo "<label>" . $rand_no_array[ $i-1 ] ."　　". $row1[0] . "</label>";
               echo "<div class=\"radio\">";
               echo "<label>";
             
              $loopcounter++;//用來動態產生群族編號  ---4選1 
               echo "<input type=\"radio\" name=" . "\"group" . $loopcounter . "\"" . " value=\"A\">" . "(A) {$row1[1]} <br>";
               echo "</label>";
               echo "</div>";
               
               echo "<div class=\"radio\">";
               echo "<label>";
            
               echo "<input type=\"radio\" name=" . "\"group" . $loopcounter . "\"" . " value=\"B\" >" . "(B) {$row1[2]} <br>";
               echo "</label>";
               echo "</div>";
          
               echo "<div class=\"radio\">";
               echo "<label>";
              
               echo "<input type=\"radio\" name=" . "\"group" . $loopcounter . "\"" . " value=\"C\" >" . "(C) {$row1[3]} <br>";
               echo "</label>";
               echo "</div>";
               
               echo "<div class=\"radio\">";
               echo "<label>";
             
               echo "<input type=\"radio\" name=" . "\"group" . $loopcounter . "\"" . " value=\"D\" >" . "(D) {$row1[4]} <br>";
               echo "</label>";
               echo "</div>";
              
              
              //取得課程編號 
              $sql_class_number = "SELECT number FROM class where class_id='".$_POST['class_choice']."'";
              $class_number = mysql_query($sql_class_number);
              
              $classs_nu = 0;
              while($row_number = mysql_fetch_row( $class_number)){
                  $classs_nu = $row_number[0] ;
              }
             //----------------------------------------------------------------------------------------
             // 將題目新增到 recode 表
             //
             //----------------------------------------------------------------------------------------
             $inter_recode = "INSERT INTO recode(user_id, number, q_id, r_date) VALUES 
                            ('" . $_SESSION['user_id'] . "',  $classs_nu , {$rand_no_array[$i-1]}, '$datetime' )";
             $question_r2 = mysql_query($inter_recode);
                 
                $str_q_id = "q_id_" . $i; 
                $_SESSION[$str_q_id]   = $rand_no_array[$i-1];
                 
            }
          }
          //------------------------------------------------------------------------------------------------
          //將考試日期 用$_SESSION 
          //------------------------------------------------------------------------------------------------
            $_SESSION['r_date'] = $datetime;
            
            $_SESSION['number']= $classs_nu;
             
         ?>
      </div>
      <p><input type="submit" name="sub"/></p></a></p>
      <p><input type="reset" name="sub"/></p></a></p>
    </form>  

 </div>
</div>
</body>