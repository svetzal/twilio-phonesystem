<?php

require("settings.php");

require("inc/ParameterParser.inc.php");
require("inc/MenuRegistry.inc.php");
require("inc/MenuDispatcher.inc.php");

require("inc/menus/MainMenu.inc.php");
require("inc/menus/ConferenceMenu.inc.php");
require("inc/menus/OutgoingMenu.inc.php");

define("EOL", "\n");

define("MAIN_MENU", SCRIPT_URL);
define("CONFERENCE_MENU", SCRIPT_URL."?m=c");
define("OUTGOING_MENU", SCRIPT_URL."?m=o");

header("content-type: text/xml");

$params = new ParameterParser();

$registry = new MenuRegistry();
$registry->addMenu(new MainMenu());
$registry->addMenu(new ConferenceMenu());
$registry->addMenu(new OutgoingMenu());

$dispatcher = new MenuDispatcher($params, $registry);

$dispatcher->dispatch();
