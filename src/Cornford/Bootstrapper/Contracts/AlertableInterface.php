<?php namespace Cornford\Bootstrapper\Contracts;

interface AlertableInterface {

	/**
	 * Create a none alert item.
	 *
	 * @param string  $content
     * @param boolean $dismissible
     * @param array   $attributes
	 *
	 * @return string
	 */
	public function none($content = null, $dismissible = false, array $attributes = array());

	/**
	 * Create a success alert item.
	 *
	 * @param string  $content
     * @param boolean $dismissible
     * @param array   $attributes
	 *
	 * @return string
	 */
	public function success($content = null, $dismissible = false, array $attributes = array());

	/**
	 * Create an info alert item.
	 *
	 * @param string  $content
     * @param boolean $dismissible
     * @param array   $attributes
	 *
	 * @return string
	 */
	public function info($content = null, $dismissible = false, array $attributes = array());

	/**
	 * Create a warning alert item.
	 *
	 * @param string  $content
     * @param boolean $dismissible
     * @param array   $attributes
	 *
	 * @return string
	 */
	public function warning($content = null, $dismissible = false, array $attributes = array());

	/**
	 * Create a danger alert item.
	 *
	 * @param string  $content
     * @param boolean $dismissible
     * @param array   $attributes
	 *
	 * @return string
	 */
	public function danger($content = null, $dismissible = false, array $attributes = array());

}
