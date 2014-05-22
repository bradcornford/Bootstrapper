<?php namespace Cornford\Bootstrapper\Contracts;

interface AlertableInterface {

	/**
	 * Create a none alert item.
	 *
	 * @param string  $content
	 * @param string  $emphasis
	 * @param boolean $dismissible
	 * @param array   $attributes
	 *
	 * @return string
	 */
	public function none($content = null, $emphasis = null, $dismissible = false, array $attributes = array());

	/**
	 * Create a success alert item.
	 *
	 * @param string  $content
	 * @param string  $emphasis
	 * @param boolean $dismissible
	 * @param array   $attributes
	 *
	 * @return string
	 */
	public function success($content = null, $emphasis = null, $dismissible = false, array $attributes = array());

	/**
	 * Create an info alert item.
	 *
	 * @param string  $content
	 * @param string  $emphasis
	 * @param boolean $dismissible
	 * @param array   $attributes
	 *
	 * @return string
	 */
	public function info($content = null, $emphasis = null, $dismissible = false, array $attributes = array());

	/**
	 * Create a warning alert item.
	 *
	 * @param string  $content
	 * @param string  $emphasis
	 * @param boolean $dismissible
	 * @param array   $attributes
	 *
	 * @return string
	 */
	public function warning($content = null, $emphasis = null, $dismissible = false, array $attributes = array());

	/**
	 * Create a danger alert item.
	 *
	 * @param string  $content
	 * @param string  $emphasis
	 * @param boolean $dismissible
	 * @param array   $attributes
	 *
	 * @return string
	 */
	public function danger($content = null, $emphasis = null, $dismissible = false, array $attributes = array());

}
