layui.use(['layer','form','upload'], function(){
    layer = layui.layer;
    form = layui.form;
    upload = layui.upload;

    $.ajax({
        url: "/admin/index/getUserName",
        type: "post",
        dataType: "json",
        success: function (res) {
            if(res.code==-1){
                layer.alert('登陆超时，请重新登录',{icon: 4},function () {
                    window.location.href='http://www.wyphp.com/admin/login/index';
                });
            }
            var data = res.data;
            $('input[name="phone"]').val(data.phone);
            $('input[name="email"]').val(data.email);
            $('input[name="username"]').val(data.username);
            $('#filePath').val(data.filePath);
            $('#avatar').attr('src',data.filePath);
            $('#id').val(data.id);

        }
    });

    form.on('submit(submit)', function(data){
        data.field.id = $('#id').val();
        $.ajax({
            url: "/admin/register/addUser",
            type: "post",
            data: data.field,
            dataType: "json",
            success: function (res) {
                if(res.code==1){
                    layer.msg(res.msg);
                    $('#username').text(res.data.username);
                    $('#img').attr('src',res.data.filePath);
                }
            }
        });
        return false;
    });

    upload.render({
        elem: '#upload',
        url: '/admin/register/upload',
        accept:'images',
        acceptMime:'image/*',
        done: function(res){
            $('#avatar').attr('src',res.src);
            $('#filePath').val(res.src);
        },error: function(res){
            console.log(res);
        }
    });
});
