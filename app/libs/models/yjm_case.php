<?php
class Yjm_Case extends clsModel{

    CONST INSERT     = "insert into yjm_case (title,keyword,summary,style,house,room,surface ,yjmset,area,price,designer,content,sort,createby,createtime , homepage)values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

    CONST GETLIST    = "select a.*,b.name stylename , c.name roomname , d.name surfacename , e.title setname , f.name designername from yjm_case a left join mw_category b on a.style=b.id left join mw_category c on a.room = c.id left join mw_category d on a.surface = d.id left join yjm_set e on a.yjmset = e.id left join yjm_person f on a.designer = f.id";

    CONST GETCOUNT   = "select count(*) cnt from yjm_case a left join yjm_person b on a.designer = b.id";

    CONST GET        = "select * from yjm_case where id=?";

    CONST UPDATE     = "update yjm_case set title=? , keyword=? , summary=? , style=?,house=?,room=?,surface=?,yjmset=?,area=?,price=?,designer=?, content=? , sort=?, updateby=? , updatetime=? , homepage=? where id=?";

    CONST DELETE     = "delete from yjm_case where id =?";

    CONST RANDLIST   = "select a.* , b.url from yjm_case a left join ( select * from mw_file where objecttype=? and `primary` = '1') b on a.id = b.objectid ";
    CONST RANDORDERBY = " order by rand() ";

    CONST GETTOPLIST = "select a.*,c.name stylename , b.id fileid , b.url from ( select * from yjm_case where homepage = '1') a left join (select * from mw_topimage where objecttype = ? ) b on a.id=b.objectid left join mw_category c on a.style = c.id ";

    public function insert($input) {

        $i = 1 ;

         $this->_oMdb->fncPreparedStatement(self::INSERT)
                    ->subSetString($i++ , $input->title)
                    ->subSetString($i++ , $input->keyword)
                    ->subSetString($i++ , $input->summary)
                    ->subSetInteger($i++ , $input->style)
                    ->subSetString($i++ , $input->house)
                    ->subSetInteger($i++ , $input->room)
                    ->subSetInteger($i++ , $input->surface)
                    ->subSetInteger($i++ , $input->yjmset)
                    ->subSetString($i++ , $input->area)
                    ->subSetString($i++ , $input->price)
                    ->subSetInteger($i++ , $input->designer)
                    ->subSetString($i++ , $input->content)
                    ->subSetInteger($i++ , $input->sort)
                    ->subSetInteger($i++ , $input->createby)
                    ->subSetString($i++ , $input->createtime)
                    ->subSetString($i++ , $input->homepage)
                    ->fncExecuteUpdate();

       return !$this->_oMdb->isError();
    }

    public function getTopList($input) {
    	$i = 1;
    	$output = array();
    	$orderby = "order by c.sort asc , $input->orderby  $input->sort " ;
    	$this->_oMdb->fncPreparedStatement(self::GETTOPLIST . $orderby)
    				->subSetString($i++, $input->objecttype)
    				->fncExcuteQuery();

    	while ($row = $this->_oMdb->fncGetRecordSet()) {
    		$output[] = $row;
    	}

    	return $output;




    }

    public function getList($input) {
        $output = array();
        $where = '';
        if (isset($input->name) or isset($input->style)
                or isset($input->room) or isset($input->surface)
                or isset($input->yjmset) or isset($input->designer))  {
            $where .= ' where ';

            if (isset($input->name)) {
                $cond[] = "(f.name like ?)";
            }

            if (isset($input->style)) {
                $cond[] = "(a.style = ?)";
            }

            if (isset($input->room)) {
                $cond[] = "(a.room = ?)";
            }

            if (isset($input->surface)) {
                $cond[] = "(a.surface = ?)";
            }

            if (isset($input->yjmset)) {
                $cond[] = "(a.yjmset = ?)";
            }

            if (isset($input->designer)) {
            	$cond[] = "(a.designer = ?)";
            }

            $where .= implode(' and ' , $cond);
        }

        $i = 1;
        if ($input->orderby == "sort")
            $orderby = ' order by a.sort';

        if ($input->orderby == "style")
            $orderby = ' order by a.style';

        if ($input->orderby == "room")
            $orderby = ' order by a.room';

        if ($input->orderby == "surface")
            $orderby = ' order by a.surface';

        if ($input->orderby == "yjmset")
            $orderby = ' order by a.yjmset';

        if ($input->orderby == "designer")
            $orderby = ' order by a.designer';

        if ($input->orderby == "views")
            $orderby = ' order by a.views';

        if ($input->orderby == "homepage")
            $orderby = ' order by a.homepage';

        $orderby .= " $input->sort " ;
        $this->_oMdb->fncPreparedStatement(self::GETLIST. $where . $orderby)
                    ->subSetLimit($input->start, $input->end);

        if (isset($input->name) or isset($input->style)
                or isset($input->room) or isset($input->surface)
                or isset($input->yjmset) or isset($input->designer) )  {

            if (isset($input->name)) {
                $this->_oMdb->subSetNoNeedEscapeString($i++, '%'.$this->_oMdb->fncEscapeWildCard($input->name).'%');
            }

            if (isset($input->style)) {
                $this->_oMdb->subSetInteger($i++, $input->style);
            }

            if (isset($input->room)) {
                $this->_oMdb->subSetInteger($i++, $input->room);
            }

            if (isset($input->surface)) {
                $this->_oMdb->subSetInteger($i++, $input->surface);
            }

            if (isset($input->yjmset)) {
                $this->_oMdb->subSetInteger($i++, $input->yjmset);
            }

            if (isset($input->designer)) {
            	$this->_oMdb->subSetInteger($i++, $input->designer);
            }

        }

        $this->_oMdb->fncExcuteQuery();

        while ($row = $this->_oMdb->fncGetRecordSet()) {
            $output[] = $row;
        }

        return $output;
    }

    public function getRandList($input) {
        $output = array();
        $where = '';
        $i = 1;
        if (isset($input->style) or isset($input->room) or isset($input->designer)
        		or isset($input->exceptid)) {
        	$where = " where ";

        	if (isset($input->style)) {
        		$cond[] = "a.style = ?";
        	}

        	if (isset($input->room)) {
        		$cond[] = "a.room = ?";
        	}

        	if (isset($input->designer)) {
        		$cond[] = "a.designer = ?";
        	}

        	if (isset($input->exceptid)) {
        		$cond[] = "a.id <> ?";
        	}

        	$where .= implode(' and ', $cond);
        }
        $this->_oMdb->fncPreparedStatement(self::RANDLIST . $where .self::RANDORDERBY )
        			->subSetLimit($input->start, $input->end)
                    ->subSetString($i++ , $input->objecttype);

        if (isset($input->style)) {
        	$this->_oMdb->subSetInteger($i++ , $input->style);
        }
       	if (isset($input->room)) {
       		$this->_oMdb->subSetInteger($i++ , $input->room);
       	}
       	if (isset($input->designer)) {
       		$this->_oMdb->subSetInteger($i++ , $input->designer);
       	}

       	if (isset($input->exceptid)) {
       		$this->_oMdb->subSetInteger($i++ , $input->exceptid);
       	}

        $this->_oMdb->fncExcuteQuery();

        while ($row = $this->_oMdb->fncGetRecordSet()) {
            $output[] = $row;
        }
        return $output;
    }


    public function getCount($input) {
// echo "hello";exit;
        $where = '';
        if (isset($input->name) or isset($input->style)
                or isset($input->room) or isset($input->surface)
                or isset($input->yjmset) or isset($input->designer))  {
            $where .= ' where ';

            if (isset($input->name)) {
                $cond[] = "(b.name like ?)";
            }

            if (isset($input->style)) {
                $cond[] = "(a.style = ?)";
            }

            if (isset($input->room)) {
                $cond[] = "(a.room = ?)";
            }

            if (isset($input->surface)) {
                $cond[] = "(a.surface = ?)";
            }

            if (isset($input->yjmset)) {
                $cond[] = "(a.yjmset = ?)";
            }

            if (isset($input->designer)) {
            	$cond[] = "(a.designer = ?)";
            }

            $where .= implode(' and ' , $cond);
        }

        $i = 1;
        $this->_oMdb->fncPreparedStatement(self::GETCOUNT. $where);

        if (isset($input->name) or isset($input->style)
                or isset($input->room) or isset($input->surface)
                or isset($input->yjmset) or isset($input->designer))  {

            if (isset($input->name)) {
                $this->_oMdb->subSetNoNeedEscapeString($i++, '%'.$this->_oMdb->fncEscapeWildCard($input->name).'%');
            }

            if (isset($input->style)) {
                $this->_oMdb->subSetInteger($i++, $input->style);
            }

            if (isset($input->room)) {
                $this->_oMdb->subSetInteger($i++, $input->room);
            }

            if (isset($input->surface)) {
                $this->_oMdb->subSetInteger($i++, $input->surface);
            }

            if (isset($input->yjmset)) {
                $this->_oMdb->subSetInteger($i++, $input->yjmset);
            }

            if (isset($input->designer)) {
            	$this->_oMdb->subSetInteger($i++, $input->designer);
            }

        }

        $this->_oMdb->fncExcuteQuery();

        $row = $this->_oMdb->fncGetRecordSet();

        return $row['cnt'];
    }

    public function get($input) {

        $this->_oMdb->fncPreparedStatement(self::GET)
                    ->subSetInteger(1, $input->id)
                    ->fncExcuteQuery();

        $row = $this->_oMdb->fncGetRecordSet();

        return $row;

    }

    public function update($input) {

        $i = 1;

        $this->_oMdb->fncPreparedStatement(self::UPDATE)
                    ->subSetString($i++ , $input->title)
                    ->subSetString($i++ , $input->keyword)
                    ->subSetString($i++ , $input->summary)
                    ->subSetInteger($i++ , $input->style)
                    ->subSetString($i++ , $input->house)
                    ->subSetInteger($i++ , $input->room)
                    ->subSetInteger($i++ , $input->surface)
                    ->subSetInteger($i++ , $input->yjmset)
                    ->subSetString($i++ , $input->area)
                    ->subSetString($i++ , $input->price)
                    ->subSetInteger($i++ , $input->designer)
                    ->subSetString($i++ , $input->content)
                    ->subSetInteger($i++ , $input->sort)
                    ->subSetInteger($i++ , $input->updateby)
                    ->subSetString($i++ , $input->updatetime)
                    ->subSetString($i++ , $input->homepage)
                    ->subSetInteger($i++, $input->id)
                    ->fncExecuteUpdate();

        return !$this->_oMdb->isError();
    }

    public function delete($input) {
        $this->_oMdb->fncPreparedStatement(self::DELETE)
                    ->subSetInteger(1, $input->id)
                    ->fncExecuteUpdate();

        return !$this->_oMdb->isError();
    }

}