<?php
class verticalpager {

    /**
     * 开始记录数
     * @var int
     */
    public $recStart = 0;


    /**
     * 结束记录数
     * @var int
     */
    public $recEnd   = 0;

    /**
     * 现在页数
     * @var int
     */
    public $currPage = 0;

    /**
     * 总记录条数
     * @var int
     */
    public $recTotal = 0;

    /**
     *上一页页数
     * @var int
     */
    public $prevPage = 0;


    /**
     * 下一页页数
     * @var int
     */
    public $nextPage = 0;

    /**
     * 总页数
     * @var int
     */
    public $pageCount= 0;


    /**
     * 计算标识
     * @var int
     */
    public $calc = 0;


    /**
     * 页面显示记录条数
     * @var int
     */
    public $recPerPage = 0;


    /**
     * 页面smarty对象
     * @var object
     */
    public $smarty ;


    /**
     * 一级模块名
     * @var string
     */
    public $modulef ;

    /**
     * 二级模块名
     * @var string
     */
    public $modules ;

    /**
     * 脚本名
     * @var string
     */
    public $script ;


    /**
     * 语言
     * @var int
     */
    public $lang;

    /**
     * orderby
     * @var string
     */
    public $orderby;

    /**
     * sort
     * @var string
     */
    public $sort;


    const LINKRANGE = 9;

    /**
     * 输入数据
     * @var object
     */
    public $input;

    public function __construct($recTotal = 0, $recPerPage = 20, $pageID = 1 , $orderby=null , $sort=null) {

        $this->recTotal    = $recTotal;
        $this->recPerPage  = $recPerPage;
        $this->currPage    = $pageID;
        $this->smarty      = getSmarty();
        $this->modulef     = MODULEF;
        $this->modules     = MODULES;
        $this->script      = SCRIPT;
        $this->lang        = getLang();
        $this->input       = getInput();
        $this->orderby     = $orderby;
        $this->sort        = $sort;

        $this->smarty->assign('pagelink' , $this->createPageLink());
    }

    public function getRecStart() {
        return $this->recStart;
    }

    public function getRecEnd() {
        return $this->recEnd;
    }

    private function calc($a_irecTotal , $a_iCurrPage = 1){

        $this->currPage = $a_iCurrPage;

        if (!ctype_digit($a_iCurrPage) || $a_iCurrPage < 1) {
            $this->currPage = 1;
        }

        if ($a_iCurrPage > ceil($this->recTotal/$this->recPerPage)) {
            $this->currPage = ceil($this->recTotal/$this->recPerPage);
        }

        $this->recTotal  = $a_irecTotal;
        $this->prevPage  = $this->currPage - 1;
        $this->nextPage  = $this->currPage + 1 ;
        $this->pageCount = ceil($this->recTotal/$this->recPerPage) ;
        $this->recStart  = ($this->currPage - 1 )*$this->recPerPage + 1 ;
        $this->recEnd    = $this->currPage * $this->recPerPage ;

        if ($this->currPage < 0) {
            $this->prevPage  = $this->currPage;
        }

        if ($this->nextPage > $this->pageCount) {
            $this->nextPage = $this->pageCount;
        }

        if ($a_irecTotal < $this->recEnd) {
            $this->recEnd = $a_irecTotal;
        }

        $this->calc = '1';
    }

    private function createFirstPage() {

        if ($this->currPage != 1){
            return $this->createLink($this->lang->link->first , 1);
        }

        return $this->createLink($this->lang->link->first);
    }

    private function createPrevPage() {

        if ($this->currPage != 1) {
            return $this->createLink($this->lang->link->prevpage , $this->prevPage);
        }

        return $this->createLink($this->lang->link->prevpage);
    }

    private function createNextPage() {
        if ($this->currPage != $this->pageCount) {
            return $this->createLink($this->lang->link->loadmore , $this->nextPage);
        }
        return $this->createLink($this->lang->link->nomore);
    }

    private function createLastPage() {

       if ($this->currPage != $this->pageCount) {
            return $this->createLink($this->lang->link->lastpage , $this->pageCount);
        }

        return $this->createLink($this->lang->link->lastpage);
    }

    private function createLink($label , $pageid = 0 , $current = false) {
//         if (!$pageid) return '<a href="javascript:void(0);" class="unclick">'. $label .'</a>';
           if (!$pageid) return $label ;
//         if ($current) {
//             return '<a class="cu" href="javascript:void(0);">'.$label.'</a>';
//         }
        if (!empty($this->sort) and !empty($this->orderby))
        	$link = U($this->modulef . '/' . $this->modules . '/' . $this->script . '/paging/currpage/'. $pageid .'/orderby/' . $this->orderby . '/sort/' . $this->sort .'.html');
		else
			$link = U($this->modulef . '/' . $this->modules . '/' . $this->script . '/paging/currpage/'. $pageid .'.html');
//         return '<a href="' . $this->modulef . '_' . $this->modules . '-' . $this->script . '-paging-currpage-'. $pageid .'.html">'.$label.'</a>';
        return '<a href="javascript:void(0);" onclick="loadPage(\''.$link.'\');">'. $label .'</a>';
    }

    public function createPageLink() {

        $this->calc($this->recTotal , $this->currPage);

        $l_aHtml = array();
        $l_aHtml[] = '<div class="loadMore">';
//         $l_aHtml[] = $this->createTotal();
//         $l_aHtml[] = $this->createPrevPage();
//         $l_aHtml[] = $this->createRange();
        $l_aHtml[] = $this->createNextPage();
//         $l_aHtml[] = $this->createRecPerPageList();
//         $l_aHtml[] = $this->current();
//         $l_aHtml[] = $this->createFirstPage();
//         $l_aHtml[] = $this->createPrevPage();
//         $l_aHtml[] = $this->createNextPage();
//         $l_aHtml[] = $this->createLastPage();
//         $l_aHtml[] = $this->createGoTo();
        $l_aHtml[] = $this->createRecPerPageJS();
        $l_aHtml[] = '</div>';

        return implode('&nbsp;' , $l_aHtml);

    }

    /**
     * Create the goto part html.
     *
     * @access private
     * @return string
     */
    private function createGoTo()
    {
//         $goToHtml  = "<input type='hidden' id='_recTotal'  value='$this->recTotal' />\n";
//         $goToHtml .= "<input type='hidden' id='_pageTotal' value='$this->pageTotal' />\n";
        $goToHtml = "<input type='text'   id='_pageID'    value='$this->currPage' style='text-align:center;width:30px;' /> \n";
        $goToHtml .= "<input type='button' id='goto'       value='{$this->lang->link->locate}' onclick='submitPage(\"changePageID\");' class='btn btn-default btn-xs' />";
        return $goToHtml;
    }


    private function createTotal() {
//         return sprintf($this->lang->link->total , $this->recTotal , $this->currPage , $this->pageCount);
        return sprintf($this->lang->link->total , $this->pageCount , $this->recTotal );
    }

    private function current() {
        return sprintf($this->lang->link->current , $this->currPage , $this->pageCount);
    }

    /**
     /* Create the select list of RecPerPage.
     *
     * @access private
     * @return string
     */
    private function createRecPerPageList()
    {
        $range[5]  = 5;
        $range[20]  = 20;
        $range[50]  = 50;
        $range[100] = 100;
        return sprintf($this->lang->link->recperpagelist , html::select('_recPerPage', $range, $this->recPerPage, "onchange='submitPage(\"changeRecPerPage\");' class='w-60px'") );
    }

    /**
     * Create the select object of record perpage.
     *
     * @access private
     * @return string
     */
    private function createRecPerPageJS()
    {
        $js  = <<<EOT
        <script language='Javascript'>
        function loadPage(link)
        {
        	$.get(link , null , function(data){
        		$('table tbody').append($(data).find('tbody').html()) ;
				$('tfoot td').html($(data).find('.loadMore').html());
    		});
        }

        </script>
EOT;
        return $js;
    }

}


//生成分页链接 备用
// public function subDrawPageLink($a_stScript , $a_stCurClass) {
//     $l_aHtml = array();
//     if ($this->currPage != 1) {
//         $l_aHtml[] = '<a href="' . $a_stScript . '?event=huanye&page=1">首页</a>';
//         $l_aHtml[] = '<a href="' . $a_stScript . '?event=huanye&page=' . $this->prevPage . '">上一页</a>';
//     } else {
//         $l_aHtml[] = '<a href="javascript:void(0);" class="unClick">首页</a>';
//         $l_aHtml[] = '<a href="javascript:void(0);" class="unClick">上一页</a>';
//     }

//     $l_aStackFont = array();
//     $l_aStackBack = array();
//     for ($i = 1 ; $i < $this->currPage; $i ++) {
//         $l_aStackFont[] = '<a href="' . $a_stScript . '?event=huanye&page=' . $i . '">' . $i . '</a>';
//     }

//     for ($i = $this->currPage + 1 ; $i < $this->pageCount + 1; $i ++) {
//         $l_aStackBack[] = '<a href="' . $a_stScript . '?event=huanye&page=' . $i . '">' . $i . '</a>';
//     }

//     if (count($l_aStackFont) + count($l_aStackBack) + 1 > self::LINKRANGE) {
//         if (count($l_aStackBack) < (int)(self::LINKRANGE/2)) {
//             while(count($l_aStackFont) + count($l_aStackBack) + 1 != self::LINKRANGE) {
//                 array_shift($l_aStackFont);
//             }
//         } else if (count($l_aStackFont) < (int)(self::LINKRANGE/2)) {
//             while(count($l_aStackFont) + count($l_aStackBack) + 1 != self::LINKRANGE) {
//                 array_pop($l_aStackBack);
//             }
//         } else {
//             while(count($l_aStackFont) != (int)(self::LINKRANGE/2)) {
//                 array_shift($l_aStackFont);
//             }
//             if (self::LINKRANGE & 1) {//奇数时
//                 while(count($l_aStackBack) != (int)(self::LINKRANGE/2)) {
//                     array_pop($l_aStackBack);
//                 }
//             } else {
//                 while(count($l_aStackBack) != (int)(self::LINKRANGE/2) + 1){
//                     array_pop($l_aStackBack);
//                 }
//             }
//         }

//     }
//     foreach ($l_aStackFont as $value) {
//         $l_aHtml[] = $value;
//     }
//     $l_aHtml[] = '<a href="javascript:void(0);" class="' . $a_stCurClass . '">' . $this->currPage . '</a>' ;
//     foreach ($l_aStackBack as $value) {
//         $l_aHtml[] = $value;
//     }

//     if ($this->currPage != $this->pageCount) {
//         $l_aHtml[] = '<a href="' . $a_stScript . '?event=huanye&page=' . $this->nextPage . '">下一页</a>';
//         $l_aHtml[] = '<a href="' . $a_stScript . '?event=huanye&page=' . $this->pageCount . '">尾页</a>';
//     } else {
//         $l_aHtml[] = '<a href="javascript:void(0);" class="unClick">下一页</a>';
//         $l_aHtml[] = '<a href="javascript:void(0);" class="unClick">尾页</a>';
//     }
//     //         $l_stInfo[] = "共有<b>{$this->recTotal}</b>条符合搜索条件的记录.";
//     $l_stInfo[] = "现在显示的是从第<b>{$this->recStart}</b>条记录~第<b>{$this->recEnd}</b>条记录";
//     //绘制链接
//     $this->smarty->assign("total" , $this->recTotal);
//     $this->smarty->assign("PAGERANGE" , implode('&nbsp;&nbsp;' , $l_stInfo));
//     // 		$this->smarty->assign('SEARCHINFO' , implode('&nbsp;&nbsp;' , $l_stInfo));
//     $this->smarty->assign('PAGELINK' , implode('&nbsp;' , $l_aHtml));
// }