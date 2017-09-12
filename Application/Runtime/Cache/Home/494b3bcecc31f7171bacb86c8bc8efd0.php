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
  <link href="/AlphaEye/Public/css/questionnaire.css" rel="stylesheet">

  <script type="text/javascript" src="/AlphaEye/Public/assets/js/jquery-3.2.1.min.js"></script>
  <!--<script type="text/javascript" src="/AlphaEye/Public/assets/js/jquery-3.2.1.js"></script>-->
  <script type="text/javascript" src="/AlphaEye/Public/js/common.js"></script>
  <script type="text/javascript" src="/AlphaEye/Public/js/questionnaire.js"></script>
  <script type="text/javascript">
    function test(event) {
      var selectedRadio = event.target;

      var q2div;
      if(selectedRadio.id === "yes"){
        if(!document.getElementById("q2div")){
          q2div = document.createElement("q2Div");
          q2div.id = "q2div";
          document.body.appendChild(q2div);

          var q2H = document.createElement("h3");
          q2H.id = "q2H";
          var textNode = document.createTextNode("单眼视力下降还是双眼视力下降？")
          q2H.appendChild(textNode);
          q2div.appendChild(q2H);

          var decisionForm = document.getElementById("decisionForm");
          decisionForm = decisionForm.cloneNode(true);

          q2div.appendChild();
        }
      }else if(selectedRadio.id === "no"){
        q2div = document.getElementById("q2div");
        if(q2div){
          q2div.parentNode.removeChild(q2div);
        }
      }
    }

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

    function travelQuestionnaire(root){
      if (root instanceof Array){
        var i = 0, j = 0;
        for(i = 0; i < root.length; i++){
          var nodeInfo = root[i].QAName + ": ";
          var options = root[i].options;
          for(j = 0; j < options.length; j++){
            nodeInfo += (options[j] + ",")
          }
//          alert(nodeInfo);
          var childQA = root[i].childQA;
          for(j = 0; j < childQA.length; j++){
            arguments.callee(childQA[j]);
          }
        }
      }
      else{
//        alert("endPoint");
      }
    }

    var myData, currentQANode = null, previousQANode = null;

    var currentQADivTag = null, previousQADivTag = null;
    var currentQATitleTag = null, previousQATitleTag = null;

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

    function currentQAClickHandler(event) {
      event = EventUtil.getEvent();
      var target = EventUtil.getTarget(event);
      window.setTimeout(function () {
        var id = target.id;
        var idx = id.slice(id.indexOf("option-") + 7, id.length);
        idx = parseInt(idx);

        currentQANode.asked = true;
        currentQANode.checkIdx = idx;

        //choose next QA node
        var nextQANode = findNextQANode(currentQANode, idx);

        //show the QA in previous div region and nextQANode in current div region
        //if find a nextQANode
        if(nextQANode !== null){
          showQAInDiv(currentQANode, previousQADivTag, previousQATitleTag, previousQAClickHandler);
          showQAInDiv(nextQANode, currentQADivTag, currentQATitleTag, currentQAClickHandler);
          previousQANode = currentQANode;
          currentQANode = nextQANode;
        }
        else{
          $('#submit-div').fadeIn(1);
        }
      }, 500)


    }

    function previousQAClickHandler(event) {
      event = EventUtil.getEvent();
      var target = EventUtil.getTarget(event);

      window.setTimeout(function () {
        var id = target.id;
        var idx = id.slice(id.indexOf("option-") + 7, id.length);
        idx = parseInt(idx);

        if(idx !== previousQANode.checkIdx){
          //choose next currentQANode
          previousQANode.checkIdx = idx;
          var nextQANode = findNextQANode(previousQANode, idx);

          //show the QA in previous div region and nextQANode in current div region
          //if find a nextQANode
          if(nextQANode !== null){

            showQAInDiv(nextQANode, currentQADivTag, currentQATitleTag, currentQAClickHandler);
            currentQANode = nextQANode;
          }
        }
      }, 500);
    }

    function showQAInDiv(QANode, divNode, divTitleNode, clickHanlder) {

      $(divNode).hide();
      var ul = $(divNode).children(".custom-radio");

      divTitleNode.innerHTML = QANode.QAName;
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

//          EventUtil.addHandler(newInputTag, "change", clickHanlder);
          EventUtil.addHandler(newInputTag, "click", clickHanlder);

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

      $(divNode).fadeIn(400);

    }

    EventUtil.addHandler(window, "load", function (event) {
      myData = JSON.parse(data);
      constructFullTree(null, myData);

      //To get the QA divs
      //TODO: maybe need to check the existence
      currentQADivTag = document.getElementById("current-QA");
      previousQADivTag = document.getElementById("previous-QA");
      currentQATitleTag = currentQADivTag.getElementsByTagName("h5")[0];
      previousQATitleTag = previousQADivTag.getElementsByTagName("h5")[0];



      function showFirstQA(myData) {
        //TODO:need the safe check
        currentQANode = myData[0];
        showQAInDiv(currentQANode, currentQADivTag, currentQATitleTag, currentQAClickHandler);

//        currentQADivTag.style.display = "block";
//        previousQADivTag.style.display = "block";
      }

      var startATag = document.getElementById("start-button");
      function clickStartHandler(event) {
        clickHidden(event);
        showFirstQA(myData);
      }
      EventUtil.addHandler(startATag, "click", clickStartHandler);

    })

  </script>

</head>
<body>

<div class="container">
  <div class="header clearfix">
    <h4 class="text-muted float-left">AlphaEye</h4>
    <nav>
      <ul class="nav nav-pills float-left">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo ($index_view); ?>">首页 <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">介绍</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">联系我们</a>
        </li>
      </ul>
    </nav>

    <div class="top-nav-profile float-right">
      <div class="top-link-logo">
        <a href="#" class="top-link-logo">
          <img src="/AlphaEye/Public/images/avatar2.jpg" class="avatar"/>
          <span class="name">用户名</span>
        </a>
      </div>

      <ul class="top-nav-drop">
          <!--style="background-image: url(/AlphaEye/Public/images/view/person.png);"-->
        <li id="li-profile"><a href="#">个人资料</a></li>
        <li id="li-medical-record"><a href="#">病历</a></li>
        <li id="li-exit"><a href="<?php echo ($index_view); ?>">退出</a></li>
      </ul>

    </div>


  </div><!-- navigator -->

  <div class="jumbotron">
    <h4>请根据您的症状，回答下列问题</h4>
    <p class="lead">当前题中一个选项被选中后，会自动切换到下一题。上一题也会重新显示在当前题的下面，可以重新选择上一题的选项，不过这样做可能会更改当前题。</p>
    <a class="btn btn-lg btn-success" id="start-button" href="#" role="button">开始答题</a>
  </div>

  <div class="container" id="current-QA">
    <h4>当前问题</h4>
    <h5></h5>
    <ul class="custom-radio">

    </ul>

  </div>

  <div class="container" id="previous-QA">
    <h4>上一问题 </h4>
    <h5></h5>
    <ul class="custom-radio"></ul>
  </div>

  <div class="container" id="submit-div">
    <button class="btn btn-lg btn-primary btn-block" id="submit-button" type="submit">
      提交
    </button>
  </div>

</div>

</body>
</html>