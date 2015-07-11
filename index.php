<?php

require("settings.php");

require("inc/ParameterParser.inc.php");
require("inc/MenuRegistry.inc.php");
require("inc/MenuDispatcher.inc.php");
require("inc/MenuBuilder.inc.php");

header("content-type: text/xml");

$params = new ParameterParser();

$registry = new MenuRegistry();
$menuBuilder = new MenuBuilder();
$registry->addMenu($menuBuilder->mainMenu());
$registry->addMenu($menuBuilder->conferenceMenu());
$registry->addMenu($menuBuilder->outgoingMenu());

$dispatcher = new MenuDispatcher($params, $registry);

$dispatcher->dispatch();
