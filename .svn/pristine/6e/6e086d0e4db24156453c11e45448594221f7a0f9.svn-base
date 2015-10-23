var url = location.href.replace('wxadmin','wxsite').replace('default','detail');
var clip = null;

function init() {
    clip = new ZeroClipboard.Client();
    clip.setHandCursor(true);

    clip.addEventListener('load', function (client) {
    	window.console.log("准备就绪");
    });

    clip.addEventListener('mouseOver', function (client) {
        // update the text on mouse over
    	clip.setText(url);
    });

    clip.addEventListener('complete', function (client, text) {
        alert("复制成功!");
    });

    clip.addEventListener('mouseDown', function(client){
    	clip.setText(url);
    });

    clip.glue('clipb');
}
init();
