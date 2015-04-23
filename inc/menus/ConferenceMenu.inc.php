<?php

require_once(__DIR__ . "/../Menu.inc.php");

class ConferenceMenu extends Menu {
  function menuCode() { return 'c'; }

  function present() {
    echo $this->mojility->menuWithSay('Please enter your conference code now.', CONFERENCE_MENU);
  }

  function handleDigits($digits) {
    switch($digits) {
    case CONFERENCE_ADMIN_CODE:
      echo $this->mojility->conferenceAsAdmin();
      break;
    case CONFERENCE_ATTENDEE_CODE:
      echo $this->mojility->conferenceAsGuest();
      break;
    default:
      echo $this->mojility->redirect("That was not a valid conference code. Please try again.", CONFERENCE_MENU);
    }
  }
}


