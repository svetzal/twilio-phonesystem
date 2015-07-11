<?php
require_once(__DIR__."../settings-sample.php");
require_once(__DIR__."/../inc/MenuBuilder.inc.php");

class MenuBuilderTest extends PHPUnit_Framework_TestCase {

    private $menuBuilder;

    function setUp() {
        $this->menuBuilder = new MenuBuilder();
    }

    function testMainMenuRespondsToCode() {
        $menu = $this->menuBuilder->mainMenu();
        $this->assertTrue($menu->matchesMenuCode('m'));
    }

    function testConferenceMenuRespondsToCode() {
        $menu = $this->menuBuilder->conferenceMenu();
        $this->assertTrue($menu->matchesMenuCode('c'));
    }

    function testOutgoingMenuResponseToCode() {
        $menu = $this->menuBuilder->outgoingMenu();
        $this->assertTrue($menu->matchesMenuCode('o'));
    }

}
