<?php
class clsModForm extends clsAppForm {
    public function validateSet() {

        $this->rules = array (
                "wxcontent" => array(
                        "required" => true ,
                ) ,
        );

        $this->messages = array (
                "wxcontent" => array(
                        "required"   => $this->lang->error->notempty,
                ),
        );
    }
}