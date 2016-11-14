<?php
require_once(__DIR__."/../settings-sample.php");
require_once(__DIR__ . "/../src/Menu.inc.php");

class MenuTestMock extends Menu {
    function __construct() {
        parent::__construct();

        $this->registerDigitHandler('1', "Test 1");
        $this->registerDigitHandler('2', "Test 2");

        $this->registerDefaultDigitHandler("Default");
    }

    function matchesMenuCode() { return 't'; }
    function present() { }
}

class MenuTest extends PHPUnit_Framework_TestCase {

    function testMenuCanRespondToDigits() {
        $menu = new MenuTestMock();
        $this->assertEquals("Test 1", $menu->getDigitHandler('1'));
        $this->assertEquals("Test 2", $menu->getDigitHandler('2'));
        $this->assertEquals("Default", $menu->getDigitHandler("999"));
    }

}