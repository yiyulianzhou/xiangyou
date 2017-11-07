<?php
/**
 *
 * 日    期：2017-11-7
 * 版    本：1.0.0
 * 功能说明：用户控制器。
 *
 **/

namespace Admin\Controller;

use Think\Model;
use Think\Upload;
use Think\Cache\Driver\Redis;

class UserController extends ComController
{
    public function index()
    {
       $this->display();
    }

    public function del()
    {
        $memberId = I('id') ? (int)I('id') : 0;
        if (empty($memberId)) {
            $this->error('参数错误');
        }
        $map['id'] = $memberId;
        if (M('member')->where($map)->delete()) {
            $this->success('用户删除成功！');
        } else {
            $this->error('服务错误');
        }
    }

    public function edit()
    {
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        if (empty($id)) {
            $this->error('参数错误');
        }

        $prefix = C('DB_PREFIX');
        $condition['a.id'] = $id;
        $field = 'a.open_id,a.nickname,a.sex,a.headimgurl,a.create_time as register_time,a.phone as member_phone,b.*';
        $model = new Model();
        $info = $model->table("{$prefix}member as a")
            ->join("left join {$prefix}member_info as b ON a.id = b.member_id")
            ->where($condition)
            ->field($field)
            ->find();
        if (empty($info)) {
            $this->error('用户不存在或已被删除');
        }
        $info['register_time'] = date('Y-m-d H:i:s', $info['register_time']);

        $creditInfo = M('member_credit')->where("member_id = {$id}")->find();
        $cardList = M('member_bank_card')->where("member_id = {$id} and type = 1")->select();
        $card = M('member_bank_card')->where("member_id = {$id} and type = 2")->find();
        $info['card_list'] = $cardList;
        $info['card'] = $card;
        $sex= '';
        if($info['sex'] == 1)
        {
            $sex .= "<option selected = 'selected' value='".$info['sex']."'>男</option>";
        }elseif($info['sex'] == 2){
            $sex .= "<option selected = 'selected' value='".$info['sex']."'>女</option>";
        }else{
            $sex .= "<option selected = 'selected' value='".$info['sex']."'>保密</option>";
        }
        $this->assign('member', $info);
        $this->assign('sex', $sex);
        $this->assign('credit', $creditInfo);
        $this->display('edit');
    }

    public function update()
    {
        $id = $_POST['id'] ? (int)$_POST['id'] : 0;
        $credit = $_POST['credit'] ? (int)$_POST['credit'] : 0;
        $stage3Rate = $_POST['stage3_rate'] ? trim($_POST['stage3_rate']) : '0.00';
        $stage6Rate = $_POST['stage6_rate'] ? trim($_POST['stage6_rate']) : '0.00';
        $stage12Rate = $_POST['stage12_rate'] ? trim($_POST['stage12_rate']) : '0.00';
        $stage24Rate = $_POST['stage24_rate'] ? trim($_POST['stage24_rate']) : '0.00';
        if (empty($id)) {
            $this->error('参数错误');
        }

        $time = time();
        $data = [
            'credit' => $credit,
            'stage3_rate' => $stage3Rate,
            'stage6_rate' => $stage6Rate,
            'stage12_rate' => $stage12Rate,
            'stage24_rate' => $stage24Rate,
            'update_time' => $time
        ];

        $condition['member_id'] = $id;
        $creditModel = M('member_credit');
        $creditInfo = $creditModel->where($condition)->find();
        if (empty($creditInfo)) {
            $data['create_time'] = $time;
            $data['member_id'] = $id;
            $res = $creditModel->add($data);
        } else {
            $res = $creditModel->where($condition)->save($data);
        }

        if (empty($res)) {
            $this->error('服务器错误');
        }
        $this->success('更新成功');
    }


    public function info()
    {
        $memberId = I('id') ? (int)I('id') : 0;
        $where = sprintf('a.id = %d', $memberId);
        $prefix = C('DB_PREFIX');

        $fields = "a.nickname,a.sex,a.headimgurl,a.trade_amount,a.trade_cash,b.*,c.*";
        $model = new Model();
        $info = $model
            ->table("{$prefix}member as a")
            ->join("left join {$prefix}member_info as b ON a.id = b.member_id")
            ->join("left join {$prefix}member_credit as c ON c.member_id = a.id")
            ->field($fields)
            ->where($where)
            ->find();

        if (empty($info)) {
            $this->error('用户不存在');
        }

        $cardModel = M('member_bank_card');
        $condition['member_id'] = $memberId;
        $cardList = $cardModel->where($condition)->order('id desc')->select();

        $info['card_list'] = $cardList;
        $this->assign('data', $info);
        $this->display();
    }
}
