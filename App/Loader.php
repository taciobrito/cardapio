<?php

namespace App;

class Loader{	
	public function registrar(){
		spl_autoload_register(array($this, 'autoload'));
	}

	public function autoload($classe){
		$classe = DIR.DS.str_replace("\\", DS, $classe).'.php';
		include_once $classe;
	}
}