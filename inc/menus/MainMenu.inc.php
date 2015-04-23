<?php

require_once(__DIR__ . "/../Menu.inc.php");

class MainMenu extends Menu {
    function menuCode() { return 'm'; }

    function present() {
        echo $this->mojility->menuWithAudio('http://mojility.ca/phone/audio/greeting.mp3', MAIN_MENU);
    }

    function handleDigits($digits) {
    switch($digits) {
    case '1':
      echo $this->mojility->forward(SALES_CELL, "Sorry, nobody is available in sales to respond at this time. Please leave a message and we will return your call as soon as possible.");
      break;
    case '2':
      echo $this->mojility->forward(SUPPORT_CELL, "Sorry, nobody is available in support to respond at this time. Please leave a message and we will return your call as soon as possible.");
      break;
    case '8':
      echo $this->mojility->redirect(null, CONFERENCE_MENU, 0);
      break;
    case EXTENSION_HACK:
      echo $this->mojility->forward(SALES_CELL, "Sorry, Stacey is unavailable at this time. Please leave a message and she will return your call as soon as possible.");
      break;
    case OUTGOING_SECRET:
      echo $this->mojility->redirect(null, OUTGOING_MENU, 0);
      break;
    default:
      echo $this->mojility->redirect("That response is not valid. Please try again.", MAIN_MENU);
    }
  }
}
