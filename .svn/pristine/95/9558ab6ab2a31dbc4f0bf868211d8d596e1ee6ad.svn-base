<?php
class clsModForm extends clsAppForm {

      public function validateSet() {

          $this->rules = array (
                            "title" => array(
                                    "required" => true,
                                    "maxlength" => 40
                             ) ,
                            'keyword' => array(
                                    "maxlength" => 40
                             ),
                              "publishtime" => array(
                                      "datetime" => true
                              ),
                             'summary' => array(
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
                          'summary' => array(
                                  "required" => $this->lang->error->notempty ,
                          ),
                       );
    }
}