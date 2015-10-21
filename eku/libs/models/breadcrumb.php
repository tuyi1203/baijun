<?php
class clsBreadCrumbModel extends clsModel{

    const GET_LIST = "SELECT A.PAGEID,A.PREVIOUSPAGEID,A.KEY,A.NAME,A.URL,A.DISPLAY FROM EKU_BREADCRUMB A WHERE A.PAGEID = ? AND A.PREVIOUSPAGEID = ? ORDER BY A.KEY";

    public function __construct(clsMDB $a_oMdb , $a_stTableName)
    {
        parent::__construct($a_oMdb , $a_stTableName);
    }

    /**
     * 取得面包屑一览
     * @param array $a_aInputData 输入数据
     */
    public function fncGetList($a_aInputData) {
        $iAll = $this->_oMdb->fncPreparedStatement(self::GET_LIST)
        ->subSetString(1, $a_aInputData['pageid'])
        ->subSetString(2, $a_aInputData['previouspageid'])
        ->fncExcuteQuery();

        $l_aOutputData = array();
        while($l_aRow = $this->_oMdb->fncGetRecordSet()) {
            $l_aOutputData[$l_aRow['KEY']]['NAME'] = $l_aRow['NAME'];
            $l_aOutputData[$l_aRow['KEY']]['URL'] = $l_aRow['URL'];
            $l_aOutputData[$l_aRow['KEY']]['DISPLAY'] = $l_aRow['DISPLAY'];
        }
        return $l_aOutputData;
    }
}