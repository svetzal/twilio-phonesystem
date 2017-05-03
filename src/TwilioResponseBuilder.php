<?php

class TwilioResponseBuilder {

    function __construct(Settings $settings) {
        $this->settings = $settings;
    }

    function menuWithSpeech($message, $location = null) {
        if ($location === null) $location = $this->settings->vars->script_url;
        $t = $this->createTwilioDirectiveBuilder();
        $t->gatherWithSpeech($message, 2, $location);
        $t->say("Sorry, I didn't get your input.");
        $t->redirect($location);
        return $t->render();
    }

    function menuWithAudio($greeting, $location = null) {
        if ($location === null) $location = $this->settings->vars->script_url;
        $t = $this->createTwilioDirectiveBuilder();
        $t->gatherWithAudio($greeting, 2, $location);
        $t->say("Sorry, I didn't get your input.");
        $t->redirect($location);
        return $t->render();
    }

    function forward($number, $message, $id) {
        $t = $this->createTwilioDirectiveBuilder();
        $t->dial($number);
        $t->say($message);
        $t->record($id);
        return $t->render();
    }

    function redirect($message = null, $location = null, $pause = 1) {
        if ($location === null) $location = $this->settings->vars->script_url;
        $t = $this->createTwilioDirectiveBuilder();
        if (isset($message))
            $t->say($message);
        $t->pause($pause);
        $t->redirect($location);
        return $t->render();
    }

    function outgoing($phone, $callerid = null) {
        if ($callerid === null) $callerid = $this->settings->outgoing_bridge()->outbound;
        $t = $this->createTwilioDirectiveBuilder();
        $t->dial($phone, 60, $callerid);
        return $t->render();
    }

    function conferenceAsAdmin() {
        $t = $this->createTwilioDirectiveBuilder();
        $t->conference(true, true);
        return $t->render();
    }

    function conferenceAsGuest() {
        $t = $this->createTwilioDirectiveBuilder();
        $t->conference(false, false);
        return $t->render();
    }

    private function createTwilioDirectiveBuilder() {
        return new TwilioDirectiveBuilder($this->settings);
    }

}


