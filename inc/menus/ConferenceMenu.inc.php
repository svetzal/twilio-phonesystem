<?php

require_once(__DIR__ . "/../Menu.inc.php");

class ConferenceMenu extends Menu {

    function __construct() {
        parent::__construct();

        $this->registerDigitHandler(
            CONFERENCE_ADMIN_CODE,
            $this->mojility->conferenceAsAdmin()
        );

        $this->registerDigitHandler(
            CONFERENCE_ATTENDEE_CODE,
            $this->mojility->conferenceAsGuest()
        );

        $this->registerDefaultDigitHandler(
            $this->mojility->redirect("That was not a valid conference code. Please try again.", CONFERENCE_MENU)
        );
    }

    function menuCode() {
        return 'c';
    }

    function present() {
        echo $this->mojility->menuWithSpeech('Please enter your conference code now.', CONFERENCE_MENU);
    }

}


