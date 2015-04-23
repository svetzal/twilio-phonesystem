<?php
require(__DIR__ . "/../inc/ParameterParser.inc.php");

class ParameterParserTest extends PHPUnit_Framework_TestCase {

  function testParamsPersistence() {
    $parser = new ParameterParser(array('menuCode' => 'c', 'digits' => '1'));
    $this->assertEquals('c', $parser->menuCode());
    $this->assertTrue($parser->hasDigits());
    $this->assertEquals('1', $parser->digits());
  }

  function testMissingDigits() {
    $parser = new ParameterParser(array('menuCode' => 'c'));
    $this->assertEquals('c', $parser->menuCode());
    $this->assertFalse($parser->hasDigits());
  }

}
