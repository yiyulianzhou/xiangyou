<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">

    <title>后台管理 - 主页</title>

    <meta name="keywords" content="后台管理 - 主页">
    <meta name="description" content="后台管理 - 主页">
    <style>
    .xiverror{
        overflow: hidden!important;
    }
    </style>
    <!--[if lt IE 8]>
    <script>
        alert('H+已不支持IE6-8，请使用谷歌、火狐等浏览器\n或360、QQ等国产浏览器的极速模式浏览本页面！');
    </script>
    <![endif]-->

    <link href="/Public/css/bootstrap.min.css?v=3.4.0" rel="stylesheet">
    <link href="/Public/css/font-awesome.min.css?v=4.3.0" rel="stylesheet">
    <link href="/Public/css/animate.min.css" rel="stylesheet">
    <link href="/Public/css/style.min.css?v=3.0.0" rel="stylesheet">
</head>
<body class="fixed-sidebar full-height-layout gray-bg">
    <div id="wrapper">
        <!--左侧导航开始-->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="nav-close"><i class="fa fa-times-circle"></i>
            </div>
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <span><img alt="image" width="60px" class="img-circle" src="<?php echo ($user['headimgurl']); ?>" /></span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear">
                                <span class="block m-t-xs"><strong class="font-bold"><?php echo ($user['name']); ?></strong></span>
                            </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a class="J_menuItem" href="<?php echo U('Set/setpwd');?>">修改密码</a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="<?php echo U('logout/index');?>">安全退出</a>
                                </li>
                            </ul>
                        </div>
                        <div class="logo-element">游
                        </div>
                    </li>
            <!--遍历菜单开始-->
                    <?php if(is_array($menu)): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li <?php if(($v['id'] == $current['id']) OR ($v['id'] == $current['pid']) OR ($v['id'] == $current['ppid'])): ?>class="nav-label
                            <?php if($current['pid'] != '0'): ?>open<?php endif; ?>
                            "<?php endif; ?>
                        >
                       <a href="<?php if(empty($v["name"])): ?>#<?php else: ?>/<?php echo ($v['name']); endif; ?>"
                       
                        <?php if(!empty($v["children"])): ?>class="dropdown-toggle"<?php endif; ?>
                        >
                        <i class="<?php echo ($v["icon"]); ?>"></i>
                        <span class="nav-label">
                                            <?php echo ($v["title"]); ?>
                                        </span>
                        <?php if(!empty($v["children"])): ?><b class="arrow fa fa-angle-down"></b><?php endif; ?>
                        </a>

                        <b class="arrow"></b>
                        <?php if(!empty($v["children"])): ?><ul class="nav nav-second-level">
                                <?php if(is_array($v["children"])): $i = 0; $__LIST__ = $v["children"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><li
                                    <?php if(($vv['id'] == $current['id']) OR ($vv['id'] == $current['pid'])): ?>class="active
                                        <?php if($current['ppid'] != '0'): ?>open<?php endif; ?>
                                        "<?php endif; ?>
                                    >
                                    <a class="J_menuItem" href="<?php if(empty($vv["children"])): echo U($vv['name']); else: ?>#<?php endif; ?>"
                                    <?php if(!empty($vv["children"])): ?>class="dropdown-toggle"<?php endif; ?>
                                    >
                                    <i class="<?php echo ($vv["icon"]); ?>"></i>
                                    <?php echo ($vv["title"]); ?>
                                    <?php if(!empty($vv["children"])): ?><b class="arrow fa fa-angle-down"></b><?php endif; ?>
                                    </a>

                                    <b class="arrow"></b>
                                    <?php if(!empty($vv["children"])): ?><ul class="submenu">
                                            <?php if(is_array($vv["children"])): $i = 0; $__LIST__ = $vv["children"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vvv): $mod = ($i % 2 );++$i;?><li
                                                <?php if($vvv['id'] == $current['id']): ?>class="active"<?php endif; ?>
                                                >
                                                <a class="J_menuItem" href="<?php echo U($vvv['name']);?>">
                                                    <i class="<?php echo ($vvv["icon"]); ?>"></i>
                                                    <?php echo ($vvv["title"]); ?>
                                                </a>
                                                <b class="arrow"></b>
                                                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                        </ul><?php endif; ?>
                                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul><?php endif; ?>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                 <!--遍历结束-->   
                </ul>
            </div>
        </nav>

        <!--左侧导航结束-->
        <!--右侧部分开始-->
        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header col-md-1" >
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                    </div>
                    <div class="navbar-header text-center col-md-3 col-md-offset-2">
                        <h2 class="text-default">翔游后台系统</h2>
                    </div>

                   
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <a href="<?php echo U('Index/index');?>"  data-index="0"><i class="ace-icon fa fa-home"></i>首页</a>
                        </li>
                        <li>
                            <a href="<?php echo U('Cache/clear');?>"  data-index="0"><i class="glyphicon glyphicon-trash"></i>清除缓存</a>
                        </li>
                        <li class="dropdown">
                            <a class="right-sidebar-toggle" aria-expanded="false">
                                <i class="fa fa-tasks"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="row content-tabs">
                <button class="roll-nav roll-left J_tabLeft"><i class="fa fa-backward"></i>
                </button>
                <nav class="page-tabs J_menuTabs">
                    <div class="page-tabs-content">
                        <a href="javascript:;" class="active J_menuTab" data-id="index_v1.html">首页</a>
                    </div>
                </nav>
                <button class="roll-nav roll-right J_tabRight"><i class="fa fa-forward"></i>
                </button>
                <button class="roll-nav roll-right dropdown J_tabClose"><span class="dropdown-toggle" data-toggle="dropdown">关闭操作<span class="caret"></span></span>
                    <ul role="menu" class="dropdown-menu dropdown-menu-right">
                        <li class="J_tabShowActive"><a>定位当前选项卡</a>
                        </li>
                        <li class="divider"></li>
                        <li class="J_tabCloseAll"><a>关闭全部选项卡</a>
                        </li>
                        <li class="J_tabCloseOther"><a>关闭其他选项卡</a>
                        </li>
                    </ul>
                </button>
                <a href="<?php echo U('logout/index');?>" class="roll-nav roll-right J_tabExit"><i class="fa fa fa-sign-out"></i> 退出</a>
            </div>
            <div class="row J_mainContent" id="content-main">
                <iframe class="J_iframe" name="iframe0" width="100%" height="100%" src="<?php echo U('Index/Index/main');?>" frameborder="0" data-id="index_v1.html" seamless></iframe>
            </div>
            <div class="footer">
                <div class="pull-right"><strong>Copyright</strong> <a href="/" target="_blank">翔游实业</a> &copy; 2016-2020 
                </div>
            </div>
        </div>

        <!--右侧部分结束-->
        <!--右侧边栏开始-->
        <div id="right-sidebar">
            <div class="sidebar-container">
                <div class="tab-content">


                    <div id="tab-1" class="tab-pane active">

                        <div class="sidebar-title">
                            <h3> <i class="fa fa-comments-o"></i> 预审订单</h3>
                            <small><i class="fa fa-tim"></i> 您当前有条未读信息</small>
                        </div>

                        <div>
                            <?php if(is_array($juror)): foreach($juror as $key=>$vo): ?><div class="sidebar-message">
                                <a class="J_menuItem" href="<?php echo U('juror/order',array('id'=>$vo['id']));?>">
                                    <div class="pull-left text-center">
                                        <img alt="image" class="img-circle message-avatar" style="width:30px;height:30px;" src="http://dist<?php echo ($Jurorer[$vo['juror_id']]['headimg']); ?>">
                                    </div>
                                </a>
                                
                            </div><?php endforeach; endif; ?>
                        </div>

                    </div>

                    <div id="tab-2" class="tab-pane">

                        <div class="sidebar-title">
                            <h3> <i class="fa fa-cube"></i> 最新任务</h3>
                            <small >您当前有共有<i class="fa fa-tim" id='total'></i> 个待处理任务</small>
                        </div>

                        <ul class="sidebar-list">
                            <li>
                                <a href="/user/amount" class="J_menuItem">
                                <i class="fa fa-tim" id='amount_num'></i> 条余额提现申请
                                </a></li>
                                <li>
                                <a href="/user/draw" class="J_menuItem">
                                <i class="fa fa-tim" id='draw_num' ></i> 条POS刷卡提现申请
                                </a>
                                </li>
                                <li>
                                <a href="/credit/income" class="J_menuItem">
                                <i class="fa fa-tim" id='credit_income'></i> 条信用卡办卡收益审核
                                </a>
                                </li>
                        </ul>

                    </div>

                    <div id="tab-3" class="tab-pane">

                        <div class="sidebar-title">
                            <h3><i class="fa fa-gears"></i> 设置</h3>
                        </div>

                        <div class="setings-item">
                            <span>
                        显示通知
                    </span>
                            <div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="example">
                                    <label class="onoffswitch-label" for="example">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="setings-item">
                            <span>
                        隐藏聊天窗口
                            </span>
                            <div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" name="collapsemenu" checked class="onoffswitch-checkbox" id="example2">
                                    <label class="onoffswitch-label" for="example2">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="setings-item">
                            <span>
                        清空历史记录
                            </span>
                            <div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="example3">
                                    <label class="onoffswitch-label" for="example3">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="setings-item">
                            <div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="example4">
                                    <label class="onoffswitch-label" for="example4">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="setings-item">

                            <div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" checked name="collapsemenu" class="onoffswitch-checkbox" id="example5">
                                    <label class="onoffswitch-label" for="example5">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="setings-item">
                            <span>
                        全局搜索
                    </span>
                            <div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" checked name="collapsemenu" class="onoffswitch-checkbox" id="example6">
                                    <label class="onoffswitch-label" for="example6">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="setings-item">
                            <span>
                        每日更新
                    </span>
                            <div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="example7">
                                    <label class="onoffswitch-label" for="example7">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="sidebar-content">
                            <h4>设置</h4>
                            <div class="small">
                                你可以从这里设置一些常用选项，当然啦，这个只是个演示的示例。
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
        <!--右侧边栏结束-->
    </div>

    <!-- 全局/Public/js -->
    <script src="/Public/js/jquery-2.1.1.min.js"></script>
    <script src="/Public/js/bootstrap.min.js?v=3.4.0"></script>
    <script src="/Public/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="/Public/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="/Public/js/plugins/layer/layer.min.js"></script>

    <!-- 自定义/Public/js -->
    <script src="/Public/js/hplus.min.js?v=3.0.0"></script>
    <script type="text/javascript" src="/Public/js/contabs.min.js"></script>

    <!-- 第三方插件 -->
    <script src="/Public/js/plugins/pace/pace.min.js"></script>
    <script type="text/javascript">
    $('.layui-layer-btn0').click(function(){
        location.href="/Index/setpwd.html";
    });
    $(".juror").click(function(){
        $(".right-sidebar-toggle").click();
    });
    $("#juror").click(function(){
        $(".right-sidebar-toggle").click();
        $("#juror_list").click();
    });
    $("#apply").click(function(){
       $(".right-sidebar-toggle").click();
       $("#apply_list").click();
    });
    function main(){
        $(".J_menuItem[data-index='4']").click();
        $('.layui-layer-btn1').click();
    }
 }
    </script>
</body>

</html>