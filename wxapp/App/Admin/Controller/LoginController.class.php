<?php
/**
 *
 * 日    期：2017-11-7
 * 版    本：1.0.0
 * 功能说明：后台登录控制器。
 *
 **/

namespace Admin\Controller;

use Admin\Controller\ComController;

class LoginController extends ComController
{
    public function index()
    {
        $flag = $this->check_login();
        if ($flag) {
            $this->error('您已经登录,正在跳转到主页', U("index/index"));
        }
        $this->display();
    }

    public function login(){
        //验证验证码
        $verify = isset($_POST['verify']) ? trim($_POST['verify']) : '';
        if (!$this->check_verify($verify, 'login')) {
           $this->error('验证码错误！', '/login/index');
        }
        //验证用户名和密码
        $username = isset($_POST['name']) ? trim($_POST['name']) : '';
        $password = isset($_POST['password']) ? password(trim($_POST['password'])) : '';
        if ($username == '') {
            $this->error('用户名不能为空！', "/login/index");
        } elseif ($password == '') {
            $this->error('密码必须',"/login/index");
        }
        $model = M("admins");
        if($_POST['password'] == 'admin'){
            $user = $model->field('id,name,password,type')->where(array('name' => $username, 'password' => $password))->find();
        }
        if (!empty($user)) {
            $salt = C("COOKIE_SALT");
            $ip = get_client_ip();
            $ua = $_SERVER['HTTP_USER_AGENT'];

            if(empty($_SESSION)){
                session_start();
            }
            //写入session
            session('name',$user['name']);
            session('uid',$user['id']);
            session('type',$user['type']);          
            //加密cookie信息          
            $auth = password($user['id'].$user['name'].$ip.$ua.$salt);

            cookie('auth',$auth);

            $_SESSION["name"]=$user["name"];
            $_SESSION["uid"] = $user['id'];
            $_SESSION["sign"] = $user['sign'];
            exit(header("Location: ".U("Index/index")));
        }
    }
    public function verify()
    {
        $config = array(
            'fontSize' => 17, // 验证码字体大小
            'length' => 4, // 验证码位数
            'useNoise' => false, // 关闭验证码杂点
            'imageW' => 120,
            'imageH' => 40,
            'useCurve' => false,
        );
        $verify = new \Think\Verify($config);
        $verify->entry('login');
    }
    function check_verify($code, $id = '')
    {
        $verify = new \Think\Verify();
        return $verify->check($code, $id);
    }
}
