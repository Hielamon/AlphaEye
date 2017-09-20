<?php
/**
 * Created by PhpStorm.
 * User: Boren
 * Date: 2017/9/18
 * Time: 15:01
 */

namespace Home\Controller;
use Think\Controller;
use Think\Model;

class MedicalRecordController extends Controller
{
    public function questionnaire(){
        $this->setPortrait();

        if (IS_POST){
            if (array_key_exists('exist', $_POST)){
                unset($_SESSION['name']);
                unset($_SESSION['gender']);
                return;
            }

            if(array_key_exists('check-list', $_POST)){
                $general_user_model = new Model('general_user');
                $return_value = 0;

                $name = $_SESSION['name'];
                $condition['name'] = $name;
                $user = $general_user_model->where($condition)->find();
                if(!empty($user)){
                    $user['check-list'] = $_POST['check-list'];
                    $general_user_model->save($user);
                    $return_value = 1;
                }

                echo $return_value;
            }
        }else{
            $this->display();
        }
    }

    public function record(){
        $this->setPortrait();
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