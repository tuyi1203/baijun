$(".copyBtn").each(function(i){
        var content = $(this).parent().parent().find('input:text').val();
        var id = $(this).attr('data');
//        alert(id);
        var clip=null;
        clip = new ZeroClipboard.Client();
        clip.setCSSEffects(false);
        ZeroClipboard.setMoviePath( '{:T('js/clipboard/KeleyiClipboard.swf')}' );  //和html不在同一目录需设置setMoviePath
//        ZeroClipboard.setMoviePath( 'ZeroClipboard10.swf' );
        clip.setHandCursor( true );
        clip.setText( content );
        clip.addEventListener('complete', function (client, text) {
          alert( "复制成功" );
        });
        clip.glue(this);
  });

//function init() {
//	var content = $('#copyBtn1').parent().parent().find('input:text').val();
////	alert(content);
//	clip1 = new ZeroClipboard.Client();
////    clip1.setHandCursor(true);
//    ZeroClipboard.setMoviePath( '{:T('js/clipboard/KeleyiClipboard.swf')}' );
//    clip1.setCSSEffects(true);
//    clip1.addEventListener('load', function (client) {
//    	window.console.log("准备就绪");
//    });
//
//    clip1.addEventListener('mouseOver', function (client) {
//        // update the text on mouse over
//    	clip1.setText(content);
//    });
//
//    clip1.addEventListener('complete', function (client, text) {
//        alert("复制成功!");
//    });
//
//    clip1.addEventListener('mouseDown', function(client){
//    	clip1.setText(content);
//    });
//
//    clip1.glue('copyBtn1');
//
//    var content = $('#copyBtn2').parent().parent().find('input:text').val();
////	alert(content);
//	clip2 = new ZeroClipboard.Client();
////    clip1.setHandCursor(true);
//    ZeroClipboard.setMoviePath( '{:T('js/clipboard/KeleyiClipboard.swf')}' );
//    clip2.setCSSEffects(true);
//    clip2.addEventListener('load', function (client) {
//    	window.console.log("准备就绪");
//    });
//
//    clip2.addEventListener('mouseOver', function (client) {
//        // update the text on mouse over
//    	clip2.setText(content);
//    });
//
//    clip2.addEventListener('complete', function (client, text) {
//        alert("复制成功!");
//    });
//
//    clip2.addEventListener('mouseDown', function(client){
//    	clip.setText(content);
//    });
//
//    clip2.glue('copyBtn2');
//}
//init();