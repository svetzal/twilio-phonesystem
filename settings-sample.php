<?php

// This should point to this script's absolute URL on the web
define("SCRIPT_URL", "http://yourdomain.com/phone/index.php");

// The secret code to allow initiation of outgoing calls from your Twilio number
define("OUTGOING_SECRET", "5678");

// Cell numbers for department forwarding
define("SALES_CELL", "4165551212");
define("SUPPORT_CELL", "4165551212");

// A single hard-wired extension
define("EXTENSION_HACK", "201");

// Conferece access codes, one attendee must use admin code to start and end the conference
define("CONFERENCE_ADMIN_CODE", "4321");
define("CONFERENCE_ATTENDEE_CODE", "1234");
