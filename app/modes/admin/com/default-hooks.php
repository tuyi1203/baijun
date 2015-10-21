<?php
//-------------------登陆验证钩子-------------------------------------------------
clsHook::subAddAction('_default'  , array('PI_Auth', 'checkLogin'), array() , 1) ;
clsHook::subAddAction('_list'     , array('PI_Auth', 'checkLogin'), array() , 1) ;
clsHook::subAddAction('_update'   , array('PI_Auth', 'checkLogin'), array() , 1) ;
clsHook::subAddAction('_insert'   , array('PI_Auth', 'checkLogin'), array() , 1) ;
clsHook::subAddAction('_download' , array('PI_Auth', 'checkLogin'), array() , 1) ;
clsHook::subAddAction('_upload'   , array('PI_Auth', 'checkLogin'), array() , 1) ;
clsHook::subAddAction('_delete'   , array('PI_Auth', 'checkLogin'), array() , 1) ;
clsHook::subAddAction('_paging'   , array('PI_Auth', 'checkLogin'), array() , 1) ;
clsHook::subAddAction('_publish'  , array('PI_Auth', 'checkLogin'), array() , 1) ;
clsHook::subAddAction('_settop'  , array('PI_Auth', 'checkLogin'), array() , 1) ;
//-------------------登陆验证钩子-------------------------------------------------

//-------------------动作权限验证钩子-------------------------------------------------
clsHook::subAddAction('_default' , array('PI_Auth', 'checkAuth'), array() , 2) ;
clsHook::subAddAction('_list'    , array('PI_Auth', 'checkAuth'), array() , 2) ;
clsHook::subAddAction('_update'  , array('PI_Auth', 'checkAuth'), array() , 2) ;
clsHook::subAddAction('_insert'  , array('PI_Auth', 'checkAuth'), array() , 2) ;
clsHook::subAddAction('_download', array('PI_Auth', 'checkAuth'), array() , 2) ;
clsHook::subAddAction('_upload'  , array('PI_Auth', 'checkAuth'), array() , 2) ;
clsHook::subAddAction('_delete'  , array('PI_Auth', 'checkAuth'), array() , 2) ;
clsHook::subAddAction('_paging'  , array('PI_Auth', 'checkAuth'), array() , 2) ;
clsHook::subAddAction('_publish' , array('PI_Auth', 'checkAuth'), array() , 2) ;
clsHook::subAddAction('_settop' , array('PI_Auth', 'checkAuth'), array() , 2) ;
//-------------------动作权限验证钩子-------------------------------------------------

//-------------------菜单生成钩子-------------------------------------------------
clsHook::subAddAction('loginOKRedirect', array('PI_Menu', 'saveAdminMenu'), array() , 1 ) ;
//-------------------菜单生成钩子-------------------------------------------------

//-----------------------动作权限列表生成钩子-------------------------------------------------
clsHook::subAddAction('loginOKRedirect', array('PI_Auth', 'saveActionAuthList'), array() , 1 ) ;
//-----------------------动作权限列表生成钩子-------------------------------------------------

//-----------------------动作记录生成钩子-------------------------------------------------
clsHook::subAddAction('loginOKRedirect', array('PI_ActionLog', 'logging'), array() , 10 ) ;
clsHook::subAddAction('_default' , array('PI_ActionLog', 'logging'), array() , 10) ;
clsHook::subAddAction('_list'    , array('PI_ActionLog', 'logging'), array() , 10) ;
clsHook::subAddAction('_update'  , array('PI_ActionLog', 'logging'), array() , 10) ;
clsHook::subAddAction('_insert'  , array('PI_ActionLog', 'logging'), array() , 10) ;
clsHook::subAddAction('_download', array('PI_ActionLog', 'logging'), array() , 10) ;
clsHook::subAddAction('_upload'  , array('PI_ActionLog', 'logging'), array() , 10) ;
clsHook::subAddAction('_delete'  , array('PI_ActionLog', 'logging'), array() , 10) ;
clsHook::subAddAction('_paging'  , array('PI_ActionLog', 'logging'), array() , 10) ;
clsHook::subAddAction('_sort'  , array('PI_ActionLog', 'logging'), array() , 10) ;
clsHook::subAddAction('_publish' , array('PI_ActionLog', 'logging'), array() , 10) ;
clsHook::subAddAction('_logout' , array('PI_ActionLog', 'logging'), array() , 10) ;
//-----------------------动作记录列表生成钩子-------------------------------------------------

