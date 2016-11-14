<?php

namespace spec;

use Settings;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SettingsSpec extends ObjectBehavior {

  function it_is_initializable() {
    $this->shouldHaveType(Settings::class);
  }

  function it_should_read_settings() {
    $this->vars->script_url->shouldBe("http://yourdomain.com/phone/index.php");
  }

}
