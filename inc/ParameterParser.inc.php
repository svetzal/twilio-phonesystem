<?php

class ParameterParser {
  private $menuCode, $digits;

  function __construct($params=null) {
    global $argv;
    if ($params) {
      $this->menuCode = $params['menuCode'];
      $this->digits = $params['digits'];
    } else {
      if (PHP_SAPI === 'cli') {
        $this->menuCode = $argv[1];
        $this->digits = $argv[2];
      } else {
        $this->menuCode = $_REQUEST['m'];
        $this->digits = $_REQUEST['Digits'];
      }
    }
  }

  function hasDigits() { return isset($this->digits); }
  function menuCode() { return $this->menuCode; }
  function digits() { return $this->digits; }
}
