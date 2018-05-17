/**
 * 重庆百君律师事务所
 * 
 * @version 1.0 2018-5-5
 */

define(["jquery"],function (){
	var windowHt = window.height;
	var script = {};

	// var handler = function() {
	// 	event.preventDefault();
	// };
	var fullPage = function(dom){
		var $dom = $(dom);
		$dom.css('height',window.innerHeight);
	}


	//script.nav = nav;
	script.fullPage = fullPage;
	return script;
});
