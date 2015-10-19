<?php 
class View extends Response{

	protected $template;
	protected $vars = array();

	public function __construct($template, $vars  = array()){
		$this->template = $template;
		$this->vars = $vars;
	}

	public function execute(){
		extract($vars);
		require "views/$template.tpl.php";	
	}	
}