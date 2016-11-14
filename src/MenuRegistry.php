<?php

class MenuRegistry {

  private $menus;
  private $default;

  function __construct() {
    $this->menus = array();
    $this->default = null;
  }

  function addMenu($menu) {
    $this->menus[$menu->getMenuCode()] = $menu;
    if (!isset($this->default)) $this->default = $menu;
  }

  function menuForCode($code) {
    if (isset($code)) {
      return $this->menus[$code];
    } else {
      return $this->default;
    }
  }

}
