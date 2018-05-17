<?php
class clsModForm extends clsAppForm {
    public function validateSet() {

        $this->rules = array (
        		"firstname" => array(
        				"required"   => true ,
        				"maxlength"  => 10
        		) ,
        		"lastname" => array(
        				"required"   => true ,
        				"maxlength"  => 10
        		) ,
        		"pinyinfirst" => array(
        				"required"   => true ,
        				"maxlength"  => 1
        		) ,
        		"pinyinlast" => array(
        				"required"   => true ,
        				"maxlength"  => 1
        		) ,
        		"zhiyelinian" => array(
        				"required"   => true
        		),
        		"zhiyelingyu" => array(
        				"required"   => true,
        				"maxlength" => 100
        		),
        		"zhuanyezige" => array(
        				"required"   => true,
        		),
//        		"daibiaoyeji" => array(
//        				"required"   => true,
//        		),
//        		"daibiaokehu" => array(
//        				"required"   => true,
//        		),
//        		"xueshuchengguo" => array(
//        				"required"   => true,
//        		),
//        		"tel" => array(
//        				"required"   => true,
//        				"tel"        => true
//        		),
        		"email" => array(
        				"required"   => true,
        				"email"      => true
        		),
				"sort" => array(
					"required"   => false,
					"int"      => true,
					"intmin"  => 0,
					"intmax" => 9999
				),
        		"worklanguage" => array(
        				"required"   => true,
        		),
        		"subfield" => array(
        				"required"   => true,
        		),
        );

        $this->messages = array (
        		"firstname" => array(
        				"required"   => $this->lang->error->notempty,
//         				"alphalower" => $this->lang->error->alphalower,
        				"maxlength"  => $this->lang->error->maxlength
        		) ,
        		"lastname" => array(
        				"required"   => $this->lang->error->notempty,
        				//         				"alphalower" => $this->lang->error->alphalower,
        				"maxlength"  => $this->lang->error->maxlength
        		) ,
        		"pinyinfirst" => array(
        				"required"   => $this->lang->error->notempty,
        				"maxlength"  => $this->lang->error->maxlength
        		) ,
        		"pinyinlast" => array(
        				"required"   => $this->lang->error->notempty,
        				"maxlength"  => $this->lang->error->maxlength
        		) ,
        		"zhiyelinian" => array(
        				"required"   => $this->lang->error->notempty,
        		),
        		"zhiyelingyu" => array(
        				"required"   => $this->lang->error->notempty,
        				"maxlength" => $this->lang->error->maxlength
        		),
        		"zhuanyezige" => array(
        				"required"   => $this->lang->error->notempty,
        		),
        		"daibiaoyeji" => array(
        				"required"   => $this->lang->error->notempty,
        		),
        		"daibiaokehu" => array(
        				"required"   => $this->lang->error->notempty,
        		),
        		"xueshuchengguo" => array(
        				"required"   => $this->lang->error->notempty,
        		),
        		"tel" => array(
        				"required"   => $this->lang->error->notempty,
        				"tel"        => $this->lang->error->tel
        		),
				"sort" => array(
					"int"      => $this->lang->error->int[0],
					"intmin"  => $this->lang->error->int[1],
					"intmax" => $this->lang->error->int[2]
				),
        		"email" => array(
        				"required"   => $this->lang->error->notempty,
        				"email"      => $this->lang->error->email
        		),
        		"worklanguage" => array(
        				"required"   => $this->lang->error->notempty,
        		),
        		"subfield" => array(
        				"required"   => $this->lang->error->notempty,
        		),
        );
    }
}