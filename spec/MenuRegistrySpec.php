<?php

namespace spec;

use \Menu;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Settings;

class MenuRegistrySpec extends ObjectBehavior {
    function it_is_initializable() {
        $this->shouldHaveType('MenuRegistry');
    }

    function it_should_register_and_retrieve_menus() {
        $settings = new Settings();

        $menu1 = new Menu($settings, '1');
        $menu2 = new Menu($settings, '2');

        $this->addMenu($menu1);
        $this->addMenu($menu2);

        $this->menuForCode(null)->shouldBe($menu1);
        $this->menuForCode('1')->shouldBe($menu1);
        $this->menuForCode('2')->shouldBe($menu2);
    }
}
