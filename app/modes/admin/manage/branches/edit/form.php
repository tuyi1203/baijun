<?php
class clsModForm extends clsAppForm {

      public function validateSet() {

          $this->rules = array (
                            "name" => array(
                                    "required" => true ,
                                    "maxlength" => 10
                             ) ,
//                             "desc" => array(
//                                     "maxlength" => 100
//                             )
                        );

          $this->messages = array (
                          "name" => array(
                                  "required"   => $this->lang->error->notempty ,
                                  "maxlength"  => $this->lang->error->maxlength
                          ) ,
//                           "desc" => array(
//                                   "maxlength"  => $this->lang->error->maxlength
//                           )
                       );
    }
}