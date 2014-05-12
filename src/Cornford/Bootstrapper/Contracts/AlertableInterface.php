<?php namespace Cornford\Bootstrapper\Contracts;

interface AlertableInterface {

	/**
	 * Create an alert none item.
	 *
	 * @param string  $content
	 * @param array   $attributes
	 * @param boolean $dismissable
	 */
	public function alertNone($content = null, $dismissable = false, array $attributes = array());

	/**
	 * Create an alert success item.
	 *
	 * @param string  $content
	 * @param array   $attributes
	 * @param boolean $dismissable
	 */
	public function alertSuccess($content = null, $dismissable = false, array $attributes = array());

	/**
	 * Create an alert info item.
	 *
	 * @param string  $content
	 * @param array   $attributes
	 * @param boolean $dismissable
	 */
	public function alertInfo($content = null, $dismissable = false, array $attributes = array());

	/**
	 * Create an alert warning item.
	 *
	 * @param string  $content
	 * @param array   $attributes
	 * @param boolean $dismissable
	 */
	public function alertWarning($content = null, $dismissable = false, array $attributes = array());

	/**
	 * Create an alert danger item.
	 *
	 * @param string  $content
	 * @param array   $attributes
	 * @param boolean $dismissable
	 */
	public function alertDanger($content = null, $dismissable = false, array $attributes = array());

}
