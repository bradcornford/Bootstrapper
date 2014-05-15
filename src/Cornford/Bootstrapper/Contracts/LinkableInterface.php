<?php namespace Cornford\Bootstrapper\Contracts;

interface LinkableInterface {

	/**
	 * Create a button link to url.
	 *
	 * @param string $url
	 * @param string $title
	 * @param array  $attributes
	 * @param string $secure
	 *
	 * @return string
	 */
	public function link($url, $title = null, array $attributes = array(), $secure = null);

	/**
	 * Create a secure button link to url.
	 *
	 * @param string $url
	 * @param string $title
	 * @param array  $attributes
	 * @param string $secure
	 *
	 * @return string
	 */
	public function secureLink($url, $title = null, array $attributes = array(), $secure = null);

	/**
	 * Create a button link to route.
	 *
	 * @param string $name
	 * @param string $title
	 * @param array  $parameters
	 * @param array  $attributes
	 *
	 * @return string
	 */
	public function linkRoute($name, $title = null, array $parameters = array(), array $attributes = array());

	/**
	 * Create a button link to action.
	 *
	 * @param string $action
	 * @param string $title
	 * @param array  $parameters
	 * @param array  $attributes
	 *
	 * @return string
	 */
	public function linkAction($action, $title = null, array $parameters = array(), array $attributes = array());

	/**
	 * Create a button link to an email address.
	 *
	 * @param string $email
	 * @param string $title
	 * @param array  $attributes
	 *
	 * @return string
	 */
	public function mailto($email, $title = null, array $attributes = array());

}
