<?php
require(CORE_PLUGINS . DS . 'phpexcel' . DS . 'Classes' . DS .'PHPExcel' . DS  .'IOFactory.php');
require(CORE_PLUGINS . DS . 'phpexcel' . DS . 'Classes' . DS .'PHPExcel.php');

/**
 * @name 		clsPHPExcel
 * @describe 	phpexcel类
 * @author 		tuyi
 * @since 		2011/03/30
 * @version		v1.0
 * @modify       升级到1.7.7版本读取excel文件不再分格式对应    2012/6/2
 */
class clsPHPExcel
{
    public static function fncFactory($a_stExcelPath=null , $a_stExcelType='excel2007') {
        if(is_null($a_stExcelPath)) {
            return new PHPExcel();
        }
        // 		if($a_stExcelType == 'excel2003') {
        // 			$l_stExcelType = 'Excel5' ;
        // 		} else {
        // 			$l_stExcelType = 'Excel2007' ;
        // 		}
        //$a_stExcelPath = iconv("UTF-8" , 'GB2312',  $a_stExcelPath);//中文路径对应
        $a_stExcelPath = fncLangEncode($a_stExcelPath);//中文路径对应
        //         e($a_stExcelPath);exit;

        //         $l_oReader = PHPExcel_IOFactory::createReader($l_stExcelType);
        //         return $l_oReader->load($a_stExcelPath);
        return PHPExcel_IOFactory::load($a_stExcelPath);
    }

    public static function subOutputExcel($a_oPHPExcel  , $a_stFileName ,  $a_stOutputPath , $a_stExcelType='excel2007' , $a_bDownload=false) {
        $a_stOutputPath = fncLangEncode($a_stOutputPath);//中文路径对应
        $a_stFileName = fncLangEncode($a_stFileName);//中文路径对应
        // 	    $a_stOutputPath = iconv("UTF-8" , 'GB2312',  $a_stOutputPath);//中文路径对应
        // 		$a_stFileName = iconv("UTF-8" , 'GB2312',  $a_stFileName);//中文路径对应
        if($a_stExcelType == 'excel2003') {
            $l_stExcelType = 'Excel5' ;
        } else {
            $l_stExcelType = 'Excel2007' ;
        }
        $l_oWriter = PHPExcel_IOFactory::createWriter($a_oPHPExcel, $l_stExcelType);
        if(!$a_bDownload) {
            $l_oWriter->save( $a_stOutputPath . DS . $a_stFileName);
            return ;
        }
        if($a_stExcelType == 'excel2003') {
            header('Content-Type: application/vnd.ms-excel');
        } else {
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        }
        header('Content-Disposition: attachment;filename="' . $a_stFileName . '"');
        header('Cache-Control: max-age=0');
        $l_oWriter->save('php://output');
        exit;
    }

    public static function subCopyCells($a_oSheet , $a_aCopyCellFrom , $a_aCopyCellTo , $a_aPasteCellFrom , $a_aPasteCellTo) {
        // 		$l_iColOffset = 0 ; // コピー先 列のオフセット値
        //列的复制偏移值
        $l_iColOffset = $a_aPasteCellFrom[0] - $a_aCopyCellFrom[0] ; // コピー先 列のオフセット値
        // 		$rowOffset = 1; // コピー先 行のオフセット値
        //行的复制偏移值
        $l_iRowOffset = $a_aPasteCellFrom[1] - $a_aCopyCellFrom[1] ; // コピー先 列のオフセット値

        for( $col = $a_aCopyCellFrom[0] ; $col < $a_aCopyCellTo[0] + 1 ; $col++) {
            for($row = $a_aCopyCellFrom[1] ; $row<$a_aCopyCellTo[1] + 1 ; $row++) {
                //取得格子对象
                $cell = $a_oSheet->getCellByColumnAndRow($col, $row);
                //取得格子的样式
                $style = $a_oSheet->getStyleByColumnAndRow($col, $row);

                //把数字变成字符串(0,1) → A1
                $offsetCell = PHPExcel_Cell::stringFromColumnIndex($col + $l_iColOffset) . (string)($row + $l_iRowOffset);

                //复制格子的值
                $a_oSheet->setCellValue($offsetCell, $cell->getValue());
                //复制格子的样式
                $a_oSheet->duplicateStyle($style, $offsetCell);
            }
        }
    }

}
?>
