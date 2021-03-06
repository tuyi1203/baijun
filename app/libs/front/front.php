<?php
/**
 * HTML class.
 */
class html {
    /**
     * Create tags like "<select><option></option></select>"
     *
     * @param  string $name          the name of the select tag.
     * @param  array  $options       the array to create select tag from.
     * @param  mixed  $selectedItems the item(s) to be selected, can like item1,item2 or array.
     * @param  string $attrib        other params such as multiple, size and style.
     * @return string
     */
    public static function select($name = '', $options = array(), $selectedItems = "", $attrib = "")
    {
        $options = (array)($options);
        if(!is_array($options) or empty($options)) return false;

        /* The begin. */
        $id = $name;
        if($pos = strpos($name, '[')) $id = substr($name, 0, $pos);
        $string = "<select name='$name' id='$id' $attrib>\n";

        /* The options. */
        if(is_array($selectedItems)) $selectedItems = implode(',', $selectedItems);
        $selectedItems = ",$selectedItems,";

        foreach($options as $key => $value)
        {
            $selected = strpos($selectedItems, ",$key,") !== false ? " selected='selected'" : '';
            $string  .= "<option value='$key'$selected>$value</option>\n";
        }

        /* End. */
        return $string .= "</select>\n";
    }


    /**
     * Create a button to close.
     *
     * @access public
     * @return string
     */
    public static function closeButton()
    {
        return "<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>";
    }
}

/**
 * CSS class.
 */
class css {

    /**
     * Import a css file.
     *
     * @param  string $url
     * @param  string $version
     * @access public
     * @return vod
     */
    public static function import($url)
    {
//         global $config;
//         echo "<link rel='stylesheet' href='$url?v={$config->version}' type='text/css' media='screen' />\n";
        echo "<link rel='stylesheet' href='{$url}' type='text/css' media='screen' />\n";
    }

    /**
     * The start of stylesheet.
     *
     * @static
     * @access private
     * @return string
     */
    static private function start()
    {
        return '<style  type="text/css">';
    }

    /**
     * The end of stylesheet.
     *
     * @param  bool    $newline
     * @static
     * @access private
     * @return void
     */
    static private function end($newline = true)
    {
        if($newline) return "\n</style>\n";
        return "</style>\n";
    }


    /**
     * Execute some js code.
     *
     * @param string $code
     * @static
     * @access public
     * @return string
     */
    static public function execute($code)
    {
        $css = self::start();
        $css .= $code;
        $css .= self::end();
        echo $css;
    }
}


/**
 * JS class.
 */
class js {

    /**
     * Import a js file.
     *
     * @param  string $url
     * @param  string $version
     * @access public
     * @return string
     */
    public static function import($url)
    {
//         global $config;
//         echo "<script src='$url?v={$config->version}' type='text/javascript'></script>\n";
        echo "<script src='{$url}' type='text/javascript'></script>\n";
    }

    /**
     * The start of javascript.
     *
     * @static
     * @access private
     * @return string
     */
    static private function start($full = true)
    {
        if($full) return "<html><meta http-equiv='Content-Type' content='text/html; charset=utf-8' /><style>body{background:white}</style><script language='Javascript'>";
        return "<script language='Javascript'>";
    }

    /**
     * The end of javascript.
     *
     * @param  bool    $newline
     * @static
     * @access private
     * @return void
     */
    static private function end($newline = true)
    {
        if($newline) return "\n</script>\n";
        return "</script>\n";
    }

    /**
     * Execute some js code.
     *
     * @param string $code
     * @static
     * @access public
     * @return string
     */
    static public function execute($code)
    {
        $js = self::start(false);
        $js .= $code;
        $js .= self::end();
        echo $js;
    }

    public static function exportConfig() {
        //         global $app, $config, $lang;
        $app  = getAppIns();
        $lang = getLang();
        //         $defaultViewType = $app->getViewType();
        //         $themeRoot       = $app->getWebRoot() . 'theme/';
        //         $moduleName      = $app->getModuleName();
        //         $methodName      = $app->getMethodName();
        //         $clientLang      = $app->getClientLang();
        //         $runMode         = RUN_MODE;
        //         $requiredFields  = '';
        //         if(isset($config->$moduleName->require->$methodName)) $requiredFields = str_replace(' ', '', $config->$moduleName->require->$methodName);

        $jsConfig = new stdclass();
        //         $jsConfig->webRoot        = $config->webRoot;
        $jsConfig->webRoot        = C('SITE_PUBLIC') . '/' . MODE;
        $jsConfig->cookieLife     = ceil((C('COOKIELIFE') - time()) / 86400);
        $jsConfig->domain         = C('DOMAIN');
        //         $jsConfig->requestType    = $config->requestType;
        //         $jsConfig->requestFix     = $config->requestFix;
        //         $jsConfig->moduleVar      = $config->moduleVar;
        //         $jsConfig->methodVar      = $config->methodVar;
        //         $jsConfig->viewVar        = $config->viewVar;
        //         $jsConfig->defaultView    = $defaultViewType;
        //         $jsConfig->themeRoot      = $themeRoot;
        $jsConfig->currentModule  = MODULE;
        $jsConfig->currentScript  = SCRIPT;
        $jsConfig->currentAction  = ACTION;
        //         $jsConfig->currentMethod  = $methodName;
        $jsConfig->clientLang     = $app->getClientLang();
        //         $jsConfig->requiredFields = $requiredFields;
        $jsConfig->save           = $lang->save;
        //         $jsConfig->router         = $app->server->SCRIPT_NAME;
        $jsConfig->runMode        = MODE;

        $js  = self::start(false);
        $js .= 'var config=' . json_encode($jsConfig);
        $js .= self::end();
        return $js;
    }

    /**
     * Set js value.
     *
     * @param  string   $key
     * @param  mix      $value
     * @static
     * @access public
     * @return void
     */
    static public function set($key, $value)
    {
        static $viewOBJOut;
        $js  = self::start(false);
        if(!$viewOBJOut)
        {
            $js .= 'var v = {};';
            $viewOBJOut = true;
        }

        if(is_numeric($value))
        {
            $js .= "v.{$key} = {$value};";
        }
        elseif(is_array($value) or is_object($value) or is_string($value))
        {
            $value = json_encode($value);
            $js .= "v.{$key} = {$value};";
        }
        elseif(is_bool($value))
        {
            $value = $value ? 'true' : 'false';
            $js .= "v.{$key} = $value;";
        }
        else
        {
            $value = addslashes($value);
            $js .= "v.{$key} = '{$value};'";
        }
        $js .= self::end($newline = false);
        echo $js;
    }

}