<?php 

	function __autoload($classe){
		
		$path = str_replace("_", "/", $classe);
		require_once $path.'.php';
		
	}
	
	