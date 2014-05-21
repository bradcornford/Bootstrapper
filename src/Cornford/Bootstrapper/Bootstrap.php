<?php namespace Cornford\Bootstrapper;

use Cornford\Bootstrapper\Contracts\IncludableInterface;
use Cornford\Bootstrapper\Contracts\FormableInterface;
use Cornford\Bootstrapper\Contracts\LinkableInterface;
use Cornford\Bootstrapper\Contracts\AlertableInterface;

class Bootstrap extends BootstrapBase implements IncludableInterface, FormableInterface, LinkableInterface, AlertableInterface {

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
				return $this->add('style', '//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css', $attributes);
				break;
			case 'local':
			default:
				return $this->add('style', asset('assets/css/bootstrap.min.css'), $attributes);
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
				return  $this->add('script', '//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js', $attributes) .
					$this->add('script', '//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js', $attributes);
				break;
			case 'local':
			default:
				return $this->add('script', asset('assets/js/jquery.min.js'), $attributes) .
					$this->add('script', asset('assets/js/bootstrap.min.js'), $attributes);
		}
	}

	/**
	 * Create a form text field.
	 *
	 * @param string  $name
	 * @param string  $label
	 * @param string  $value
	 * @param boolean $errors
	 * @param array   $options
	 *
	 * @return string
	 */
	public function text($name, $label = null, $value = null, $errors = false, array $options = array())
	{
		return $this->input('text', $name, $label, $value, $errors, $options);
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
		return $this->input('password', $name, $label, null, $errors, $options);
	}

	/**
	 * Create a form email field.
	 *
	 * @param string  $name
	 * @param string  $label
	 * @param string  $value
	 * @param boolean $errors
	 * @param array   $options
	 *
	 * @return string
	 */
	public function email($name, $label = null, $value = null, $errors = false, array $options = array())
	{
		return $this->input('email', $name, $label, $value, $errors, $options);
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
		return $this->input('file', $name, $label, null, $errors, $options);
	}

	/**
	 * Create a form textarea field.
	 *
	 * @param string  $name
	 * @param string  $label
	 * @param string  $value
	 * @param boolean $errors
	 * @param array   $options
	 *
	 * @return string
	 */
	public function textarea($name, $label = null, $value = null, $errors = false, array $options = array())
	{
		return $this->input('textarea', $name, $label, $value, $errors, $options);
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
		return $this->options($name, $label, $list, $selected, $options);
	}

	/**
	 * Create a form field.
	 *
	 * @param string  $name
	 * @param string  $label
	 * @param integer $value
	 * @param string  $checked
	 * @param array   $options
	 *
	 * @return string
	 */
	public function checkbox($name, $label = null, $value = 1, $checked = null, array $options = array())
	{
		return $this->field('checkbox', $name, $label, $value, $checked, $options);
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
		return $this->field('radio', $name, $label, $value, $checked, $options);
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
		return $this->action('submit', $value, $attributes);
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
		return $this->action('button', $value, $attributes);
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
		return $this->action('reset', $value, $attributes);
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
		return $this->hyperlink('link', $url, $title, $parameters = array(), $attributes, $secure);
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
		return $this->hyperlink('secureLink', $url, $title, array(), $attributes, $secure);
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
		return $this->hyperlink('linkRoute', $name, $title, $parameters, $attributes, null);
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
		return $this->hyperlink('linkAction', $action, $title, $parameters, $attributes, null);
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
		return $this->hyperlink('mailto', $email, $title, array(), $attributes, null);
	}

	/**
	 * Create a none alert item.
	 *
	 * @param string  $content
	 * @param boolean $dismissible
	 * @param array   $attributes
	 *
	 * @return string
	 */
	public function none($content = null, $dismissible = false, array $attributes = array())
	{
		return $this->alert('message', $content, $dismissible, $attributes);
	}

	/**
	 * Create a success alert item.
	 *
	 * @param string  $content
	 * @param boolean $dismissible
	 * @param array   $attributes
	 *
	 * @return string
	 */
	public function success($content = null, $dismissible = false, array $attributes = array())
	{
		return $this->alert('success', $content, $dismissible, $attributes);
	}

	/**
	 * Create an info alert item.
	 *
	 * @param string  $content
	 * @param boolean $dismissible
	 * @param array   $attributes
	 *
	 * @return string
	 */
	public function info($content = null, $dismissible = false, array $attributes = array())
	{
		return $this->alert('info', $content, $dismissible, $attributes);
	}

	/**
	 * Create a warning alert item.
	 *
	 * @param string  $content
	 * @param boolean $dismissible
	 * @param array   $attributes
	 *
	 * @return string
	 */
	public function warning($content = null, $dismissible = false, array $attributes = array())
	{
		return $this->alert('warning', $content, $dismissible, $attributes);
	}

	/**
	 * Create a danger alert item.
	 *
	 * @param string  $content
	 * @param boolean $dismissible
	 * @param array   $attributes
	 *
	 * @return string
	 */
	public function danger($content = null, $dismissible = false, array $attributes = array())
	{
		return $this->alert('danger', $content, $dismissible, $attributes);
	}

}