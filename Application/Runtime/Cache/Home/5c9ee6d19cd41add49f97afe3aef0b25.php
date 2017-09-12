<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cmn-Hans">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="/AlphaEye/Public/assets/icon/alpha-eye.ico">

  <title>AlphaEye登录</title>

  <!-- Bootstrap core CSS -->
  <!--<link href="/AlphaEye/Public/assets/css/bootstrap.css" rel="stylesheet">-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

  <!-- Custom styles for this template -->
  <link href="/AlphaEye/Public/css/login.css" rel="stylesheet">

  <script type="text/javascript" src="/AlphaEye/Public/js/common.js"></script>

  <script type="text/javascript">
    EventUtil.addHandler(window, "load", function (event) {
      event = EventUtil.getEvent(event);
      var buttons = document.getElementsByTagName("button");
      var jump = function (event) {
        EventUtil.preventDefault(event);
        window.location.href = "<?php echo ($questionnaire_view); ?>";
      };
      EventUtil.addHandler(buttons[0], "click", jump);
    });
  </script>
</head>

<body>

<div class="container">

  <form class="form-signin">
    <h2 class="form-signin-heading">AlphaEye</h2>
    <label for="inputUserName" class="sr-only">用户名</label>
    <input type="text" id="inputUserName" class="form-control" placeholder="用户名" required autofocus>
    <label for="inputPassword" class="sr-only">密码</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="密码" required>
    <div class="checkbox">
      <label>
        <input type="checkbox" value="remember-me"> 记住用户名
      </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">登录</button>
  </form>

</div> <!-- /container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="/AlphaEye/Public/assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>