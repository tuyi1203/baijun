<?php
//-------------------登陆验证钩子-------------------------------------------------
clsHook::addAction('_default'  ,  'checkLogin', array() , 1) ;
clsHook::addAction('_list'     ,  'checkLogin', array() , 1) ;
clsHook::addAction('_update'   ,  'checkLogin', array() , 1) ;
clsHook::addAction('_insert'   ,  'checkLogin', array() , 1) ;
clsHook::addAction('_download' ,  'checkLogin', array() , 1) ;
clsHook::addAction('_upload'   ,  'checkLogin', array() , 1) ;
clsHook::addAction('_delete'   ,  'checkLogin', array() , 1) ;
clsHook::addAction('_paging'   ,  'checkLogin', array() , 1) ;
clsHook::addAction('_publish'  ,  'checkLogin', array() , 1) ;
clsHook::addAction('_settop'   ,  'checkLogin', array() , 1) ;
//-------------------登陆验证钩子-------------------------------------------------

//-------------------动作权限验证钩子-------------------------------------------------
clsHook::addAction('_default' ,  'checkAuth', array() , 2) ;
clsHook::addAction('_list'    ,  'checkAuth', array() , 2) ;
clsHook::addAction('_update'  ,  'checkAuth', array() , 2) ;
clsHook::addAction('_insert'  ,  'checkAuth', array() , 2) ;
clsHook::addAction('_download',  'checkAuth', array() , 2) ;
clsHook::addAction('_upload'  ,  'checkAuth', array() , 2) ;
clsHook::addAction('_delete'  ,  'checkAuth', array() , 2) ;
clsHook::addAction('_paging'  ,  'checkAuth', array() , 2) ;
clsHook::addAction('_publish' ,  'checkAuth', array() , 2) ;
clsHook::addAction('_settop'  ,  'checkAuth', array() , 2) ;
//-------------------动作权限验证钩子-------------------------------------------------

//-------------------菜单生成钩子-------------------------------------------------
// clsHook::addAction('loginOKRedirect', 'saveAdminMenu', array() , 1 ) ;
//-------------------菜单生成钩子-------------------------------------------------

//-----------------------动作权限列表生成钩子-------------------------------------------------
// clsHook::addAction('loginOKRedirect',  'saveActionAuthList', array() , 1 ) ;
//-----------------------动作权限列表生成钩子-------------------------------------------------

//-----------------------动作记录生成钩子-------------------------------------------------
clsHook::addAction('loginOKRedirect', 'logging', array() , 10 ) ;
clsHook::addAction('_default' , 'logging', array() , 10) ;
clsHook::addAction('_list'    , 'logging', array() , 10) ;
clsHook::addAction('_update'  , 'logging', array() , 10) ;
clsHook::addAction('_insert'  , 'logging', array() , 10) ;
clsHook::addAction('_download', 'logging', array() , 10) ;
clsHook::addAction('_upload'  , 'logging', array() , 10) ;
clsHook::addAction('_delete'  , 'logging', array() , 10) ;
clsHook::addAction('_paging'  , 'logging', array() , 10) ;
clsHook::addAction('_sort'    , 'logging', array() , 10) ;
clsHook::addAction('_publish' , 'logging', array() , 10) ;
clsHook::addAction('_logout'  , 'logging', array() , 10) ;
clsHook::addAction('_reply'   , 'logging', array() , 10) ;
//-----------------------动作记录列表生成钩子-------------------------------------------------

