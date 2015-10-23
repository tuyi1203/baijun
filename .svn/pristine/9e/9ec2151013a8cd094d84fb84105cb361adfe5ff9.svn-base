<?php

/**
 * @name 		clsAppXml
 * @describe 	Xml派生類
 * @author 		tuyi
 * @since 		2011/12/07
 * @version		v1.0
 */
class clsAppXml extends clsXml{

    /**
     * @name		fncGetNotice
     * @describe	取得Notice消息
     * @param 		String $a_stNoticeNo Notice編号
     * @return 		Ambigous <mixed, multitype:>
     * @author 		tuyi
     * @since 		2011/12/07
     */
    public static function fncGetNotice($a_stNoticeNo)
    {
        $l_oXml = parent::fncReadXmlFile(NOTICE_XML_PATH);
        //Xpath生成
        if ($a_stNoticeNo < 2000) {
            //DBメッセージ
            $l_stXpath = "//db/node[@no='" . $a_stNoticeNo . "']/message";
        } else if ($a_stNoticeNo < 3000) {
            //アプリメッセージ
            $l_stXpath = "//app/node[@no='" . $a_stNoticeNo . "']/message";
        } else if ($a_stNoticeNo < 4000) {
            //システムメッセージ
            $l_stXpath = "//sys/node[@no='" . $a_stNoticeNo . "']/message";
        }
        return parent::fncGetTextByXpath($l_oXml, $l_stXpath);
    }

    /**
     * @name			fncGetNotice
     * @describe		取得錯誤消息
     * @param 		String $a_stErrorNo 錯誤編号
     * @return 		Ambigous <mixed, multitype:>
     * @author 		tuyi
     * @since 		2011/12/07
     */
    public static function fncGetErrorMsg($a_stErrorNo)
    {
        $l_oXml = parent::fncReadXmlFile(ERR_MSG_XML_PATH);

        //Xpath生成
        if ($a_stErrorNo < 2000) {
            //DBエラー
            $l_stXpath = "//db/node[@no='" . $a_stErrorNo . "']/message";
        } else if ($a_stErrorNo < 3000) {
            //アプリエラー
            $l_stXpath = "//app/node[@no='" . $a_stErrorNo . "']/message";
        } else if ($a_stErrorNo < 4000) {
            //アプリエラー
            $l_stXpath = "//sys/node[@no='" . $a_stErrorNo . "']/message";
        } else if ($a_stErrorNo < 5000) {
            //アプリエラー
            $l_stXpath = "//int/node[@no='" . $a_stErrorNo . "']/message";
        }

        return parent::fncGetTextByXpath($l_oXml , $l_stXpath );
    }

    public static function fncGetValidateErrMsg($no , $change = array())
    {
        //     e(VALIDATE_ERR_XML_PATH);
        $xml = parent::fncReadXmlFile(VALIDATE_ERR_XML_PATH);
        $xpath = "//node[@no='" . $no . "']/message";
        $validateErrMsg = parent::fncGetTextByXpath($xml, $xpath);
        foreach ($change as $key => $value) {
            $validateErrMsg = str_replace('{'.$key.'}', $value , $validateErrMsg);
        }
        return '<font color="red">※' . $validateErrMsg .'</font>';
    }
}
