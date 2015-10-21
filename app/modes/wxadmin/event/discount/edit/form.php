<?php
class clsModForm extends clsAppForm {
    public function validateSet() {

        $this->rules = array (
                "title" => array(
                        "required" => false ,
                        "maxlength" => 40
                ) ,
                "desc" => array(
                        "required" => true ,
                ) ,
        );

        $this->messages = array (
                "title" => array(
                        "maxlength"  => $this->lang->error->maxlength
                ) ,
                "desc" => array(
                        "required"  => $this->lang->error->notempty
                ) ,
        );
    }
}