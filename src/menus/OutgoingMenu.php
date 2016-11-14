<?php

class OutgoingMenu extends Menu {

    function __construct() {
        parent::__construct('o');
    }

    function present() {
        echo $this->responseBuilder->menuWithSpeech('Enter outgoing number.', OUTGOING_MENU);
    }

    function handleDigits($digits) {
        if (strlen($digits) != 10) {
            echo $this->responseBuilder->redirect("Invalid phone number. Please try again.", OUTGOING_MENU);
        } else {
            echo $this->responseBuilder->outgoing($digits);
        }
    }

}

