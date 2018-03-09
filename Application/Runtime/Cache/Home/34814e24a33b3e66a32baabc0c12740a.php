<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cmn-Hans">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <!--<META HTTP-EQUIV="pragma" CONTENT="no-cache">-->
  <!--<META HTTP-EQUIV="Cache-Control" CONTENT="no-cache, must-revalidate">-->
  <!--<META HTTP-EQUIV="expires" CONTENT="0">-->

  <link rel="icon" href="/AlphaEye/Public/assets/icon/alpha-eye.ico">

  <title>症状问答</title>

  <!-- Bootstrap core CSS -->
  <link href="/AlphaEye/Public/assets/css/bootstrap.min.css" rel="stylesheet">
  <!--<link href="/AlphaEye/Public/assets/css/bootstrap.css" rel="stylesheet">-->
  <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">-->

  <!-- Custom styles for this template -->
  <link href="/AlphaEye/Public/css/common.css" rel="stylesheet" />
  <link href="/AlphaEye/Public/css/header.css?201709190919" rel="stylesheet">
  <link href="/AlphaEye/Public/css/questionnaire.css?201709130257" rel="stylesheet">

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



  <div class="jumbotron">
    <h4>请根据您的症状，回答下列问题</h4>
    <p class="lead">当前题中一个选项被选中后，会自动切换到下一题。上一题也会重新显示在当前题的下面，可以重新选择上一题的选项，不过这样做可能会更改当前题。</p>
    <a class="btn btn-lg btn-success" id="start-button" href="#" role="button">开始答题</a>
  </div>

  <div class="container" id="QA-div">
    <div class="container" id="current-QA">
      <h4 style="visibility: hidden;">当前问题</h4>
      <h5></h5>
      <ul class="custom-radio">
      </ul>

    </div>

    <div class="container clearfix" id="controller-div">
      <span id="warning-option">*您还没有选择过当前问题*</span>
      <button class="btn btn-lg btn-primary btn-block  float-left" id="previous-button" type="submit">
        上一题
      </button>

      <button class="btn btn-lg btn-primary btn-block  float-left" id="next-button" type="submit">
        下一题
      </button>
      <span id="warning-control">*这已经是第一题，没有上一题了*</span>
      <!--<span class=" warning-control">*这已经是最后一题，没有下一题了*</span>-->

    </div>

    <div class="container" id="submit-div">
      <button class="btn btn-lg btn-success" id="submit-button" type="submit">
        提交
      </button>
    </div>
  </div>
</div>

<!--load the js files-->
<script type="text/javascript" src="/AlphaEye/Public/assets/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="/AlphaEye/Public/js/common.js"></script>
<script type="text/javascript" src="/AlphaEye/Public/js/questionnaire.js"></script>
<script type="text/javascript">
    function constructFullTree(parent, root) {
        if (root instanceof Array){
            var i = 0, j = 0, curNode, childQAList, curChildQA;
            for(i = 0; i < root.length; i++){
                curNode = root[i];
                curNode.parent = parent;
                curNode.asked = false;
                curNode.checkIdx = -1;
                if(i === (root.length - 1)){
                    curNode.next = null;
                }
                else{
                    curNode.next = root[i+1];
                }

                childQAList = root[i].childQA;
                for(j = 0; j < childQAList.length; j++){
                    curChildQA = childQAList[j];
                    arguments.callee(curNode, curChildQA);
                }
            }
        }
        else{
//        alert("endPoint");
        }
    }

    function clickHidden(event){
        event = EventUtil.getEvent();
        var target = EventUtil.getTarget(event);
        target.style.display = "none";
    }

    var myData, currentQANode = null;
    var stackQANode = [];

    var currentQADivTag = null, controllerDivTag = null, currentQATitleTag = null;

    var previousButtonTag = null, nextButtonTag = null, submitButtonTag = null, submitDiv = null;
    var warningOption = null, warningControl = null;

    function findNextQANode(currentNode, idxChoose) {
        var nextQANode = currentNode.childQA[idxChoose];
        if(!(nextQANode instanceof Array)){
            //find next sibling node
            nextQANode = currentNode.next;
            if(nextQANode === null){
                //find a predecessor which has a nonempty next
                var parentNode = currentNode.parent;

                while (parentNode !== null && parentNode.next === null){
                    parentNode = parentNode.parent;
                }

                if(parentNode !== null){
                    nextQANode = parentNode.next;
                }
            }
        }else{
            nextQANode = nextQANode[0];
        }
        return nextQANode;
    }

    function QAClickHandler(event) {
        event = EventUtil.getEvent();
        var target = EventUtil.getTarget(event);
        var id = target.id;
        var idx = id.slice(id.indexOf("option-") + 7, id.length);
        idx = parseInt(idx);

        currentQANode.asked = true;
//        if(currentQANode.checkIdx !== -1){
//            submitDiv.style.display = "none";
//        }
        currentQANode.checkIdx = idx;

        warningOption.style.visibility = "hidden";
    }

    function showQAInDiv(QANode, divNode, divTitleNode, clickHandler) {
        $(divNode).hide();
        var ul = $(divNode).children(".custom-radio");

        divTitleNode.innerHTML = (stackQANode.length + 1).toString() + "，" + QANode.QAName;
        var inputTags = divNode.getElementsByTagName("input");
        var labelTags = divNode.getElementsByTagName("label");
        var existedLength = inputTags.length;
        //TODO: check the length equality of inputTags and labelTags
        var newInputTag, newLabelTag;
        for(var i = 0; i < QANode.options.length; i++){
            if(i >= existedLength){
                //create new input and label
                newInputTag = document.createElement("input");
                newLabelTag = document.createElement("label");
                newInputTag.id = divNode.id + "-option-" + i;
                newInputTag.type = "radio";
                newInputTag.name = divNode.id + "-option";
                newInputTag.style.display = "inline-block";
                inputTags[i] = newInputTag;

                EventUtil.addHandler(newInputTag, "click", clickHandler);

                newLabelTag.htmlFor = newInputTag.id;
                newLabelTag.innerHTML = QANode.options[i];
                newLabelTag.style.display = "inline-block";
//          labelTags[i] = newLabelTag;
                var li = $("<li><div class='check'></div></li>");
                li.prepend(newInputTag, newLabelTag);
                ul.append(li);
            }
            else if(i < existedLength){
                inputTags[i].checked = false;
                inputTags[i].style.display = "inline-block";

                labelTags[i].innerHTML = QANode.options[i];
                labelTags[i].style.display = "inline-block";
                $(inputTags[i]).parent().show();
            }
        }

        if(i < existedLength){
            for(var j = i; j < existedLength; j++){
                $(inputTags[j]).parent().hide();
//          inputTags[j].style.display = "none";
//          labelTags[j].style.display = "none";
            }
        }

        //TODO:check the checkIdx more
        if(QANode.checkIdx !== -1){
            inputTags[QANode.checkIdx].checked = true;
        }

        $(divNode).fadeIn(300);

    }

    EventUtil.addHandler(window, "load", function (event) {
        myData = JSON.parse(data);
        constructFullTree(null, myData);

        //To get the QA divs
        //TODO: maybe need to check the existence
        currentQADivTag = document.getElementById("current-QA");
        currentQATitleTag = currentQADivTag.getElementsByTagName("h5")[0];

        controllerDivTag = document.getElementById("controller-div");

        function showFirstQA(myData) {
            //TODO:need the safe check
            currentQANode = myData[0];
            showQAInDiv(currentQANode, currentQADivTag, currentQATitleTag, QAClickHandler);
            $(controllerDivTag).fadeIn(300);
        }

        var startATag = document.getElementById("start-button");
        function clickStartHandler(event) {
            clickHidden(event);
            showFirstQA(myData);
        }
        EventUtil.addHandler(startATag, "click", clickStartHandler);

        warningOption = document.getElementById("warning-option");
        warningControl = document.getElementById("warning-control");
        submitDiv = document.getElementById("submit-div");

        previousButtonTag = document.getElementById("previous-button");
        EventUtil.addHandler(previousButtonTag, "click", function () {
            warningOption.style.visibility = "hidden";

            if(stackQANode.length !== 0){
                warningControl.style.visibility = "hidden";
                currentQANode = stackQANode[stackQANode.length - 1];
                stackQANode.length--;
                showQAInDiv(currentQANode, currentQADivTag, currentQATitleTag, QAClickHandler);
            }
            else {
                warningControl.style.visibility = "visible";
                warningControl.innerHTML = "*这已经是第一题，没有上一题了*";
            }
        });

        nextButtonTag = document.getElementById("next-button");
        EventUtil.addHandler(nextButtonTag, "click", function () {
            warningControl.style.visibility = "hidden";
            if(currentQANode.checkIdx === -1){
                warningOption.innerHTML = "*您还没有选择过当前问题*";
                warningOption.style.visibility = "visible";
            }
            else {
                var nextQANode = findNextQANode(currentQANode, currentQANode.checkIdx);
                if (nextQANode !== null) {
                    stackQANode[stackQANode.length] = currentQANode;
                    currentQANode = nextQANode;
                    showQAInDiv(currentQANode, currentQADivTag, currentQATitleTag, QAClickHandler);
                }
                else {
                    submitDiv.style.display = "block";
                    warningControl.style.visibility = "visible";
                    warningControl.innerHTML = "*这已经是最后一题，确认无误后可直接提交*";
                }
            }

        });

        submitButtonTag = document.getElementById("submit-button");
        EventUtil.addHandler(submitButtonTag, "click", function () {
//            EventUtil.preventDefault(event);
            var validInputConfig = true;
            warningControl.style.visibility = "hidden";

            var nextQANode = currentQANode;
            var nextCheckList = "";
            while(nextQANode !== null && nextQANode.checkIdx !== -1){
                nextCheckList += nextQANode.checkIdx.toString();
                nextQANode = findNextQANode(nextQANode, nextQANode.checkIdx);
            }

            if (nextQANode !== null) {
                warningOption.innerHTML = "*您还未完成所有问题*";
                warningOption.style.visibility = "visible";
                validInputConfig = false;
            }

            if (validInputConfig){
                var preCheckList = "";
                for(var i = 0; i < stackQANode.length; i++){
                    preCheckList += stackQANode[i].checkIdx.toString();
                }
                var checkList = preCheckList + nextCheckList;

                var xhr = createXHR();
                xhr.open("POST", "<?php echo U('MedicalRecord/questionnaire');?>", false);
                xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                xhr.send("check-list="+checkList);

                if((xhr.status >= 200 && xhr.status < 300) || xhr.status === 304){
                    var responseValue = parseInt(xhr.responseText);
                    if(responseValue === 1){
                        window.location.href = "<?php echo U('MedicalRecord/record');?>";
                    }
                    else {
                        alert("Something goes wrong on AlphaEye Server");
                    }
                }else {
                    alert("No response from AlphaEye Server");
                }
            }

        })
    })

</script>

</body>
</html>