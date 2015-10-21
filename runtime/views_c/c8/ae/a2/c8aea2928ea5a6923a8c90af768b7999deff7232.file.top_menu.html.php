<?php /* Smarty version Smarty-3.1.6, created on 2015-10-10 12:05:45
         compiled from "D:\xampp\htdocs\baijun\app\views\admin\top_menu.html" */ ?>
<?php /*%%SmartyHeaderCode:1196556188df1238706-00447756%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c8aea2928ea5a6923a8c90af768b7999deff7232' => 
    array (
      0 => 'D:\\xampp\\htdocs\\baijun\\app\\views\\admin\\top_menu.html',
      1 => 1444449931,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1196556188df1238706-00447756',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_56188df127bdb',
  'variables' => 
  array (
    'MENUOUTER' => 0,
    'MENU' => 0,
    'MODULE_F' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56188df127bdb')) {function content_56188df127bdb($_smarty_tpl) {?>    <nav class='navbar navbar-inverse navbar-fixed-top' role='navigation'
        id='mainNavbar'>
        <div class='navbar-header'>
            <button type='button' class='navbar-toggle' data-toggle='collapse'
                data-target='.navbar-ex1-collapse'>
                <span class='sr-only'>Toggle navigation</span> <span
                    class='icon-bar'></span> <span class='icon-bar'></span> <span
                    class='icon-bar'></span>
            </button>
        </div>
        <div class='collapse navbar-collapse navbar-ex1-collapse'>
            <ul class='nav navbar-nav'>
                <?php  $_smarty_tpl->tpl_vars["MENU"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["MENU"]->_loop = false;
 $_smarty_tpl->tpl_vars["sort"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['MENUOUTER']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["MENU"]->key => $_smarty_tpl->tpl_vars["MENU"]->value){
$_smarty_tpl->tpl_vars["MENU"]->_loop = true;
 $_smarty_tpl->tpl_vars["sort"]->value = $_smarty_tpl->tpl_vars["MENU"]->key;
?>

                <li <?php if ($_smarty_tpl->tpl_vars['MENU']->value['name']==$_smarty_tpl->tpl_vars['MODULE_F']->value){?> class="active"<?php }?>><a
                    href='<?php echo $_smarty_tpl->tpl_vars['MENU']->value['url'];?>
'><?php echo $_smarty_tpl->tpl_vars['MENU']->value['des'];?>
</a></li> <?php } ?>
            </ul>
            <ul class='nav navbar-nav' id='navbarSwitcher'>
                <li><a href='###'><i
                        class='icon-chevron-sign-right icon-large'></i></a></li>
            </ul>
            <ul class='nav navbar-nav navbar-right'>
                <li class='dropdown'><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['cl'][0][0]->createLangMenu(array(),$_smarty_tpl);?>
</li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href='{:U('site/home/default/default/default.html')}' target='_blank'
                    class='navbar-link'><i class="icon-home icon-large"></i> 前台</a></li>
                <li class="dropdown"><a href="#" class="dropdown-toggle"
                    data-toggle="dropdown"><i class="icon-user icon-large"></i>
                        <?php echo $_SESSION['_UserName'];?>
 <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a
                            href="{:U('admin/system/profile/edit/default.modal')}"
                            data-toggle='modal'>修改密码</a></li>
                        <li><a href="{:U('admin/system/login/default/logout.html')}">退出</a></li>
                    </ul></li>
               <li><a href='javascript:;' data-href="{:U('system/cache/default/clear.json')}"
                    class='navbar-link chacheclear' text-normal="清除缓存"><i class="icon-large"></i> 清除缓存</a></li>
                    <script type="text/javascript">
                    $(document).ready(function()
                  		{
                  		    $.setAjaxClearer('.chacheclear');
                  		});

                  		$.extend(
                  		{
                  		     /**
                  		     * Set ajax Clearer.
                  		     *
                  		     * @param  string $selector
                  		     * @access public
                  		     * @return void
                  		     */
                  		   setAjaxClearer: function (selector)
                  		    {
                  		        $(document).on('click', selector, function()
                  		        {
                  		            var clearer = $(this);
                  		            clearer.text(v.lang.doing);
                  		            $.getJSON(clearer.attr('data-href'), function(data){
                  		            	 if(data.result == 'success')
                                         {
                  		            		clearer.text(clearer.attr("text-normal"));
                                         }
                  		            });

                  		        });
                  		    }
                  		}
                  		);

                    </script>
            </ul>
        </div>
    </nav><?php }} ?>