<?php /* Smarty version Smarty-3.1.6, created on 2015-10-10 12:02:31
         compiled from "D:\xampp\htdocs\baijun\app\views\site\footer.html" */ ?>
<?php /*%%SmartyHeaderCode:2342556188dd745c031-72951549%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b0a68a7fb0f6a9d000162b09ecd9fe033e24e995' => 
    array (
      0 => 'D:\\xampp\\htdocs\\baijun\\app\\views\\site\\footer.html',
      1 => 1439870817,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2342556188dd745c031-72951549',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'nofilter' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_56188dd747d55',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56188dd747d55')) {function content_56188dd747d55($_smarty_tpl) {?><footer><div class="footerNav"><a href="{:U('hr/employ/detail/default.html')}">诚聘英才</a><i>|</i><a href="{:U('hr/strategy/detail/default.html')}">人才战略</a><i>|</i><a href="{:U('hr/removals/detail/default.html')}">人事任免</a><i>|</i><a href="{:U('hr/resume/add/default.html')}">在线提交个人简历</a><i>|</i><a href="{:U('admin/system/login/default/log.html')}" target="_blank">后台管理</a></div><div class="copyright"><?php echo $_smarty_tpl->tpl_vars['nofilter']->value['buttom'];?>
</div></footer>
<script type="text/javascript">
$(document).ready(function(e) {
    //输入框调用
    $.input('input.text');
    //导航调用
    $.hov('#nav li');

    //浮动二维码调用
    $.hov('#weixin');

    //回到顶部
    $('#backTop').bind('click',function(){
        $('body,html').animate({scrollTop:0},500);
    });
    //滚动公告调用
    $("#rolling_list").innerfade({
        animationtype: "slide",
        speed: 750,
        timeout: 2000,
        type: "random",
        containerheight: "25px"
    });

    //字号变换
    $('#contrlFont').find('a').click(function(){
        if($(this).hasClass('cu')){
            return false;
        }else{
            $(this).addClass('cu').siblings('a').removeClass('cu');
            switch($(this).html()){
                case '小':
                    $('#Title').css({'font-size':'25px','line-height':'35px'});
                    $('#info').css({'font-size':'14px','line-height':'26px'});
                break;
                case '中':
                    $('#Title').css({'font-size':'30px','line-height':'45px'});
                    $('#info').css({'font-size':'17px','line-height':'29px'});
                break;
                case '大':
                    $('#Title').css({'font-size':'35px','line-height':'55px'});
                    $('#info').css({'font-size':'20px','line-height':'32px'});
                break;
                default:
                    $('#Title').css({'font-size':'25px','line-height':'35px'});
                    $('#info').css({'font-size':'14px','line-height':'26px'});
            }
        }
    });

});

function submitme(id) {
	if (id == "searchForm") {
		if ($('#'+id).find('input[name*="keyword"]').val().replace(" ","").replace(" ","") == "" ) {
			return false;
		}
	}
	$('#'+id).submit();
}

</script><?php }} ?>