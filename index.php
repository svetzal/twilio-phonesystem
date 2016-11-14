<?php

require( __DIR__ . '/settings.php');

require( __DIR__ . '/vendor/autoload.php');

header("content-type: text/xml");

$params = new ParameterParser();

$registry = new MenuRegistry();
$menuBuilder = new MenuBuilder();
$registry->addMenu($menuBuilder->mainMenu());
$registry->addMenu($menuBuilder->conferenceMenu());
$registry->addMenu($menuBuilder->outgoingMenu());

$dispatcher = new MenuDispatcher($params, $registry);

$dispatcher->dispatch();
