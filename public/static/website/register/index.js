layui.use(['layer','form','upload'], function(){
    layer = layui.layer;
    form = layui.form;
    upload = layui.upload;

    form.on('submit(submit)', function(data){
        $.ajax({
            url: "./addUser",
            type: "post",
            data: data.field,
            dataType: "json",
            success: function (res) {
                if(res.code==1){
                    window.location.href='/admin/login/index';
                }
                layer.msg(res.msg);
            }
        })
        return false;
    });

    upload.render({
        elem: '#upload',
        url: './upload',
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
