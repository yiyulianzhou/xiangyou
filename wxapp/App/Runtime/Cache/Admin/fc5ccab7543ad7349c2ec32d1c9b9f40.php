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

                <!-- /section:settings.box -->
                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->
                        <form class="form-horizontal" action="<?php echo U('update');?>" method="post">
                            <div class="form-group">
                                <label class="col-sm-1 control-label no-padding-right" for="form-field-1"> 用户名 </label>
                                <div class="col-sm-9">
                                    <input type="text"
                                    <?php if($member['uid'] == 1): ?>readonly
                                        <?php else: ?>
                                        name="user"<?php endif; ?>
                                    class="rcol-xs-10 col-sm-5" value="<?php echo ($member["user"]); ?>">
                                    <input type="hidden" name="uid" value="<?php echo ($member['uid']); ?>">
                                    <span class="help-inline col-xs-12 col-sm-7">
											<?php if($member['uid'] == 1): ?><span class="middle">无法修改</span><?php endif; ?>
											</span>
                                </div>
                            </div>

                            <div class="space-4"></div>

                            <div class="form-group">
                                <label class="col-sm-1 control-label no-padding-right" for="form-field-10"> 用户组 </label>
                                <div class="col-sm-9">
                                    <?php if($member['uid'] == 1): if(is_array($usergroup)): $i = 0; $__LIST__ = $usergroup;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i; if($val['id'] == $member['group_id']): ?><input type="text" class="col-xs-10 col-sm-5" value="<?php echo ($val['title']); ?>"
                                                       readonly>
                                                <input type="hidden" name="group_id" id="group_id"
                                                       class="col-xs-10 col-sm-5" value="<?php echo ($member['group_id']); ?>"><?php endif; endforeach; endif; else: echo "" ;endif; ?>

                                        <?php else: ?>
                                        <select id="group_id" name="group_id" class="rcol-xs-10 col-sm-5">
                                            <?php if(is_array($usergroup)): $i = 0; $__LIST__ = $usergroup;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><option value="<?php echo ($val['id']); ?>"
                                                <?php if($val['id'] == $member['group_id']): ?>selected="selected"<?php endif; ?>
                                                ><?php echo ($val['title']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                        </select><?php endif; ?>
                                    <span class="help-inline col-xs-12 col-sm-7">
												<span class="middle">请慎重选择用户组</span>
											</span>
                                </div>
                            </div>

                            <div class="space-4"></div>

                            <div class="form-group">
                                <label class="col-sm-1 control-label no-padding-right" for="form-field-2"> 用户密码 </label>
                                <div class="col-sm-9">
                                    <input type="password" name="password" id="password" placeholder="用户密码"
                                           class="col-xs-10 col-sm-5" value="">
                                    <span class="help-inline col-xs-12 col-sm-7">
												<span class="middle">留空不修改</span>
											</span>
                                </div>
                            </div>

                            <div class="space-4"></div>

                            <div class="form-group">
                                <label class="col-sm-1 control-label no-padding-right" for="form-field-4"> 头像 </label>
                                <div class="col-sm-9">
                                    <div class="col-xs-10 col-sm-5"><?php echo UpImage("head",100,100,$member['head']);?></div>
                                    <span class="help-inline col-xs-12 col-sm-7">
												<span class="middle">仅支持jpg、gif、png、bmp、jpeg，且小于1MB。</span>
											</span>
                                </div>

                            </div>
                            <div class="space-4"></div>

                            <div class="form-group">
                                <label class="col-sm-1 control-label no-padding-right" for="form-field-4"> 性别 </label>
                                <div class="col-sm-9">
                                    <select id="sex" name="sex" class="multiselect">
                                        <option value="0"
                                        <?php if($member['sex'] == 0): ?>selected="selected"<?php endif; ?>
                                        >保密</option>
                                        <option value="1"
                                        <?php if($member['sex'] == 1): ?>selected="selected"<?php endif; ?>
                                        >男</option>
                                        <option value="2"
                                        <?php if($member['sex'] == 2): ?>selected="selected"<?php endif; ?>
                                        >女</option>
                                    </select>
                                </div>
                            </div>

                            <div class="space-4"></div>

                            <div class="form-group">
                                <label class="col-sm-1 control-label no-padding-right" for="id-date-picker-1">生日</label>
                                <div class="col-xs-9 col-sm-9">
                                    <div class="input-group col-xs-5">

                                        <input class="form-control" id="birthday" name="birthday" value="<?php if( $member['birthday'] != '' ): echo (date("Y-m-d",$member['birthday'])); endif; ?>"
                                        type="text" data-date-format="dd-mm-yyyy" />
                                        <span class="input-group-addon">
													<i class="ace-icon fa fa-calendar bigger-110"></i>
												</span>

                                    </div>
                                </div>
                            </div>


                            <div class="space-4"></div>

                            <div class="form-group">
                                <label class="col-sm-1 control-label no-padding-right" for="form-field-6"> 电话号码 </label>
                                <div class="col-sm-9">
                                    <input type="text" name="phone" id="phone" placeholder="电话号码"
                                           class="col-xs-10 col-sm-5" value="<?php echo ($member['phone']); ?>">
                                    <span class="help-inline col-xs-12 col-sm-7">
												<span class="middle"></span>
											</span>
                                </div>
                            </div>

                            <div class="space-4"></div>

                            <div class="form-group">
                                <label class="col-sm-1 control-label no-padding-right" for="form-field-7"> Q&nbsp;&nbsp;Q </label>
                                <div class="col-sm-9">
                                    <input type="text" name="qq" id="qq" placeholder="QQ" class="col-xs-10 col-sm-5"
                                           value="<?php echo ($member['qq']); ?>">
                                    <span class="help-inline col-xs-12 col-sm-7">
												<span class="middle"></span>
											</span>
                                </div>
                            </div>

                            <div class="space-4"></div>

                            <div class="form-group">
                                <label class="col-sm-1 control-label no-padding-right" for="form-field-8">
                                    E-mail </label>
                                <div class="col-sm-9">
                                    <input type="email" name="email" id="email" placeholder="E-mail"
                                           class="col-xs-10 col-sm-5" value="<?php echo ($member['email']); ?>">
                                    <span class="help-inline col-xs-12 col-sm-7">
												<span class="middle"></span>
											</span>
                                </div>
                            </div>

                            <div class="space-4"></div>

                            <div class="col-md-offset-2 col-md-9">
                                <button class="btn btn-info" type="submit">
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