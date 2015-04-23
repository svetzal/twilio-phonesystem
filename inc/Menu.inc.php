<?php

require_once(__DIR__ . "/MojilityResponse.inc.php");

abstract class Menu {
  protected $mojility;

  function __construct() {
    $this->mojility = new MojilityResponse();
  }

  abstract function menuCode();
  abstract function present();
  abstract function handleDigits($digits);
}

