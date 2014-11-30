/*
* Author: @zamarrowski
*/
function loadFolder (path) {
	$.post("loadFolders.php",{path: path},function (data){
		$("#folders").html(data);
	});
	var body = $("#body");
	body.removeAttr("onload");
}

