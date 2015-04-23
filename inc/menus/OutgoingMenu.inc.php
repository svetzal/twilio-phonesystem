<?php

require_once(__DIR__ . "/../Menu.inc.php");

class OutgoingMenu extends Menu {
  function menuCode() { return 'o'; }

  function present() {
    echo $this->mojility->menuWithSay('Enter outgoing number.', OUTGOING_MENU);
  }

  function handleDigits($digits) {
    if (strlen($digits) != 10) {
      echo $this->mojility->redirect("Invalid phone number. Please try again.", OUTGOING_MENU);
    } else {
      echo $this->mojility->outgoing($digits);
    }
  }
}

