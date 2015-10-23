<?php
class clsModForm extends clsAppForm {

    public function validateSet()
    {
        $this->rules = array (
                "name" => array(
                        "required" => true
                ) ,
                "oid" => array(
                        "required" => true ,
                ),
                'appid' => array(
                        "required" => true ,
                ),
                'appsecret' => array(
                        "required" => true
                )
        );

        $this->messages = array (
                "name" => array(
                        "required"   => $this->lang->error->notempty ,
                ) ,
                "oid" => array(
                        "required"   => $this->lang->error->notempty ,
                ),
                'appid' => array(
                        "required"   => $this->lang->error->notempty ,
                ),
                'appsecret' => array(
                        "required"   => $this->lang->error->notempty
                )
        );
    }
}