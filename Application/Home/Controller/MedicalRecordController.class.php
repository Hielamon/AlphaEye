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
        session_start();
        $this->assign('name', $_SESSION['name']);
        $avatar = $_SESSION['gender'] == "男" ? "avatar-male.jpg" : "avatar-female.jpg";
        $this->assign('avatar', $avatar);

        if (IS_POST){
            if (array_key_exists('exist', $_POST)){
                unset($_SESSION['name']);
                unset($_SESSION['gender']);
            }
            return;
        }

        $this->display();
    }
}