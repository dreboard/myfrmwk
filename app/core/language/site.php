<?php
declare(strict_types=1);
/**
 * My MVC Framework
 *
 * @package	MyFrmwk\App
 * @author	andreboard
 * @copyright	Copyright (c) 2016
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link
 * @since	Version 0.1.0
 * @filesource
 */


function say($phrase)
{
	return htmlentities($phrase, ENT_QUOTES, 'UTF_8');
}

/**
 * @param string $phrase
 *
 * @return string
 */
function lang(string $phrase):string
{
	static $lang = array(
		'welcome_msg' => 'My Framework',
		'sections_head_title' => 'My Framework with Basic Bootstrap Template'
	);
	return htmlentities($lang[$phrase], ENT_QUOTES, 'UTF-8');
}


