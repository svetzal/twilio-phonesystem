<?php
require(__DIR__ . "/../inc/MenuRegistry.inc.php");
require(__DIR__ . "/../inc/Menu.inc.php");

class MockMenu1 extends Menu {
  function menuCode() { return '1'; }
  function present() {}
  function handleDigits($digits) {}
}

class MockMenu2 extends Menu {
  function menuCode() { return '2'; }
  function present() {}
  function handleDigits($digits) {}
}

class MenuRegistryTest extends PHPUnit_Framework_TestCase {

  private $registry;

  function setUp() {
    $this->registry = new MenuRegistry();
  }

  function testRegistryByCode() {
    $menu1 = new MockMenu1();
    $menu2 = new MockMenu2();

    $this->registry->addMenu($menu1);
    $this->registry->addMenu($menu2);

    $this->assertEquals($menu1, $this->registry->menuForCode(null));
    $this->assertEquals($menu1, $this->registry->menuForCode("1"));
    $this->assertEquals($menu2, $this->registry->menuForCode("2"));
  }

}

