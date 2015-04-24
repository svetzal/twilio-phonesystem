<?php

require_once(__DIR__ . "/TwilioResponseBuilder.inc.php.php");

abstract class Menu {
    protected $mojility;
    protected $digitHandlers = array();
    protected $defaultDigitHandler = null;

    function __construct() {
        $this->mojility = new TwilioResponseBuilder();
    }

    function registerDigitHandler($digits, $handler) {
        $this->digitHandlers[$digits] = $handler;
    }

    function registerDefaultDigitHandler($handler) {
        $this->defaultDigitHandler = $handler;
    }

    function getDigitHandler($digits) {
        if (array_key_exists($digits, $this->digitHandlers)) {
            return $this->digitHandlers[$digits];
        } else {
            return $this->defaultDigitHandler;
        }
    }

    function handleDigits($digits) {
        echo $this->getDigitHandler($digits);
    }

    abstract function menuCode();

    abstract function present();

}

