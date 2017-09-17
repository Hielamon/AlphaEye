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
        $this->assign('login_view',$this->view_urls['$login_view'] );

        $this->view_urls['register_view'] = U("user/register");
        $this->assign('register_view',$this->view_urls['register_view'] );
    }

    public function login(){
        if(array_key_exists('name', $_COOKIE)){
            $name = $_COOKIE['name'];
            $this->assign('name', $name);
        }

        if(IS_POST)
        {
            $general_user_model = new Model('general_user');
            $return_value = 0;

            $name = I('name');
            $password = I('password');

            $condition['name'] = $name;
            $user = $general_user_model->where($condition)->find();
            if(empty($user)){
                $return_value = 1;
            }else if($user['password'] != md5($password)){
                $return_value = 2;
            }else{
                session_start();
                $_SESSION['name'] = $user['name'];

                if(array_key_exists('remember', $_POST)){
                    setcookie('name', $name, time() + 2592000);
                }
            }

            echo $return_value;
        }else{
            $this->display();
        }
    }

    public function register(){

        if (IS_POST){
            $general_user_model = new Model('general_user');
            $return_value = 1;
            if (array_key_exists('name', $_POST)){
                $condition['name'] = $_POST['name'];
                $user = $general_user_model->where($condition)->find();
                if(!empty($user)){
                    $return_value = 0;
                }
            }

            if (array_key_exists('sign-up-button', $_POST) && $return_value == 1){
                $data = array(
                    'name' => $_POST['name'],
                    'password' => md5($_POST['password']),
                    'real-name' => $_POST['real-name'],
                    'gender' => $_POST['gender'],
                    'ethnic' => $_POST['ethnic'],
                    'marriage' => $_POST['marriage'],
                    'career' => $_POST['career'],
                    'native-place' => $_POST['native-place'],
                    'obode' => $_POST['obode']
                );

                if(!($general_user_model->create($data) && $general_user_model->add())){
                    $return_value = 0;
                }
                else{
                    session_start();
                    $_SESSION['name'] = $_POST['name'];
                }
            }

            echo $return_value;
        }else{
            $this->display();
        }
    }

    public function questionnaire(){
        session_start();
        $name = $_SESSION['name'];
        $this->assign('name', $name);

        if (IS_POST){
            if (array_key_exists('exist', $_POST)){
                unset($_SESSION['name']);
            }
            return;
        }

        $this->display();
    }

}