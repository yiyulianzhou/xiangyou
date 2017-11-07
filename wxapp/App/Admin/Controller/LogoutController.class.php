<?php
/**
 *
 * 日    期：2017-08-23
 * 版    本：1.0.0
 * 功能说明：后台退出控制器。
 *
 **/

namespace Admin\Controller;

class LogoutController extends ComController
{
    public function index()
    {
        cookie('auth', null);
        session('uid',null);
        session('phone',null);
        session('sign',null);
        $url = "/login/index";
        exit('<script> 
        	if(window.top!=window.self){
        		self.opener.location.reload(); 
        	}else{
        		window.location.href="'.U("Login/index").'";
        	}
        	</script>');
    }
}