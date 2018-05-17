<?php
class clsModForm extends clsAppForm {

      public function validateSet() {

          $this->rules = array (
                            "title" => array(
                                    "required" => true,
                                    "maxlength" => 200
                             ) ,
                            'keyword' => array(
                                    "maxlength" => 200
                             ),
                              "publishtime" => array(
                                      "datetime" => true
                              ),
                             'content' => array(
                                    "required" => true
                             ),
                        );

          $this->messages = array (
                          "title" => array(
                                  "required"   => $this->lang->error->notempty ,
                                  "maxlength"  => $this->lang->error->maxlength
                          ) ,
                          'keyword' => array(
                                  "maxlength" => $this->lang->error->maxlength
                          ),
                          "publishtime" => array(
                                  "datetime" => $this->lang->error->date
                          ),
                          'content' => array(
                                  "required" => $this->lang->error->notempty ,
                          ),
                       );
    }
}