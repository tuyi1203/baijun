KindEditor.plugin('hello', function(K) {
        var editor = this, name = 'hello',
        imgPath = self.pluginsPath + 'image/images/';
        // 点击图标时执行
        editor.clickToolbar(name, function() {
                editor.insertHtml('你好');
        });
});