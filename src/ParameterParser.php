<?php

class ParameterParser {
    private $menuCode, $digits;

    function __construct($params = null) {
        global $argv;
        if ($params) {
            $this->menuCode = $params['menuCode'];
            if (array_key_exists('digits', $params))
                $this->digits = $params['digits'];
        } else {
            if (PHP_SAPI === 'cli') {
                if (count($argv) == 3) {
                    $this->menuCode = $argv[1];
                    $this->digits = $argv[2];
                } elseif (count($argv) == 2) {
                    $this->menuCode = $argv[1];
                } elseif (count($argv) == 1) {
                    $this->menuCode = 'm';
                }
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
