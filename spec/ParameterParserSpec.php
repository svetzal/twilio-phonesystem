<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ParameterParserSpec extends ObjectBehavior {
    function it_is_initializable() {
        $this->beConstructedWith(['menuCode' => 'c', 'digits' => '1']);
        $this->shouldHaveType('ParameterParser');
    }

    function it_should_remember_parameters() {
        $this->beConstructedWith(['menuCode' => 'c', 'digits' => '1']);
        $this->menuCode()->shouldBe('c');
        $this->hasDigits()->shouldBe(true);
        $this->digits()->shouldBe('1');
    }

    function it_should_handle_no_digits() {
        $this->beConstructedWith(['menuCode' => 'c']);
        $this->menuCode()->shouldBe('c');
        $this->hasDigits()->shouldBe(false);
    }
}
