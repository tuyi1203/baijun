/**
 * 城市管理大作战
 * 
 * @version 1.0 2017-11-1
 */
function loadImg(obj,duration){
	var loadObj = document.getElementById(obj);
	setTimeout(function(){
		loadObj.className = 'loading displayCenter dialogClose';
	},duration*1000);
}