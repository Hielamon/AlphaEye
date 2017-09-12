<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {

    //the array to save all views' url
    private $view_urls = array();
    function __construct()
    {
        parent::__construct();

        $this->view_urls['index_view'] = U("index/index");
        $this->assign('index_view',$this->view_urls['index_view'] );

        $this->view_urls['$login_view'] = U("user/login");
        $this->assign('$login_view',$this->view_urls['$login_view'] );

        $this->view_urls['register_view'] = U("user/register");
        $this->assign('register_view',$this->view_urls['register_view'] );
    }

    public function index(){
//        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
        $this->display();
    }
}