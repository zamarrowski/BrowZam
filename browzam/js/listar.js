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


function mostrarContenido (path) {
	$("#contentfolder").css("display","inherit");
	$.post("loadFolders.php",{path: path, preview: "1"},function (data){
		$("#contentfolder").html(data);
	});
	
}

function cerrarContenido () {
	$("#contentfolder").css("display","none");
}
