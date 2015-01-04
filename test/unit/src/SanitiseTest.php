<?php

namespace dylan;

use PHPUnit_Framework_TestCase;

class SanitiseTest extends PHPUnit_Framework_TestCase
{
    public function testSanitiseValue()
    {
        $out = sanitise('5', [tointeger(), add(3)]);
        $this->assertEquals(8, $out);
    }

    public function testSanitiseWithDylan()
    {
        $dylan = dylan([key('foo', tointeger())]);
        $out = sanitise(['bar'=> 'nothing'], $dylan);
        $this->assertEquals(['foo' => 0], $out);
    }

    public function testSanitiseWithDylanAndMap()
    {
        $dylan = dylan([key('foo', tointeger(), 'bar')]);
        $out = sanitise(['bar'=> '5'], $dylan);
        $this->assertEquals(['foo' => 5], $out);
    }

    public function testSanitiseWithDylanAndComplexMap()
    {
        $dylan = dylan([key('foo', sum(), ['bar', 'car'])]);
        $out = sanitise(['bar'=> '5', 'car' => '6'], $dylan);
        $this->assertEquals(['foo' => 11], $out);
    }

    public function testSanitiseWithDylanAndSuperComplexMap()
    {

        $dylan = dylan([key('foo', [all(add(5)), sum()], ['bar', 'car'])]);
        $out = sanitise(['bar'=> '5', 'car' => '6'], $dylan);
        $this->assertEquals(['foo' => 21], $out);
    }
}
