<?php
/**
 *
 * 版权所有：恰维网络<qwadmin.qiawei.com>
 * 作    者：寒川<hanchuan@qiawei.com>
 * 日    期：2017-11-7
 * 版    本：1.0.0
 * 功能说明：后台公用控制器。
 *
 **/

namespace Admin\Controller;

use Common\Controller\BaseController;
use Think\Auth;

class ComController extends BaseController
{
    public $user;

    public function _initialize()
    {
        //初始化
        $admin_setting=M("admin_setting");
        C(setting());
        if (!C("COOKIE_SALT")) {
            $this->error('请配置COOKIE_SALT信息');
        }
        /**
         * 不需要登录控制器
         */
        if (in_array(CONTROLLER_NAME, array("Login"))) {
            return true;
        }
        //检测是否登录
        $flag = $this->check_login();
        if (!$flag) {
            header("Location: /login/index");
            exit(0);
        }

        $this->user=M("admins")->where(array("id"=>$_SESSION["id"]))->find();

        if(!empty($this->user))
        {
            
            $this->assign('user', $this->user);
            $m = M();
            $prefix = C('DB_PREFIX');
            $uid = $this->user['id'];
            $userinfo = $m->query("SELECT * FROM {$prefix}auth_group g left join {$prefix}auth_group_access a on g.id=a.group_id where a.uid=$uid");
            $Auth = new Auth();
            $allow_controller_name = array('Upload');//放行控制器名称
            $allow_action_name = array();//放行函数名称
            if (empty($userinfo[0]['group_id'] ) && !$Auth->check(CONTROLLER_NAME . '/' . ACTION_NAME,
                    $uid) && !in_array(CONTROLLER_NAME, $allow_controller_name) && !in_array(ACTION_NAME,
                    $allow_action_name)
            ) {
                $this->error('没有权限访问本页面!');
            }
            //权限验证
            $current_action_name = ACTION_NAME == 'edit' ? "index" : ACTION_NAME;
            $current = $m->query("SELECT s.id,s.title,s.name,s.tips,s.pid,p.pid as ppid,p.title as ptitle FROM {$prefix}auth_rule s left join {$prefix}auth_rule p on p.id=s.pid where s.name='" . CONTROLLER_NAME . '/' . $current_action_name . "'");
            $this->assign('current', $current[0]);

            $this->Vx_status=M("admin_setting")->getField('k,v',true);
            $menu_access_id = $userinfo[0]['rules'];

            if ($userinfo[0]['group_id'] != 1) {

                $menu_where = "AND id in ($menu_access_id) AND id !=135";

            } else {

                $menu_where = '';
            }
            $menu = M('auth_rule')->field('id,title,pid,name,icon')->where("islink=1 $menu_where ")->order('o ASC')->select();
            //var_dump(M('admin_auth_rule')->getLastsql());die;
            $menu = $this->getMenu($menu);
            $this->assign('menu', $menu);
            //权限验证
            $current_action_name = ACTION_NAME == 'edit' ? "index" : ACTION_NAME;
            $current = $m->query("SELECT s.id,s.title,s.name,s.tips,s.pid,p.pid as ppid,p.title as ptitle FROM {$prefix}admin_auth_rule s left join {$prefix}admin_auth_rule p on p.id=s.pid where s.name='" . CONTROLLER_NAME . '/' . $current_action_name . "'");
            $this->assign('current', $current[0]);

            $this->Vx_status=M("admin_setting")->getField('k,v',true);
            $menu_access_id = $userinfo[0]['rules'];

            $menu = M('auth_rule')->field('id,title,pid,name,icon')->where("islink=1 $menu_where ")->order('o ASC')->select();
            $menu = $this->getMenu($menu);
            $this->assign('menu', $menu);
        }



    }

    protected function getMenu($items, $id = 'id', $pid = 'pid', $son = 'children')
    {
        $tree = array();
        $tmpMap = array();
        //修复父类设置islink=0，但是子类仍然显示的bug
        foreach ($items as $item) {
            if ($item['pid'] == 0) {
                $father_ids[] = $item['id'];
            }
        }
        foreach ($items as $item) {
            $tmpMap[$item[$id]] = $item;
        }
        foreach ($items as $item) {

            if ($item['pid'] <> 0 && !in_array($item['pid'], $father_ids)) {
                continue;
            }

            if (isset($tmpMap[$item[$pid]])) {
                $tmpMap[$item[$pid]][$son][] = &$tmpMap[$item[$id]];
            } else {
                $tree[] = &$tmpMap[$item[$id]];
            }
        }
        return $tree;
    }
    //检测是否登录
    public function check_login()
    {
        session_start();
        $flag = false;       

       
       
        $uid = session('uid');

        
        if ($uid) {
            $user = M('auth_group_access')->where(array('uid' => $uid))->find();
            if (!empty($user)) {
                $flag = true;
                $this->user = $user;
            }
        }
        return $flag;
    }
    
}


