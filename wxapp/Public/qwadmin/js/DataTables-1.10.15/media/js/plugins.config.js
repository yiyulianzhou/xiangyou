/**
 * Created by Administrator on 2017/5/19.
 */
function    DatatableConfig(name,order){
    table =$('#'+name).DataTable( {

        "iDisplayLength" : 20, //默认显示的记录数
        "pagingType": "full_numbers",
        "language": {
            "sProcessing": "处理中...",
            "sLengthMenu": "显示 _MENU_ 项结果",
            "sZeroRecords": "没有匹配结果",
            "sInfo": "显示第 _START_ 至 _END_ 项结果，共 _TOTAL_ 项",
            "sInfoEmpty": "显示第 0 至 0 项结果，共 0 项",
            "sInfoFiltered": "(由 _MAX_ 项结果过滤)",
            "sInfoPostFix": "",
            "sSearch": "搜索:",
            "sUrl": "",
            "sEmptyTable": "表中数据为空",
            "sLoadingRecords": "载入中...",
            "sInfoThousands": ",",
            "oPaginate": {
                "sFirst": "首页",
                "sPrevious": "上页",
                "sNext": "下页",
                "sLast": "末页"
            },
            "oAria": {
                "sSortAscending": ": 以升序排列此列",
                "sSortDescending": ": 以降序排列此列"
            },

        },
        "order": [[ order, "desc" ]],
        buttons: [
            'excel'
        ],

        "dom":
        "<<'div9'l<'#mytoolbox'>Bfrtip><'div3'f>r>"+
        "",
        initComplete:initComplete
    } );
}

function DaterangepickerConfig(name){
    $('#'+name).daterangepicker(
        {
            maxDate : moment(), //最大时间
            showDropdowns : true,
            showWeekNumbers : false, //是否显示第几周
            timePicker : true, //是否显示小时和分钟
            timePickerIncrement : 60, //时间的增量，单位为分钟
            timePicker12Hour : false, //是否使用12小时制来显示时间
            opens : 'right', //日期选择框的弹出位置
            buttonClasses : [ 'btn btn-default' ],
            applyClass : 'btn-small btn-primary blue',
            cancelClass : 'btn-small',
            format : 'YYYY-MM-DD HH:mm:ss', //控件中from和to 显示的日期格式
            separator : ' to ',
            locale : {
                applyLabel : '确定',
                cancelLabel : '取消',
                fromLabel : '起始时间',
                toLabel : '结束时间',
                customRangeLabel : '自定义',
                daysOfWeek : [ '日', '一', '二', '三', '四', '五', '六' ],
                monthNames : [ '一月', '二月', '三月', '四月', '五月', '六月',
                    '七月', '八月', '九月', '十月', '十一月', '十二月' ],
                firstDay : 1,
                format: 'YYYY-MM-DD HH:mm:ss',
            },
        }
        ,function(start, end, label) { // 格式化日期显示框
            $('#beginTime').val(start.format('YYYY-MM-DD HH:mm:ss'));
            $('#endTime').val(end.format('YYYY-MM-DD HH:mm:ss'));
        }
    );
}

function begin_end_time_clear()
{
    $('#dateTimeRange').val('');
    $('#beginTime').val('');
    $('#endTime').val('');
}

function    DatatableAjax(name,order,date){
    table =$('#'+name).DataTable( {

        "iDisplayLength" : 20, //默认显示的记录数
        "language": {
            "sProcessing": "处理中...",
            "sLengthMenu": "显示 _MENU_ 项结果",
            "sZeroRecords": "没有匹配结果",
            "sInfo": "显示第 _START_ 至 _END_ 项结果，共 _TOTAL_ 项",
            "sInfoEmpty": "显示第 0 至 0 项结果，共 0 项",
            "sInfoFiltered": "(由 _MAX_ 项结果过滤)",
            "sInfoPostFix": "",
            "sSearch": "搜索:",
            "sUrl": "",
            "sEmptyTable": "表中数据为空",
            "sLoadingRecords": "载入中...",
            "sInfoThousands": ",",
            "oPaginate": {
                "sFirst": "首页",
                "sPrevious": "上页",
                "sNext": "下页",
                "sLast": "末页"
            },
            "oAria": {
                "sSortAscending": ": 以升序排列此列",
                "sSortDescending": ": 以降序排列此列"
            },

        },
        autoWidth: false, //禁用自动调整列宽
        stripeClasses: ["odd", "even"], //为奇偶行加上样式，兼容不支持CSS伪类的场合
        processing: true, //隐藏加载提示,自行处理
        serverSide: true, //启用服务器端分页
        searching: false, //禁用原生搜索
        orderMulti: false, //启用多列排序
        renderer: "bootstrap", //渲染样式：Bootstrap和jquery-ui
        pagingType: "full_numbers", //分页样式：simple,simple_numbers,full,full_numbers
        columnDefs: [{
            "targets": 'nosort', //列的样式名
            "orderable": false //包含上样式名‘nosort'的禁止排序
        }],
        ajax: function (data, callback, settings) {
            //封装请求参数
            var param = {};
            param.limit = data.length;//页面显示记录条数，在页面显示每页显示多少项的时候
            param.start = data.start;//开始的记录序号
            param.page = (data.start / data.length)+1;//当前页码
            param.date = date;//默认时间为全部
            //console.log(param);
            //ajax请求数据
            $.ajax({
                type: "post",
                url: "ImportRecords",
                cache: false, //禁用缓存
                data: param, //传入组装的参数
                dataType: "json",
                success: function (result) {
                    //console.log(result);
                    //setTimeout仅为测试延迟效果
                    setTimeout(function () {
                        //封装返回数据
                        var returnData = {};
                        returnData.draw = data.draw;//这里直接自行返回了draw计数器,应该由后台返回
                        returnData.recordsTotal = result.total;//返回数据全部记录
                        returnData.recordsFiltered = result.total;//后台不实现过滤功能，每次查询均视作全部结果
                        returnData.data = result.list;//返回的数据列表
                        //console.log(returnData);
                        //调用DataTables提供的callback方法，代表数据已封装完成并传回DataTables进行渲染
                        //此时的数据需确保正确无误，异常判断应在执行此回调前自行处理完毕
                        callback(returnData);
                    }, 200);
                }
            });
        },
        //列表表头字段
        columns: [
            { "data": "nickname" },
            { "data": "phone" },
            { "data": "brand_name" },
            { "data": "sn_no" },
            { "data": "amount" },
            { "data": "fee" },
            { "data": "balance" },
            { "data": "create_time" },
            { "data": "res" },
            { "data": "res" },
            { "data": "msg" },

        ],
        "order": [[ order, "desc" ]],
        buttons: [
            'excel'
        ],
        "dom":
        "<<'div9'l<'#mytoolbox'>Bfrtip><'div3'f>r>"+
        "",
        initComplete:initComplete
    } ).api();
}