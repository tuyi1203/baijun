<?php
/**
 * The super object class.
 *
 * @package eku
 */
class clsSuper
{
    /**
     * Construct, set the var scope.
     *
     * @param   string $scope  the score, can be server, post, get, cookie, session, global
     * @access  public
     * @return  void
     */
    public function __construct($scope)
    {

        $this->scope = $scope;

    }

    /**
     * Set one member value.
     *
     * @param   string    the key
     * @param   mixed $value  the value
     * @access  public
     * @return  void
     */
    public function set($key, $value)
    {

        if($this->scope == 'post')
        {

            $_POST[$key] = $value;

        }
        elseif($this->scope == 'get')
        {
            $_GET[$key] = $value;
        }
        elseif($this->scope == 'server')
        {
            $_SERVER[$key] = $value;
        }
        elseif($this->scope == 'cookie')
        {
            $_COOKIE[$key] = $value;
        }

        //         elseif($this->scope == 'session')
        //         {
        //             $_SESSION[$key] = $value;
        //         }
        //         elseif($this->scope == 'env')
        //         {
        //             $_ENV[$key] = $value;
        //         }
        //         elseif($this->scope == 'global')
        //         {
        //             $GLOBAL[$key] = $value;
        //         }
    }

    /**
     * The magic get method.
     *
     * @param  string $key    the key
     * @access public
     * @return mixed|bool return the value of the key or false.
     */
    public function __get($key)
    {
        if($this->scope == 'post')
        {

            if(isset($_POST[$key])) return $_POST[$key];

            return false;

        }
        elseif($this->scope == 'get')
        {

            if(isset($_GET[$key])) return $_GET[$key];

            return false;

        }
        elseif($this->scope == 'server')
        {

            if(isset($_SERVER[$key])) return $_SERVER[$key];

            $key = strtoupper($key);

            if(isset($_SERVER[$key])) return $_SERVER[$key];

            return false;
        }
        elseif($this->scope == 'cookie')
        {

            if(isset($_COOKIE[$key])) return $_COOKIE[$key];

            return false;

        }
        //         elseif($this->scope == 'session')
        //         {
        //             if(isset($_SESSION[$key])) return $_SESSION[$key];
        //             return false;
        //         }
        //         elseif($this->scope == 'env')
        //         {
        //             if(isset($_ENV[$key])) return $_ENV[$key];
        //             return false;
        //         }
        //         elseif($this->scope == 'global')
        //         {
        //             if(isset($GLOBALS[$key])) return $GLOBALS[$key];
        //             return false;
        //         }
        else {

            return null;

        }
    }

    /**
     * Print the structure.
     *
     * @access public
     * @return void
     */
    //     public function a()
    //     {
    //         if($this->scope == 'post')    a($_POST);
    //         if($this->scope == 'get')     a($_GET);
    //         if($this->scope == 'server')  a($_SERVER);
    //         if($this->scope == 'cookie')  a($_COOKIE);
    //         if($this->scope == 'session') a($_SESSION);
    //         if($this->scope == 'env')     a($_ENV);
    //         if($this->scope == 'global')  a($GLOBAL);
    //     }
}