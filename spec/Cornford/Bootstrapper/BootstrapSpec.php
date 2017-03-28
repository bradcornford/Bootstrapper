<?php namespace spec\Cornford\Bootstrapper;

use Cornford\Bootstrapper\Bootstrap;
use PhpSpec\ObjectBehavior;
use Mockery;

class BootstrapSpec extends ObjectBehavior
{
	function let()
	{
		$form = Mockery::mock('Collective\Html\FormBuilder');
		$form->shouldReceive('label')->andReturn('');
		$form->shouldReceive('input')->andReturn('<input type="text" name="name" value="value">');
		$form->shouldReceive('text')->andReturn('<input type="text" name="name" value="value">');
		$form->shouldReceive('password')->andReturn('<input type="password" name="name">');
		$form->shouldReceive('email')->andReturn('<input type="email" name="name" value="value">');
		$form->shouldReceive('file')->andReturn('<input type="file" name="name">');
		$form->shouldReceive('textarea')->andReturn('<textarea name="name">value</textarea>');
		$form->shouldReceive('select')->andReturn('<select name="name"><option value="0">1</option></select>');
		$form->shouldReceive('checkbox')->andReturn('<input type="checkbox" name="name" value="value">');
		$form->shouldReceive('radio')->andReturn('<input type="radio" name="name" value="value">');
		$form->shouldReceive('submit')->andReturn('<input type="sbumit" name="submit" value="value">');
		$form->shouldReceive('button')->andReturn('<input type="button" name="button" value="value">');
		$form->shouldReceive('reset')->andReturn('<input type="reset" name="reset" value="value">');

		$html = Mockery::mock('Collective\Html\HtmlBuilder');
		$html->shouldReceive('attributes')->andReturn('');
		$html->shouldReceive('style')->andReturn(Bootstrap::CSS_BOOTSTRAP_CDN)->once();
		$html->shouldReceive('script')->andReturn(Bootstrap::JS_BOOTSTRAP_CDN)->once();
		$html->shouldReceive('link')->andReturn('<a href="#">title</a>');
		$html->shouldReceive('secureLink')->andReturn('<a href="#">title</a>');
		$html->shouldReceive('linkRoute')->andReturn('<a href="#">title</a>');
		$html->shouldReceive('linkAction')->andReturn('<a href="#">title</a>');
		$html->shouldReceive('mailto')->andReturn('<a href="#">title</a>');

		$input = Mockery::mock('Illuminate\Http\Request');
		$input->shouldReceive('get')->andReturn(false);

		$this->beConstructedWith($form, $html, $input);
	}

	function it_is_initializable()
	{
		$this->shouldHaveType('Cornford\Bootstrapper\Bootstrap');
	}

	function it_can_have_form_type_vertical()
	{
		$this->vertical()->shouldReturn($this);
		$this->getFormType()->shouldReturn(Bootstrap::FORM_VERTICAL);
	}

	function it_can_have_form_type_horizontal()
	{
		$this->horizontal()->shouldReturn($this);
		$this->getFormType()->shouldReturn(Bootstrap::FORM_HORIZONTAL);
	}

	function it_can_have_form_type_inline()
	{
		$this->inline()->shouldReturn($this);
		$this->getFormType()->shouldReturn(Bootstrap::FORM_INLINE);
	}

	function it_can_get_form_type()
	{
		$this->getFormType()->shouldReturn(Bootstrap::FORM_VERTICAL);
	}

	function it_can_add_a_css_file()
	{
		$this->css()->shouldReturn(Bootstrap::CSS_BOOTSTRAP_CDN . Bootstrap::CSS_BOOTSTRAP_CDN);
	}

	function it_can_add_a_js_file()
	{
		$this->js()->shouldReturn(Bootstrap::JS_BOOTSTRAP_CDN . Bootstrap::JS_BOOTSTRAP_CDN . Bootstrap::JS_BOOTSTRAP_CDN . Bootstrap::JS_BOOTSTRAP_CDN);
	}

	function it_can_create_a_text_input()
	{
		$this->text('name', 'Label', 'value')->shouldReturn('<div>' . "\n" . '<label>Label</label>' . "\n" . '<input type="text" name="name" value="value">' . "\n" . '</div>' . "\n");
	}

	function it_can_create_a_text_input_with_out_container()
	{
		$this->text('name', 'Label', 'value', null, array('container' => array('display' => 'none')))->shouldReturn('<label>Label</label>' . "\n" . '<input type="text" name="name" value="value">' . "\n");
	}

	function it_can_create_a_password_input()
	{
		$this->password('name', 'Label')->shouldReturn('<div>' . "\n" . '<label>Label</label>' . "\n" . '<input type="password" name="name">' . "\n" . '</div>' . "\n");
	}

	function it_can_create_a_password_input_with_out_container()
	{
		$this->password('name', 'Label', null, array('container' => array('display' => 'none')))->shouldReturn('<label>Label</label>' . "\n" . '<input type="password" name="name">' . "\n");
	}

	function it_can_create_an_email_input()
	{
		$this->email('name', 'Label', 'value')->shouldReturn('<div>' . "\n" . '<label>Label</label>' . "\n" . '<input type="email" name="name" value="value">' . "\n" . '</div>' . "\n");
	}

	function it_can_create_an_email_input_with_out_container()
	{
		$this->email('name', 'Label', 'value', null, array('container' => array('display' => 'none')))->shouldReturn('<label>Label</label>' . "\n" . '<input type="email" name="name" value="value">' . "\n");
	}

	function it_can_create_a_telephone_input()
	{
		$this->telephone('name', 'Label', 'value')->shouldReturn('<div>' . "\n" . '<label>Label</label>' . "\n" . '<input type="text" name="name" value="value">' . "\n" . '</div>' . "\n");
	}

	function it_can_create_a_telephone_input_with_out_container()
	{
		$this->telephone('name', 'Label', 'value', null, array('container' => array('display' => 'none')))->shouldReturn('<label>Label</label>' . "\n" . '<input type="text" name="name" value="value">' . "\n");
	}

	function it_can_create_a_number_input()
	{
		$this->number('name', 'Label', 'value')->shouldReturn('<div>' . "\n" . '<label>Label</label>' . "\n" . '<input type="text" name="name" value="value">' . "\n" . '</div>' . "\n");
	}

	function it_can_create_a_number_input_with_out_container()
	{
		$this->number('name', 'Label', 'value', null, array('container' => array('display' => 'none')))->shouldReturn('<label>Label</label>' . "\n" . '<input type="text" name="name" value="value">' . "\n");
	}

	function it_can_create_a_url_input()
	{
		$this->url('name', 'Label', 'value')->shouldReturn('<div>' . "\n" . '<label>Label</label>' . "\n" . '<input type="text" name="name" value="value">' . "\n" . '</div>' . "\n");
	}

	function it_can_create_a_url_input_with_out_container()
	{
		$this->url('name', 'Label', 'value', null, array('container' => array('display' => 'none')))->shouldReturn('<label>Label</label>' . "\n" . '<input type="text" name="name" value="value">' . "\n");
	}

	function it_can_create_a_range_input()
	{
		$this->range('name', 'Label', 'value', null, array('min' => '1', 'max' => '10'))->shouldReturn('<div>' . "\n" . '<label>Label</label>' . "\n" . '<div class="input-group">' . "\n" . '<div class="form-control">' . "\n" . '<input type="text" name="name" value="value">' . "\n" . '</div>' . "\n" . '<output id="namevalue" class="input-group-addon">0</output>' . "\n" . '</div>' . "\n" . '</div>' . "\n");
	}

	function it_can_create_a_range_input_with_out_container()
	{
		$this->range('name', 'Label', 'value', null, array('min' => '1', 'max' => '10', 'container' => array('display' => 'none')))->shouldReturn('<label>Label</label>' . "\n" . '<div class="input-group">' . "\n" . '<div class="form-control">' . "\n" . '<input type="text" name="name" value="value">' . "\n" . '</div>' . "\n" . '<output id="namevalue" class="input-group-addon">0</output>' . "\n" . '</div>' . "\n");
	}

	function it_can_create_a_search_input()
	{
		$this->search('name', 'Label', 'value')->shouldReturn('<div>' . "\n" . '<div class="input-group">' . "\n" . '<input type="text" name="name" value="value">' . "\n" . '<div class="input-group-btn">' . "\n" . '<button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>' . "\n" . '</div>' . "\n" . '</div>' . "\n" . '</div>' . "\n");
	}

	function it_can_create_a_search_input_with_out_container()
	{
		$this->search('name', 'Label', 'value', null, array('container' => array('display' => 'none')))->shouldReturn('<div class="input-group">' . "\n" . '<input type="text" name="name" value="value">' . "\n" . '<div class="input-group-btn">' . "\n" . '<button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>' . "\n" . '</div>' . "\n" . '</div>' . "\n");
	}

	function it_can_create_a_file_input()
	{
		$this->file('name', 'Label')->shouldReturn('<div>' . "\n" . '<label>Label</label>' . "\n" . '<input type="file" name="name">' . "\n" . '</div>' . "\n");
	}

	function it_can_create_a_file_input_with_out_container()
	{
		$this->file('name', 'Label', null, array('container' => array('display' => 'none')))->shouldReturn('<label>Label</label>' . "\n" . '<input type="file" name="name">' . "\n");
	}

	function it_can_create_a_date_input()
	{
		$this->date('name', 'Label', 'value')->shouldReturn('<div>' . "\n" . '<label>Label</label>' . "\n" . '<div id="name_date" class="input-group date"><input type="text" name="name" value="value">' .
			'<span class="input-group-addon">' . "\n" . '<span class="glyphicon glyphicon-calendar"></span>' . "\n" . '</span>' . "\n" . '</div>' . "\n" . '<script type="text/javascript">' .
			'$(function() { $("#name, #name_date").datetimepicker({ pickTime: false }); });</script>' . "\n" . '</div>' . "\n");
	}

	function it_can_create_a_date_input_with_out_container()
	{
		$this->date('name', 'Label', 'value', null, array('container' => array('display' => 'none')))->shouldReturn('<label>Label</label>' . "\n" . '<div id="name_date" class="input-group date"><input type="text" name="name" value="value">' .
			'<span class="input-group-addon">' . "\n" . '<span class="glyphicon glyphicon-calendar"></span>' . "\n" . '</span>' . "\n" . '</div>' . "\n" . '<script type="text/javascript">' .
			'$(function() { $("#name, #name_date").datetimepicker({ pickTime: false }); });</script>' . "\n");
	}

	function it_can_create_a_datetime_input()
	{
		$this->datetime('name', 'Label', 'value')->shouldReturn('<div>' . "\n" . '<label>Label</label>' . "\n" . '<div id="name_datetime" class="input-group datetime"><input type="text" name="name" value="value">' .
			'<span class="input-group-addon">' . "\n" . '<span class="glyphicon glyphicon-calendar"></span>' . "\n" . '</span>' . "\n" . '</div>' . "\n" . '<script type="text/javascript">' .
			'$(function() { $("#name, #name_datetime").datetimepicker({ }); });</script>' . "\n" . '</div>' . "\n");
	}

	function it_can_create_a_datetime_input_with_out_container()
	{
		$this->datetime('name', 'Label', 'value', null, array('container' => array('display' => 'none')))->shouldReturn('<label>Label</label>' . "\n" . '<div id="name_datetime" class="input-group datetime"><input type="text" name="name" value="value">' .
			'<span class="input-group-addon">' . "\n" . '<span class="glyphicon glyphicon-calendar"></span>' . "\n" . '</span>' . "\n" . '</div>' . "\n" . '<script type="text/javascript">' .
			'$(function() { $("#name, #name_datetime").datetimepicker({ }); });</script>' . "\n");
	}

	function it_can_create_a_time_input()
	{
		$this->time('name', 'Label', 'value')->shouldReturn('<div>' . "\n" . '<label>Label</label>' . "\n" . '<div id="name_time" class="input-group time"><input type="text" name="name" value="value">' .
			'<span class="input-group-addon">' . "\n" . '<span class="glyphicon glyphicon-time"></span>' . "\n" . '</span>' . "\n" . '</div>' . "\n" . '<script type="text/javascript">' .
			'$(function() { $("#name, #name_time").datetimepicker({ pickDate: false }); });</script>' . "\n" . '</div>' . "\n");
	}

	function it_can_create_a_time_input_with_out_container()
	{
		$this->time('name', 'Label', 'value', null, array('container' => array('display' => 'none')))->shouldReturn('<label>Label</label>' . "\n" . '<div id="name_time" class="input-group time"><input type="text" name="name" value="value">' .
			'<span class="input-group-addon">' . "\n" . '<span class="glyphicon glyphicon-time"></span>' . "\n" . '</span>' . "\n" . '</div>' . "\n" . '<script type="text/javascript">' .
			'$(function() { $("#name, #name_time").datetimepicker({ pickDate: false }); });</script>' . "\n");
	}

	function it_can_create_a_textarea_field()
	{
		$this->textarea('name', 'Label', 'value')->shouldReturn('<div>' . "\n" . '<label>Label</label>' . "\n" . '<textarea name="name">value</textarea>' . "\n" . '</div>' . "\n");
	}

	function it_can_create_a_textarea_field_with_out_container()
	{
		$this->textarea('name', 'Label', 'value', null, array('container' => array('display' => 'none')))->shouldReturn('<label>Label</label>' . "\n" . '<textarea name="name">value</textarea>' . "\n");
	}

	function it_can_create_a_select_field()
	{
		$this->select('name', 'Label', array(0 => 1))->shouldReturn('<div>' . "\n" . '<label>Label</label>' . "\n" . '<select name="name"><option value="0">1</option></select>' . "\n" . '</div>' . "\n");
	}

	function it_can_create_a_select_field_with_out_container()
	{
		$this->select('name', 'Label', array(0 => 1), 1, null, array('container' => array('display' => 'none')))->shouldReturn('<label>Label</label>' . "\n" . '<select name="name"><option value="0">1</option></select>' . "\n");
	}

	function it_can_create_a_checkbox_field()
	{
		$this->checkbox('name', 'Label', 'value')->shouldReturn('<div>' . "\n" . '<div class="checkbox">' . "\n" . '<label><input type="checkbox" name="name" value="value">Label</label>' . "\n" . '</div>' . "\n" . '</div>');
	}

	function it_can_create_a_checkbox_field_with_out_container()
	{
		$this->checkbox('name', 'Label', 'value', null, array('container' => array('display' => 'none')))->shouldReturn('<div class="checkbox">' . "\n" . '<label><input type="checkbox" name="name" value="value">Label</label>' . "\n" . '</div>' . "\n");
	}

	function it_can_create_a_radio_field()
	{
		$this->radio('name', 'Label', 'value')->shouldReturn('<div>' . "\n" . '<div class="radio">' . "\n" . '<label><input type="radio" name="name" value="value">Label</label>' . "\n" . '</div>' . "\n" . '</div>');
	}

	function it_can_create_a_radio_field_with_out_container()
	{
		$this->radio('name', 'Label', 'value', null, array('container' => array('display' => 'none')))->shouldReturn('<div class="radio">' . "\n" . '<label><input type="radio" name="name" value="value">Label</label>' . "\n" . '</div>' . "\n");
	}

	function it_can_create_a_submit_button()
	{
		$this->submit('value')->shouldReturn('<div>' . "\n" . '<input type="sbumit" name="submit" value="value">' . "\n" . '</div>' . "\n");
	}

	function it_can_create_a_submit_button_with_out_container()
	{
		$this->submit('value', array('container' => array('display' => 'none')))->shouldReturn('<input type="sbumit" name="submit" value="value">' . "\n");
	}

	function it_can_create_a_button()
	{
		$this->button('value')->shouldReturn('<div>' . "\n" . '<input type="button" name="button" value="value">' . "\n" . '</div>' . "\n");
	}

	function it_can_create_a_button_with_out_container()
	{
		$this->button('value', array('container' => array('display' => 'none')))->shouldReturn('<input type="button" name="button" value="value">' . "\n");
	}

	function it_can_create_a_reset_button()
	{
		$this->reset('value')->shouldReturn('<div>' . "\n" . '<input type="reset" name="reset" value="value">' . "\n" . '</div>' . "\n");
	}

	function it_can_create_a_reset_button_with_out_container()
	{
		$this->reset('value', array('container' => array('display' => 'none')))->shouldReturn('<input type="reset" name="reset" value="value">' . "\n");
	}

	function it_can_create_a_hyperlink()
	{
		$this->link('#', 'title')->shouldReturn('<a href="#">title</a>');
	}

	function it_can_create_a_secure_hyperlink()
	{
		$this->secureLink('#', 'title')->shouldReturn('<a href="#">title</a>');
	}

	function it_can_create_a_route_hyperlink()
	{
		$this->linkRoute('#', 'title')->shouldReturn('<a href="#">title</a>');
	}

	function it_can_create_an_action_hyperlink()
	{
		$this->linkAction('#', 'title')->shouldReturn('<a href="#">title</a>');
	}

	function it_can_create_a_mailto_hyperlink()
	{
		$this->mailto('#', 'title')->shouldReturn('<a href="#">title</a>');
	}

	function it_can_create_a_none_alert()
	{
		$this->none('This is a message')->shouldReturn('<div >This is a message</div>');
	}

	function it_can_create_a_success_alert()
	{
		$this->success('This is a message')->shouldReturn('<div >This is a message</div>');
	}

	function it_can_create_an_info_alert()
	{
		$this->info('This is a message')->shouldReturn('<div >This is a message</div>');
	}

	function it_can_create_a_warning_alert()
	{
		$this->warning('This is a message')->shouldReturn('<div >This is a message</div>');
	}

	function it_can_create_a_danger_alert()
	{
		$this->danger('This is a message')->shouldReturn('<div >This is a message</div>');
	}

	function it_can_create_an_alert_with_emphasis()
	{
		$this->info('This is a message', 'Well!', true)->shouldReturn('<div ><button type="button" class="close" data-dismiss="alert" aria-hidden="true">' .
			'&times;</button><strong>Well!</strong> This is a message</div>');
	}

	function it_can_create_a_dismissible_alert()
	{
		$this->info('This is a message', null, true)->shouldReturn('<div ><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;' .
			'</button>This is a message</div>');
	}
}
