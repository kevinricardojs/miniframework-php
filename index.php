<?php
	

	/* 
	 * El Frontend se encarga de configurar nuestra app
	 */
	require 'config.php';
	require 'helpers.php';
	require 'library/Request.php';

	if (empty($_GET['url'])) {
		$url = "";
	}
	else
	{
		$url = $_GET['url'];
	}
 	
 	echo $url;
 	echo "<br>";
	$request = new Request($url);
	$request->ejecutar();


	