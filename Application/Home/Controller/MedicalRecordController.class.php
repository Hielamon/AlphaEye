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
            }
            return;
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