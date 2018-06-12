layui.use('form', function(){
    var form = layui.form;
    form.on('submit(submit)', function(data){
        $.ajax({
            url: "/admin/login/login",
            type: "post",
            data: data.field,
            dataType: "json",
            success: function (res) {
                if(res.code==-1){
                    layer.msg(res.msg);
                    return false;
                }
                window.location.href='http://www.wyphp.com/admin/index/index';
                layer.msg(res.msg);
            }
        })
        return false;
    });
});