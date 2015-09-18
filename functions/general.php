<?php

function seo_error(){ 
			header('HTTP/1.1 404 Not Found');
			header('Content-type: text/html; charset=utf-8');
			echo '<!DOCTYPE html>
										<html lang="en">
											<head>
												<meta charset="utf-8">
												<meta http-equiv="X-UA-Compatible" content="IE=edge">
												<title>Error: 404 Not Found</title>
												<meta name="description" content="Error: 404 Not Found">
												<meta name="viewport" content="width=device-width, initial-scale=1">
												<link rel="icon" href="/favicon.ico" type="image/x-icon" />
												<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
											</head>
											<body>The requested URL <strong>' . HTTP_SERVER . DIR_WS_CATALOG . (isset($_SERVER['PATH_INFO']) ? mb_substr($_SERVER['PATH_INFO'], 1) : (isset($_SESSION['_system']['web_scriptname']) ? $_SESSION['_system']['web_scriptname'] : '')) . '</strong> was not found on this server.</body>
										</html>';
			exit;
	}
?>