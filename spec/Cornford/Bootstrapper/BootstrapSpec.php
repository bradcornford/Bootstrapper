<?php namespace spec\Cornford\Bootstrapper;

use PhpSpec\ObjectBehavior;

class BootstrapSpec extends ObjectBehavior
{
	function it_is_initializable()
	{
		$this->shouldHaveType('Cornford\Bootstrapper\Bootstrap');
	}
}
