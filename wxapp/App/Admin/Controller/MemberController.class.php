<?php
/**
 *
 * 版权所有：恰维网络<qwadmin.qiawei.com>
 * 作    者：寒川<hanchuan@qiawei.com>
 * 日    期：2017-11-8
 * 版    本：1.0.0
 * 功能说明：用户控制器。
 *
 **/

namespace Admin\Controller;
use Think\Model;
class MemberController extends ComController
{
    public function index()
    {

        $p = isset($_GET['p']) ? intval($_GET['p']) : '1';
        $field = isset($_GET['field']) ? $_GET['field'] : '';
        $keyword = isset($_GET['keyword']) ? htmlentities($_GET['keyword']) : '';
        $order = isset($_GET['order']) ? $_GET['order'] : 'DESC';
        $where = '';

        $prefix = C('DB_PREFIX').'admin_';
        if ($order == 'asc') {
            $order = "{$prefix}member.t asc";
        } elseif (($order == 'desc')) {
            $order = "{$prefix}member.t desc";
        } else {
            $order = "{$prefix}member.uid asc";
        }
        if ($keyword <> '') {
            if ($field == 'user') {
                $where = "{$prefix}member.user LIKE '%$keyword%'";
            }
            if ($field == 'phone') {
                $where = "{$prefix}member.phone LIKE '%$keyword%'";
            }
            if ($field == 'qq') {
                $where = "{$prefix}member.qq LIKE '%$keyword%'";
            }
            if ($field == 'email') {
                $where = "{$prefix}member.email LIKE '%$keyword%'";
            }
        }


        $user = M('admin_member');
        $pagesize = 20;#每页数量
        $offset = $pagesize * ($p - 1);//计算记录偏移量
        $count = $user->field("{$prefix}member.*,{$prefix}auth_group.id as gid,{$prefix}auth_group.title")
            ->order($order)
            ->join("{$prefix}auth_group_access ON {$prefix}member.uid = {$prefix}auth_group_access.uid")
            ->join("{$prefix}auth_group ON {$prefix}auth_group.id = {$prefix}auth_group_access.group_id")
            ->where($where)
            ->count();

        $list = $user->field("{$prefix}member.*,{$prefix}auth_group.id as gid,{$prefix}auth_group.title")
            ->order($order)
            ->join("{$prefix}auth_group_access ON {$prefix}member.uid = {$prefix}auth_group_access.uid")
            ->join("{$prefix}auth_group ON {$prefix}auth_group.id = {$prefix}auth_group_access.group_id")
            ->where($where)
            ->limit($offset . ',' . $pagesize)
            ->select();
        //$user->getLastSql();
        $page = new \Think\Page($count, $pagesize);
        $page = $page->show();
        $this->assign('list', $list);
        $this->assign('page', $page);
        $group = M('admin_auth_group')->field('id,title')->select();
        $this->assign('group', $group);
        $this->display();
    }

    public function del()
    {

        $uids = isset($_REQUEST['uids']) ? $_REQUEST['uids'] : false;
        //uid为1的禁止删除
        if ($uids == 1 or !$uids) {
            $this->error('参数错误！');
        }
        if (is_array($uids)) {
            foreach ($uids as $k => $v) {
                if ($v == 1) {//uid为1的禁止删除
                    unset($uids[$k]);
                }
                $uids[$k] = intval($v);
            }
            if (!$uids) {
                $this->error('参数错误！');
                $uids = implode(',', $uids);
            }
        }

        $map['uid'] = array('in', $uids);
        if (M('admin_member')->where($map)->delete()) {
            M('admin_auth_group_access')->where($map)->delete();
            addlog('删除会员UID：' . $uids);
            $this->success('恭喜，用户删除成功！');
        } else {
            $this->error('参数错误！');
        }
    }

    public function edit()
    {

        $uid = isset($_GET['uid']) ? intval($_GET['uid']) : false;
        if ($uid) {
            //$member = M('admin_member')->where("uid='$uid'")->find();
            $prefix = C('DB_PREFIX').'admin_';
            $user = M('admin_member');
            $member = $user->field("{$prefix}member.*,{$prefix}auth_group_access.group_id")->join("{$prefix}auth_group_access ON {$prefix}member.uid = {$prefix}auth_group_access.uid")->where("{$prefix}member.uid=$uid")->find();

        } else {
            $this->error('参数错误！');
        }

        $usergroup = M('admin_auth_group')->field('id,title')->select();
        $this->assign('usergroup', $usergroup);

        $this->assign('member', $member);
        $this->display('form');
    }

    public function update($ajax = '')
    {
        if ($ajax == 'yes') {
            $uid = I('get.uid', 0, 'intval');
            $gid = I('get.gid', 0, 'intval');
            M('admin_auth_group_access')->data(array('group_id' => $gid))->where("uid='$uid'")->save();
            die('1');
        }

        $uid = isset($_POST['uid']) ? intval($_POST['uid']) : false;
        $user = isset($_POST['user']) ? htmlspecialchars($_POST['user'], ENT_QUOTES) : '';
        $group_id = isset($_POST['group_id']) ? intval($_POST['group_id']) : 0;
        if (!$group_id) {
            $this->error('请选择用户组！');
        }
        $password = isset($_POST['password']) ? trim($_POST['password']) : false;
        if ($password) {
            $data['password'] = password($password);
        }
        $head = I('post.head', '', 'strip_tags');
        $data['sex'] = isset($_POST['sex']) ? intval($_POST['sex']) : 0;
        $data['head'] = $head ? $head : '';
        $data['birthday'] = isset($_POST['birthday']) ? strtotime($_POST['birthday']) : 0;
        $data['phone'] = isset($_POST['phone']) ? trim($_POST['phone']) : '';
        $data['qq'] = isset($_POST['qq']) ? trim($_POST['qq']) : '';
        $data['email'] = isset($_POST['email']) ? trim($_POST['email']) : '';


        $data['t'] = time();
        if (!$uid) {
            if ($user == '') {
                $this->error('用户名称不能为空！');
            }
            if (!$password) {
                $this->error('用户密码不能为空！');
            }
            if (M('admin_member')->where("user='$user'")->count()) {
                $this->error('用户名已被占用！');
            }
            $data['user'] = $user;
            $uid = M('admin_member')->data($data)->add();
            M('admin_auth_group_access')->data(array('group_id' => $group_id, 'uid' => $uid))->add();
            addlog('新增会员，会员UID：' . $uid);
        } else {
            M('admin_auth_group_access')->data(array('group_id' => $group_id))->where("uid=$uid")->save();
            addlog('编辑会员信息，会员UID：' . $uid);
            M('admin_member')->data($data)->where("uid=$uid")->save();

        }
        $this->success('操作成功！');
    }


    public function add()
    {

        $usergroup = M('admin_auth_group')->field('id,title')->select();
        $this->assign('usergroup', $usergroup);
        $this->display('form');
    }

    public function order(){
        $this->display();
    }

    public function orderList(){
        $date = $_POST['date'];
        $where ="a.status = 1";
        if($date != 'all')
        {
            //获取起始时间
            $start_date = strtotime(substr($date,0,stripos($date,",",0)));
            $end_date = strtotime(substr($date,stripos($date,",",0)+1));
            $where .=  'a.create_time >= '.$start_date.' and a.create_time <= '.$end_date;
        }
        $fields = "a.price,a.create_time,a.tradeno,a.subject,c.app_name,b.phone";
        $prefix = C('DB_PREFIX');
        $model = new Model();
        $pay_fee = $model
            ->table("{$prefix}member_order as a ")
            ->join("left join {$prefix}member as b ON a.member_id =  b.id ")
            ->join("left join {$prefix}agent as c ON b.source_id =  c.id ")
            ->field($fields)
            ->where($where)
            ->select();
        $data= array();
        if(!empty($pay_fee))
        {
            foreach($pay_fee as $key=>$val)
            {
                $data[$key] = $val;
                $data[$key]['create_time'] = date('Y-m-d H:i:s',$val['create_time']);
            }
            $res['list'] =$data;
            $res['code'] = 200;
        }else{
            $res['list'] =$data;
            $res['code'] = 400;
        }
        $this->ajaxReturn($res);
    }
}