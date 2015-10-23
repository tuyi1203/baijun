<?php

/**
 * 加水印类
*
*/
class water {

    private $imgPath; // 图片路径

    public function __construct($imgPath = "./") {
//         $this->imgPath = rtrim($imgPath, "/") . "/";
        $this->imgPath = $imgPath;
    }

    /**
     * 写水印动作
     * @param string $ground 源图路径
     * @param string $water 水印图路径 即LOGO
     * @param integer/string/array $pos 位置  1 左上 2中上 3右上 4 左中 5中中 6右中 7 左下 8中下 9右下 0 随机位置 array(20,30)/20,30自定义坐标
     * @param string $prefix 保存添加水印图片的文件名前缀
     * @param integer $tm 透明度
     * @param array $xy
     */
    public function waterInfo($ground , $water, $pos = 0, $prefix = "lee_", $tm = 50) {

        $allPathGround = $this->imgPath . DS . $ground;
//         $allPathGround = $this->imgPath;
        $allPathWater = $this->imgPath . DS . $water;
//         $allPathWater = $water;
        $groundInfo = $this->getImgSize($allPathGround);
        $waterInfo = $this->getImgSize($allPathWater);

        //判断水印图片是否比原图大
        if (!$newPos = $this->getImgPosition($groundInfo, $waterInfo, $pos)) {
//             echo "您的水印图片比原图大哦";
            return false;
        }
// echo $allPathGround;
        //打开资源
        $groundRes = $this->getImgResource($allPathGround, $groundInfo['mime']);
        $waterRes = $this->getImgResource($allPathWater, $waterInfo['mime']);

        //整合资源
        $newGround = $this->copyMergeImg($groundRes, $waterRes, $newPos, $waterInfo, $tm);

        //保存资源
        $this->saveImg($newGround, $ground, $groundInfo['mime'], $prefix);
        return true;
    }

    /**
     * 保存图片
     * @param type $img
     * @param type $ground
     * @param type $info
     * @param type $prefix
     */
    private function saveImg($img, $ground, $info, $prefix) {
        $path = $this->imgPath . DS . $prefix . $ground;
        switch ($info) {
            case "image/jpg":
            case "image/jpeg":
            case "image/pjpeg":
                imagejpeg($img, $path);
                break;
            case "image/gif":
                imagegif($img, $path);
                break;
            case "image/png":
                imagepng($img, $path);
                break;
            default:
                imagegd2($img, $path);
        }
    }

    /**
     * 拷贝并合并图像
     * @param string $ground 背景图片
     * @param string $water 水印图片
     * @param int $pos 水印的位置坐标，以背景的左上角为起点
     * @param string $waterInfo
     * @param int $tm 透明度
     * @return boolean
     */
    private function copyMergeImg($ground, $water, $pos, $waterInfo, $tm) {
        imagecopymerge($ground, $water, $pos[0], $pos[1], 0, 0, $waterInfo[0], $waterInfo[1], $tm);
        return $ground;
    }

    /**
     * 打开图像
     * @param string $img 图片路径
     * @param string $imgType 图片后缀
     * @return string
     */
    private function getImgResource($img, $imgType) {
        switch ($imgType) {
            case "image/jpg":
            case "image/jpeg":
            case "image/pjpeg":
                $res = imagecreatefromjpeg($img);
                break;
            case "image/gif":
                $res = imagecreatefromgif($img);
                break;
            case "image/png":
                $res = imagecreatefrompng($img);
                break;
            case "image/wbmp":
                $res = imagecreatefromwbmp($img);
                break;
            default:
                $res = imagecreatefromgd2($img);
        }
        return $res;
    }

    /**
     * 生成图片的坐标位置
     * @param string $ground 背景图片大小
     * @param string $water 水印图片大小
     * @param integer $pos 水印位置  1 左上 2中上 3右上 4 左中 5中中 6右中 7 左下 8中下 9右下 0 随机位置
     * @param array $xy 图片的坐标位置
     * @return array
     */
    private function getImgPosition($ground, $water, $pos) {
        if ($ground[0] < $water[0] || $ground[1] < $water[1]) {  //判断水印与原图比较 如果水印的高或者宽比原图小 将返回假
            return false;
        }
        switch ($pos) {
            case 1:
                $x = 0;
                $y = 0;
                break;
            case 2:
                $x = ceil(($ground[0] - $water[0]) / 2);
                $y = 0;
                break;
            case 3:
                $x = $ground[0] - $water[0];
                $y = 0;
                break;
            case 4:
                $x = 0;
                $y = ceil(($ground[1] - $water[1]) / 2);
                break;
            case 5:
                $x = ceil(($ground[0] - $water[0]) / 2);
                $y = ceil(($ground[1] - $water[1]) / 2);
                break;
            case 6:
                $x = $ground[0] - $water[0];
                $y = ceil(($ground[1] - $water[1]) / 2);
                break;
            case 7:
                $x = 0;
                $y = $ground[1] - $water[1];
                break;
            case 8:
                $x = ceil($ground[0] - $water[0] / 2);
                $y = $ground[1] - $water[1];
                break;
            case 9:
                $x = $ground[0] - $water[0];
                $y = $ground[1] - $water[1];
                break;
            case 0:
                $x = rand(0, $ground[0] - $water[0]);
                $y = rand(0, $ground[1] - $water[1]);
                break;
            default:
                !is_array($pos) && $pos = explode(',', $pos);
                return $pos;
        }
        $xy[] = $x;
        $xy[] = $y;
        return $xy;
    }

    /**
     * 生成透明背景的图片
     * @param type $imagePath 原图路径
     * @param type $str 水印文字
     * @param type $save_path
     */
    public function generateTransparentPic($imagePath , $str, $tmpfilename, $width = 100, $height = 100) {
        ob_clean(); //ob_clean这个函数的作用就是用来丢弃输出缓冲区中的内容，如果你的网站有许多生成的图片类文件，那么想要访问正确，就要经常清除缓冲区。
        //header("content-type:image/png");
//         set_include_path(get_include_path(). PATH_SEPARATOR . dirname(__FILE__).PATH_SEPARATOR);
//         pr(get_include_path());
        list($imgwidth, $imgheight) = getimagesize($imagePath);
        if ($imgwidth < $width)   $width = $imgwidth;
        if ($imgheight < $width)   $height = $imgwidth;

        $fnt = dirname(__FILE__) . DS . "simsun.ttc"; //直接调用系统字体字体好像找不到字体，复制出来即可。
        //$str = iconv('gbk', 'utf-8//IGNORE', $str);
        $img = ImageCreate($width, $height);
        $bgcolor = ImageColorAllocate($img, 0, 0, 0); //似乎边缘会出现背景色！
//         $red = ImageColorAllocate($img, 255, 0, 0);
		$white = ImageColorAllocate($img, 255, 251, 240);
        $bgcolortrans = ImageColorTransparent($img, $bgcolor);
        //ImageString($img, 5, 10, 10, $str, $red); //这个使用内置字体，特殊符号乱码
        ImageTTFText($img, 20, 0, 10, 20, $white, $fnt, $str); //欧元和英镑符号要用ImageTTFText，并选择英文字体，不然乱码!
        //ImagePng($img);
        ImagePng($img, $this->imgPath . DS .$tmpfilename);
        ImageDestroy($img);
        return $this;
    }

    /**
     * 获取图片大小
     * @param type $img
     * @return type
     */
    private function getImgSize($img) {
        return getimagesize($img);
    }

}

// 	$water = new water();
// 	$tmp_save_path = "a.png"; //文字水印图片临时路径
// 	$save_pic = $water->generateTransparentPic('水印文字!', $tmp_save_path, 390, 30);
// 	/**
// 	 * 背景路径
// 	 * 水印路径
// 	 * 水印位置（1 左上 2中上 3右上 4 左中 5中中 6右中 7 左下 8中下 9右下 0 随机位置 array(20,30)/20,30 自定义坐标）
// 	 * 生成图片前缀名,透明度
// 	 * 自定义坐标位置
// 	 */
// 	$water->waterInfo("06.jpg", $tmp_save_path, 9, "haha", 50);
// 	@unlink($tmp_save_path);