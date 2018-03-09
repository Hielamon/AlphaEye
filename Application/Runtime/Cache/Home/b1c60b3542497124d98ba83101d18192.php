<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cmn-Hans">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="/AlphaEye/Public/assets/icon/alpha-eye.ico">

  <title>密码找回</title>

  <!-- Bootstrap core CSS -->
  <link href="/AlphaEye/Public/assets/css/bootstrap.min.css" rel="stylesheet">
  <!--<link href="/AlphaEye/Public/assets/css/bootstrap.css" rel="stylesheet">-->
  <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">-->

  <!-- Custom styles for this template -->
  <link href="/AlphaEye/Public/css/common.css?201709162348" rel="stylesheet" />
  <link href="/AlphaEye/Public/css/header.css?201710191453" rel="stylesheet">
  <link href="/AlphaEye/Public/css/retrieve_password.css?201709301330" rel="stylesheet">


</head>
<body>

<div class="container">
  <div class="header clearfix">
    <h4 class="text-muted float-left"><a href="<?php echo U('index/index');?>">AlphaEye</a></h4>
    <nav>
        <ul class="nav nav-pills float-left">
            <li class="nav-item">
                <a class="nav-link" id="index" href="<?php echo U('index/index');?>">首页</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">介绍</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">联系我们</a>
            </li>
        </ul>
    </nav>

    <?php if(empty($name)): ?><nav>
            <ul class="nav float-right">
                <li class="login">
                    <a class="btn btn-outline-primary" href="<?php echo U('user/login');?>">登录</a>
                </li>
                <li class="register">
                    <a class="btn btn-outline-primary" href="<?php echo U('user/register');?>">注册</a>
                </li>
            </ul>
        </nav>
    <?php else: ?>
        <div class="top-nav-profile float-right">
            <div class="top-link-logo">
                <a href="#" class="top-link-logo">
                    <img src="/AlphaEye/Public/images/<?php echo ($avatar); ?>" class="avatar"/>
                    <span class="name"><?php echo ($name); ?></span>
                </a>
            </div>

            <ul class="top-nav-drop">
                <li id="li-profile"><a href="<?php echo U('user/personal_data');?>"><div class="distract-div"></div>个人资料</a></li>
                <li id="li-medical-record"><a href="<?php echo U('MedicalRecord/questionnaire');?>"><div class="distract-div"></div>病历</a></li>
                <li id="li-exit"><a href="<?php echo U('index/index');?>"><div class="distract-div"></div>退出</a></li>
            </ul>
        </div>
        <script type="text/javascript" src="/AlphaEye/Public/js/common.js?201709181328"></script>
        <script type="application/javascript">
            EventUtil.addHandler(window, "load", function () {
                var existLiTag = document.getElementById("li-exit");
                var existLinkTag = existLiTag.getElementsByTagName("a")[0];

                EventUtil.addHandler(existLinkTag, "click", function () {
                    var xhr = createXHR();
                    xhr.open("POST", "<?php echo U('index/index');?>", false);
                    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                    xhr.send("exist=");

                    if((xhr.status >= 200 && xhr.status < 300) || xhr.status === 304){
                    }else {
                        alert("No response from AlphaEye Server");
                    }
                })
            })
        </script><?php endif; ?>

</div><!-- navigator -->


  <div  class="container div-retrieve">
    <h3>通过手机号和用户名找回密码</h3>
    <form class="form-retrieve">
      <div class="row">
        <div class="col-sm-2">
          <label for="inputUserName">用户名</label>
        </div>
        <div class="col-sm-10">
          <input id="inputUserName" class="form-control"  placeholder="请输入用户名" name="name" required autofocus>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-2">
          <label for="phoneNumber">手机号</label>
        </div>
        <div class="col-sm-10">
          <input id="phoneNumber" class="form-control"  placeholder="请输入手机号" name="phone-number" required>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-2">
          <label for="securityCode">验证码</label>
        </div>
        <div class="col-sm-5">
          <input id="securityCode" class="form-control" name="security-code" required>
        </div>
        <div class="col-sm-5">
          <button class="btn btn-success btn-block" id="require-button" type="submit" name="require-button" value="label">
            获取验证码
          </button>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-2">
          <label for="inputPassword">新密码</label>
        </div>
        <div class="col-sm-10">
          <input type="password" id="inputPassword" class="form-control" placeholder="请设置新密码" name="password" required>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-2">
        </div>
        <div class="col-sm-10">
          <button class="btn btn-lg btn-primary btn-block" id="create-button" type="submit" name="create-button" value="label">
            确定
          </button>
        </div>
      </div>
    </form>
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
                xhr.open("POST", "<?php echo U('user/login');?>", false);
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