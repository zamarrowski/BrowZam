<?php

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
		echo "<a class='btn btn-success file' href='$path/$file'>$file</a>";
		if($preview!="1"){
					echo "<br>";
				}
		}

	

}

closedir($folder);

?>