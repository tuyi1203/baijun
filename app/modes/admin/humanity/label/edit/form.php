<?php
class clsModForm extends clsAppForm {
    public function validateSet() {

        $this->rules = array (
                "title" => array(
                        "required" => true ,
                        "maxlength" => 40
                ) ,
        		"entitle" => array(
        				"required" => true ,
        				"maxlength" => 50
        		) ,
                // "link" => array(
                //         "required" => false ,
                //         "url"      => true
                // ) ,
                // "label" => array(
                //         "required" => false ,
                //         "maxlength" => 100
                // ) ,
        );

        $this->messages = array (
                "title" => array(
                		"required"    => $this->lang->error->notempty,
                        "maxlength"  => $this->lang->error->maxlength,
                ) ,
        		"entitle" => array(
                		"required"    => $this->lang->error->notempty,
                        "maxlength"   => $this->lang->error->maxlength,
                ) ,
                // "link" => array(
                //         "url"        => $this->lang->error->url,
                // ),
                // "label" => array(
                //         "maxlength"  => $this->lang->error->maxlength
                // ),
        );
    }
}