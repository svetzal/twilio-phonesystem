<?php
require_once("Menu.inc.php");

require("inc/menus/OutgoingMenu.inc.php");

class MenuBuilder {
    private $responseBuilder;

    function __construct() {
        $this->responseBuilder = new TwilioResponseBuilder();
    }

    public function mainMenu() {
        $menu = new Menu('m');

        $menu->registerDigitHandler(
            '1',
            $this->responseBuilder->forward(
                SALES_CELL,
                "Sorry, nobody is available in sales to respond at this time. Please leave a message and we will return your call as soon as possible."
            )
        );

        $menu->registerDigitHandler(
            '2',
            $this->responseBuilder->forward(
                SUPPORT_CELL,
                "Sorry, nobody is available in support to respond at this time. Please leave a message and we will return your call as soon as possible."
            )
        );

        $menu->registerDigitHandler(
            '8',
            $this->responseBuilder->redirect(null, CONFERENCE_MENU, 0)
        );

        $menu->registerDigitHandler(
            EXTENSION_HACK,
            $this->responseBuilder->forward(
                SALES_CELL,
                "Sorry, Stacey is unavailable at this time. Please leave a message and she will return your call as soon as possible."
            )
        );

        $menu->registerDigitHandler(
            OUTGOING_SECRET,
            $this->responseBuilder->redirect(null, OUTGOING_MENU, 0)
        );

        $menu->registerDefaultDigitHandler(
            $this->responseBuilder->redirect("That response is not valid. Please try again.", MAIN_MENU)
        );

        $menu->registerMainHandler(
            $this->responseBuilder->menuWithAudio('http://mojility.ca/phone/audio/greeting.mp3', MAIN_MENU)
        );

        return $menu;
    }

    function conferenceMenu() {
        $menu = new Menu('c');

        $menu->registerDigitHandler(
            CONFERENCE_ADMIN_CODE,
            $this->responseBuilder->conferenceAsAdmin()
        );

        $menu->registerDigitHandler(
            CONFERENCE_ATTENDEE_CODE,
            $this->responseBuilder->conferenceAsGuest()
        );

        $menu->registerDefaultDigitHandler(
            $this->responseBuilder->redirect("That was not a valid conference code. Please try again.", CONFERENCE_MENU)
        );

        $menu->registerMainHandler(
            $this->responseBuilder->menuWithSpeech('Please enter your conference code now.', CONFERENCE_MENU)
        );

        return $menu;
    }

    function outgoingMenu() {
        $menu = new OutgoingMenu();
        return $menu;
    }

}