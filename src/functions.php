<?php

if (!function_exists('with')){
	function with($value){
		return $value;
	}
}

if (!function_exists('getho')){
	function getho($fn/*, $args...*/){
		ob_start();
		call_user_func_array($fn, array_slice(func_get_args(), 1));
		return ob_get_clean();
	}
}
