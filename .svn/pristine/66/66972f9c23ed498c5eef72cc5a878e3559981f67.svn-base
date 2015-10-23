<?php
class filter {

    /**
     * Convert special characters to HTML entities
     *
     * @param mixed $data
     * @return mixed
     */
    public static function htmlspecialchars($data) {

        if (!is_array($data)) return htmlspecialchars($data);
        return self::array_filter_recursive($data , 'htmlspecialchars');
    }

    /**
     * Convert \n characters to </br> tags
     *
     * @param mixed $data
     * @return mixed
     */
    public static function nl2br($data) {
        if (!is_array($data)) return nl2br($data);
        return self::array_filter_recursive($data , 'nl2br');
    }

    /**
     * Filters elements of an array using a callback function recursively
     *
     * @param array    $data
     * @param function $callback
     * @return array
     */
    public static function array_filter_recursive($data , $callback , $args = null) {

        foreach ($data as $k => $v) {
            if (is_array($v)) $data[$k] = self::array_filter_recursive($v , $callback , $args);
            else {
                if (!is_array($callback)) $data[$k] = $callback($v , $args);
                else $data[$k] = $callback[0]::$callback[1]($v , $args);
            }
        }
        return $data;
    }

    public static function cut_sense($sourcestr, $cutlength, $addstr='...') {
        if ( strlen($sourcestr) > $cutlength){
            $end = $addstr;
        }else{
            $end = '';
        }
        if ( function_exists('mb_strcut') ){
            $sourcestr = mb_strcut ( $sourcestr, 0 , $cutlength , "UTF-8" );
        }else{
            $sourcestr =substr($sourcestr, 0, $cutlength);
        }
        $text=''.$sourcestr.''.$end.'';

        return $text;
    }

    /**
     * Strip HTML and PHP tags from a string
     *
     * @param string $str The input string.
     * @param string $allowable_tags The specify tags which should not be stripped.
     * @return string
     */
    public static function strip_tags_for_wechat_text($str , $allowable_tags=null){
        return strip_tags($str , $allowable_tags);
    }

    /**
     * Convert keywords characters to * char
     *
     * @param arrray $keywords
     * @param mixed $data
     * @return mixed
     */
    public static function keywords($data , $keywords) {
        if (!is_array($data)) return str_replace($keywords , '*' , $data);
        return filter::array_filter_recursive($data , array('filter' , 'keywords') , $keywords);
    }

}


class validater {
    /**
     * Bool checking.
     *
     * @param  bool $var
     * @static
     * @access public
     * @return bool
     */
    public static function checkBool($var)
    {
        return filter_var($var, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * cellphone number checking.
     *
     * @param  bool $var
     * @static
     * @access public
     * @return bool
     */
    public static function checkChineseTel($var) {
        return preg_match('/^1[3458][0-9]{9}$/' , $var);
    }

    /**
     * Int checking.
     *
     * @param  int $var
     * @static
     * @access public
     * @return bool
     */
    public static function checkInt($var)
    {
        if (is_array($var)) {
            $args = $var ;
        } else {
            $args = func_get_args();
        }
        $var = $args[0];

        if($var != 0) $var = ltrim($var, 0);  // Remove the left 0, filter don't think 00 is an int.

        /* Min is setted. */
        if(isset($args[1]))
        {
            /* And Max is setted. */
            if(isset($args[2]))
            {
                $options = array('options' => array('min_range' => $args[1], 'max_range' => $args[2]));
            }
            else
            {
                $options = array('options' => array('min_range' => $args[1]));
            }
// echo "hello";
            return filter_var($var, FILTER_VALIDATE_INT, $options);
        }
        else
        {
// echo "world";
            return filter_var($var, FILTER_VALIDATE_INT);
        }
    }

    /**
     * Float checking.
     *
     * @param  float  $var
     * @param  string $decimal
     * @static
     * @access public
     * @return bool
     */
    public static function checkFloat($var, $decimal = '.')
    {
        return filter_var($var, FILTER_VALIDATE_FLOAT, array('options' => array('decimail' => $decimal)));
    }

    /**
     * Email checking.
     *
     * @param  string $var
     * @static
     * @access public
     * @return bool
     */
    public static function checkEmail($var)
    {
        return filter_var($var, FILTER_VALIDATE_EMAIL);
    }

    /**
     * URL checking.
     *
     * The check rule of filter don't support chinese.
     *
     * @param  string $var
     * @static
     * @access public
     * @return bool
     */
    public static function checkURL($var)
    {
        return filter_var($var, FILTER_VALIDATE_URL);
    }

    /**
     * Domain checking.
     *
     * The check rule of filter don't support chinese.
     *
     * @param  string $var
     * @static
     * @access public
     * @return bool
     */
    public static function checkDomain($var)
    {
        return preg_match('/^([a-z0-9-]+\.)+[a-z]{2,6}$/', $var);
    }

    /**
     * IP checking.
     *
     * @param  ip $var
     * @param  string $range all|public|static|private
     * @static
     * @access public
     * @return bool
     */
    public static function checkIP($var, $range = 'all')
    {
        if($range == 'all')    return filter_var($var, FILTER_VALIDATE_IP);
        if($range == 'public static') return filter_var($var, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE);
        if($range == 'private')
        {
            if($var == '127.0.0.1' or filter_var($var, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE) === false) return true;
            return false;
        }
    }

    /**
     * Date checking. Note: 2009-09-31 will be an valid date, because strtotime auto fixed it to 10-01.
     *
     * @param  date $date
     * @static
     * @access public
     * @return bool
     */
    public static function checkDate($date)
    {
        if($date == '0000-00-00' or $date == '0000-00-00 00:00:00') return true;
        $stamp = strtotime($date);
        if(!is_numeric($stamp)) return false;
        return checkdate(date('m', $stamp), date('d', $stamp), date('Y', $stamp));
    }

    /**
     * REG checking.
     *
     * @param  string $var
     * @param  string $reg
     * @static
     * @access public
     * @return bool
     */
    public static function checkREG($var, $reg)
    {
        return filter_var($var, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => $reg)));
    }

    /**
     * Length checking.
     *
     * @param  string $var
     * @param  string $max
     * @param  int    $min
     * @static
     * @access public
     * @return bool
     */
    public static function checkLength($var, $max, $min = 0)
    {
        return self::checkInt(mb_strlen($var), $min, $max);
    }

    /**
     * Not empty checking.
     *
     * @param  mixed $var
     * @static
     * @access public
     * @return bool
     */
    public static function checkNotEmpty($var)
    {
        //pr($var == 0);
        if ($var === 0 or $var === "0") return true;
        return !empty($var);
    }

    /**
     * Empty checking.
     *
     * @param  mixed $var
     * @static
     * @access public
     * @return bool
     */
    public static function checkEmpty($var)
    {
        return empty($var);
    }

    /**
     * Account checking.
     *
     * @param  string $var
     * @static
     * @access public
     * @return bool
     */
    public static function checkAccount($var)
    {
        return self::checkREG($var, '|^[a-zA-Z0-9_]{1}[a-zA-Z0-9_]{1,}[a-zA-Z0-9_]{1}$|');
    }

    /**
     * Check captcha.
     *
     * @param  mixed    $var
     * @static
     * @access public
     * @return bool
     */
    public static function checkCaptcha($var)
    {
        if(!isset($_SESSION['captcha'])) return false;
        return $var == $_SESSION['captcha'];
    }

    /**
     * Must equal a value.
     *
     * @param  mixed  $var
     * @param  mixed $value
     * @static
     * @access public
     * @return bool
     */
    public static function checkEqual($var, $value)
    {
        return $var == $value;
    }

    /**
     * Must in value list.
     *
     * @param  mixed  $var
     * @param  mixed $value
     * @static
     * @access public
     * @return bool
     */
    public static function checkIn($var, $value)
    {
        if(!is_array($value)) $value = explode(',', $value);
        return in_array($var, $value);
    }

    /**
     * check Alpha.
     *
     * @param  mixed  $var
     * @param  $case $string
     * @static
     * @access public
     * @return bool
     */
    public static function checkAlpha($var , $case=null)
    {
        if (is_null($case))   return ctype_alpha($var);
        if ($case == "lower") return ctype_lower($var);
        if ($case == "upper") return ctype_upper($var);
    }

    /**
     * check ID Card.
     *
     * @param  mixed  $var
     * @param  $id_card $string
     * @static
     * @access public
     * @return bool
     */
	public static function checkIDCard($id_card) {
		if (strlen ( $id_card ) == 18) {
			return self::idcard_checksum18 ( $id_card );
		} elseif ((strlen ( $id_card ) == 15)) {
			$id_card = self::idcard_15to18 ( $id_card );
			return self::idcard_checksum18 ( $id_card );
		} else {
			return false;
		}
	}
	// 计算身份证校验码，根据国家标准GB 11643-1999
	public static function idcard_verify_number($idcard_base) {
		if (strlen ( $idcard_base ) != 17) {
			return false;
		}
		// 加权因子
		$factor = array (
				7,
				9,
				10,
				5,
				8,
				4,
				2,
				1,
				6,
				3,
				7,
				9,
				10,
				5,
				8,
				4,
				2
		);
		// 校验码对应值
		$verify_number_list = array (
				'1',
				'0',
				'X',
				'9',
				'8',
				'7',
				'6',
				'5',
				'4',
				'3',
				'2'
		);
		$checksum = 0;
		for($i = 0; $i < strlen ( $idcard_base ); $i ++) {
			$checksum += substr ( $idcard_base, $i, 1 ) * $factor [$i];
		}
		$mod = $checksum % 11;
		$verify_number = $verify_number_list [$mod];
		return $verify_number;
	}
	// 将15位身份证升级到18位
	public static function idcard_15to18($idcard) {
		if (strlen ( $idcard ) != 15) {
			return false;
		} else {
			// 如果身份证顺序码是996 997 998 999，这些是为百岁以上老人的特殊编码
			if (array_search ( substr ( $idcard, 12, 3 ), array (
					'996',
					'997',
					'998',
					'999'
			) ) !== false) {
				$idcard = substr ( $idcard, 0, 6 ) . '18' . substr ( $idcard, 6, 9 );
			} else {
				$idcard = substr ( $idcard, 0, 6 ) . '19' . substr ( $idcard, 6, 9 );
			}
		}
		$idcard = $idcard . idcard_verify_number ( $idcard );
		return $idcard;
	}
	// 18位身份证校验码有效性检查
	public static function idcard_checksum18($idcard) {
		if (strlen ( $idcard ) != 18) {
			return false;
		}
		$idcard_base = substr ( $idcard, 0, 17 );
		if (self::idcard_verify_number ( $idcard_base ) != strtoupper ( substr ( $idcard, 17, 1 ) )) {
			return false;
		} else {
			return true;
		}
	}
}