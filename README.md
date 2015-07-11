Twilio Phone System
===================

[![Code Climate](https://codeclimate.com/github/svetzal/twilio-phonesystem/badges/gpa.svg)](https://codeclimate.com/github/svetzal/twilio-phonesystem) [![Test Coverage](https://codeclimate.com/github/svetzal/twilio-phonesystem/badges/coverage.svg)](https://codeclimate.com/github/svetzal/twilio-phonesystem/coverage)

Introduction
------------

I wrote this quick system while migrating away from a full-blown Asterisk installation for my business.
As I was already using Twilio, it just made sense to leverage it for this purpose as well.

Installation
------------

You'd do best to fork this repository if you want to use it, that way as I continue to build on it, you
can control what changes you choose to adopt.

Copy the settings-sample.php to settings.php, and change it to reflect your needs.

Twilio recommends not using MP3 as an audio format, but I'm lazy, so that's what I'm using for now. For
best results, record an 8KHz WAV file for your main menu, and update the filename in
inc/menus/MainMenu.inc.php

There is no dependency on the vendors folder (I'm only using composer to bring in PHPUnit for testing).

Copy the following files and folders to your server:

    audio/
    inc/
    index.php
    settings.php

Be sure to upload your main menu audio to the audio/ folder.

General Notes
-------------

This was a simple abstraction exercise I did on top of the Twilio TwiML API. It fit my needs, so I
figured it might fit others' needs as well, so I'm releasing it under the MIT license to the community.
Feel free to use it as sample code.
