<?php /* Smarty version Smarty-3.1.6, created on 2015-10-10 12:37:02
         compiled from "D:\xampp\htdocs\baijun\app\views\admin\kindeditor.html" */ ?>
<?php /*%%SmartyHeaderCode:32640561895eee29871-34486466%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f739c78c74b21cee8bd3fa0f1b6dd3855490a13f' => 
    array (
      0 => 'D:\\xampp\\htdocs\\baijun\\app\\views\\admin\\kindeditor.html',
      1 => 1423722039,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32640561895eee29871-34486466',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'editor' => 0,
    'la' => 0,
    'CLIENTLANG' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_561895eeeff71',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_561895eeeff71')) {function content_561895eeeff71($_smarty_tpl) {?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['ex'][0][0]->export(array('class'=>"js",'fn'=>"set",'arg1'=>"editors",'arg2'=>$_smarty_tpl->tpl_vars['editor']->value),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['ex'][0][0]->export(array('class'=>"js",'fn'=>"set",'arg1'=>"errorUnwritable",'arg2'=>$_smarty_tpl->tpl_vars['la']->value['file']['errorunwritable']),$_smarty_tpl);?>

<?php if ($_smarty_tpl->tpl_vars['CLIENTLANG']->value=='en'){?> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['ex'][0][0]->export(array('class'=>"js",'fn'=>"set",'arg1'=>"editorLang",'arg2'=>"en"),$_smarty_tpl);?>
 <?php }?>
<?php if ($_smarty_tpl->tpl_vars['CLIENTLANG']->value=='zh-cn'){?> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['ex'][0][0]->export(array('class'=>"js",'fn'=>"set",'arg1'=>"editorLang",'arg2'=>"zh_CN"),$_smarty_tpl);?>
 <?php }?>
<?php if ($_smarty_tpl->tpl_vars['CLIENTLANG']->value=='zh-tw'){?> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['ex'][0][0]->export(array('class'=>"js",'fn'=>"set",'arg1'=>"editorLang",'arg2'=>"zh_TW"),$_smarty_tpl);?>
 <?php }?>
<link rel='stylesheet' href="{:T('js/kindeditor/themes/default/default.css')}" type='text/css' media='screen' />
<script src="{:T('js/kindeditor/kindeditor-min.js')}" type='text/javascript'></script>
<?php if ($_smarty_tpl->tpl_vars['CLIENTLANG']->value=='EN'){?>
<script src="{:T('js/kindeditor/lang/en.js')}" type='text/javascript'></script>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['CLIENTLANG']->value=='ZH-CN'){?>
<script src="{:T('js/kindeditor/lang/zh_CN.js')}" type='text/javascript'></script>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['CLIENTLANG']->value=='ZH-TW'){?>
<script src="{:T('js/kindeditor/lang/zh_TW.js')}" type='text/javascript'></script>
 <?php }?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['ex'][0][0]->export(array('class'=>"js",'fn'=>"set",'arg1'=>"uid",'arg2'=>uniqid('')),$_smarty_tpl);?>

<script>
var simple =
[ 'formatblock', 'fontsize', '|', 'bold', 'italic','underline', '|',
'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist', 'insertunorderedlist', '|',
'emoticons', 'image', 'link', '|', 'removeformat','undo', 'redo', 'source' ];

var full =
[ 'formatblock', 'fontsize', 'lineheight', '|', 'forecolor', 'hilitecolor', '|', 'bold', 'italic','underline', 'strikethrough', '|',
'justifyleft', 'justifycenter', 'justifyright', '|',
'emoticons', 'image', '|', 'link', 'unlink', 'anchor', 'flash', 'media', 'baidumap', '/',
'undo', 'redo', '|', 'cut', 'copy', '|', 'plainpaste', 'wordpaste', '|', 'removeformat', 'clearhtml','quickformat', '|',
'indent', 'outdent', 'subscript', 'superscript', 'insertorderedlist', 'insertunorderedlist', '|',
'table', 'code', 'hr', '|',
'fullscreen', 'source'];

var noImage =
[ 'formatblock', 'fontsize', '|', 'bold', 'italic','underline', '|',
  'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist', 'insertunorderedlist', '|',
   'link', '|', 'removeformat','undo', 'redo' , 'source'];


var message =
	[ 'formatblock', 'fontsize', '|', 'bold', 'italic','underline', '|',
	  'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist', 'insertunorderedlist', '|',
	   'link', '|', 'removeformat','undo', 'redo' , 'source' , 'hello'];
$(document).ready(initKindeditor);
function initKindeditor(afterInit)
{
    $(':input[type=submit]').after("<input type='hidden' id='uid' name='data[uid]' value=" + v.uid + ">");

    $.each(v.editors.id, function(key, editorID)
    {
        if(typeof(v.editors.filterMode) == 'undefined') v.editors.filterMode = true;
//        if ($.type(v.editors.tools) == 'string') {
//        	editorTool = eval(v.editors.tools);
//        }
        if ($.type(v.editors.tools) == 'array') {
        	editorTool = eval(v.editors.tools[key]);
        } else {
        	editorTool = eval(v.editors.tools);
        }

        var K = KindEditor;
        keEditor = K.create('#' + editorID,
        {
            width:'100%',
            items:editorTool,
            filterMode:true,
            cssPath:['css/k.min.css'],
            bodyClass:'article-content',
            urlType:'absolute',
            //uploadJson: createLink('file', 'ajaxUpload', 'uid=' + v.uid),
            uploadJson: '{:U('system/file/default/ajaxupload/uid/','',false)}' + v.uid + '.json',
            //uploadJson: 'system_file-default-ajaxupload-uid-' + v.uid + '.json',
            imageTabIndex:1,
            filterMode:v.editors.filterMode,
            allowFileManager:true,
            langType:v.editorLang,
            afterBlur: function(){this.sync();$('#' + editorID).prev('.ke-container').removeClass('focus');},
            afterFocus: function(){$('#' + editorID).prev('.ke-container').addClass('focus');},
            afterChange: function(){$('#' + editorID ).change().hide();},
            afterCreate : function()
            {
                var doc = this.edit.doc;
                var cmd = this.edit.cmd;
                /* Paste in chrome.*/
                /* Code reference from http://www.foliotek.com/devblog/copy-images-from-clipboard-in-javascript/. */
                if(K.WEBKIT)
                {
                    $(doc.body).bind('paste', function(ev)
                    {
                        var $this = $(this);
                        var original =  ev.originalEvent;
                        var file =  original.clipboardData.items[0].getAsFile();
                        var reader = new FileReader();
                        reader.onload = function (evt)
                        {
                            //var result = evt.target.result;
                            var result = evt.target.result;
                            //console.log(result);
                            //alert(result);
                            var arr = result.split(",");
                            var data = arr[1]; // raw base64
                            var contentType = arr[0].split(";")[0].split(":")[1];

                            html = '<img src="' + result + '" alt="" />';
                            $.post('{:U('system/file/default/ajaxpasteimage.json')}', {'data[editor]':html , 'data[uid]':v.uid}, function(data)
                            {
                            	//这里执行了一个将base64上报到服务器，然后将图片url从base64编码的图片数据换成上传后的图片地址
                                if(data) return cmd.inserthtml(data);

                                alert(v.errorunwritable);
                                return cmd.inserthtml(html);
                            });
                        };
                      //用fileReader读取二进制图片，完成后会调用上面定义的回调函数
                        reader.readAsDataURL(file);
                    });
                }

                /* Paste in firefox.*/
                if(K.GECKO)
                {
                    K(doc.body).bind('paste', function(ev)
                    {
                        setTimeout(function()
                        {
                            var html = K(doc.body).html();
                            if(html.search(/<img src="data:.+;base64,/) > -1)
                            {
                            	$.post('{:U('system/file/default/ajaxpasteimage.json')}', {'data[editor]':html , 'data[uid]':v.uid}, function(data)
                                {
                                    if(data) return K(doc.body).html(data);

                                    alert(v.errorunwritable);
                                    return K(doc.body).html(data);
                                });
                            }
                        }, 80);
                    });
                }
                /* End */
            }
        });
    });

    if($.isFunction(afterInit)) afterInit();
}
</script>
<?php }} ?>