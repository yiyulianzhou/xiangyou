//欢迎信息

layer.config({
    extend: ['extend/layer.ext.js', 'skin/moon/style.css'],
    skin: 'layer-ext-moon'
});

layer.ready(function () {

    var html = $('#welcome-template').html();
    $('a.viewlog').click(function () {
        logs();
        return false;
    });

    $('#pay-qrcode').click(function(){
        var html=$(this).html();
        parent.layer.open({
            title: false,
            type: 1,
            closeBtn:false,
            shadeClose:true,
            area: ['600px', 'auto'],
            content: html
        });
    });    

    if ($(this).width() > 768) {
        setTimeout(function () {
            parent.layer.closeAll();
            logs();
        }, 1000);
    }

    function logs() {
        parent.layer.open({
            title: '欢迎使用Yangkala商户系统',
            type: 1,
            shadeClose: true,
            area: ['700px', 'auto'],
            content: html,
            btn: ['修改密码', '取消'],
            yes: function(index){
                if(window.top!=window.self){
                    window.parent.main();
                }
            },
            cancel: function(index){
                $(".J_menuItem[data-index='4']").click();
            },
        });
    }

    console.log('欢迎使用养卡啦商户系统，如果您在使用的过程中有碰到问题，可直接联系客服,感谢您的支持。');

});