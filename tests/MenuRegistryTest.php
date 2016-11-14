<?php
require_once(__DIR__."/../settings-sample.php");
require_once(__DIR__ . "/../src/MenuRegistry.php");
require_once(__DIR__ . "/../src/Menu.php");

class MenuRegistryTest extends PHPUnit_Framework_TestCase {

  private $registry;

  function setUp() {
    $this->registry = new MenuRegistry();
  }

  function testRegistryByCode() {
    $menu1 = new Menu('1');
    $menu2 = new Menu('2');

    $this->registry->addMenu($menu1);
    $this->registry->addMenu($menu2);

    $this->assertEquals($menu1, $this->registry->menuForCode(null));
    $this->assertEquals($menu1, $this->registry->menuForCode("1"));
    $this->assertEquals($menu2, $this->registry->menuForCode("2"));
  }

}

