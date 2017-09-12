<?php
/**
 * Created by PhpStorm.
 * User: Boren
 * Date: 2017/9/7
 * Time: 9:05
 */

namespace Home\Controller;
use Think\Controller;
use Think\Model;


class UserController extends Controller
{
    //the array to save all views' url
    private $view_urls = array();

    function __construct()
    {
        parent::__construct();
        $this->view_urls['questionnaire_view'] = U("user/questionnaire");
        $this->assign('questionnaire_view',$this->view_urls['questionnaire_view'] );

        $this->view_urls['index_view'] = U("index/index");
        $this->assign('index_view',$this->view_urls['index_view'] );

        $this->view_urls['$login_view'] = U("user/login");
        $this->assign('$login_view',$this->view_urls['$login_view'] );

        $this->view_urls['register_view'] = U("user/register");
        $this->assign('register_view',$this->view_urls['register_view'] );
    }

    public function login(){
        if(0)
        {
            $userModel = new Model('userinfo');
            $userData = array(
                'username' => 'testName',
                'userpwd' => md5('diyeruyan2855')
            );

            if (!($userModel->create($userData)) && $userModel->add()){
                echo "<span>登录失败</span>";
            }
            else{
                $userModel->add($userData);
                echo "<span>登录成功</span>";
            }
        }

        $this->display();
    }

    public function register(){
        if (IS_POST){
            if (array_key_exists('create-button', $_POST)){
                $name = I('name');
                $password = I('password');
                if (empty($name)) {
                    $this->error('用户名不能为空!');
                }
                if (empty($password)) {
                    $this->error('密码不能为空!');
                }
                echo 1;
            }

            if (array_key_exists('name', $_POST)){
                $name = I('name');
                echo $name;
            }

        }

        $this->display();
    }

    public function questionnaire(){
        $this->display();
    }

}