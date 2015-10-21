<?php
class clsModForm extends clsAppForm {
    public function validateSet() {

        $this->rules = array (
                "title" => array(
                        "required" => true ,
                        "maxlength"  => 40
                ) ,
                "house" => array(
                        "required" => true ,
                        "maxlength"  => 40
                ) ,
                "area" => array(
                        "required" => true ,
                        "maxlength"  => 10
                ) ,
                "sort" => array(
                        "required" => false ,
                        "int"        => true,
                        "intmin"     => 0 ,
                ),
                "price" => array(
                        "required" => false ,
                        "maxlength"  => 10
                ),
        );

        $this->messages = array (
                "title" => array(
                        "required"   => $this->lang->error->notempty,
                        "maxlength"  => $this->lang->error->maxlength
                ) ,
                "house" => array(
                        "required"   => $this->lang->error->notempty,
                        "maxlength"  => $this->lang->error->maxlength
                ),
                "area" => array(
                        "required"   => $this->lang->error->notempty,
                        "maxlength"  => $this->lang->error->maxlength
                ),
                "sort" => array(
                        "int"        => $this->lang->error->int[0],
                        "intmin"     => $this->lang->error->int[1],
                        //         		        "intmax"     => $this->lang->error->int[2],
                ) ,
                "price" => array(
                        "maxlength"  => $this->lang->error->maxlength
                ),
        );
    }
}