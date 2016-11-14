<?php

require("settings.php");

require("src/ParameterParser.inc.php");
require("src/MenuRegistry.inc.php");
require("src/MenuDispatcher.inc.php");
require("src/MenuBuilder.inc.php");

header("content-type: text/xml");

$params = new ParameterParser();

$registry = new MenuRegistry();
$menuBuilder = new MenuBuilder();
$registry->addMenu($menuBuilder->mainMenu());
$registry->addMenu($menuBuilder->conferenceMenu());
$registry->addMenu($menuBuilder->outgoingMenu());

$dispatcher = new MenuDispatcher($params, $registry);

$dispatcher->dispatch();
