<?php 

	function codifica($data){
		$fila = [];
		foreach ($data as $key => $value) {
			$fila [$key] = utf8_encode($value);
		}
		return $fila;
	}