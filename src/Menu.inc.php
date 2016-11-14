<?php
require_once(__DIR__ . "/TwilioResponseBuilder.inc.php");

class Menu {
    protected $menuCode;
    protected $responseBuilder;
    protected $digitHandlers = array();
    protected $defaultDigitHandler = null;
    protected $mainHandler = null;

    function __construct($menuCode) {
        $this->menuCode = $menuCode;
        $this->responseBuilder = new TwilioResponseBuilder();
    }

    function registerDigitHandler($digits, $handler) {
        $this->digitHandlers[$digits] = $handler;
    }

    function registerDefaultDigitHandler($handler) {
        $this->defaultDigitHandler = $handler;
    }

    function registerMainHandler($handler) {
        $this->mainHandler = $handler;
    }

    function getDigitHandler($digits) {
        if (array_key_exists($digits, $this->digitHandlers)) {
            return $this->digitHandlers[$digits];
        } else {
            return $this->defaultDigitHandler;
        }
    }

    function getMenuCode() {
        return $this->menuCode;
    }

    function matchesMenuCode($code) {
        return $this->menuCode == $code;
    }

    function handleDigits($digits) {
        echo $this->getDigitHandler($digits);
    }

    function present() {
        echo $this->mainHandler;
    }

}

