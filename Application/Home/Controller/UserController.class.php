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

require_once(APP_PATH.'Home/Common/functions.php');


class UserController extends Controller
{

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
                $_SESSION['gender'] = $user['gender'];

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
                    'age' => $_POST['age'],
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
                    $_SESSION['gender'] = $_POST['gender'];
                }
            }

            echo $return_value;
        }else{
            $this->display();
        }
    }

    public function personal_data(){
        if(!($this->setPortrait())) return;

        $general_user_model = new Model('general_user');

        $name = $_SESSION['name'];
        $condition['name'] = $name;
        $user = $general_user_model->where($condition)->find();
        if(!empty($user)){
            $this->assign('user', $user);
        }

        $this->display();
    }

    public function retrieve_password(){
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

        if (IS_POST){
            if (array_key_exists('exist', $_POST)){
                unset($_SESSION['name']);
                unset($_SESSION['gender']);
            }
            return false;
        }

        return true;
    }
}