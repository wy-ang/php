//markdown
var editor;
editor = editormd("editormd", {
    width: "100%",
    height: '800px',
    syncScrolling: "single",
    path: "../../static/common/js/plugins/editor/lib/",
    toolbarIcons: function () {
        return ["watch", "fullscreen", "preview", "testIcon"]
    }
});

layui.use('form', function () {
    var form = layui.form;
    //监听提交
    form.on('submit(save)', function (data) {
        var userId = $('#username').attr('userId');
        var author = $('#username').text();
        data.field.authorId = userId;
        data.field.author = author;
        data.field.content = $('.markdown-body').html();
        $.ajax({
            url: "/article/article/release",
            type: "post",
            data: data.field,
            dataType: "json",
            success: function (res) {
                layer.msg(res.msg);
            }
        });
        return false;
    });
});