<?php namespace Cornford\Bootstrapper\Contracts;

interface IncludableInterface {

	/**
	 * Include the Bootstrap CDN / Local CSS file
	 *
	 * @param string $type
	 * @param array  $attributes
	 *
	 * @return string
	 */
	public function css($type = 'cdn', array $attributes = array());

	/**
	 * Include the Bootstrap CDN JS file. Include jQuery CDN / Local JS file.
	 *
	 * @param string $type
	 * @param array $attributes
	 *
	 * @return string
	 */
	public function js($type = 'cdn', array $attributes = array());

}
