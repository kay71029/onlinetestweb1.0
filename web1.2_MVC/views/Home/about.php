
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>教師簡介</title>

    <!-- Bootstrap Core CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../assets/css/business-casual.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <div class="brand">Business Casual</div>
    <div class="address-bar">3481 Melrose Place | Beverly Hills, CA 90210 | 123.456.7890</div>
    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                <a class="navbar-brand" href="index.html">Business Casual</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index">最新消息 </a>
                    </li>
                    <li>
                        <a href="about">教師簡介</a>
                    </li>
                    <li>
                        <a href="index">課程資訊 </a>
                    </li>
                    <li>
                        <a href="index">研究專區</a>
                    </li>
                    <li>
                        <a href="../User/Login">線上測驗</a>
                    </li>
                    <li>
                        <a href="https://onlinetest1-kay-yu.c9users.io/web1.2_MVC/admin/adminlogin.php">後台管理</a>
                    </li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <div class="container">
        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">
                        <strong>About Me</strong>
                    </h2>
                    <hr>
                </div>
                <form method = "post" action ="about"> 
                <div class="col-md-2">
                    <img class="img-responsive img-border-left" src="../assets/img/emma lee.jpg" alt="">
                </div>
                <div class="col-md-10">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            個人簡介
                        </div>
                       
                        <div class="panel-body">
                         <table class="table table-striped table-bordered table-hover">
                                    <tbody>
                                        <tr>
                                            <td>姓　　名</td>
                                            <td><?PHP echo $data->name;?></td>
                                        </tr>
                                        <tr>
                                            <td>職　　稱</td>
                                            <td><?PHP echo $data->jobtitle;?></td>
                                        </tr>
                                        <tr>
                                            <td>學　　歷</td>
                                            <td><?PHP echo $data->educational;?></td>
                                        </tr>
                                        <tr>
                                            <td>辦 公 室</td>
                                            <td><?PHP echo $data->office;?></td>
                                        </tr>
                                        <tr>
                                            <td>校內分機</td>
                                            <td><?PHP echo $data->tel;?></td>
                                        </tr>
                                        <tr>
                                            <td>信　　箱</td>
                                            <td><?PHP echo $data->email;?></td>
                                        </tr>
                                        <tr>
                                            <td>學術專長</td>
                                            <td><?PHP echo $data->specialty;?></td>
                                        </tr>
                                        <tr>
                                            <td>office time</td>
                                            <td><?PHP echo $data->officetime;?></td>
                                        </tr>
                                    </tbody>
                                </table>
                        </div>
                       
                        <div class="clearfix"></div>
                    </div>
                </div>
                </form>
            </div>
    <!-- /.container -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                   
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="../assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../assets/js/bootstrap.min.js"></script>

</body>

</html>
