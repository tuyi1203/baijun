<?php
/**
 * @name 		clsXml
 * @describe 	Xml類
 * @author 		tuyi
 * @since 		2011/12/07
 * @version		v1.0
 */
class clsXml{
    /**
     * @name			fncReadXmlFile
     * @describe		読入XML文件
     * @param  		String $a_stFilePath	XML文件路径
     * @return		Object SimpleXML類対象
     * @author 		tuyi
     * @since  		2011/12/07
     */
    public static function fncReadXmlFile($a_stFilePath)
    {
        if (file_exists($a_stFilePath)) {
            $l_oXml = simplexml_load_file($a_stFilePath);
            if(!$l_oXml){
                throw new clsSysException(__FILE__ , __FUNCTION__ , "載入XML文件失敗(" . $a_stFilePath . ')');
            }
            return $l_oXml;
        } else {
            throw new clsSysException(__FILE__ , __FUNCTION__ , '該路径的文件不存在(' . $a_stFilePath . ')');
        }
    }

    /**
     * @name			fncGetTextByXpath
     * @describe		使用xpath取得XML文件節点内容
     * @param  		String $a_oXml		SimpleXML類対象
     * @param		String $a_stXpath	xpath文字列
     * @return		mixed 節点内容（或節点内容的数組）
     * @author 		tuyi
     * @since  		2011/12/07
     */
    public static function fncGetTextByXpath($a_oXml , $a_stXpath)
    {
        $l_aRes = array() ;

        foreach ($a_oXml->xpath($a_stXpath) as $node) {

            if (empty($node)) {
                throw new clsSysException(__FILE__, __FUNCTION__ , "使用xpath(" . $a_stXpath . ')訪問節点失敗');
            }
            //↓オブジェクトから文字列変換（マジックメソッド__toString()）？？重要!!
            array_push($l_aRes, sprintf("%s", $node));
            //↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
        }

        if (count($l_aRes) == 1) {
            return $l_aRes[0];
        }
        return $l_aRes ;
    }
}

