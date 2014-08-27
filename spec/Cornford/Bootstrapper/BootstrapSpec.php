<?php namespace spec\Cornford\Bootstrapper;

use Cornford\Bootstrapper\Bootstrap;
use PhpSpec\ObjectBehavior;
use Mockery;

class BootstrapSpec extends ObjectBehavior
{
	function let()
	{
		$form = Mockery::mock('Illuminate\Html\FormBuilder');
		$form->shouldReceive('label')->andReturn('');
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

		$html = Mockery::mock('Illuminate\Html\HtmlBuilder');
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
		$this->text('name', 'Label', 'value')->shouldReturn('<div class="form-group">' . "\n\n" . '<input type="text" name="name" value="value">' . "\n" . '</div>' . "\n");
	}

	function it_can_create_a_password_input()
	{
		$this->password('name', 'Label')->shouldReturn('<div class="form-group">' . "\n\n" . '<input type="password" name="name">' . "\n" . '</div>' . "\n");
	}

	function it_can_create_an_email_input()
	{
		$this->email('name', 'Label', 'value')->shouldReturn('<div class="form-group">' . "\n\n" . '<input type="email" name="name" value="value">' . "\n" . '</div>' . "\n");
	}

	function it_can_create_a_file_input()
	{
		$this->file('name', 'Label')->shouldReturn('<div class="form-group">' . "\n\n" . '<input type="file" name="name">' . "\n" . '</div>' . "\n");
	}

	function it_can_create_a_date_input()
	{
		$this->date('name', 'Label', 'value')->shouldReturn('<div class="form-group">' . "\n\n" . '<div id="name_date" class="input-group date"><input type="text" name="name" value="value">' .
			'<span class="input-group-addon">' . "\n" . '<span class="glyphicon glyphicon-calendar"></span>' . "\n" . '</span>' . "\n" . '</div>' . "\n" . '<script type="text/javascript">' .
			'$(function() { $("#name_date").datetimepicker({ pickTime: false }); });</script>' . "\n" . '</div>' . "\n");
	}

	function it_can_create_a_datetime_input()
	{
		$this->datetime('name', 'Label', 'value')->shouldReturn('<div class="form-group">' . "\n\n" . '<div id="name_datetime" class="input-group datetime"><input type="text" name="name" value="value">' .
			'<span class="input-group-addon">' . "\n" . '<span class="glyphicon glyphicon-calendar"></span>' . "\n" . '</span>' . "\n" . '</div>' . "\n" . '<script type="text/javascript">' .
			'$(function() { $("#name_datetime").datetimepicker({ }); });</script>' . "\n" . '</div>' . "\n");
	}

	function it_can_create_a_time_input()
	{
		$this->time('name', 'Label', 'value')->shouldReturn('<div class="form-group">' . "\n\n" . '<div id="name_time" class="input-group time"><input type="text" name="name" value="value">' .
			'<span class="input-group-addon">' . "\n" . '<span class="glyphicon glyphicon-time"></span>' . "\n" . '</span>' . "\n" . '</div>' . "\n" . '<script type="text/javascript">' .
			'$(function() { $("#name_time").datetimepicker({ pickDate: false }); });</script>' . "\n" . '</div>' . "\n");
	}

	function it_can_create_a_textarea_field()
	{
		$this->textarea('name', 'Label', 'value')->shouldReturn('<div class="form-group">' . "\n\n" . '<textarea name="name">value</textarea>' . "\n" . '</div>' . "\n");
	}

	function it_can_create_a_select_field()
	{
		$this->select('name', 'Label', array(0 => 1))->shouldReturn('<div class="form-group">' . "\n\n" . '<select name="name"><option value="0">1</option></select>' . "\n" . '</div>' . "\n");
	}

	function it_can_create_a_checkbox_field()
	{
		$this->checkbox('name', 'Label', 'value')->shouldReturn('<div class="form-group">' . "\n" . '<div class="checkbox">' . "\n\n" . '<input type="checkbox" name="name" value="value">' . "\n" . '</div>' . "\n" . '</div>');
	}

	function it_can_create_a_radio_field()
	{
		$this->radio('name', 'Label', 'value')->shouldReturn('<div class="form-group">' . "\n" . '<div class="radio">' . "\n\n" . '<input type="radio" name="name" value="value">' . "\n" . '</div>' . "\n" . '</div>');
	}

	function it_can_create_a_submit_button()
	{
		$this->submit('value')->shouldReturn('<div class="form-group">' . "\n" . '<input type="sbumit" name="submit" value="value">' . "\n" . '</div>' . "\n");
	}

	function it_can_create_a_button()
	{
		$this->button('value')->shouldReturn('<div class="form-group">' . "\n" . '<input type="button" name="button" value="value">' . "\n" . '</div>' . "\n");
	}

	function it_can_create_a_reset_button()
	{
		$this->reset('value')->shouldReturn('<div class="form-group">' . "\n" . '<input type="reset" name="reset" value="value">' . "\n" . '</div>' . "\n");
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
