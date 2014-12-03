<?php
/**
* 
*/
class Lector
{
	private $path;
	function __construct($path)
	{
		$this->path=$path;
	}

	public function view()
	{
		$path = $this->path;
		$file = file($path);
		for ($f=0; $f < count($file); $f++) { 	

			$file[$f] = preg_replace("/".chr(9)."/", "&nbsp;&nbsp;&nbsp;", $file[$f]);
			$file[$f] = preg_replace("/</", "&lt;", $file[$f]);
			$file[$f] = preg_replace("/>/", "&gt;", $file[$f]);
			
			$file[$f] = nl2br($file[$f]);	
	
			echo $file[$f];

		}
	}
}

$path = $_REQUEST['path'];
$lector = new Lector($path);
$lector->view();
?>	