<?php

namespace atomita\utils;

trait PartiallyReadablePropertyTrait {

	function __get($name) {
		if (!is_string($name)) {
			throw new \InvalidArgumentException('String required');
		}
		if (!property_exists($this, $name)) {
			throw new \OutOfRangeException("Undefined property: $name");
		}
		if ((isset(static::$__readable) && !in_array($name, (array)static::$__readable, true)) ||
		(isset(static::$__unreadable) && in_array($name, (array)static::$__unreadable, true))) {
			throw new \OutOfRangeException("Inaccessible property: $name");
		}

		return $this->$name;
	}

	function __isset($name) {
		try {
			return $this->__get($name) !== null;
		} catch (\Exception $e) {
			return false;
		}
	}

}
