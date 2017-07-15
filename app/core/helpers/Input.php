<?php
namespace  MyFrmwk\App\Core\Helpers;

/**
 * My MVC Framework
 *
 * @package	MyFrmwk
 * @author	andre board
 * @copyright	Copyright (c) 2016
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link
 * @since	Version 1.0.0
 * @filesource
 */
abstract class Input
{

	/*
	 * Input post filter
	 *
	 * @param mixed $value
	 * @returns mixed $value
	 */
	public static function input_post($value)
	{
		$value = filter_input(INPUT_POST, $value, FILTER_SANITIZE_SPECIAL_CHARS);
		return trim($value);
	}

	/*
	 * Input get filter
	 *
	 * @param mixed $value
	 * @returns mixed $value
	 */
	public static function input_get($value) {
		$value = filter_input( INPUT_GET, $value, FILTER_SANITIZE_SPECIAL_CHARS );

		return trim( $value );
	}

	/*
	 * Input postback filter
	 *
	 * @param mixed $value
	 * @returns mixed $value
	 */
	public static function input_post_back( $value ) {
		if ( isset( $_POST["{$value}"] ) ) {
			if ( filter_input( INPUT_POST, $value, FILTER_SANITIZE_SPECIAL_CHARS ) ) {
				return trim( $value );
			}

			return null;;
		}

		return null;
	}
}

