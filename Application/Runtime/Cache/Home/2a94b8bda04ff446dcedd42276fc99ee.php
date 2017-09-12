<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cmn-Hans">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="/AlphaEye/Public/assets/icon/alpha-eye.ico">

  <title>AlphaEye的主页</title>

  <!-- Bootstrap core CSS -->
  <link href="/AlphaEye/Public/assets/css/bootstrap.min.css" rel="stylesheet">
  <!--<link href="/AlphaEye/Public/assets/css/bootstrap.css" rel="stylesheet">-->
  <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">-->

  <!-- Custom styles for this template -->
  <link href="/AlphaEye/Public/css/index.css" rel="stylesheet">
</head>
<body>

<div class="container">
  <div class="header clearfix">
    <h4 class="text-muted float-left">AlphaEye</h4>
    <nav>
      <ul class="nav nav-pills float-left">
        <li class="nav-item">
          <a class="nav-link active" href="#">首页 <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">介绍</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">联系我们</a>
        </li>
      </ul>
    </nav>

    <nav>
      <ul class="nav float-right">
        <li class="login">
          <a class="btn btn-outline-primary" href="<?php echo ($login_view); ?>">登录</a>
        </li>
        <li class="register">
          <a class="btn btn-outline-primary" href="<?php echo ($register_view); ?>">注册</a>
        </li>
      </ul>
    </nav>
  </div><!-- navigator -->

  <div class="jumbotron">
    <h2 >AlphaEye数据采集平台</h2>
    <p class="lead">本网站用于采集患者的眼表疾病数据。患者填写症状问卷后，可以查看初步的诊断结果。</p>
    <p style="visibility: hidden;"><a class="btn btn-lg btn-success" href="#" role="button">Getting Start</a></p>
  </div>

  <footer class="footer">
    <p>&copy; 厦门大学智能多媒体实验室2017</p>
  </footer>

</div> <!-- /container -->

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="/AlphaEye/Public/assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>