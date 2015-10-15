<?php

namespace spec;

require_once(__DIR__."/../settings-sample.php");

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MenuBuilderSpec extends ObjectBehavior {
    function it_is_initializable() {
        $this->shouldHaveType('MenuBuilder');
    }

    function it_should_respond_to_main_menu_code() {
        $this->mainMenu()->matchesMenuCode('m')->shouldBe(true);
    }

    function it_should_respond_to_conference_menu_code() {
        $this->conferenceMenu()->matchesMenuCode('c')->shouldBe(true);
    }

    function it_should_respond_to_outgoing_menu_code() {
        $this->outgoingMenu()->matchesMenuCode('o')->shouldBe(true);
    }
}
