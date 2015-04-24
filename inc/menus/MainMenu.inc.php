<?php

require_once(__DIR__ . "/../Menu.inc.php");

class MainMenu extends Menu {

    function __construct() {
        parent::__construct();

        $this->registerDigitHandler(
            '1',
            $this->mojility->forward(
                SALES_CELL,
                "Sorry, nobody is available in sales to respond at this time. Please leave a message and we will return your call as soon as possible."
            )
        );

        $this->registerDigitHandler(
            '2',
            $this->mojility->forward(
                SUPPORT_CELL,
                "Sorry, nobody is available in support to respond at this time. Please leave a message and we will return your call as soon as possible."
            )
        );

        $this->registerDigitHandler(
            '8',
            $this->mojility->redirect(null, CONFERENCE_MENU, 0)
        );

        $this->registerDigitHandler(
            EXTENSION_HACK,
            $this->mojility->forward(
                SALES_CELL,
                "Sorry, Stacey is unavailable at this time. Please leave a message and she will return your call as soon as possible."
            )
        );

        $this->registerDigitHandler(
            OUTGOING_SECRET,
            $this->mojility->redirect(null, OUTGOING_MENU, 0)
        );

        $this->registerDefaultDigitHandler(
            $this->mojility->redirect("That response is not valid. Please try again.", MAIN_MENU)
        );
    }

    function menuCode() {
        return 'm';
    }

    function present() {
        echo $this->mojility->menuWithAudio('http://mojility.ca/phone/audio/greeting.mp3', MAIN_MENU);
    }

}
