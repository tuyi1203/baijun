<?php
class clsModForm extends clsAppForm {
    public function validateSet() {

        $this->rules = array (
                "title" => array(
                        "required" => true ,
                        "maxlength" => 40
                ) ,
                "link" => array(
                        "required" => false ,
//                         "url"      => true
                ) ,
        );

        $this->messages = array (
                "title" => array(
                        "required"   => $this->lang->error->notempty ,
                        "maxlength"  => $this->lang->error->maxlength
                ) ,
                "link" => array(
                        "required"   => $this->lang->error->notempty ,
                        "url"        => $this->lang->error->url,
                ),
        );
    }
}