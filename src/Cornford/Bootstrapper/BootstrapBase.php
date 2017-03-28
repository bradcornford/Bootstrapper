<?php namespace Cornford\Bootstrapper;

namespace Cornford\Bootstrapper;

use Collective\Html\FormBuilder;
use Collective\Html\HtmlBuilder;
use Illuminate\Http\Request;

abstract class BootstrapBase {

	const FORM_VERTICAL = 'vertical';
	const FORM_HORIZONTAL = 'horizontal';
	const FORM_INLINE = 'inline';

	const CSS_BOOTSTRAP_CDN = '//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/css/bootstrap.min.css';
	const CSS_BOOTSTRAP_LOCAL = 'packages/cornford/bootstrapper/assets/css/bootstrap.min.css';

	const JS_BOOTSTRAP_CDN = '//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js';
	const JS_BOOTSTRAP_LOCAL = 'packages/cornford/bootstrapper/assets/js/bootstrap.min.js';

	const JS_JQUERY_CDN = '//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js';
	const JS_JQUERY_LOCAL = 'packages/cornford/bootstrapper/assets/js/jquery.min.js';

	const JS_MOMENT_CDN = '//cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js';
	const JS_MOMENT_LOCAL = 'packages/cornford/bootstrapper/assets/js/moment.min.js';

	const CSS_DATETIME_CDN = '//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/css/bootstrap-datetimepicker.min.css';
	const CSS_DATETIME_LOCAL = 'packages/cornford/bootstrapper/assets/css/bootstrap-datetimepicker.min.css';

	const JS_DATETIME_CDN = '//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/js/bootstrap-datetimepicker.min.js';
	const JS_DATETIME_LOCAL = 'packages/cornford/bootstrapper/assets/js/bootstrap-datetimepicker.min.js';

	/**
	 * Form
	 *
	 * @var \Collective\Html\FormBuilder
	 */
	protected $form;

	/**
	 * HTML
	 *
	 * @var \Collective\Html\HtmlBuilder
	 */
	protected $html;

	/**
	 * Input
	 *
	 * @var \Illuminate\Http\Request
	 */
	protected $input;

	/**
	 * Form Type
	 *
	 * @var string
	 */
	protected $formType = self::FORM_VERTICAL;

	/**
	 * Form Input Class
	 *
	 * @var string
	 */
	protected $inputClass;

	/**
	 * Form Label Class
	 *
	 * @var string
	 */
	protected $labelClass;

	public function __construct(FormBuilder $form, HtmlBuilder $html, Request $input)
	{
		$this->form = $form;
		$this->html = $html;
		$this->input = $input;
	}

	/**
	 * Set the form type
	 *
	 * @param string $type
	 * @param string $inputClass
	 * @param string $labelClass
	 *
	 * @return void
	 */
	protected function form($type = self::FORM_VERTICAL, $inputClass = '', $labelClass = '') {
		$this->formType = $type;
		$this->inputClass = $inputClass;
		$this->labelClass = $labelClass;
	}

	/**
	 * Set the form type to vertical
	 *
	 * @return self
	 */
	public function vertical() {
		$this->form();

		return $this;
	}

	/**
	 * Set the form type to horizontal
	 *
	 * @param string $inputClass
	 * @param string $labelClass
	 *
	 * @return self
	 */
	public function horizontal($inputClass = '', $labelClass = '') {
		$this->form(self::FORM_HORIZONTAL, $inputClass, $labelClass);

		return $this;
	}

	/**
	 * Set the form type to inline
	 *
	 * @param string $labelClass
	 *
	 * @return self
	 */
	public function inline($labelClass = '') {
		$this->form(self::FORM_INLINE, '', $labelClass);

		return $this;
	}

	/**
	 * Get the form type
	 *
	 * @return string
	 */
	public function getFormType() {
		return $this->formType;
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
		return $this->html->$type($location, $attributes);
	}

	/**
	 * Create a form label field.
	 *
	 * @param string $name
	 * @param string $label
	 * @param array  $options
	 * @param string $content
	 *
	 * @return string
	 */
	protected function label($name, $label = null, array $options = array(), $content = null) {
		$return = '';
		$options = array_merge(array('class' => 'control-label ' . $this->labelClass, 'for' => (!$content ? $name : null)), $options);

		if ($label !== null) {
			$return .= '<label' . $this->html->attributes($options) . '>' . $content . ucwords(str_replace('_', ' ', $label)) . '</label>' . "\n";
		}

		return $return;
	}

	/**
	 * Create a form error helper field.
	 *
	 * @param string                         $name
	 * @param \Illuminate\Support\MessageBag $errors
	 * @param string                         $wrap
	 *
	 * @return string
	 */
	protected function errors($name, $errors = null, $wrap = '<span class="help-block">:message</span>') {
		$return = '';

		if ($errors && $errors->has($name)) {
			$return .= $errors->first($name, $wrap) . "\n";
		}

		return $return;
	}

	/**
	 * Create a form group element.
	 *
	 * @param string                         $name
	 * @param \Illuminate\Support\MessageBag $errors
	 * @param string                         $class
	 * @param array                          $options
	 *
	 * @return string
	 */
	protected function group($name, $errors = null, $class = 'form-group', array $options = array())
	{
		$options = array_merge(array('class' => $class), $options);
		$options['class'] .= ($errors && $errors->has($name) ? ' has-error' : '');
		$return = '<div' . $this->html->attributes($options) . '>' . "\n";

		return $return;
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
	 * @param array                          $parameters
	 *
	 * @return string
	 */
	protected function input($type = 'text', $name, $label = null, $value = null, $errors = null, array $options = array(), array $parameters = array())
	{
		$return = '';
		$options = array_merge(array('class' => 'form-control', 'placeholder' => $label, 'id' => $name), $options);
		$containerAttributes = $this->getContainerAttributes($options);
		$labelAttributes = $this->getLabelAttributes($options);

		if (!isset($containerAttributes['display'])) {
			$return .= $this->group($name, $errors, 'form-group', $containerAttributes);
		}

		if ($type != 'search') {
			$return .= $this->label($name, $label, $labelAttributes);
		}

		if ($value === null) {
			$value = $this->input->get($name);
		}

		if ($this->formType == self::FORM_HORIZONTAL) {
			$return .= $this->group('', null, $this->inputClass);
		}

		switch ($type) {
			case 'datetime':
			case 'date':
			case 'time':
					if (isset($parameters['displayIcon']) && !$parameters['displayIcon']) {
						unset($parameters['displayIcon']);
						$return .= $this->form->text($name, $value, $options);
					} else {
						$return .= '<div id="' . $name . '_' . $type .  '" class="input-group ' . $type . '">';
						$return .= $this->form->text($name, $value, $options);
						$return .= '<span class="input-group-addon">' . "\n" . '<span class="glyphicon glyphicon-' . ($type == 'time' ? 'time' : 'calendar')  . '"></span>' . "\n" . '</span>' . "\n" . '</div>' . "\n";
					}

					$return .= '<script type="text/javascript">$(function() { $("#' . $name . ', #' . $name . '_' . $type . '").datetimepicker({ ';

					switch ($type) {
						case 'time':
							$return .= 'pickDate: false, ';
							break;
						case 'date':
							$return .= 'pickTime: false, ';
							break;
						case 'datetime':
						default:
					}

					$return .= implode(', ', array_map(function ($value, $key) { return $key . ': "' . $value . '"'; }, $parameters, array_keys($parameters)));
					$return = rtrim($return, ', ');
					$return .= ' }); });</script>' . "\n";
				break;
			case 'password':
			case 'file':
				unset($options['placeholder']);
				$return .= $this->form->$type($name, $options) . "\n";
				break;
			case 'search':
				$return .= '<div class="input-group">' . "\n";
				$return .= $this->form->input('search', $name, $value, $options) . "\n";
				$return .= '<div class="input-group-btn">' . "\n";
				$return .= '<button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>' . "\n";
				$return .= '</div>' . "\n";
				$return .= '</div>' . "\n";
				break;
			case 'telephone':
				$return .= $this->form->input('tel', $name, $value, $options) . "\n";
				break;
			case 'range':
				$return .= '<div class="input-group">' . "\n";
				$return .= '<div class="form-control">' . "\n";
				$return .= $this->form->input('range', $name, $value, array_merge($options, array('class' => '', 'onchange' => $name . 'value.value=value', 'oninput' => $name . 'value.value=value'))) . "\n";
				$return .= '</div>' . "\n";
				$return .= '<output id="' . $name . 'value" class="input-group-addon">0</output>' . "\n";
				$return .= '</div>' . "\n";
				break;
			case 'text':
			case 'hidden':
			case 'email':
			case 'textarea':
				$return .= $this->form->$type($name, $value, $options) . "\n";
				break;
			default:
				$return .= $this->form->input($type, $name, $value, $options) . "\n";
		}

		$return .= $this->errors($name, $errors);

		if ($this->formType == self::FORM_HORIZONTAL) {
			$return .= '</div>' . "\n";
		}

		if (!isset($containerAttributes['display'])) {
			$return .= '</div>' . "\n";
		}

		return $return;
	}

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
	protected function options($name, $label = null, array $list = array(), $selected = null, $errors = null, array $options = array())
	{
		$return = '';
		$options = array_merge(array('class' => 'form-control', 'id' => $name), $options);
		$containerAttributes = $this->getContainerAttributes($options);
		$labelAttributes = $this->getLabelAttributes($options);

		if (!isset($containerAttributes['display'])) {
			$return .= $this->group($name, $errors, 'form-group', $containerAttributes);
		}

		$return .= $this->label($name, $label, $labelAttributes);

		if ($this->formType == self::FORM_HORIZONTAL) {
			$return .= $this->group('', null, $this->inputClass);
		}

		$return .= $this->form->select($name, $list, $selected, $options) . "\n";
		$return .= $this->errors($name, $errors);

		if ($this->formType == self::FORM_HORIZONTAL) {
			$return .= '</div>' . "\n";
		}

		if (!isset($containerAttributes['display'])) {
			$return .= '</div>' . "\n";
		}

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
		$return = '';
		$options = array_merge(array('id' => $name), $options);
		$containerAttributes = $this->getContainerAttributes($options);
		$labelAttributes = $this->getLabelAttributes($options);

		if ($this->formType != self::FORM_INLINE && !isset($containerAttributes['display'])) {
			$return .= $this->group($name, null, 'form-group', $containerAttributes);
		}

		if ($this->formType == self::FORM_HORIZONTAL) {
			$return .= $this->group('', null, $this->inputClass);
		}

		$return .= '<div class="' . $type . '">' . "\n";
		$return .= $this->label($name, $label, $labelAttributes, $this->form->$type($name, $value, $checked, $options));
		$return .= '</div>' . "\n";

		if ($this->formType == self::FORM_HORIZONTAL) {
			$return .= '</div>' . "\n";
		}

		if ($this->formType != self::FORM_INLINE && !isset($containerAttributes['display'])) {
			$return .= '</div>';
		}

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
		$return = '';
		$containerAttributes = $this->getContainerAttributes($attributes);

		switch ($type) {
			case 'submit':
				$attributes = array_merge(array('class' => 'btn btn-primary pull-right'), $attributes);
				break;
			case 'button':
			case 'reset':
			default:
				$attributes = array_merge(array('class' => 'btn btn-default'), $attributes);
		}

		if (!isset($containerAttributes['display'])) {
			$return .= $this->group('', null, 'form-group', $containerAttributes);
		}

		if ($this->formType == self::FORM_HORIZONTAL) {
			$return .= $this->group('', null, $this->inputClass);
		}

		$return .= $this->form->$type($value, $attributes) . "\n";

		if ($this->formType == self::FORM_HORIZONTAL) {
			$return .= '</div>' . "\n";
		}

		if (!isset($containerAttributes['display'])) {
			$return .= '</div>' . "\n";
		}

		return $return;
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
				$return = $this->html->$type($location, $title, $parameters, $attributes);
				break;
			case 'mailto':
				$return = $this->html->$type($location, $title, $attributes);
				break;
			case 'link':
			case 'secureLink':
			default:
				$return = $this->html->$type($location, $title, $attributes, $secure);
		}

		return $return;
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
	protected function alert($type = 'message', $content = null, $emphasis = null, $dismissible = false, array $attributes = array())
	{
		$attributes = array_merge(array('class' => 'alert' . ($dismissible ? ' alert-dismissable' : '') . ' alert-' . ($type != 'message' ? $type : 'default')), $attributes);
		$return = '<div ' . $this->html->attributes($attributes) . '>';

		if ($dismissible !== false) {
			$return .= '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
		}

		$return .= ($emphasis !== null && is_string($emphasis) ? '<strong>' . $emphasis . '</strong> ' : '') . $content . '</div>';

		return $return;
	}

	/**
	 * Get container attributes.
	 *
	 * @param array &$attributes
	 *
	 * @return array
	 */
	protected function getContainerAttributes(array &$attributes = array())
	{
		$containerAttributes = array();

		if (isset($attributes['container'])) {
			$containerAttributes = $attributes['container'];
			unset($attributes['container']);
		}

		return $containerAttributes;
	}

	/**
	 * Get label attributes.
	 *
	 * @param array &$attributes
	 *
	 * @return array
	 */
	protected function getLabelAttributes(array &$attributes = array())
	{
		$labelAttributes = array();

		if (isset($attributes['label'])) {
			$labelAttributes = $attributes['label'];
			unset($attributes['label']);
		}

		return $labelAttributes;
	}

}
