<?php

namespace Menus;
use \Menu;
use \Settings;

class MainMenu extends Menu {

    function __construct(Settings $settings, ConferenceMenu $conferenceMenu, OutgoingMenu $outgoingMenu) {
        parent::__construct($settings, 'm');

        foreach($this->settings->chasers() as $name => $chaser) {
            $this->registerDigitHandler(
                $chaser['ext'],
                $this->responseBuilder->forward(
                    $chaser['phones'],
                    $chaser['no_answer_message']
                )
            );
        }

        $this->registerDigitHandler(
            '8',
            $this->responseBuilder->redirect(null, $conferenceMenu->url(), 0)
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