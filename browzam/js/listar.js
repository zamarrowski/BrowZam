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

function viewCode (path) {
	
	var position = path.lastIndexOf("/");
	var pathfile = path.substring(position+1);
	//alert(pathfile);
	var buttonfile = document.getElementById(pathfile);
	buttonfile.href="#";
	
	$("#previewContent").css("display","inherit");
	$("#closePreview").css("display","inherit");
	$("#envoltorio").css("display","inherit");
	var ajax = new XMLHttpRequest();
	ajax.open("GET","lector.php?path="+path);
	ajax.send();
	ajax.onreadystatechange=function  () {
		if(ajax.readyState==4&&ajax.status==200){
			var div = document.getElementById('previewContent');
			div.innerHTML=ajax.responseText;
		}
	};
	
	var closeButton = document.getElementById('closePreview');
	closeButton.setAttribute("onclick","closeButton('"+pathfile+"','"+path+"')");

}


function closeButton (pathfile,path) {
	$("#previewContent").css("display","none");
	$("#closePreview").css("display","none");
	$("#envoltorio").css("display","none");
	var buttonfile = document.getElementById(pathfile);
	buttonfile.href=path;

}