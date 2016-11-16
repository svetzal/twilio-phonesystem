<?php

use Menus\ConferenceMenu;
use Menus\MainMenu;
use Menus\OutgoingMenu;

require( __DIR__ . '/settings.php');

require( __DIR__ . '/vendor/autoload.php');

header("content-type: text/xml");

$settings = new Settings();

//print_r($settings->vars);
//
//exit(0);

$params = new ParameterParser();

$conferenceMenu = new ConferenceMenu($settings);
$outgoingMenu = new OutgoingMenu($settings);
$mainMenu = new MainMenu($settings, $conferenceMenu, $outgoingMenu);

$registry = new MenuRegistry();
$registry->addMenu($mainMenu);
$registry->addMenu($conferenceMenu);
$registry->addMenu($outgoingMenu);

$dispatcher = new MenuDispatcher($params, $registry);

$dispatcher->dispatch();
