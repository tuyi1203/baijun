<?php
//-------------------友情链接生成钩子----------------------------------------------------
// clsHook::addAction('_default'  , array('PI_Common', 'getFriendlink'), array() , 10) ;
// clsHook::addAction('_list'     , array('PI_Common', 'getFriendlink'), array() , 10) ;
// clsHook::addAction('_paging'   , array('PI_Common', 'getFriendlink'), array() , 10) ;
//-------------------友情链接生成钩子----------------------------------------------------

//-------------------顶部菜单二级套餐列表生成钩子-----------------------------------------
clsHook::addAction('_default'  , 'getSet', array() , 10) ;
clsHook::addAction('_list'     , 'getSet', array() , 10) ;
clsHook::addAction('_paging'   , 'getSet', array() , 10) ;
//-------------------顶部菜单二级套餐列表生成钩子------------------------------------------

//-------------------顶部滚动公告生成钩子-----------------------------------------
clsHook::addAction('_default'  , 'rollingNews', array() , 10) ;
clsHook::addAction('_list'     , 'rollingNews', array() , 10) ;
clsHook::addAction('_paging'   , 'rollingNews', array() , 10) ;
//-------------------顶部滚动公告生成钩子------------------
