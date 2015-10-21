<?php
class Yjm_Pricelog extends clsModel{

    CONST INSERT     = "insert into yjm_pricelog ";
    CONST INSERT_VALUES = " values ";

    CONST GETLIST    = "select * from yjm_pricelog" ;

    CONST GETCOUNT   = "select count(*) cnt from yjm_pricelog";

    CONST GET        = "select * from yjm_pricelog where id=?";

    CONST DELETE     = "delete from yjm_pricelog where id =?";

    public function insert($input) {

        $i = 1 ;
        $col = array();
        $val = array();

        if (isset($input->huxing)) {//户型
            $col[] = 'huxing';
            $val[] = '?';
        }

        if (isset($input->mianji)) {//面积
            $col[] = 'mianji';
            $val[] = '?';
        }

        if (isset($input->zhonglei)) {//装修种类
            $col[] = 'zhonglei';
            $val[] = '?';
        }

        if (isset($input->yongtu)) {//装修用途
            $col[] = 'yongtu';
            $val[] = '?';
        }

        if (isset($input->name)) {//姓名
            $col[] = 'name';
            $val[] = '?';
        }

        if (isset($input->tel)) {//联系电话
            $col[] = 'tel';
            $val[] = '?';
        }

        if (isset($input->loupan)) {//楼盘信息
            $col[] = 'loupan';
            $val[] = '?';
        }

        if (isset($input->loupan2)) {//楼盘信息
            $col[] = 'loupan2';
            $val[] = '?';
        }

        if (isset($input->jiaofang)) {//楼盘信息
            $col[] = 'jiaofang';
            $val[] = '?';
        }

        if (isset($input->taocan)) {//楼盘信息
            $col[] = 'taocan';
            $val[] = '?';
        }

        if (isset($input->fengge)) {//风格
            $col[] = 'fengge';
            $val[] = '?';
        }

        if (isset($input->createtime)) {//风格
            $col[] = 'createtime';
            $val[] = '?';
        }

         $this->_oMdb->fncPreparedStatement(self::INSERT . '(' . implode(',', $col) . ')' .
                 self::INSERT_VALUES  . '(' . implode(',', $val) . ')');

         if (isset($input->huxing)) {
             $this->_oMdb->subSetString($i++, $input->huxing);
         }

         if (isset($input->mianji)) {
             $this->_oMdb->subSetString($i++, $input->mianji);
         }

         if (isset($input->huxing)) {
             $this->_oMdb->subSetString($i++, $input->zhonglei);
         }

         if (isset($input->yongtu)) {//户型
             $this->_oMdb->subSetString($i++, $input->yongtu);
         }

         if (isset($input->name)) {//户型
             $this->_oMdb->subSetString($i++, $input->name);
         }

         if (isset($input->tel)) {//户型
             $this->_oMdb->subSetString($i++, $input->tel);
         }

         if (isset($input->loupan)) {//户型
             $this->_oMdb->subSetString($i++, $input->loupan);
         }

         if (isset($input->loupan2)) {//户型
             $this->_oMdb->subSetString($i++, $input->loupan2);
         }

         if (isset($input->jiaofang)) {//户型
             $this->_oMdb->subSetString($i++, $input->jiaofang);
         }

         if (isset($input->taocan)) {//户型
             $this->_oMdb->subSetString($i++, $input->taocan);
         }

         if (isset($input->fengge)) {//户型
             $this->_oMdb->subSetString($i++, $input->fengge);
         }

         if (isset($input->createtime)) {//户型
             $this->_oMdb->subSetString($i++, $input->createtime);
         }

         $this->_oMdb->fncExecuteUpdate();

         return !$this->_oMdb->isError();
    }

    public function getList($input) {
        $output = array();

        $orderby = ' order by id desc';
        $this->_oMdb->fncPreparedStatement(self::GETLIST . $orderby)
                    ->subSetLimit($input->start, $input->end)
                    ->fncExcuteQuery();

        while ($row = $this->_oMdb->fncGetRecordSet()) {
            $output[] = $row;
        }

        return $output;
    }

    public function getCount($input) {

//         $i = 1;
        $this->_oMdb->fncPreparedStatement(self::GETCOUNT)
                    ->fncExcuteQuery();

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

    public function delete($input) {
        $this->_oMdb->fncPreparedStatement(self::DELETE)
                    ->subSetInteger(1, $input->id)
                    ->fncExecuteUpdate();

        return !$this->_oMdb->isError();
    }
}