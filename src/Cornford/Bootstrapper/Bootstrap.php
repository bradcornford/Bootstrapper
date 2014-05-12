<?php namespace Cornford\Bootstrapper;

use Cornford\Bootstrapper\Contracts\IncludableIterface;
use Cornford\Bootstrapper\Contracts\FormableInterface;
use Cornford\Bootstrapper\Contracts\LinkableInterface;
use Cornford\Bootstrapper\Contracts\AlertableInterface;
use Illuminate\Support\Facades\Form;
use Illuminate\Support\Facades\HTML;
use Illuminate\Support\Facades\Input;

class Bootstrap implements IncludableIterface, FormableInterface, LinkableInterface, AlertableInterface {

	/**
	 * Include the Bootstrap CDN / Local CSS file
	 *
	 * @param string $type
	 * @param array  $attributes
	 *
	 * @return string
	 */
	public function css($type = 'cdn', array $attributes = array())
	{
		switch($type)
		{
			case 'cdn':
				return HTML::style('//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css', $attributes);
				break;
			default:
				return HTML::style(asset('assets/css/bootstrap.min.css'), $attributes);
		}
	}

	/**
	 * Include the Bootstrap CDN JS file. Include jQuery CDN / Local JS file.
	 *
	 * @param string $type
	 * @param array $attributes
	 *
	 * @return string
	 */
	public function js($type = 'cdn', array $attributes = array())
	{
		switch($type)
		{
			case 'cdn':
				return  HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js', $attributes) .
					HTML::script('//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js', $attributes);
				break;
			default:
				return HTML::script(asset('assets/js/jquery.min.js'), $attributes) .
					HTML::script(asset('assets/js/bootstrap.min.js'), $attributes);
		}
	}

	/**
	 * Generate a hidden field with the current CSRF token.
	 *
	 * @return string
	 */
	public function token()
	{
		return Form::token();
	}

	/**
	 * Create a form input field.
	 *
	 * @param string  $type
	 * @param string  $name
	 * @param string  $label
	 * @param boolean $errors
	 * @param array   $options
	 *
	 * @return string
	 */
	protected function input($type = 'text', $name, $label = false, $errors = false, array $options = array())
	{
		$options = array_merge(array('class' => 'form-control', 'placeholder' => $label), $options);

		$return = '<div class="form-group ' . (!$errors ? '' : (!$errors->has($name) ?: 'has-error')) . '">';

		$return .= $label ? Form::label($name, $label) : '';

		switch ($type) {
			case 'password':
			case 'file':
				$return .= Form::$type($name, $options);
				break;
			case 'text':
			case 'hidden':
			case 'email':
			case 'textarea':
				$return .= Form::$type($name, Input::get($name), $options);
				break;
			default:
				$return .= Form::input($type, $name, Input::get($name), $options);
		}

		$return .= !$errors ? '' : $errors->has($name) ? $errors->first($name, '<span class="help-block">:message</span>') : '';

		$return .= '</div>';

		return $return;
	}

	/**
	 * Create a form text field.
	 *
	 * @param string  $name
	 * @param string  $label
	 * @param boolean $errors
	 * @param array   $options
	 *
	 * @return string
	 */
	public function text($name, $label = null, $errors = false, array $options = array())
	{
		return $this->input('text', $name, $label, $errors, $options);
	}

	/**
	 * Create a form password field.
	 *
	 * @param string  $name
	 * @param string  $label
	 * @param boolean $errors
	 * @param array   $options
	 *
	 * @return string
	 */
	public function password($name, $label = null, $errors = false, array $options = array())
	{
		return $this->input('password', $name, $label, $errors, $options);
	}

	/**
	 * Create a form email field.
	 *
	 * @param string  $name
	 * @param string  $label
	 * @param boolean $errors
	 * @param array   $options
	 *
	 * @return string
	 */
	public function email($name, $label = null, $errors = false, array $options = array())
	{
		return $this->input('email', $name, $label, $errors, $options);
	}

	/**
	 * Create a form file field.
	 *
	 * @param string  $name
	 * @param string  $label
	 * @param boolean $errors
	 * @param array   $options
	 *
	 * @return string
	 */
	public function file($name, $label = null, $errors = false, array $options = array())
	{
		return $this->input('file', $name, $label, $errors, $options);
	}

	/**
	 * Create a form textarea field.
	 *
	 * @param string  $name
	 * @param string  $label
	 * @param boolean $errors
	 * @param array   $options
	 *
	 * @return string
	 */
	public function textarea($name, $label = null, $errors = false, array $options = array())
	{
		return $this->input('textarea', $name, $label, $errors, $options);
	}

	/**
	 * Create a form select field.
	 *
	 * @param string $name
	 * @param string $label
	 * @param array  $list
	 * @param string $selected
	 * @param array  $options
	 *
	 * @return string
	 */
	public function select($name, $label = null, array $list = array(), $selected = null, array $options = array())
	{
		$options = array_merge(array('class' => 'form-control'), $options);
		$return = $label ? Form::label($name, $label) : '';
		$return .= Form::select($name, $list, $selected, $options);

		return $return;
	}

	/**
	 * Create a form checkbox field.
	 *
	 * @param string $name
	 * @param string $label
	 * @param string $value
	 * @param string $checked
	 * @param array  $options
	 *
	 * @return string
	 */
	public function checkbox($name, $label = null, $value = 1, $checked = null, array $options = array())
	{
		$return = '<div class="checkbox">';

		$return .= $label ? Form::label($name, $label) : '';
		$return .= Form::checkbox($name, $value, $checked, $options);

		$return .= '</div>';

		return $return;
	}

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
	public function radio($name, $label = null, $value = null, $checked = null, array $options = array())
	{
		$return = '<div class="radio">';

		$return .= $label ? Form::label($name, $label) : '';
		$return .= Form::checkbox($name, $value, $checked, $options);

		$return .= '</div>';

		return $return;
	}

	/**
	 * Create a form submit button.
	 *
	 * @param string $value
	 * @param array  $attributes
	 *
	 * @return string
	 */
	public function submit($value, array $attributes = array())
	{
		$attributes = array_merge(array('class' => 'btn btn-primary pull-right'), $attributes);

		return Form::submit($value, $attributes);
	}

	/**
	 * Create a form button.
	 *
	 * @param string $value
	 * @param array  $attributes
	 *
	 * @return string
	 */
	public function button($value, array $attributes = array())
	{
        $attributes = array_merge(array('class' => 'btn btn-default'), $attributes);

		return Form::button($value, $attributes);
	}

	/**
	 * Create a form reset button.
	 *
	 * @param string $value
	 * @param array  $attributes
	 *
	 * @return string
	 */
	public function reset($value, array $attributes = array())
	{
		$attributes = array_merge(array('class' => 'btn btn-default'), $attributes);

		return Form::reset($value, $attributes);
	}

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
	public function link($url, $title = null, array $attributes = array(), $secure = null)
	{
		$attributes = array_merge(array('class' => 'btn btn-default'), $attributes);

		return HTML::link($url, $title, $attributes, $secure);
	}

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
	public function secureLink($url, $title = null, array $attributes = array(), $secure = null)
	{
		$attributes = array_merge(array('class' => 'btn btn-default'), $attributes);

		return HTML::secureLink($url, $title, $attributes, $secure);
	}

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
	public function linkRoute($name, $title = null, array $parameters = array(), array $attributes = array())
	{
		$attributes = array_merge(array('class' => 'btn btn-default'), $attributes);

		return HTML::linkRoute($name, $title, $parameters, $attributes);
	}

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
	public function linkAction($action, $title = null, array $parameters = array(), array $attributes = array())
	{
		$attributes = array_merge(array('class' => 'btn btn-default'), $attributes);

		return HTML::link($action, $title, $parameters, $attributes);
	}

	/**
	 * Create a button link to an email address.
	 *
	 * @param string $email
	 * @param string $title
	 * @param array  $attributes
	 *
	 * @return string
	 */
	public function mailto($email, $title = null, array $attributes = array())
	{
		$attributes = array_merge(array('class' => 'btn btn-default'), $attributes);

		return HTML::mailto($email, $title, $attributes);
	}

	/**
	 * Create an alert item.
	 *
	 * @param string  $type
	 * @param string  $content
	 * @param array   $attributes
	 * @param boolean $dismissible
	 *
	 * @return string
	 */
	protected function alert($type = 'message', $content = null, $dismissible = false, array $attributes = array())
	{
		$attributes = array_merge(array('class' => 'alert ' . ($dismissible ? 'alert-dismissable ' : '') . 'alert-' . $type), $attributes);

		$return = '<div ' . HTML::attributes($attributes) . '>';

		$return .= $dismissible ? ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' : '';
 		$return .= '<strong>' . ucwords($type) . '!</strong> ' . $content;

		$return .= '</div>';

		return $return;
	}

	/**
	 * Create an alert none item.
	 *
	 * @param string  $content
	 * @param array   $attributes
	 * @param boolean $dismissible
	 *
	 * @return string
	 */
	public function alertNone($content = null, $dismissible = false, array $attributes = array())
	{
		return $this->alert('message', $content, $dismissible, $attributes);
	}

	/**
	 * Create an alert success item.
	 *
	 * @param string  $content
	 * @param array   $attributes
	 * @param boolean $dismissible
	 *
	 * @return string
	 */
	public function alertSuccess($content = null, $dismissible = false, array $attributes = array())
	{
		return $this->alert('success', $content, $dismissible, $attributes);
	}

	/**
	 * Create an alert info item.
	 *
	 * @param string  $content
	 * @param array   $attributes
	 * @param boolean $dismissible
	 *
	 * @return string
	 */
	public function alertInfo($content = null, $dismissible = false, array $attributes = array())
	{
		return $this->alert('info', $content, $dismissible, $attributes);
	}

	/**
	 * Create an alert warning item.
	 *
	 * @param string  $content
	 * @param array   $attributes
	 * @param boolean $dismissible
	 *
	 * @return string
	 */
	public function alertWarning($content = null, $dismissible = false, array $attributes = array())
	{
		return $this->alert('warning', $content, $dismissible, $attributes);
	}

	/**
	 * Create an alert danger item.
	 *
	 * @param string  $content
	 * @param array   $attributes
	 * @param boolean $dismissible
	 *
	 * @return string
	 */
	public function alertDanger($content = null, $dismissible = false, array $attributes = array())
	{
		return $this->alert('danger', $content, $dismissible, $attributes);
	}

}