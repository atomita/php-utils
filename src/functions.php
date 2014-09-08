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

if (!function_exists('nondestructive_sort')){
	function nondestructive_sort(array $arr, $sort_flags = SORT_REGULAR)
	{
		$org = $arr;
		$success = sort($arr, $sort_flags);
		return $success ? $arr : $org;
	}
}

if (!function_exists('nondestructive_rsort')){
	function nondestructive_rsort(array $arr, $sort_flags = SORT_REGULAR)
	{
		$org = $arr;
		$success = rsort($arr, $sort_flags);
		return $success ? $arr : $org;
	}
}

if (!function_exists('nondestructive_asort')){
	function nondestructive_asort(array $arr, $sort_flags = SORT_REGULAR)
	{
		$org = $arr;
		$success = asort($arr, $sort_flags);
		return $success ? $arr : $org;
	}
}

if (!function_exists('nondestructive_arsort')){
	function nondestructive_arsort(array $arr, $sort_flags = SORT_REGULAR)
	{
		$org = $arr;
		$success = arsort($arr, $sort_flags);
		return $success ? $arr : $org;
	}
}

if (!function_exists('nondestructive_ksort')){
	function nondestructive_ksort(array $arr, $sort_flags = SORT_REGULAR)
	{
		$org = $arr;
		$success = ksort($arr, $sort_flags);
		return $success ? $arr : $org;
	}
}

if (!function_exists('nondestructive_krsort')){
	function nondestructive_krsort(array $arr, $sort_flags = SORT_REGULAR)
	{
		$org = $arr;
		$success = krsort($arr, $sort_flags);
		return $success ? $arr : $org;
	}
}

if (!function_exists('nondestructive_natsort')){
	function nondestructive_natsort(array $arr)
	{
		$org = $arr;
		$success = natsort($arr);
		return $success ? $arr : $org;
	}
}

if (!function_exists('nondestructive_natcasesort')){
	function nondestructive_natcasesort(array $arr)
	{
		$org = $arr;
		$success = natcasesort($arr);
		return $success ? $arr : $org;
	}
}

if (!function_exists('nondestructive_usort')){
	function nondestructive_usort(array $arr, $callback)
	{
		$org = $arr;
		$success = usort($arr, $callback);
		return $success ? $arr : $org;
	}
}

if (!function_exists('nondestructive_uksort')){
	function nondestructive_uksort(array $arr, $callback)
	{
		$org = $arr;
		$success = uksort($arr, $callback);
		return $success ? $arr : $org;
	}
}

if (!function_exists('nondestructive_uasort')){
	function nondestructive_uasort(array $arr, $callback)
	{
		$org = $arr;
		$success = uasort($arr, $callback);
		return $success ? $arr : $org;
	}
}
