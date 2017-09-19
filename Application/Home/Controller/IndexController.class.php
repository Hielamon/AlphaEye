<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {

    public function index(){
//        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
        session_start();

        if(array_key_exists('name', $_SESSION)){

            if (IS_POST){
                if (array_key_exists('exist', $_POST)){
                    unset($_SESSION['name']);
                    unset($_SESSION['gender']);
                }
                return;
            }

            $this->setPortrait();
        }
        $this->display();
    }

    protected function setPortrait(){
        session_start();
        $name = $_SESSION['name'];
        $this->assign('name', $name);
        $portrait_path = PUBLIC_PATH.'images/user/'.$name.'.jpg';
        $avatar = 'user/'.$name.'.jpg';
        $portrait_name = $avatar;
        if(!file_exists($portrait_path)){
            $avatar = $_SESSION['gender'] == "男" ? "avatar-male.jpg" : "avatar-female.jpg";
            $portrait_name = $_SESSION['gender'] == "男" ? "avatar-male-big.jpg" : "avatar-female-big.jpg";
        }
        $this->assign('avatar', $avatar);
        $this->assign('portrait_name', $portrait_name);
    }
}