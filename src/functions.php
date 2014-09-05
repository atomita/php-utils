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

if (!function_exists('starts_with')){
	function starts_with($haystack, $needle)
	{
		return $needle === '' || strpos($haystack, $needle) === 0;
	}
}

if (!function_exists('ends_with')){
	function ends_with($haystack, $needle)
	{
		return $needle === '' || substr($haystack, -strlen($needle)) === $needle;
	}
}
