<?php
	require 'functions.php';
	set_time_limit(-1); ini_set('memory_limit', '-1');
	$op = $_GET["op"];
	switch($op){
		case "getTable":getTable();break;

		default: echo "No se especificó alguna acción válida"; break;
	}

	function getTable(){
		require_once('../db/connectdb.php'); 
		$stmt = "SELECT * FROM gr_interes_letras;";
		$res = odbc_exec($connect, $stmt);
		$data = [];
		if(odbc_num_rows($res)>0){
			while ($fila = odbc_fetch_array($res)) {
				$fila = codifica($fila);
				$data[] = $fila;
			}
			echo json_encode(['success'=>true,'data'=>$data,'msg'=>'Elementos Encontrados']);
		}else {
			echo json_encode(['success'=>false,'msg'=>'No existe parametros registrado','data'=>[]]);
		}
		odbc_close($connect);
	}