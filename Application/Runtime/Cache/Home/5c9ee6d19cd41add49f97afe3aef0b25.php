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
  <link href="/AlphaEye/Public/assets/css/bootstrap.min.css" rel="stylesheet">
  <!--<link href="/AlphaEye/Public/assets/css/bootstrap.css" rel="stylesheet">-->
  <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">-->

  <!-- Custom styles for this template -->
  <link href="/AlphaEye/Public/css/common.css?201709162348" rel="stylesheet" />
  <link href="/AlphaEye/Public/css/login.css?201709172248" rel="stylesheet">

</head>

<body>

<div class="container">

  <form class="form-login">
    <h2 class="form-login-heading">AlphaEye</h2>
    <div class="input-div">
      <label for="inputUserName" class="sr-only">用户名</label>
      <input type="text" id="inputUserName" class="form-control" placeholder="用户名" name="name" value="<?php echo ($name); ?>" required autofocus>
    </div>

    <div class="input-div">
      <label for="inputPassword" class="sr-only">密码</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="密码" name="password" required>
    </div>

    <div class="checkbox">
      <label>
        <input type="checkbox" name="remember" value="remember-me"> 记住用户名
      </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" id="submit-button" type="submit">登录</button>
  </form>

  <div class="container extra-div">
    <a href="<?php echo U('user/register');?>">注册新账号</a>
  </div>

</div> <!-- /container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="/AlphaEye/Public/assets/js/ie10-viewport-bug-workaround.js"></script>
<script type="text/javascript" src="/AlphaEye/Public/assets/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="/AlphaEye/Public/js/common.js?201709180009"></script>

<script type="text/javascript">
    EventUtil.addHandler(window, "load", function (event) {
        var submitButtons = document.getElementById("submit-button");

        var jump = function (event) {
            EventUtil.preventDefault(event);
            window.location.href = "<?php echo ($questionnaire_view); ?>";
        };

        var loginForm = document.getElementsByClassName("form-login")[0];
        var inputUserName = $("#inputUserName"), inputPassword = $("#inputPassword");
        EventUtil.addHandler(inputUserName[0], "focus", removeWarningColorHandler);
        EventUtil.addHandler(inputPassword[0], "focus", removeWarningColorHandler);
        EventUtil.addHandler(loginForm, "blur", removeWarningHandler);

        EventUtil.addHandler(submitButtons, "click", function (event) {
            EventUtil.preventDefault(event);
            var validInputConfig = true;

            {
                if(inputUserName.val() === ""){
                    validInputConfig = false;
                    addWarningInner(inputUserName, "请填写用户名", "right");
                }

                if(inputPassword.val() === ""){
                    validInputConfig = false;
                    addWarningInner(inputPassword, "请填写密码  ", "right");
                }
            }

            if(validInputConfig){
                var xhr = createXHR();
                xhr.open("POST", "<?php echo ($login_view); ?>", false);
                xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                xhr.send($(loginForm).serialize());

                if((xhr.status >= 200 && xhr.status < 300) || xhr.status === 304){
                    var responseValue = parseInt(xhr.responseText);
                    switch(responseValue){
                        //用户名不存在
                        case 1:
                            addWarningInner(inputUserName, "用户名不存在", "right");
                            break;
                        //密码错误
                        case 2:
                            addWarningInner(inputPassword, "密码错误", "right");
                            break;
                        //登录成功
                        case 0:
                            window.location.href = "<?php echo U('MedicalRecord/questionnaire');?>";
                            break;
                        default :
                            break;
                    }

                }else {
                    alert("No response from AlphaEye Server");
                }
            }
        });
    });
</script>
</body>
</html>