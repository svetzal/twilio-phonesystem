<?php

require_once(__DIR__ . "/TwilioDirectiveBuilder.inc.php.php");

class TwilioResponseBuilder {

    function menuWithSpeech($message, $location = MAIN_MENU) {
        $t = $this->createTwilioDirectiveBuilder();
        $t->gatherWithSpeech($message, 2, $location);
        $t->say("Sorry, I didn't get your input.");
        $t->redirect($location);
        return $t->render();
    }

    function menuWithAudio($greeting, $location = MAIN_MENU) {
        $t = $this->createTwilioDirectiveBuilder();
        $t->gatherWithAudio($greeting, 2, $location);
        $t->say("Sorry, I didn't get your input.");
        $t->redirect($location);
        return $t->render();
    }

    function forward($number, $message) {
        $t = $this->createTwilioDirectiveBuilder();
        $t->dial($number);
        $t->say($message);
        $t->record();
        return $t->render();;
    }

    function redirect($message = null, $location = MAIN_MENU, $pause = 1) {
        $t = $this->createTwilioDirectiveBuilder();
        if (isset($message))
            $t->say($message);
        $t->pause($pause);
        $t->redirect($location);
        return $t->render();
    }

    function outgoing($phone, $callerid = "289-277-0709") {
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
        return new TwilioDirectiveBuilder();
    }

}


