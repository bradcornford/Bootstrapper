<?php namespace Cornford\Bootstrapper\Contracts;

interface FormableInterface {

	/**
	 * Create a form text field.
	 *
	 * @param string                         $name
	 * @param string                         $label
	 * @param string                         $value
	 * @param \Illuminate\Support\MessageBag $errors
	 * @param array                          $options
	 *
	 * @return string
	 */
	public function text($name, $label = null, $value = null, $errors = null, array $options = array());

	/**
	 * Create a form password field.
	 *
	 * @param string                         $name
	 * @param string                         $label
	 * @param \Illuminate\Support\MessageBag $errors
	 * @param array                          $options
	 *
	 * @return string
	 */
	public function password($name, $label = null, $errors = null, array $options = array());

	/**
	 * Create a form email field.
	 *
	 * @param string                         $name
	 * @param string                         $label
	 * @param string                         $value
	 * @param \Illuminate\Support\MessageBag $errors
	 * @param array                          $options
	 *
	 * @return string
	 */
	public function email($name, $label = null, $value = null, $errors = null, array $options = array());

	/**
	 * Create a form file field.
	 *
	 * @param string                         $name
	 * @param string                         $label
	 * @param \Illuminate\Support\MessageBag $errors
	 * @param array                          $options
	 *
	 * @return string
	 */
	public function file($name, $label = null, $errors = null, array $options = array());

	/**
	 * Create a form date field.
	 *
	 * @param string                         $name
	 * @param string                         $label
	 * @param string                         $value
	 * @param \Illuminate\Support\MessageBag $errors
	 * @param array                          $options
	 * @param array                          $parameters
	 *
	 * @return string
	 */
	public function date($name, $label = null, $value = null, $errors = null, array $options = array(), array $parameters = array());

	/**
	 * Create a form datetime field.
	 *
	 * @param string                         $name
	 * @param string                         $label
	 * @param string                         $value
	 * @param \Illuminate\Support\MessageBag $errors
	 * @param array                          $options
	 * @param array                          $parameters
	 *
	 * @return string
	 */
	public function datetime($name, $label = null, $value = null, $errors = null, array $options = array(), array $parameters = array());

	/**
	 * Create a form time field.
	 *
	 * @param string                         $name
	 * @param string                         $label
	 * @param string                         $value
	 * @param \Illuminate\Support\MessageBag $errors
	 * @param array                          $options
	 * @param array                          $parameters
	 *
	 * @return string
	 */
	public function time($name, $label = null, $value = null, $errors = null, array $options = array(), array $parameters = array());

	/**
	 * Create a form textarea field.
	 *
	 * @param string                         $name
	 * @param string                         $label
	 * @param string                         $value
	 * @param \Illuminate\Support\MessageBag $errors
	 * @param array                          $options
	 *
	 * @return string
	 */
	public function textarea($name, $label = null, $value = null, $errors = null, array $options = array());

	/**
	 * Create a form select field.
	 *
	 * @param string                         $name
	 * @param string                         $label
	 * @param array                          $list
	 * @param string                         $selected
	 * @param \Illuminate\Support\MessageBag $errors
	 * @param array                          $options
	 *
	 * @return string
	 */
	public function select($name, $label = null, array $list = array(), $selected = null, $errors = null, array $options = array());

	/**
	 * Create a form checkbox field.
	 *
	 * @param string  $name
	 * @param string  $label
	 * @param integer $value
	 * @param string  $checked
	 * @param array   $options
	 *
	 * @return string
	 */
	public function checkbox($name, $label = null, $value = 1, $checked = null, array $options = array());

	/**
	 * Create a form radio field.
	 *
	 * @param string $name
	 * @param string $label
	 * @param string $value
	 * @param string $checked
	 * @param array  $options
	 *
	 * @return string
	 */
	public function radio($name, $label = null, $value = null, $checked = null, array $options = array());

	/**
	 * Create a form submit button.
	 *
	 * @param string $value
	 * @param array  $attributes
	 *
	 * @return string
	 */
	public function submit($value, array $attributes = array());

	/**
	 * Create a form button.
	 *
	 * @param string $value
	 * @param array  $attributes
	 *
	 * @return string
	 */
	public function button($value, array $attributes = array());

	/**
	 * Create a form reset button.
	 *
	 * @param string $value
	 * @param array  $attributes
	 *
	 * @return string
	 */
	public function reset($value, array $attributes = array());

}
