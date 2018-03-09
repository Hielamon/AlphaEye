<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cmn-Hans">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="/AlphaEye/Public/assets/icon/alpha-eye.ico">

  <title>AlphaEye注册</title>

  <!-- Bootstrap core CSS -->
  <link href="/AlphaEye/Public/assets/css/bootstrap.min.css" rel="stylesheet">
  <!--<link href="/AlphaEye/Public/assets/css/bootstrap.css" rel="stylesheet">-->
  <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">-->

  <!-- Custom styles for this template -->
  <link href="/AlphaEye/Public/css/common.css?201709162348" rel="stylesheet" />
  <link href="/AlphaEye/Public/css/header.css?201709162348" rel="stylesheet">
  <link href="/AlphaEye/Public/css/register.css" rel="stylesheet">

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


  <div class="container div-signup">
    <h2>注册一个AlphaEye用户</h2>
    <div class="steps-container">
    <ol class="steps">
      <li class="current" id="step-one">
        <svg aria-hidden="true" class="small-icon float-left" version="1.1" height="32" width="24" viewBox="0 0 12 16"><path fill-rule="evenodd" d="M12 14.002 a.998 .998 0 0 1-.998.998H1.001A1 1 0 0 1 0 13.999V13c0-2.633 4-4 4-4s.229-.409 0-1c-.841-.62-.944-1.59-1-4 .173-2.413 1.867-3 3-3s2.827.586 3 3c-.056 2.41-.159 3.38-1 4-.229.59 0 1 0 1s4 1.367 4 4v1.002z"></path></svg>
        <strong class="step">步骤一：</strong>
        创建个人用户
      </li>
      <li id="step-two">
        <svg aria-hidden="true" class="small-icon float-left" height="32" version="1.1" viewBox="0 0 14 16" width="28"><path fill-rule="evenodd" d="M13 3H7c-.55 0-1 .45-1 1v8c0 .55.45 1 1 1h6c.55 0 1-.45 1-1V4c0-.55-.45-1-1-1zm-1 8H8V5h4v6zM4 4h1v1H4v6h1v1H4c-.55 0-1-.45-1-1V5c0-.55.45-1 1-1zM1 5h1v1H1v4h1v1H1c-.55 0-1-.45-1-1V6c0-.55.45-1 1-1z"></path></svg>
        <strong class="step">步骤二：</strong>
        选择用户类型
      </li>
      <li id="step-three">
        <svg aria-hidden="true" class="small-icon float-left" height="32" version="1.1" viewBox="0 0 14 16" width="28"><path fill-rule="evenodd" d="M14 8.77v-1.6l-1.94-.64-.45-1.09.88-1.84-1.13-1.13-1.81.91-1.09-.45-.69-1.92h-1.6l-.63 1.94-1.11.45-1.84-.88-1.13 1.13.91 1.81-.45 1.09L0 7.23v1.59l1.94.64.45 1.09-.88 1.84 1.13 1.13 1.81-.91 1.09.45.69 1.92h1.59l.63-1.94 1.11-.45 1.84.88 1.13-1.13-.92-1.81.47-1.09L14 8.75v.02zM7 11c-1.66 0-3-1.34-3-3s1.34-3 3-3 3 1.34 3 3-1.34 3-3 3z"></path></svg>
        <strong class="step">步骤三：</strong>
        填写个人资料
        <span>（必填*）</span>
      </li>
    </ol>
    </div>

    <form class="form-create" method="post">
      <div class="row">
        <div class="col-sm-2">
          <label for="inputUserName">用户名</label>
        </div>
        <div class="col-sm-10">
          <input id="inputUserName" class="form-control"  placeholder="请设置用户名" name="name" required autofocus>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-2">
          <label for="inputPassword">密码</label>
        </div>
        <div class="col-sm-10">
          <input type="password" id="inputPassword" class="form-control" placeholder="请设置登录密码" name="password" required>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-2">
        </div>
        <div class="col-sm-10">
          <button class="btn btn-lg btn-primary btn-block" id="create-button" type="submit" name="create-button" value="label">
            创建
          </button>
        </div>
      </div>
    </form>

    <form class="form-choose-type">
      <ul class="custom-radio">
        <li>
          <input type="radio" id="user-option" name="user-type" checked value="普通用户" class="">
          <label for="user-option">
            <svg x="0px" y="0px" viewBox="0 0 24 24" height="56" width="56" class="float-left">
              <ellipse cx="12" cy="8" rx="5" ry="6"/>
              <path d="M21.8,19.1c-0.9-1.8-2.6-3.3-4.8-4.2c-0.6-0.2-1.3-0.2-1.8,0.1c-1,0.6-2,0.9-3.2,0.9s-2.2-0.3-3.2-0.9    C8.3,14.8,7.6,14.7,7,15c-2.2,0.9-3.9,2.4-4.8,4.2C1.5,20.5,2.6,22,4.1,22h15.8C21.4,22,22.5,20.5,21.8,19.1z"/>
            </svg>
            <span class="float-left">您是一位普通用户</span>
          </label>

          <div class="check"></div>
        </li>
        <li>
          <input type="radio" id="doctor-option" name="user-type" value="医生" class="" >
          <label for="doctor-option">
            <svg x="0px" y="0px" viewBox="0 0 100 100" height="56" width="56" class="float-left">
              <g transform="translate(0,-952.36218)">
                <path d="m 49.265612,958.36218 c -10.7407,0 -18.97,10.497 -18.97,23 0,12.5029 8.2293,23.00002 18.97,23.00002 10.7411,0 19.0012,-10.49712 19.0012,-23.00002 0,-12.503 -8.2601,-23 -19.0012,-23 z m -8.1568,48.00002 c -15.5638,2.0312 -28.139,9.0822 -31.0332,19.1562 -0.1007995,0.3552 -0.1007995,0.7386 0,1.0938 1.7138,5.9654 6.9401,10.8476 14.0009,14.2812 7.0608,3.4336 16.0647,5.4688 25.9079,5.4688 9.8433,0 18.8782,-2.0352 25.9391,-5.4688 7.0608,-3.4336 12.2871,-8.3158 14.0008,-14.2812 0.100901,-0.3552 0.100901,-0.7386 0,-1.0938 -2.893899,-10.0741 -15.4689,-17.125 -31.0331,-19.1562 -0.6429,-0.082 -1.3199,0.1714 -1.750099,0.6562 l -7.1567,8.1875 -7.1255,-8.1875 c -0.4302,-0.4848 -1.1072,-0.7385 -1.7501,-0.6562 z m 23.814,13.25 4.0002,0 0,6 6.0004,0 0,4 -6.0004,0 0,6 -4.0002,0 0,-6 -6.0004,0 0,-4 6.0004,0 0,-6 z"/>
              </g>
            </svg>
            <span class="float-left">您是一位医生</span>
          </label>

          <div class="check"></div>
        </li>
      </ul>

      <button class="btn btn-lg btn-primary btn-block" id="choose-button" type="submit">
        继续
      </button>
    </form>

    <form class="form-detail">
      <!--<h3>请填写个人资料</h3>-->
      <div class="row">
        <div class="col-sm-2">
          <label for="real-name">姓名</label>
          <span class="require-star">*</span>
        </div>
        <div class="col-sm-10">
          <input type="text" id="real-name" class="form-control" placeholder="请输入真实姓名" name="real-name" required autofocus />
        </div>
      </div>

      <div class="row">
        <div class="col-sm-2">
          <span>性别</span>
          <span class="require-star">*</span>
        </div>
        <div class="col-sm-10">
          <ul class="custom-radio">
            <li>
              <label for="male">男</label>
              <input type="radio" name="gender" id="male" value="男"/>
              <div class="check"></div>
            </li>
            <li>
              <label for="female">女</label>
              <input type="radio" name="gender" id="female" value="女"/>
              <div class="check"></div>
            </li>
          </ul>
        </div>
      </div>

      <div class="row age-div">
        <div class="col-sm-2">
          <label for="age">年龄</label>
          <span class="require-star">*</span>
        </div>
        <div class="col-sm-10">
          <input type="number" id="age" class="form-control" name="age" required>
        </div>
      </div>

      <div class="row ethnic-div">
        <div class="col-sm-2">
          <label for="ethnic">民族</label>
          <span class="require-star">*</span>
        </div>
        <div class="col-sm-10">
          <select name="ethnic" id="ethnic" class="form-control">
            <option value="汉族">汉族</option>
            <option value="蒙古族">蒙古族</option>
            <option value="回族">回族</option>
            <option value="藏族">藏族</option>
            <option value="维吾尔族">维吾尔族</option>
            <option value="苗族">苗族</option>
            <option value="彝族">彝族</option>
            <option value="壮族">壮族</option>
            <option value="布依族">布依族</option>
            <option value="朝鲜族">朝鲜族</option>
            <option value="满族">满族</option>
            <option value="侗族">侗族</option>
            <option value="瑶族">瑶族</option>
            <option value="白族">白族</option>
            <option value="土家族">土家族</option>
            <option value="哈尼族">哈尼族</option>
            <option value="哈萨克族">哈萨克族</option>
            <option value="傣族">傣族</option>
            <option value="黎族">黎族</option>
            <option value="傈僳族">傈僳族</option>
            <option value="佤族">佤族</option>
            <option value="畲族">畲族</option>
            <option value="高山族">高山族</option>
            <option value="拉祜族">拉祜族</option>
            <option value="水族">水族</option>
            <option value="东乡族">东乡族</option>
            <option value="纳西族">纳西族</option>
            <option value="景颇族">景颇族</option>
            <option value="柯尔克孜族">柯尔克孜族</option>
            <option value="土族">土族</option>
            <option value="达斡尔族">达斡尔族</option>
            <option value="仫佬族">仫佬族</option>
            <option value="羌族">羌族</option>
            <option value="布朗族">布朗族</option>
            <option value="撒拉族">撒拉族</option>
            <option value="毛南族">毛南族</option>
            <option value="仡佬族">仡佬族</option>
            <option value="锡伯族">锡伯族</option>
            <option value="阿昌族">阿昌族</option>
            <option value="普米族">普米族</option>
            <option value="塔吉克族">塔吉克族</option>
            <option value="怒族">怒族</option>
            <option value="乌孜别克族">乌孜别克族</option>
            <option value="俄罗斯族">俄罗斯族</option>
            <option value="鄂温克族">鄂温克族</option>
            <option value="德昂族">德昂族</option>
            <option value="保安族">保安族</option>
            <option value="裕固族">裕固族</option>
            <option value="京族">京族</option>
            <option value="塔塔尔族">塔塔尔族</option>
            <option value="独龙族">独龙族</option>
            <option value="鄂伦春族">鄂伦春族</option>
            <option value="赫哲族">赫哲族</option>
            <option value="门巴族">门巴族</option>
            <option value="珞巴族">珞巴族</option>
            <option value="基诺族">基诺族</option>
          </select>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-2">
          <span>婚配</span>
          <span class="require-star">*</span>
        </div>
        <div class="col-sm-10">
          <ul class="custom-radio">
            <li>
              <label for="married">未婚</label>
              <input type="radio" name="marriage" id="married" value="未婚"/>
              <div class="check"></div>
            </li>
            <li>
              <label for="unmarried">已婚</label>
              <input type="radio" name="marriage" id="unmarried" value="已婚"/>
              <div class="check"></div>
            </li>
          </ul>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-2">
          <label for="career">职业</label>
        </div>
        <div class="col-sm-10">
          <input type="text" id="career" placeholder="请输入您的职业" name="career" class="form-control">
        </div>
      </div>

      <div class="row">
        <div class="col-sm-2">
          <label for="native-place">籍贯</label>
        </div>
        <div class="col-sm-10">
          <input type="text" id="native-place" placeholder="请输入您的籍贯" name="native-place" class="form-control">
        </div>
      </div>

      <div class="row">
        <div class="col-sm-2">
          <label for="obode">常住地</label>
        </div>
        <div class="col-sm-10">
          <input type="text" id="obode" placeholder="请输入您的常住地" name="obode" class="form-control">
        </div>
      </div>

      <div class="row">
        <div class="col-sm-2">
        </div>
        <div class="col-sm-10">
          <button class="btn btn-lg btn-primary btn-block" id="sign-up-button" type="submit">
            注册
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
<script type="text/javascript" src="/AlphaEye/Public/assets/js/jquery-3.2.1.min.js"></script>

<script type="text/javascript" src="/AlphaEye/Public/js/common.js?t=201709172346"></script>
<script type="text/javascript">

    EventUtil.addHandler(window, "load", function (event) {


        var createForm = document.getElementsByClassName("form-create")[0];
        var chooseForm = document.getElementsByClassName("form-choose-type")[0];
        var detailForm = document.getElementsByClassName("form-detail")[0];
        var step1Tag = document.getElementById("step-one");
        var step2Tag = document.getElementById("step-two");
        var step3Tag = document.getElementById("step-three");

        var createButton = document.getElementById("create-button");
        var chooseButton = document.getElementById("choose-button");
        var signUpButton = document.getElementById("sign-up-button");

        var inputUserName = $("#inputUserName"), inputPassword = $("#inputPassword");
        EventUtil.addHandler(inputUserName[0], "focus", removeWarningColorHandler);
        EventUtil.addHandler(inputPassword[0], "focus", removeWarningColorHandler);
        EventUtil.addHandler(createButton, "blur", removeWarningHandler);
        EventUtil.addHandler(chooseButton, "blur", removeWarningHandler);
//          EventUtil.addHandler(signUpButton, "blur", removeWarningHandler);

        EventUtil.addHandler(createButton, "click", function (event) {
            EventUtil.preventDefault(event);
            var validInputConfig = true;
            {
                if(inputUserName.val() === ""){
                    validInputConfig = false;
                    addWarning(inputUserName, "用户名不能为空", "red");

                }

                if(inputPassword.val() === ""){
                    validInputConfig = false;
                    addWarning(inputPassword, "密码不能为空", "red");
                }
            }

            if(validInputConfig){
                var xhr = createXHR();
                xhr.open("POST", "<?php echo U('user/register');?>", false);
                xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                xhr.send($(createForm).serialize() + "&create-button=");

                if((xhr.status >= 200 && xhr.status < 300) || xhr.status === 304){
                    var responseValue = parseInt(xhr.responseText);
                    if(responseValue === 1){
//                          alert("right");
                        createForm.style.display = "none";
                        chooseForm.style.display = "block";
                        step1Tag.className = "";
                        step2Tag.className = "current";
                    }
                    else {
                        addWarning($(createButton), "用户名已存在");
                        inputUserName.css({"border-color" : "red"});
//                        var waringTag = $("<span></span>").text("用户名已存在");
//                        waringTag.css({"color" : "#CC3333", "position": "absolute", "font-size" : "0.7rem"});
//                        $(createButton).after(waringTag);
                    }
                }else {
                    alert("No response from AlphaEye Server");
                }
            }
        });

        var typeListTags = document.getElementsByName("user-type");
        EventUtil.addHandler(chooseButton, "click", function (event) {
            EventUtil.preventDefault(event);
            var chooseType = "user-option";
            for(var i = 0; i < typeListTags.length; i++){
                if(typeListTags[i].checked){
                    chooseType = typeListTags[i].id;
                }
            }

            if(chooseType === "doctor-option"){
                addWarning($(chooseButton), "医生用户注册暂时未开放");
            }
            else{
                chooseForm.style.display = "none";
                detailForm.style.display = "block";
                step2Tag.className = "";
                step3Tag.className = "current";
            }
        });

        var realName = $("#real-name"), age = $("#age"), j;
        EventUtil.addHandler(realName[0], "focus", removeWarningColorHandler);
        EventUtil.addHandler(age[0], "focus", removeWarningColorHandler);
        //TODO:check the existence
        var customListTags = detailForm.getElementsByTagName("ul");
        var sexULTag = $(customListTags[0]), marriageULTag = $(customListTags[1]);

        var sexListTags = document.getElementsByName("gender");
        var sexValue = "";
        for(j = 0; j < sexListTags.length; j++){
            EventUtil.addHandler(sexListTags[j], "click", function (event) {
                event = EventUtil.getEvent(event);
                var target = EventUtil.getTarget(event);
                sexValue = target.parentNode.getElementsByTagName("label")[0].innerHeight;
                $(sexULTag).siblings("span").remove();
            })
        }
        var marryListTags = document.getElementsByName("marriage");
        var marriageValue = "";
        for(j = 0; j < marryListTags.length; j++){
            EventUtil.addHandler(marryListTags[j], "click", function (event) {
                event = EventUtil.getEvent(event);
                var target = EventUtil.getTarget(event);
                marriageValue = target.parentNode.getElementsByTagName("label")[0].innerHeight;
                $(marriageULTag).siblings("span").remove();
            })
        }

        var forbidSubmit = false;
        EventUtil.addHandler(signUpButton, "click", function (event) {

            EventUtil.preventDefault(event);

            if(forbidSubmit)return;

            var validInputConfig = true;

            {
                if(realName.val() === ""){
                    validInputConfig = false;
                    addWarning(realName, "姓名不能为空", "red");
                }

                var ageValue = parseInt(age.val());
                if(ageValue <= 0 || ageValue >= 500 || isNaN(ageValue)){
                    validInputConfig = false;
                    addWarning(age, "年龄值需为0-500之间的有效数字", "red");
                }

                if(sexValue === ""){
                    validInputConfig = false;
                    addWarning(sexULTag, "还未选择性别");
                }

                if(marriageValue === ""){
                    validInputConfig = false;
                    addWarning(marriageULTag, "还未选择婚配情况");
                }
            }

            if(validInputConfig){
                var xhr = createXHR();
                xhr.open("POST", "<?php echo U('user/register');?>", false);
                xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                xhr.send($(createForm).serialize() + "&" +
                    $(chooseForm).serialize() + "&" +
                    $(detailForm).serialize() + "&sign-up-button=");

                if((xhr.status >= 200 && xhr.status < 300) || xhr.status === 304){
                    var responseValue = parseInt(xhr.responseText);
                    if(responseValue === 1){
                        window.location.href = "<?php echo U('MedicalRecord/questionnaire');?>";
                    }
                    else {
//                          alert("not right");
                        addWarning($(signUpButton), "注册失败");
                        forbidSubmit = true;
                    }

                }else {
                    alert("No response from AlphaEye Server");
                }
            }


        });

    })
</script>
<script src="/AlphaEye/Public/assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>