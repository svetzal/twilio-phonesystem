<?php

class MenuDispatcher {
  private $params, $registry;

  function __construct($params, $registry) {
    $this->params = $params;
    $this->registry = $registry;
  }

  function dispatch() {
    $currentMenu = $this->currentMenu();
    if ($this->params->hasDigits()) {
      $currentMenu->handleDigits($this->params->digits());
    } else {
      $currentMenu->present();
    }
  }

  private function currentMenu() {
    return $this->registry->menuForCode($this->params->menuCode());
  }

}
