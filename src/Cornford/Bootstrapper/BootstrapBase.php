<?php namespace Cornford\Bootstrapper;

namespace Cornford\Bootstrapper;

use Illuminate\Html\FormBuilder as Form;
use Illuminate\Html\HtmlBuilder as HTML;
use Illuminate\Http\Request as Input;

abstract class BootstrapBase {

	/**
	 * Form
	 *
	 * @var \Illuminate\Html\FormBuilder
	 */
	protected $form;

	/**
	 * HTML
	 *
	 * @var \Illuminate\Html\HtmlBuilder
	 */
	protected $html;

	/**
	 * Input
	 *
	 * @var \Illuminate\Http\Request
	 */
	protected $input;

	public function __construct(Form $form, HTML $html, Input $input)
	{
		$this->form = $form;
		$this->html = $html;
		$this->input = $input;
	}

	/**
	 * Include the Bootstrap file
	 *
	 * @param string $type
	 * @param string $location
	 * @param array  $attributes
	 *
	 * @return string
	 */
	protected function add($type, $location, array $attributes = array())
	{
		return $this->html->$type(asset($location), $attributes);
	}

	/**
	 * Create a form input field.
	 *
	 * @param string                         $type
	 * @param string                         $name
	 * @param string                         $value
	 * @param string                         $label
	 * @param \Illuminate\Support\MessageBag $errors
	 * @param array                          $options
	 *
	 * @return string
	 */
	protected function input($type = 'text', $name, $label = null, $value = null, $errors = null, array $options = array())
	{
		$options = array_merge(array('class' => 'form-control', 'placeholder' => $label), $options);
		$return = '<div class="form-group';

		if ($errors && $errors->has($name)) {
			$return .= ' has-error';
		}

		$return .= '">';

		if ($label) {
			$return .= $this->form->label($name, $label);
		}

		if (!$value) {
			$value = $this->input->get($name);
		}

		switch ($type) {
			case 'password':
			case 'file':
				$return .= $this->form->$type($name, $options);
				break;
			case 'text':
			case 'hidden':
			case 'email':
			case 'textarea':
				$return .= $this->form->$type($name, $value, $options);
				break;
			default:
				$return .= $this->form->input($type, $name, $value, $options);
		}

		if ($errors && $errors->has($name)) {
			$return .= $errors->first($name, '<span class="help-block">:message</span>');
		}

		$return .= '</div>';

		return $return;
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
	protected function options($name, $label = null, array $list = array(), $selected = null, array $options = array())
	{
		$options = array_merge(array('class' => 'form-control'), $options);

		$return = '';

		if ($label) {
			$return .= $this->form->label($name, $label);
		}

		$return .= $this->form->select($name, $list, $selected, $options);

		return $return;
	}

	/**
	 * Create a form field.
	 *
	 * @param string $type
	 * @param string $name
	 * @param string $label
	 * @param string $value
	 * @param string $checked
	 * @param array  $options
	 *
	 * @return string
	 */
	protected function field($type, $name, $label = null, $value = null, $checked = null, array $options = array())
	{
		$return = '<div class="' . $type . '">';

		if ($label) {
			$return .= $this->form->label($name, $label);
		}

		$return .= $this->form->$type($name, $value, $checked, $options) . '</div>';

		return $return;
	}

	/**
	 * Create a form action button.
	 *
	 * @param string $value
	 * @param string $type
	 * @param array  $attributes
	 *
	 * @return string
	 */
	protected function action($type, $value, array $attributes = array())
	{
		switch ($type) {
			case 'submit':
				$attributes = array_merge(array('class' => 'btn btn-primary pull-right'), $attributes);
				break;
			case 'button':
			case 'reset':
			default:
				$attributes = array_merge(array('class' => 'btn btn-default'), $attributes);
		}

		return $this->form->$type($value, $attributes);
	}

	/**
	 * Create a button link.
	 *
	 * @param string $type
	 * @param string $location
	 * @param string $title
	 * @param array  $parameters
	 * @param string $secure
	 * @param array  $attributes
	 *
	 * @return string
	 */
	protected function hyperlink($type, $location, $title = null, array $parameters = array(), array $attributes = array(), $secure = null)
	{
		$attributes = array_merge(array('class' => 'btn btn-default'), $attributes);

		switch ($type) {
			case 'linkRoute':
			case 'linkAction':
			return $this->html->$type($location, $title, $parameters, $attributes);
				break;
			case 'mailto':
				return $this->html->$type($location, $title, $attributes);
				break;
			case 'link':
			case 'secureLink':
			default:
				return $this->html->$type($location, $title, $attributes, $secure);
		}
	}

	/**
	 * Create an alert item with optional emphasis.
	 *
	 * @param string  $type
	 * @param string  $content
	 * @param string  $emphasis
	 * @param boolean $dismissible
	 * @param array   $attributes
	 *
	 * @return string
	 */
	protected function alert($type = 'message', $content = null, $emphasis = false, $dismissible = false, array $attributes = array())
	{
		$class = '';

		if($emphasis && is_string($emphasis)){
			$content = '<strong>' . $emphasis . '</strong> ' . $content; 
		}
		
		if ($dismissible) {
			$class = 'alert-dismissable';
		}

		$attributes = array_merge(array('class' => 'alert ' . $class . ' alert-' . ($type != 'message' ? $type : 'default')), $attributes);
		$return = '<div ' . $this->html->attributes($attributes) . '>';

		if ($dismissible) {
			$return .= '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
		}

		$return .= $content . '</div>';

		return $return;
	}

}
