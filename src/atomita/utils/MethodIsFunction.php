<?php

namespace atomita\utils;

class MethodIsFunction implements \ArrayAccess
{
	protected $namespace = array();
	protected $isGetho = false;

	function __construct(array $namespace = array(), $is_ob_get = false)
	{
		$this->namespace = $namespace;
		$this->isGetho = $is_ob_get;
	}

	function __call($method, $args){
		$namespace = empty($this->namespace) ? '' : implode('\\', $this->namespace) . '\\';
		$func = $namespace . $method;
		if (!function_exists($func)){
			$func = '\\' . $namespace . $method;
			if (!function_exists($func)){
				throw new \BadFunctionCallException("\"{$func}\" is not found.");
			}
		}
		if ($this->isGetho){
			array_unshift($args, $func);
			$func = 'getho';
		}
		return call_user_func_array($func, $args);
	}

	function offsetExists($offset)
	{
		// @todo is 'namespace' value
		return true;
	}

	function offsetGet($offset)
	{
		if (!$this->offsetExists($offset)){
			throw new \OutOfBoundsException;
		}
		return new static(array_merge($this->namespace, array($offset)), $this->isGetho);
	}

	function offsetSet($offset, $value)
	{
		throw new \UnderflowException;
	}

	function offsetUnset($offset)
	{
		throw new \UnderflowException;
	}

	function __get($offset)
	{
		return $this->offsetGet($offset);
	}
}
