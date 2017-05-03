<?php

namespace Menus;
use \Menu;
use \Settings;

class ConferenceMenu extends Menu {

    function __construct(Settings $allSettings) {
        parent::__construct($allSettings, 'c');

        $settings = $allSettings->conference_bridge();

        $this->registerDigitHandler(
            $settings->admin_code,
            $this->responseBuilder->conferenceAsAdmin()
        );

        $this->registerDigitHandler(
            $settings->attendee_code,
            $this->responseBuilder->conferenceAsGuest()
        );

        $this->registerDefaultDigitHandler(
            $this->responseBuilder->redirect("That was not a valid conference code. Please try again.", $this->url())
        );

        $this->registerMainHandler(
            $this->responseBuilder->menuWithSpeech('Please enter your conference code now.', $this->url())
        );
    }

}