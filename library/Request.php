<?php

class Request{
	
	protected $url;
	protected $segmentos;
	protected $controller;
	protected $action;
	protected $defaultAction = 'index';
	protected $parametro;
	protected $defaultController = 'Home';

	public function __construct($url)
	{
		$this->url = $url;
		$this->segmentos = explode('/', $this->getUrl());
		$this->resolverUrl($this->segmentos);
		
	}
	public function getUrl(){
		return $this->url;
	}
	public function resolverUrl($segmentos){
		switch (count($segmentos)) {
			case 3:
				$this->controller = ucfirst($segmentos[0]);
				$this->action = $segmentos[1];
				$this->parametro = $segmentos[2];
			break;
			case 2:
				$this->controller = ucfirst($segmentos[0]);
				$this->action = $segmentos[1];
			break;
			case 1	:
				if ($segmentos[0] == "") {
					$segmentos[0] = $this->defaultController;
				}
				
				$this->controller = ucfirst($segmentos[0]);
				$this->action = $this->defaultAction;
			break;

		}
	}
	public function ejecutar(){
		$ruta = "controllers/".$this->controller. "Controller.php";
		$clase = $this->controller ."Controller";
		$action = $this->action . "Action";
		if(!file_exists($ruta))
		{
			exit('No se encuentra la ruta');
		}
		require_once $ruta;
		$obj = new $clase;
		$obj->$action();



	}
}

