<?php

require("settings.php");

require("inc/ParameterParser.inc.php");
require("inc/MenuRegistry.inc.php");
require("inc/MenuDispatcher.inc.php");
require("inc/MenuBuilder.inc.php");

define("EOL", "\n");

define("MAIN_MENU", SCRIPT_URL);
define("CONFERENCE_MENU", SCRIPT_URL."?m=c");
define("OUTGOING_MENU", SCRIPT_URL."?m=o");

header("content-type: text/xml");

$params = new ParameterParser();

$registry = new MenuRegistry();
$menuBuilder = new MenuBuilder();
$registry->addMenu($menuBuilder->mainMenu());
$registry->addMenu($menuBuilder->conferenceMenu());
$registry->addMenu($menuBuilder->outgoingMenu());

$dispatcher = new MenuDispatcher($params, $registry);

$dispatcher->dispatch();
