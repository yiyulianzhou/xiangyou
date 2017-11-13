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
                        <form class="form-horizontal" id="form" role="form" method="post" action="/Setting/update">


                            <div class="space-4"></div>
                            <div class="form-group">
                                <label class="col-sm-1 control-label no-padding-right" for="form-field-1">
                                    网站名称 </label>
                                <div class="col-sm-9">
                                    <input type="text" name="sitename" id="sitename" placeholder="网站SEO标题"
                                           class="col-xs-10 col-sm-5" value="<?php echo (C("sitename")); ?>">
                                    <span class="help-inline col-xs-12 col-sm-7">
												<span class="middle">前台调用：{$Think.CONFIG.sitename}</span>
											</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-1 control-label no-padding-right" for="form-field-1"> 网站标题 </label>
                                <div class="col-sm-9">
                                    <input type="text" name="title" id="title" placeholder="网站标题"
                                           class="col-xs-10 col-sm-5" value="<?php echo (C("title")); ?>">
                                    <span class="help-inline col-xs-12 col-sm-7">
												<span class="middle">网站标题，前台调用：{$Think.CONFIG.title}</span>
											</span>
                                </div>
                            </div>
                            <div class="space-4"></div>


                            <div class="form-group">
                                <label class="col-sm-1 control-label no-padding-right" for="form-field-2"> 关键词 </label>
                                <div class="col-sm-9">
                                    <input type="text" name="keywords" id="keywords" placeholder="关键词"
                                           class="col-xs-10 col-sm-5" value="<?php echo (C("keywords")); ?>">
                                    <span class="help-inline col-xs-12 col-sm-7">
												<span class="middle">网站关键词，前台调用：{$Think.CONFIG.keywords}</span>
											</span>
                                </div>
                            </div>

                            <div class="space-4"></div>

                            <div class="form-group">
                                <label class="col-sm-1 control-label no-padding-right" for="form-field-2"> 网站描述 </label>
                                <div class="col-sm-9">
                                    <textarea name="description" id="description" placeholder="网站描述"
                                              class="col-xs-10 col-sm-5" rows="5"><?php echo (C("description")); ?></textarea>
                                    <span class="help-inline col-xs-12 col-sm-7">
												<span class="middle">网站描述，前台调用：{$Think.CONFIG.description}</span>
											</span>
                                </div>
                            </div>

                            <div class="space-4"></div>

                            <div class="form-group">
                                <label class="col-sm-1 control-label no-padding-right" for="form-field-2"> 底部内容 </label>
                                <div class="col-sm-9">
                                    <textarea name="footer" id="footer" placeholder="底部内容" class="col-xs-10 col-sm-5"
                                              rows="5"><?php echo (C("footer")); ?></textarea>
                                    <span class="help-inline col-xs-12 col-sm-7">
												<span class="middle">网站的版权、统计代码等，支持HTML代码，请谨慎使用，前台调用：{$Think.CONFIG.footer}</span>
											</span>
                                </div>
                            </div>
                            <?php if(is_array($vars)): $i = 0; $__LIST__ = $vars;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><div class="form-group">
                                    <label class="col-sm-1 control-label no-padding-right" for="form-field-1">
                                        <?php echo ($val["name"]); ?></label>
                                    <div class="col-sm-9">
                                        <input type="text" name="<?php echo ($val["k"]); ?>" id="<?php echo ($val["k"]); ?>" placeholder="变量值"
                                               class="col-xs-10 col-sm-5" value="<?php echo ($val["v"]); ?>">
                                        <span class="help-inline col-xs-12 col-sm-7">
												<span class="middle">自定义变量，前台调用：{$Think.CONFIG.<?php echo ($val["k"]); ?>}</span>
											</span>
                                    </div>
                                </div>
                                <div class="space-4"></div><?php endforeach; endif; else: echo "" ;endif; ?>

                            <div class="col-md-offset-2 col-md-9">
                                <button class="btn btn-default submit" type="button">
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
    $(".submit").click(function () {
        $("#form").submit();
    })
</script>
</body>
</html>