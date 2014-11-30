<?php

$path = $_REQUEST['path'];
$folder = opendir($path);
while ($file = readdir($folder)) {
	if(is_dir("$path/$file")){
		if($file!="."){

			if($file==".."){
				echo '<span class="btn btn-default" onclick="';
				echo "loadFolder('";
				echo $path."/".$file."')";
				echo '">';
				echo "Atrás";
				echo "</span>";
				echo "<br>";
			}else{

				echo '<span class="btn btn-primary folder" onclick="';
				echo "loadFolder('";
				echo $path."/".$file."')";
				echo '">';

				echo $file;
				echo "</span>";
				echo "<br>";
			}
		}
}
	else{
		echo "<a class='btn btn-success file' href='$path/$file'>$file</a>";
		echo "<br>";
		}

	

}

closedir($folder);

?>