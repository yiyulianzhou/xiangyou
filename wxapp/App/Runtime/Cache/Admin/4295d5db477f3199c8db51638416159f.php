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
                <!-- /section:settings.box -->
                <div class="row">
                    <input type="hidden" name="beginTime" id="beginTime" value="" />
                    <input type="hidden" name="endTime" id="endTime" value="" />
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover"
                           id="user_info">
                        <thead id="user_info_data_table_thead">
                        </thead>
                        <tbody id="user_info_data_table_tbody">

                        </tbody>

                        </thead>
                    </table>

                    <!-- Modal -->
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
<script type="text/javascript">
    var table;
    var start_date;
    var start_end ;
    var where;
    $(function () {
        GetUserInfo('all');
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

    function GetUserInfo(date){
        if ($('#user_info').hasClass('dataTable')) {
            table = $('#user_info').dataTable();
            table.fnClearTable(); //清空一下table
            table.fnDestroy(); //还原初始化了的datatable
        }
        $.ajax({
            //提交数据的类型 POST GET
            type:"post",
            //提交的网址
            url:"<?php echo U('userlist');?>",
            data:{date:date},
            //提交的数据
            //返回数据格式
            datatype: "json",//"xml", "html", "script", "json", "jsonp", "text".
            //在请求之前调用的函数
            beforeSend:function(){$("#msg").html("logining");},
            //成功返回之后调用的函数
            success:function(data){
                //初始化内容
                $("#user_info_data_table_tbody").html('');
                $("#user_info_data_table_thead").html('');
                var title = '';
                title += '<tr><th>用户ID</th><th>昵称</th><th>手机号</th><th>注册时间</th><th>操作</th></tr>'
                if(data.code == 200)
                {
                    var html = '';
                    for (var i = 0; i < data.list.length; i++) {;
                        html += '<tr><td>'+data.list[i]['id']+'</td>'
                                + '<td>'+data.list[i]['name']+'</td>'
                                + '<td>'+data.list[i]['phone']+'</td>'
                                + '<td>'+data.list[i]['create_time']+'</td>'
                                + '<td>'+data.list[i]['create_time']+'</td></tr>'
                    }
                    $("#user_info_data_table_thead").html(title);
                    $("#user_info_data_table_tbody").html(html);
                    //配置Datatable
                    DatatableConfig('user_info',3);

                }
            }   ,
            //调用出错执行的函数
            error: function(){
                //请求出错处理
                alert('加载页面图表数据出错');
            }
        });
    }
    function initComplete(data) {
        var dataPlugin =
                '<div id="reportrange" class="pull-left dateRange" style="width:400px;margin-left: 10px"> '+
                '日期：<i class="glyphicon glyphicon-calendar fa fa-calendar"></i> '+
                '<span id="searchDateRange"></span>  '+
                '<b class="caret"></b></div> ';
        $('#mytoolbox').append(dataPlugin);
        //时间插件

        $('#reportrange span').html('请选择时间');
        //配置DateRangePicker
        DaterangepickerConfig('reportrange');

        $(".daterangepicker").find("li").each(function (){
            if($(this).hasClass("active")){
                $(this).removeClass("active");
            }
            if(dateOption==$(this).html()){
                $(this).addClass("active");
            }
        });

        //选择时间后触发重新加载的方法
        $("#reportrange").on('apply.daterangepicker',function(){
            start_date = $('#beginTime').val()
            start_end = $('#endTime').val();
            where = start_date + ','+start_end;
            GetUserInfo(where);

        });
    }


</script>

</body>
</html>