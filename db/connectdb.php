<?php
	$connect = @odbc_connect("nebelta_test", "dba", "proyecto2014");
	if (!$connect){
		echo http_response_code(500);
		die();
	}