<?php
/**
 *
 * 日    期：2017-11-8
 * 版    本：1.0.0
 * 功能说明：网站设置控制器。
 *
 **/

namespace Admin\Controller;

use Admin\Controller\ComController;

class SettingController extends ComController
{
    public function setting()
    {
       
        $vars = M('admin_setting')->where('type=1')->select();

        $this->assign('vars', $vars);

        $this->display();
    }

    public function update()
    {

        $data = $_POST;
        $data['sitename'] = isset($_POST['sitename']) ? strip_tags($_POST['sitename']) : '';
        $data['title'] = isset($_POST['title']) ? strip_tags($_POST['title']) : '';
        $data['keywords'] = isset($_POST['keywords']) ? strip_tags($_POST['keywords']) : '';
        $data['description'] = isset($_POST['description']) ? strip_tags($_POST['description']) : '';
        $data['footer'] = isset($_POST['footer']) ? $_POST['footer'] : '';
        $Model = M('admin_setting');
        foreach ($data as $k => $v) {
            $Model->data(array('v' => $v))->where("k='{$k}'")->save();
        }
        //清除旧的缓存数据
        $cache = \Think\Cache::getInstance();
        $cache->clear();
        addlog('修改网站配置。');
        $this->success('恭喜，网站配置成功！');
    }
    public function wxsend(){

        if(IS_AJAX){
            $key=I("key","","string");
            $val=I("value","","intval");
            if(empty($key)){
                $this->ajaxReturn(array("status"=>0,"msg"=>"参数错误！"));
            }
            $admin_setting=M("admin_setting");
            $result=$admin_setting->where(array("k"=>$key))->find();
            $a=$admin_setting->getlastsql();
            $status=empty($result["v"])||$result["v"]==0?1:0;
            if(M("admin_setting")->where(array("k"=>$key))->save(array("v"=>$status))){
                $this->ajaxReturn(array("status"=>$status,"msg"=>"修改成功！"));
            }
            $this->ajaxReturn(array("status"=>$key,"msg"=>"修改失败"));
            
        }
        $this->vars=M("admin_setting")->where(array("type"=>2))->select();
        $this->display();
    }
}