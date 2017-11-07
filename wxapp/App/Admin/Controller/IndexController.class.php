<?php
/**
 *
 * 日    期：2017-08-20
 * 版    本：1.0.0
 * 功能说明：后台首页控制器。
 *
 **/

namespace Admin\Controller;
use Think\Model;
class IndexController extends ComController
{
	public function _initialize(){
        parent::_initialize();
	}
    public function index()
    {
        $this->display();
    }
    public function main()
    {
        $this->display();
    }
    //获取用户提现申请
    public function getAmount ()
    {
    }

}