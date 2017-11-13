<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta charset="utf-8"/>
    <title><?php echo ($current['title']); ?>-<?php echo (C("sitename")); ?></title>

    <meta name="keywords" content="<?php echo (C("keywords")); ?>"/>
    <meta name="description" content="<?php echo (C("description")); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>


    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="/Public/qwadmin/css/bootstrap.css"/>
    <link rel="stylesheet" href="/Public/qwadmin/css/font-awesome.css"/>
    <link rel="stylesheet" href="/Public/qwadmin/css/jquery-ui.css"/>
    <!-- page specific plugin styles -->

    <!-- datatables css -->
    <link rel="stylesheet" type="text/css" href="/Public/qwadmin/js/DataTables-1.10.15/media/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/qwadmin/js/DataTables-1.10.15/media/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="/Public/qwadmin/js/DataTables-1.10.15/media/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="/Public/qwadmin/js/DataTables-1.10.15/extensions/Buttons/css/buttons.dataTables.css">
    <!-- daterangepicker css -->
    <link rel="stylesheet" type="text/css" href="/Public/qwadmin/js/bootstrap-daterangepicker-master/daterangepicker.css">
    <!--summernote-->
    <link rel="stylesheet" type="text/css" href="/Public/qwadmin/css/plugins/summernote.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/qwadmin/css/plugins/summernote-bs3.css"/>
    <!-- text fonts -->
    <link rel="stylesheet" href="/Public/qwadmin/css/ace-fonts.css"/>

    <!-- ace styles -->
    <link rel="stylesheet" href="/Public/qwadmin/css/ace.css" class="ace-main-stylesheet" id="main-ace-style"/>

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="/Public/qwadmin/css/ace-part2.css" class="ace-main-stylesheet"/>
    <![endif]-->

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="/Public/qwadmin/css/ace-ie.css"/>

    <![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->
    <script src="/Public/qwadmin/js/ace-extra.js"></script>

    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

    <!--[if lte IE 8]>
    <script src="/Public/qwadmin/js/html5shiv.js"></script>
    <script src="/Public/qwadmin/js/respond.js"></script>
    <![endif]-->
    <!-- datatables js -->
    <script src="/Public/qwadmin/js/jquery-1.9.1.min.js"></script>
    <script src="/Public/qwadmin/js/DataTables-1.10.15/media/js/jquery.dataTables.js"></script>
    <script src="/Public/qwadmin/js/DataTables-1.10.15/media/js/jquery.dataTables.min.js"></script>
    <script src="/Public/qwadmin/js/DataTables-1.10.15/media/js/plugins.config.js"></script>
    <!--export->excel-->
    <script src="/Public/qwadmin/js/DataTables-1.10.15/extensions/Buttons/js/dataTables.buttons.min.js"></script>
    <script src="/Public/qwadmin/js/DataTables-1.10.15/extensions/Buttons/js/buttons.flash.min.js"></script>
    <script src="/Public/qwadmin/js/DataTables-1.10.15/extensions/Buttons/js/buttons.html5.min.js"></script>
    <script src="/Public/qwadmin/js/DataTables-1.10.15/extensions/Buttons/js/buttons.print.min.js"></script>
    <script type="text/javascript" language="javascript" src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js">
    </script>
    <!-- daterangepicker js -->

    <script src="/Public/qwadmin/js/bootstrap-daterangepicker-master/moment.js"></script>
    <script src="/Public/qwadmin/js/bootstrap-daterangepicker-master/moment.min.js"></script>
    <script src="/Public/qwadmin/js/bootstrap-daterangepicker-master/daterangepicker.js"></script>

    <!--summernote.js-->
    <script src="/Public/qwadmin/js/summernote.min.js"></script>
</head>
<body class="no-skin">
<div class="main-container" id="main-container">
    <script type="text/javascript">
        try {
            ace.settings.check('main-container', 'fixed')
        } catch (e) {
        }
    </script>
    <div class="main-content">
        <div class="main-content-inner">
            <!-- /section:basics/content.breadcrumbs -->
            <div class="page-content">
                    <!-- #section:settings.box -->
    <?php if($current["tips"] != ''): ?><div class="alert alert-block alert-success">
            <button type="button" class="close" data-dismiss="alert">
                <i class="ace-icon fa fa-times"></i>
            </button>
            <!--i class="ace-icon fa fa-check green"></i-->
            <?php echo ($current["tips"]); ?>
        </div><?php endif; ?>

                <!-- /section:settings.box -->
                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->
                        <div class="row">
                            <form class="form-inline" action="" method="get">
                                <a class="btn btn-info" href="<?php echo U('add');?>" value="">新增</a>
                                <label class="inline">用户搜索</label>
                                <select name="field" class="form-control">
                                    <option <?php if(I('field') == user): ?>selected<?php endif; ?> value="user">用户名</option>
                                    <option <?php if(I('field') == phone): ?>selected<?php endif; ?> value="phone">电话</option>
                                    <option <?php if(I('field') == qq): ?>selected<?php endif; ?> value="qq">QQ</option>
                                    <option <?php if(I('field') == email): ?>selected<?php endif; ?> value="email">邮箱</option>
                                </select>
                                <input type="text" name="keyword" value="<?php echo I(keyword);?>" class="form-control">
                                <label class="inline">&nbsp;&nbsp;排序：</label>
                                <select name="order" class="form-control">
                                    <option <?php if(I('order') == asc): ?>selected<?php endif; ?> value="asc">注册时间升</option>
                                    <option <?php if(I('order') == desc): ?>selected<?php endif; ?> value="desc">注册时间降</option>
                                </select>
                                <button type="submit" class="btn btn-purple btn-sm">
                                    <span class="ace-icon fa fa-search icon-on-right bigger-110"></span>
                                    搜索
                                </button>
                            </form>
                        </div>
                        <div class="space-4"></div>
                        <div class="row">
                            <form id="form" method="post" action="<?php echo U('del');?>">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th class="center"><input class="check-all" type="checkbox" value=""></th>
                                        <th>用户名</th>
                                        <th>用户组</th>
                                        <th class="center">性别</th>
                                        <th class="center">生日</th>
                                        <th>电话</th>
                                        <th>Q&nbsp;Q</th>
                                        <th>邮箱</th>
                                        <th class="center">操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <style>
                                        .grouptd {
                                            position: relative;
                                        }

                                        .group {
                                            display: inline-block;
                                            width: 100%;
                                        }

                                        .groupselect {
                                            position: absolute;
                                            top: 0;
                                            left: 0;
                                            width: 100%;
                                            height: 100%;
                                            border: 0;
                                        }
                                    </style>
                                    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
                                            <td class="center">
                                                <?php if($val['uid'] != 1): ?><input class="uids" type="checkbox"
                                                                                         name="uids[]"
                                                                                         value="<?php echo ($val['uid']); ?>">
                                                    <?php else: ?>
                                                    <span title="系统管理员，禁止删除">--</span><?php endif; ?>
                                            </td>
                                            <td><?php echo ($val['user']); ?></td>
                                            <td class="grouptd">
                                                <span class="group" val="<?php echo ($val['uid']); ?>"><?php echo ($val['title']); ?></span>
                                                <select class="groupselect hide">
                                                    <?php if(is_array($group)): $i = 0; $__LIST__ = $group;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option
                                                        <?php if($val['gid'] == $v['id']): ?>selected="selected"<?php endif; ?>
                                                        value="<?php echo ($v["id"]); ?>"><?php echo ($v["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                                </select>
                                            </td>
                                            <td class="center"><?php if($val['sex']==1){echo '男';}elseif($val['sex']==2){echo '女';}else{echo '保密';} ?></td>
                                            <td class="center"><?php echo (date("Y-m-d",$val['birthday'])); ?></td>
                                            <td><?php echo ($val['phone']); ?></td>
                                            <td><?php echo ($val['qq']); ?></td>
                                            <td><?php echo ($val['email']); ?></td>
                                            <td class="center"><a href="<?php echo U('edit',array('uid'=>$val['uid']));?>">修改</a>&nbsp;
                                                <?php if($val['uid'] != 1): ?><a class="del" href="javascript:;"
                                                                                     val="<?php echo U('del',array('uid'=>$val['uid']));?>"
                                                                                     title="删除">删除</a><?php endif; ?>
                                            </td>
                                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </tbody>
                                </table>
                            </form>
                            <div class="cf">
                                <input id="submit" class="btn btn-info" type="button" value="删除">
                            </div>
                            <?php echo ($page); ?>
                        </div>
                        <!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.page-content -->
        </div>
    </div><!-- /.main-content -->
        <div class="footer">
        <div class="footer-inner">
            <!-- #section:basics/footer -->
            <div class="footer-content">
                            <span class="bigger-120">
                                <small>Copyright &copy; 2017 <a  target="_blank">Yangkala</a> All Rights Reserved.</small>
                            </span>
            </div>

            <!-- /section:basics/footer -->
        </div>
    </div>

    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
    </a>

</div><!-- /.main-container -->

<!-- basic scripts -->

<!--[if !IE]> -->
<script type="text/javascript">
    window.jQuery || document.write("<script src='/Public/qwadmin/js/jquery.js'>" + "<" + "/script>");
</script>

<!-- <![endif]-->

<!--[if IE]>
<script type="text/javascript">
    window.jQuery || document.write("<script src='/Public/qwadmin/js/jquery1x.js'>" + "<" + "/script>");
</script>
<![endif]-->
<script type="text/javascript">
    if ('ontouchstart' in document.documentElement) document.write("<script src='/Public/qwadmin/js/jquery.mobile.custom.js'>" + "<" + "/script>");
</script>
<script src="/Public/qwadmin/js/bootstrap.js"></script>

<!-- page specific plugin scripts -->
<script charset="utf-8" src="/Public/kindeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="/Public/kindeditor/lang/zh_CN.js"></script>
<script src="/Public/qwadmin/js/bootbox.js"></script>
<!-- ace scripts -->
<script src="/Public/qwadmin/js/ace/elements.scroller.js"></script>
<script src="/Public/qwadmin/js/ace/elements.colorpicker.js"></script>
<script src="/Public/qwadmin/js/ace/elements.fileinput.js"></script>
<script src="/Public/qwadmin/js/ace/elements.typeahead.js"></script>
<script src="/Public/qwadmin/js/ace/elements.wysiwyg.js"></script>
<script src="/Public/qwadmin/js/ace/elements.spinner.js"></script>
<script src="/Public/qwadmin/js/ace/elements.treeview.js"></script>
<script src="/Public/qwadmin/js/ace/elements.wizard.js"></script>
<script src="/Public/qwadmin/js/ace/elements.aside.js"></script>
<script src="/Public/qwadmin/js/ace/ace.js"></script>
<script src="/Public/qwadmin/js/ace/ace.ajax-content.js"></script>
<script src="/Public/qwadmin/js/ace/ace.touch-drag.js"></script>
<script src="/Public/qwadmin/js/ace/ace.sidebar.js"></script>
<script src="/Public/qwadmin/js/ace/ace.sidebar-scroll-1.js"></script>
<script src="/Public/qwadmin/js/ace/ace.submenu-hover.js"></script>
<script src="/Public/qwadmin/js/ace/ace.widget-box.js"></script>
<script src="/Public/qwadmin/js/ace/ace.settings.js"></script>
<script src="/Public/qwadmin/js/ace/ace.settings-rtl.js"></script>
<script src="/Public/qwadmin/js/ace/ace.settings-skin.js"></script>
<script src="/Public/qwadmin/js/ace/ace.widget-on-reload.js"></script>
<script src="/Public/qwadmin/js/ace/ace.searchbox-autocomplete.js"></script>
<script src="/Public/qwadmin/js/jquery-ui.js"></script>
<!-- inline scripts related to this page -->
<script type="text/javascript">
    $(function () {
        $(".group").click(function () {
            $(this).addClass('hide');
            $(this).parent().find(".groupselect").removeClass('hide');
        })
        $(".groupselect").on("change", function () {
            var ob = $(this);
            var gid = ob.val();
            var uid = ob.parent().find('.group').attr('val');
            $.get("<?php echo U('update');?>?ajax=yes&uid=" + uid + "&gid=" + gid, function (data) {
                var text = ob.find("option:selected").text();
                ob.parent().find(".group").removeClass('hide').html(text);
                ob.addClass('hide');
            });
        })

        $(".check-all").click(function () {
            $(".uids").prop("checked", this.checked);
        });
        $(".uids").click(function () {
            var option = $(".ids");
            option.each(function (i) {
                if (!this.checked) {
                    $(".check-all").prop("checked", false);
                    return false;
                } else {
                    $(".check-all").prop("checked", true);
                }
            });
        });
        $("#submit").click(function () {
            bootbox.confirm({
                title: "系统提示",
                message: "是否要删除所选用户？",
                callback: function (result) {
                    if (result) {
                        $("#form").submit();
                    }
                },
                buttons: {
                    "cancel": {"label": "取消"},
                    "confirm": {
                        "label": "确定",
                        "className": "btn-danger"
                    }
                }
            });
        });
        $(".del").click(function () {
            var url = $(this).attr('val');
            bootbox.confirm({
                title: "系统提示",
                message: "是否要删除该用户?",
                callback: function (result) {
                    if (result) {
                        window.location.href = url;
                    }
                },
                buttons: {
                    "cancel": {"label": "取消"},
                    "confirm": {
                        "label": "确定",
                        "className": "btn-danger"
                    }
                }
            });
        });
    })
</script>
</body>
</html>