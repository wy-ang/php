/*
var markdown = editor.getMarkdown();
editormd.markdownToHTML("editormd", {
    markdown: markdown,
    htmlDecode: "style,script,iframe",
    tocm: true,
    tocContainer: "#custom-toc-container", // 自定义 ToC 容器层
    emoji: true,
    taskList: true,
    tex: true,  // 默认不解析
    sequenceDiagram: true,  // 默认不解析
});*/

$.ajax({
    url: "/admin/index/getAticle",
    type: "post",
    data: {},
    dataType: "json",
    success: function (res) {
        var data = res.data;
        var timelineItem = [];
        for (var i = 0; i < data.length; i++) {
            timelineItem.push('<li class="layui-timeline-item">');
            timelineItem.push('<i class="layui-icon layui-timeline-axis">&#xe63f;</i>');
            timelineItem.push('<div class="layui-timeline-content layui-text">');
            timelineItem.push('<h3 class="layui-timeline-title"><span>' + data[i].author + '</span><span>' + data[i].create_time + '</span></h3>');
            timelineItem.push('<p>'+ data[i].content +'</p>');
            timelineItem.push('</div>');
            timelineItem.push('</li>');
        }
        $('#article').append(timelineItem.join(''));
    }
});