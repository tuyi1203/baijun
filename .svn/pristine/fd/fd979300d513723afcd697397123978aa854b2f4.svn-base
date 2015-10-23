<?php
class clsModForm extends clsAppForm {

      public function validateSet() {

          $this->rules = array (
                            "title" => array(
                                    "maxlength" => 40
                             ) ,
                            "content" => array(
                                    "required" => true ,
                            ),
                          "content2" => array(
                                  "required" => true ,
                          ),
                            'keyword' => array(
                                    "maxlength" => 40
                             )
                        );

          $this->messages = array (
                          "title" => array(
                                  "maxlength"  => $this->lang->error->maxlength
                          ) ,
                          "content" => array(
                                  "required"   => $this->lang->error->notempty ,
                          ),
                          "content2" => array(
                                  "required"   => $this->lang->error->notempty ,
                          ),
                          'keyword' => array(
                                  "maxlength" => $this->lang->error->maxlength
                          )
                       );
    }
}