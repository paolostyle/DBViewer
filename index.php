<?php
	//powinno tu byc wszystko ok niezależnie od systemu itd.
	//ale jak coś nie działa to prawdopodobnie to jest przyczyna
	define('ROOT', dirname(__FILE__).DIRECTORY_SEPARATOR);
	define('APP', ROOT.'app'.DIRECTORY_SEPARATOR);

	require APP.'core/config.php';
	require APP.'misc/helper.php';
	require APP.'core/application.php';
	require APP.'core/controller.php';

	$app = new Application();
?>