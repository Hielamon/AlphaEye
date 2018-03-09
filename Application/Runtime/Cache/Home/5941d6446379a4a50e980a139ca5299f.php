<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cmn-Hans">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="/AlphaEye/Public/assets/icon/alpha-eye.ico">

  <title>AlphaEye介绍</title>

  <!-- Bootstrap core CSS -->
  <link href="/AlphaEye/Public/assets/css/bootstrap.min.css" rel="stylesheet">
  <!--<link href="/AlphaEye/Public/assets/css/bootstrap.css" rel="stylesheet">-->
  <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">-->

  <!-- Custom styles for this template -->
  <link href="/AlphaEye/Public/css/common.css?201709162348" rel="stylesheet">
  <link href="/AlphaEye/Public/css/header.css?201710191443" rel="stylesheet">
  <link href="/AlphaEye/Public/css/index.css?201801031521" rel="stylesheet">

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
                <a class="nav-link" id="intro" href="<?php echo U('index/introduction');?>">介绍</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact" href="<?php echo U('index/contact');?>">联系我们</a>
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



  <div class="jumbotron">
    <h2 >AlphaEye</h2>
    <h4>基于AI的眼表疾病诊断辅助系统</h4>
    <p class="lead" style="text-align: left; margin-top: 1rem; text-indent: 2rem">感染性角膜病的防治对于提升各级医疗机构的防盲治盲平台建设和能力具有重要的实际应用价值。但是目前基层医疗机构的诊断能力较低。基于人工智能的临床辅助诊疗为我们提供了一种新的思路。由于涉及多学科交叉，数据采集设备昂贵，人工标注数据问题耗时，存在体征识别模式和单病种模式等问题，目前利用人工智能技术对眼表疾病（感染性角膜炎）的分析在国内外的研究中还处于空白。本课题针对上述的问题展开研究，利用厦门大学眼科研究所和厦门大学智能科学与技术系在角膜疾病和人工智能领域的优势，共同完成感染性角膜病的人工智能平台建设，使基层医院也能够享受到由人工智能提供的“专家级”诊疗服务。</p>

  </div>

  <footer class="footer">
    <p>&copy; 厦门大学智能多媒体实验室2017</p>
  </footer>

</div> <!-- /container -->

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- IE10 viewport hack forindex.html Surface/desktop Windows 8 bug -->
<!--load the js files-->
<script type="text/javascript" src="/AlphaEye/Public/assets/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="/AlphaEye/Public/js/common.js?201709181340"></script>
<script type="text/javascript" src="/AlphaEye/Public/assets/js/ie10-viewport-bug-workaround.js"></script>

<script type="text/javascript">
    var indexPinTag = document.getElementById("intro");
    addClass(indexPinTag, "active");
</script>
</body>
</html>