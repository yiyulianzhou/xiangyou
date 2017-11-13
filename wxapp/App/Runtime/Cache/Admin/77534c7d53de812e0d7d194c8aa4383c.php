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
                        <form class="form-horizontal" action="" method="post">
                            <div class="form-group">
                                <label class="col-sm-1 control-label no-padding-right" for="form-field-1"> 用户名 </label>
                                <div class="col-sm-9">
                                    <input type="text" name='user'
                                    class="rcol-xs-10 col-sm-5" value="<?php echo ($list["name"]); ?>">
                                    <span class="help-inline col-xs-12 col-sm-7">
                                            <?php if($member['uid'] == 1): ?><span class="middle">无法修改</span><?php endif; ?>
<<<<<<< HEAD
                                    </span>
=======
                                            </span>
>>>>>>> 08c2ca8a88a760f7badf3882f9f19286ff31008f
                                </div>
                            </div>
                            <div class="space-4"></div>

                            <div class="form-group">
                                <label class="col-sm-1 control-label no-padding-right" for="form-field-4"> 性别 </label>
                                <div class="col-sm-9">
                                    <select id="sex" name="sex" class="multiselect">
                                        <option value="0"
                                        <?php if($list['sex'] == 0): ?>selected="selected"<?php endif; ?>
                                        >保密</option>
                                        <option value="1"
                                        <?php if($list['sex'] == 1): ?>selected="selected"<?php endif; ?>
                                        >男</option>
                                        <option value="2"
                                        <?php if($list['sex'] == 2): ?>selected="selected"<?php endif; ?>
                                        >女</option>
                                    </select>
                                </div>
                            </div>

                            <div class="space-4"></div>

                            <div class="form-group">
                                <label class="col-sm-1 control-label no-padding-right" for="id-date-picker-1">身高</label>
                                <div class="col-xs-9 col-sm-9">
                                    <div class="input-group col-xs-5">

                                        <input class="form-control" name="height" value="<?php echo ($list['height']); ?>"
                                        type="text"/>

                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-1 control-label no-padding-right" for="id-date-picker-1">籍贯</label>
                                <div class="col-xs-9 col-sm-9">
                                    <div class="input-group col-xs-5">

                                        <input class="form-control" name="height" value="<?php echo ($list['origin']); ?>"
                                        type="text"/>

                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-1 control-label no-padding-right" for="id-date-picker-1">年龄</label>
                                <div class="col-xs-9 col-sm-9">
                                    <div class="input-group col-xs-5">

                                        <input class="form-control" name="height" value="<?php echo ($list['age']); ?>"
                                        type="text"/>

                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-1 control-label no-padding-right" for="id-date-picker-1">学历</label>
                                <div class="col-xs-9 col-sm-9">
                                    <div class="input-group col-xs-5">

                                        <input class="form-control" name="height" value="<?php echo ($list['record']); ?>"
                                        type="text"/>

                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-1 control-label no-padding-right" for="id-date-picker-1">证件类型</label>
                                <div class="col-xs-9 col-sm-9">
                                    <div class="input-group col-xs-5">

                                        <input class="form-control" name="height" value="<?php echo ($list['cred_type']); ?>"
                                        type="text"/>

                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-1 control-label no-padding-right" for="id-date-picker-1">证件号码</label>
                                <div class="col-xs-9 col-sm-9">
                                    <div class="input-group col-xs-5">

                                        <input class="form-control" name="height" value="<?php echo ($list['cred_id']); ?>"
                                        type="text"/>

                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-1 control-label no-padding-right" for="id-date-picker-1">爱好</label>
                                <div class="col-xs-9 col-sm-9">
                                    <div class="input-group col-xs-5">

                                        <input class="form-control" name="hobby" value="<?php echo ($list['hobby']); ?>"
                                        type="text"/>

                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-1 control-label no-padding-right" for="id-date-picker-1">紧急联系人</label>
                                <div class="col-xs-9 col-sm-9">
                                    <div class="input-group col-xs-5">

                                        <input class="form-control" name="urgent_name" value="<?php echo ($list['urgent_name']); ?>"
                                        type="text"/>

                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-1 control-label no-padding-right" for="id-date-picker-1">紧急联系人电话</label>
                                <div class="col-xs-9 col-sm-9">
                                    <div class="input-group col-xs-5">

                                        <input class="form-control" name="urgent_name" value="<?php echo ($list['urgent_tel']); ?>"
                                        type="text"/>

                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-1 control-label no-padding-right" for="id-date-picker-1">健康状况</label>
                                <div class="col-xs-9 col-sm-9">
                                    <div class="input-group col-xs-5">

                                        <input class="form-control" name="urgent_name" value="<?php echo ($list['health']); ?>"
                                        type="text"/>

                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-1 control-label no-padding-right" for="id-date-picker-1">银行卡号</label>
                                <div class="col-xs-9 col-sm-9">
                                    <div class="input-group col-xs-5">

                                        <input class="form-control" name="urgent_name" value="<?php echo ($list['health']); ?>"
                                        type="text"/>

                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-1 control-label no-padding-right" for="id-date-picker-1">是否独居</label>
                                <div class="col-xs-9 col-sm-9">
                                    <div class="input-group col-xs-5">

                                        <input class="form-control" name="urgent_name" value="<?php echo ($list['live_alone']); ?>"
                                        type="text"/>
<<<<<<< HEAD
=======
                                        <select id="sex" name="sex" class="multiselect">
                                        <option value="0"
                                        <?php if($list['live_alone'] == 0): ?>selected="selected"<?php endif; ?>
                                        >否</option>
                                        <option value="1"
                                        <?php if($list['live_alone'] == 1): ?>selected="selected"<?php endif; ?>
                                        >是</option>
                                    </select>
>>>>>>> 08c2ca8a88a760f7badf3882f9f19286ff31008f

                                    </div>
                                </div>
                            </div>
                            <div class="space-4"></div>

                            <div class="form-group">
                                <label class="col-sm-1 control-label no-padding-right" for="form-field-6"> 过敏源 </label>
                                <div class="col-sm-9">
                                    <input type="text" name="phone" id="phone" placeholder="过敏源"
                                           class="col-xs-10 col-sm-5" value="<?php echo ($list['sensitive_source']); ?>">
                                    <span class="help-inline col-xs-12 col-sm-7">
                                        <span class="middle"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-1 control-label no-padding-right" for="form-field-6"> 宗教信仰 </label>
                                <div class="col-sm-9">
                                    <input type="text" name="phone" id="phone" placeholder="宗教信仰"
                                           class="col-xs-10 col-sm-5" value="<?php echo ($list['religion']); ?>">
                                    <span class="help-inline col-xs-12 col-sm-7">
                                        <span class="middle"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-1 control-label no-padding-right" for="form-field-6"> 余额 </label>
                                <div class="col-sm-9">
                                    <input type="text" name="phone" id="phone" placeholder="余额"
                                           class="col-xs-10 col-sm-5" value="<?php echo ($list['account']); ?>">
                                    <span class="help-inline col-xs-12 col-sm-7">
                                        <span class="middle"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-1 control-label no-padding-right" for="form-field-6"> 积分 </label>
                                <div class="col-sm-9">
                                    <input type="text" name="phone" id="phone" placeholder="积分"
                                           class="col-xs-10 col-sm-5" value="<?php echo ($list['points']); ?>">
                                    <span class="help-inline col-xs-12 col-sm-7">
                                        <span class="middle"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="space-4"></div>

                            <div class="col-md-offset-2 col-md-9">
<<<<<<< HEAD
                                <button class="btn btn-info" type="submit">
                                    <i class="icon-ok bigger-110"></i>
                                    提交
                                </button>

                                &nbsp; &nbsp; &nbsp;
                                <button class="btn" type="reset">
                                    <i class="icon-undo bigger-110"></i>
                                    重置
=======
                                <button class="btn" type="reset" onclick="history.go(-1)">
                                    <i class="icon-undo bigger-110"></i>
                                    返回
>>>>>>> 08c2ca8a88a760f7badf3882f9f19286ff31008f
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
<!-- inline scripts related to this page -->
<script src="/Public/qwadmin/js/date-time/bootstrap-datepicker.js"></script>
<script src="/Public/qwadmin/js/function.js"></script>
<script type="text/javascript">
    jQuery(function ($) {
        $('#birthday').datepicker({
            format: 'yyyy-mm-dd',
            weekStart: 1,
            autoclose: true,
            todayBtn: 'linked',
            language: 'cn'
        });
    });
</script>
</body>
</html>