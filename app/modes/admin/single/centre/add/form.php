<?php
class clsModForm extends clsAppForm {
    public function validateSet() {

        $this->rules = array (
                "title" => array(
                        "required" => true ,
                        "maxlength" => 40
                ) ,
                "hotitems" => array(
                        "required" => true ,
                ) ,
                "desc" => array(
                        "required" => true ,
                ) ,
        );

        $this->messages = array (
                "title" => array(
                        "required"   => $this->lang->error->notempty ,
                        "maxlength"  => $this->lang->error->maxlength
                ) ,
                "hotitems" => array(
                        "required"   => $this->lang->error->notempty ,
                ),
                "desc" => array(
                        "required"   => $this->lang->error->notempty ,
                ),
        );
    }
}