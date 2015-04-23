<?php

require_once(__DIR__ . "/TwilioResponse.inc.php");

class MojilityResponse {

  function menuWithSay($message, $location=MAIN_MENU) {
    $t = new TwilioResponse();
    $t->gatherWithSay($message, 2, $location);
    $t->say("Sorry, I didn't get your input.");
    $t->redirect($location);
    return $t->render();
  }

  function menuWithAudio($greeting, $location=MAIN_MENU) {
    $t = new TwilioResponse();
    $t->gatherWithAudio($greeting, 2, $location);
    $t->say("Sorry, I didn't get your input.");
    $t->redirect($location);
    return $t->render();
  }

  function forward($number, $message) {
    $t = new TwilioResponse();
    $t->dial($number);
    $t->say($message);
    $t->record();
    return $t->render();;
  }

  function redirect($message=null, $location=MAIN_MENU, $pause=1) {
    $t = new TwilioResponse();
    if (isset($message))
      $t->say($message);
    $t->pause($pause);
    $t->redirect($location);
    return $t->render();
  }

  function outgoing($phone, $callerid="289-274-5108") {
    $t = new TwilioResponse();
    $t->dial($phone, 60, $callerid);
    return $t->render();
  }

  function conferenceAsAdmin() {
    $t = new TwilioResponse();
    $t->conference(true, true);
    return $t->render();
  }

  function conferenceAsGuest() {
    $t = new TwilioResponse();
    $t->conference(false, false);
    return $t->render();
  }

}


