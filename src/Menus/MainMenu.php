<?php

namespace Menus;
use \Menu;
use \Settings;

class MainMenu extends Menu {

    function __construct(Settings $settings, ConferenceMenu $conferenceMenu, OutgoingMenu $outgoingMenu) {
        parent::__construct($settings, 'm');

        $this->registerDigitHandler(
            '0',
            $this->responseBuilder->forward(
                $settings->vars->support_cell,
                "Sorry, nobody is available at this time. Please leave a message and we will return your call as soon as possible."
            )
        );

        $this->registerDigitHandler(
            '1',
            $this->responseBuilder->forward(
                $settings->vars->sales_cell,
                "Sorry, our sales staff is unavailable right now. Please leave a message and we will return your call as soon as possible."
            )
        );

        $this->registerDigitHandler(
            '8',
            $this->responseBuilder->redirect(null, $conferenceMenu->url(), 0)
        );

        $this->registerDigitHandler(
            EXTENSION_HACK,
            $this->responseBuilder->forward(
                SALES_CELL,
                "Sorry, Stacey is unavailable at this time. Please leave a message and she will return your call as soon as possible."
            )
        );

        $this->registerDigitHandler(
            $settings->outgoing_bridge()->secret,
            $this->responseBuilder->redirect(null, $outgoingMenu->url(), 0)
        );

        $this->registerDefaultDigitHandler(
            $this->responseBuilder->redirect("That response is not valid. Please try again.", $this->url())
        );

        $this->registerMainHandler(
            $this->responseBuilder->menuWithAudio('http://mojility.ca/phone/audio/greeting-2015-04-30.mp3', $this->url())
        );

    }

}