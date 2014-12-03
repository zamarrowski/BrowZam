<?php

function printFile($ext,$file,$path)
{
	$img = array(".png",".jpg",".jpeg",".bmp",".gif",".psd",".ai",".crd",".dwg",".svg");
	$cont=0;
	for ($f=0; $f < count($img); $f++) { 
		if($ext==$img[$f]||$ext==strtoupper($img[$f])){
			echo "<a id='$file' href='$path/$file' class='btn btn-success file fileimg'>$file<div><img class='imagenpreview' src='../img/pageview.png' onclick='viewCode(".'"'.$path."/".$file.'"'.");'></div></a>";
			$cont++;
		}

		
	}

	$audio = array(".mp3",".mid",".midi",".waw",".wma",".cda",".ogg",".ogm",".aac",".ac3",".flac",".mp4");

	for ($f=0; $f < count($audio); $f++) { 
		if($ext==$audio[$f]||$ext==strtoupper($audio[$f])){
			echo "<a id='$file' href='$path/$file' class='btn btn-success file fileaudio'>$file<div><img class='imagenpreview' src='../img/pageview.png' onclick='viewCode(".'"'.$path."/".$file.'"'.");'></div></a>";
			$cont++;
		}
	}

	if($ext==".php"){
		echo "<a id='$file' href='$path/$file' class='btn btn-success file filephp'>$file<div><img class='imagenpreview' src='../img/pageview.png' onclick='viewCode(".'"'.$path."/".$file.'"'.");'></div></a>";
			$cont++;
	}
	else if($ext==".html"){
		echo "<a id='$file' href='$path/$file' class='btn btn-success file filehtml'>$file<div><img class='imagenpreview' src='../img/pageview.png' onclick='viewCode(".'"'.$path."/".$file.'"'.");'></div></a>";
			$cont++;
	}else if($ext==".css"){
		echo "<a id='$file' href='$path/$file' class='btn btn-success file filecss'>$file<div><img class='imagenpreview' src='../img/pageview.png' onclick='viewCode(".'"'.$path."/".$file.'"'.");'></div></a>";
			$cont++;
	}
else if($ext==".js"){
		echo "<a id='$file' href='$path/$file' class='btn btn-success file filejs'>$file<div><img class='imagenpreview' src='../img/pageview.png' onclick='viewCode(".'"'.$path."/".$file.'"'.");'></div></a>";
			$cont++;
	}

	if($cont==0){
			echo "<a id='$file' href='$path/$file' class='btn btn-success file'>$file<div><img class='imagenpreview' src='../img/pageview.png' onclick='viewCode(".'"'.$path."/".$file.'"'.");'></div></a>";
		}

}

$path = $_REQUEST['path'];
$folder = opendir($path);
if(isset($_REQUEST['preview'])){
	$preview = $_REQUEST['preview'];
}
else{
	$preview=0;
}
while ($file = readdir($folder)) {
	if(is_dir("$path/$file")){
		if($file!="."){

			if($file==".."){
				echo '<span class="btn btn-default" id="btnatras" onclick="';
				echo "loadFolder('";
				echo $path."/".$file."')";
				echo '">';
				echo "Atrás";
				echo "</span>";
				if($preview!="1"){
					echo "<br>";
				}
				
			}else{

				echo '<span class="btn btn-primary folder" onclick="';
				echo "loadFolder('";
				echo $path."/".$file."')";
				echo '"';
				echo '>';
				echo $file;
				echo "<div id='#cajaimagen'>";
				echo "<img src='../img/eye.png'";
				echo 'onmouseover="';
				echo "mostrarContenido('";
				echo $path."/".$file."')";
				echo '"';
				echo 'onmouseout="cerrarContenido();">';
				echo "</div>";
				echo "</span>";
				if($preview!="1"){
					echo "<br>";
				}
			}
		}
}
	else{
		$ext = strrpos($file, ".");
		$ext = substr($file, $ext);
		printFile($ext,$file,$path);
		if($preview!="1"){
					echo "<br>";
				}
		}

	

}

closedir($folder);

?>