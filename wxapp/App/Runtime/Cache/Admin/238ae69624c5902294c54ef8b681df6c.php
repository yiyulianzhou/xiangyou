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
            <!-- #section:basics/content.breadcrumbs -->
            <!-- /section:basics/content.breadcrumbs -->
            <div class="page-content">
                <!-- /section:settings.box -->
                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->
                        <form class="form-horizontal" id="form" name="form" action="<?php echo u('update');?>" method="post">
                            <div class="form-group">
                                <label class="col-sm-1 control-label no-padding-right" for="form-field-1"> 用户组名 </label>
                                <div class="col-sm-9">
                                    <input type="text" name="title" id="title" placeholder="用户组名"
                                           class="col-xs-10 col-sm-5" value="<?php echo ($group["title"]); ?>">
                                    <input type="hidden" name="id" id="id" value="<?php echo ($group["id"]); ?>">
                                    <span class="help-inline col-xs-12 col-sm-7">
												<span class="middle">用户组名称，不能为空。</span>
											</span>
                                </div>
                            </div>
                            <?php if($group["id"] != 1): ?><div class="space-4"></div>
                            <div class="form-group">
                                <label class="col-sm-1 control-label no-padding-right" for="form-field-2"> 是否启用 </label>
                                <div class="control-label no-padding-left col-sm-1">
                                    <label>
                                        <input name="status" id="status"
                                        <?php if($group['status'] == 1): ?>checked="checked"<?php endif; ?>
                                        class="ace ace-switch ace-switch-2" type="checkbox" />
                                        <span class="lbl"></span>
                                    </label>
                                </div>
                                <span class="help-inline col-xs-12 col-sm-7">
												<span class="middle">YES，启用；NO，禁用</span>
										</span>
                            </div>
                             <?php else: ?>
                                <input name="status" id="status" value ="on" type="hidden" /><?php endif; ?>
                            <div class="space-4"></div>
                            <?php if($group["id"] != 1): ?><div class="form-group">
                                    <label class="col-sm-1 control-label no-padding-right" for="form-field-1">
                                        权限选择 </label>
                                    <div class="col-sm-9">
                                        <div class="col-sm-10">
                                            <?php if(is_array($rule)): $i = 0; $__LIST__ = $rule;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="row">
                                                    <div class="widget-box">
                                                        <div class="widget-header">
                                                            <h4 class="widget-title">
                                                                <label>
                                                                    <input name="rules[]"
                                                                           class="ace ace-checkbox-2 father" <?php if(in_array($v['id'],$group['rules'])){echo 'checked="checked"';};?>
                                                                    type="checkbox" value="<?php echo ($v['id']); ?>"/>
                                                                    <span class="lbl"> <?php echo ($v['title']); ?></span>
                                                                </label>
                                                            </h4>
                                                            <div class="widget-toolbar">
                                                                <?php if(!empty($v["children"])): ?><a href="#" data-action="collapse">
                                                                        <i class="ace-icon fa fa-chevron-up"></i>
                                                                    </a><?php endif; ?>
                                                            </div>
                                                        </div>
                                                        <?php if(!empty($v["children"])): ?><div class="widget-body">
                                                                <div class="widget-main row">
                                                                    <?php if(is_array($v["children"])): $i = 0; $__LIST__ = $v["children"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><label class="col-xs-2" style="width:160px;">
                                                                            <input name="rules[]"
                                                                                   class="ace ace-checkbox-2 children" <?php if(in_array($vv['id'],$group['rules'])){echo 'checked="checked"';};?>
                                                                            type="checkbox" value="<?php echo ($vv['id']); ?>"/>
                                                                            <span class="lbl"> <?php echo ($vv['title']); ?></span>
                                                                        </label>
                                                                        <?php if(is_array($vv["children"])): $i = 0; $__LIST__ = $vv["children"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vvv): $mod = ($i % 2 );++$i;?><label class="col-xs-2"
                                                                                   style="width:160px;">
                                                                                <input name="rules[]"
                                                                                       class="ace ace-checkbox-2 children" <?php if(in_array($vvv['id'],$group['rules'])){echo 'checked="checked"';};?>
                                                                                type="checkbox" value="<?php echo ($vvv['id']); ?>"/>
                                                                                <span class="lbl"> <?php echo ($vvv['title']); ?></span>
                                                                            </label><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
                                                                </div>
                                                            </div><?php endif; ?>
                                                    </div>
                                                </div><?php endforeach; endif; else: echo "" ;endif; ?>
                                        </div>
                                    </div>
                                </div><?php endif; ?>

                            <div class="col-md-offset-2 col-md-9">
                                <button class="btn btn-info submit" type="button">
                                    <i class="icon-ok bigger-110"></i>
                                    提交
                                </button>

                                &nbsp; &nbsp; &nbsp;
                                <button class="btn" type="reset">
                                    <i class="icon-undo bigger-110"></i>
                                    重置
                                </button>
                            </div>
                        </form>
                        <!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.page-content -->
        </div>
    </div><!-- /.main-content -->
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
<script src="/Public/qwadmin/js/bootbox.js"></script>
<!-- inline scripts related to this page -->
<script type="text/javascript">
    $(".children").click(function () {
        $(this).parent().parent().parent().parent().find(".father").prop("checked", true);
    })
    $(".father").click(function () {
        if (this.checked) {
            $(this).parent().parent().parent().parent().find(".children").prop("checked", true);
        } else {
            $(this).parent().parent().parent().parent().find(".children").prop("checked", false);
        }
    })
    $(".submit").click(function () {
        var title = $("#title").val();
        if (title == '') {
            bootbox.dialog({
                message: "用户组名称不能为空。",
                buttons: {
                    "success": {
                        "label": "确定",
                        "className": "btn-danger"
                    }
                }
            });
            return;
        }
        $('#form').submit();

    })
</script>
</body>
</html>