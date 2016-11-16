<?php

namespace Menus;
use \Menu;
use \Settings;

class OutgoingMenu extends Menu {

    function __construct(Settings $settings) {
        parent::__construct($settings, 'o');
    }

    function present() {
        echo $this->responseBuilder->menuWithSpeech('Enter outgoing number.', $this->url());
    }

    function handleDigits($digits) {
        if (strlen($digits) != 10) {
            echo $this->responseBuilder->redirect("Invalid phone number. Please try again.", $this->url());
        } else {
            echo $this->responseBuilder->outgoing($digits);
        }
    }

}

