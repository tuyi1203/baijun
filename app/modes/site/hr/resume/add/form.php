<?php
class clsModForm extends clsAppForm {

      public function validateSet() {

                    $this->rules = array (
                            "name" => array(
                                    "required" => true ,
                                    "maxlength" => 10
                             ) ,
                    		"xingbie" => array(
                    				"required" => true ,
                    		),
                    		"shengri" => array(
                    				"required" => true ,
                    				"datetime" => true
                    		),
                    		"shenfenzheng" => array(
                    				"required" => true ,
                    				"idcard" => true
                    		),
                    		"minzu" => array(
                    				"required" => true ,
                    				"maxlength" => 10
                    		),
                    		"zhengzhi" => array(
                    				"required" => true ,
                    		),
                    		"jiguan" => array(
                    				"required" => true ,
                    				"maxlength" => 30
                    		),
                    		"hunyin" => array(
                    				"required" => true ,
                    		),
                    		"jiankang" => array(
                    				"maxlength" => 30
                    		),
                    		"shengao" => array(
                    				"maxlength" => 3
                    		),
                    		"tizhong" => array(
                    				"maxlength" => 3
                    		),
                    		"xueli" => array(
                    				"required" => true ,
                    				"maxlength" => 30
                    		),
                    		"zhuanye" => array(
                    				"required" => true ,
                    				"maxlength" => 30
                    		),
                    		"yuanxiao" => array(
                    				"required" => true ,
                    				"maxlength" => 150
                    		),
                    		"hukou" => array(
                    				"required" => true ,
                    				"maxlength" => 150
                    		),
                    		"jisuanji" => array(
                    				"maxlength" => 30
                    		),
                    		"jiashi" => array(
                    				"maxlength" => 30
                    		),
                    		"guoyu" => array(
                    				"maxlength" => 30
                    		),
                    		"waiyu" => array(
                    				"maxlength" => 30
                    		),
                    		"peixun" => array(
                    				"maxlength" => 1000
                    		),
                    		"gongzuo" => array(
                    				"maxlength" => 1000
                    		),
                    		"yeji" => array(
                    				"maxlength" => 1000
                    		),
                    		"jiating" => array(
                    				"maxlength" => 1000
                    		),
                    		"bumen" => array(
                    				"required" => true ,
                    				"maxlength" => 100
                    		),
                    		"zhiwei" => array(
                    				"required" => true ,
                    				"maxlength" => 100
                    		),
                    		"yaoqiu" => array(
                    				"maxlength" => 1000
                    		),
                    		"dianhua" => array(
                    				"required" => true ,
                    				"tel" => true
                    		),
                    		"youxiang" => array(
                    				"required" => true ,
                    				"email" => true
                    		),
                    		"qq" => array(
                    				"maxlength" => 11
                    		),
                    		"dizhi" => array(
                    				"required" => true ,
                    				"maxlength" => 180
                    		),
                        );

          $this->messages = array (
                          "name" => array(
                                  "required"   => $this->lang->error->notempty ,
                                  "maxlength"  => $this->lang->error->maxlength
                          ) ,
			          	 "xingbie" => array(
			          			"required"   => $this->lang->error->notempty ,
			          	 ) ,
		          		"shengri" => array(
		          				"required"   => $this->lang->error->notempty ,
		          				"datetime"   => $this->lang->error->date
		          		) ,
		          		"shenfenzheng" => array(
		          				"required"   => $this->lang->error->notempty ,
		          				"idcard"   => $this->lang->error->idcard
		          		) ,
		          		"minzu" => array(
		          				"required"   => $this->lang->error->notempty ,
		          				"maxlength"  => $this->lang->error->maxlength
		          		) ,
			          		"zhengzhi" => array(
			          				"required"   => $this->lang->error->notempty ,
			          		) ,
			          		"jiguan" => array(
			          				"required"   => $this->lang->error->notempty ,
			          				"maxlength"  => $this->lang->error->maxlength
			          		) ,
			          		"hunyin" => array(
			          				"required"   => $this->lang->error->notempty ,
			          		) ,
			          		"jiankang" => array(
			          				"maxlength"  => $this->lang->error->maxlength
			          		) ,
			          		"shengao" => array(
			          				"maxlength"  => $this->lang->error->maxlength
			          		) ,
			          		"tizhong" => array(
			          				"maxlength"  => $this->lang->error->maxlength
			          		) ,
			          		"xueli" => array(
			          				"required"   => $this->lang->error->notempty ,
			          				"maxlength"  => $this->lang->error->maxlength
			          		) ,
			          		"zhuanye" => array(
			          				"required"   => $this->lang->error->notempty ,
			          				"maxlength"  => $this->lang->error->maxlength
			          		) ,
			          		"yuanxiao" => array(
			          				"required"   => $this->lang->error->notempty ,
			          				"maxlength"  => $this->lang->error->maxlength
			          		) ,
			          		"hukou" => array(
			          				"required"   => $this->lang->error->notempty ,
			          				"maxlength"  => $this->lang->error->maxlength
			          		) ,
			          		"jisuanji" => array(
			          				"maxlength"  => $this->lang->error->maxlength
			          		) ,
			          		"jiashi" => array(
			          				"maxlength"  => $this->lang->error->maxlength
			          		) ,
			          		"guoyu" => array(
			          				"maxlength"  => $this->lang->error->maxlength
			          		) ,
			          		"waiyu" => array(
			          				"maxlength"  => $this->lang->error->maxlength
			          		) ,
			          		"peixun" => array(
			          				"maxlength"  => $this->lang->error->maxlength
			          		) ,
			          		"gongzuo" => array(
			          				"maxlength"  => $this->lang->error->maxlength
			          		) ,
			          		"yeji" => array(
			          				"maxlength"  => $this->lang->error->maxlength
			          		) ,
			          		"techang" => array(
			          				"maxlength"  => $this->lang->error->maxlength
			          		) ,
			          		"jiating" => array(
			          				"maxlength"  => $this->lang->error->maxlength
			          		) ,
			          		"bumen" => array(
			          				"required"   => $this->lang->error->notempty ,
			          				"maxlength"  => $this->lang->error->maxlength
			          		) ,
			          		"zhiwei" => array(
			          				"required"   => $this->lang->error->notempty ,
			          				"maxlength"  => $this->lang->error->maxlength
			          		) ,
			          		"yaoqiu" => array(
			          				"maxlength"  => $this->lang->error->maxlength
			          		) ,
          				  "dianhua" => array(
          				  		"required"   => $this->lang->error->notempty ,
          				  		"tel"        => $this->lang->error->tel
                          ),
			          		"youxiang" => array(
			          				"required"   => $this->lang->error->notempty ,
			          				"email"        => $this->lang->error->email
			          		),
			          		"dizhi" => array(
			          				"required"   => $this->lang->error->notempty ,
			          				"maxlength"  => $this->lang->error->maxlength
			          		),
                          "qq" => array(
                          		  "maxlength"  => $this->lang->error->maxlength
                          ),

                       );
    }
}