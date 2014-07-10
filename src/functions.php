<?php

if (!function_exists('with')){
	function with($value){
		return $value;
	}
}

if (!function_exists('getho')){
	function getho($fn/*, $args...*/){
		ob_start();
		try{
			$res = call_user_func_array($fn, array_slice(func_get_args(), 1));
		}
		catch(Exception $e){
			$content = ob_get_clean();
			throw $e;
		}
		$content = ob_get_clean();
		return isset($res) ? $res : $content;
	}
}
