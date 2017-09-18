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
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">-->

    <!-- Custom styles for this template -->
    <link href="/AlphaEye/Public/css/common.css?201709162348" rel="stylesheet" />
    <link href="/AlphaEye/Public/css/header.css?201709162348" rel="stylesheet" />
    <link href="/AlphaEye/Public/css/personal_data.css?201709172248" rel="stylesheet">

</head>

<body>

<div class="container">
    <div class="header clearfix">
    <h4 class="text-muted float-left">AlphaEye</h4>
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
                <li id="li-profile"><a href="<?php echo U('user/personal_data');?>">个人资料</a></li>
                <li id="li-medical-record"><a href="#">病历</a></li>
                <li id="li-exit"><a href="<?php echo U('index/index');?>">退出</a></li>
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


</div> <!-- /container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="/AlphaEye/Public/assets/js/ie10-viewport-bug-workaround.js"></script>
<script type="text/javascript" src="/AlphaEye/Public/assets/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="/AlphaEye/Public/js/common.js?201709180009"></script>

<script type="text/javascript">
</script>
</body>
</html>