<?php

namespace Studiow\Properties\Test;

use Studiow\Properties\PropertiesHolder;
use Studiow\Properties\PropertiesHolderInterface;
use PHPUnit_Framework_TestCase;

class PropertiesHolderTest extends PHPUnit_Framework_TestCase
{

    /**
     * 
     * @return Studiow\Properties\PropertiesHolderInterface
     */
    private function getPropertiesHolder()
    {
        return new PropertiesHolder(["foo" => "bar", "foo_2" => "bar_2"]);
    }

    public function testHasProperty()
    {
        $props = $this->getPropertiesHolder();
        $this->assertTrue($props->has("foo"));
        $this->assertFalse($props->has("unknown_prop"));
    }

    public function testGetProperty()
    {
        $props = $this->getPropertiesHolder();

        $this->assertEquals("bar", $props->get("foo", "default"));
    }

    public function testGetPropertyDefault()
    {
        $props = $this->getPropertiesHolder();
        $this->assertEquals("default", $props->get("unknown_prop", "default"));
    }

    public function testAddSingle()
    {
        $props = $this->getPropertiesHolder();
        $props->set("foo_3", "bar_3");
        $this->assertTrue($props->has("foo_3"));
        $this->assertEquals("bar_3", $props->get("foo_3", "default"));
    }

    public function testAddMultiple()
    {
        $props = $this->getPropertiesHolder();
        $props->set(["foo_3" => "bar_3", "foo_4" => "bar_4"]);

        $this->assertTrue($props->has("foo_3"));
        $this->assertEquals("bar_3", $props->get("foo_3", "default"));

        $this->assertTrue($props->has("foo_4"));
        $this->assertEquals("bar_4", $props->get("foo_4", "default"));
    }

    public function testUpdateSingle()
    {
        $props = $this->getPropertiesHolder();
        $props->set("foo", "updated");
        $this->assertEquals("updated", $props->get("foo", "default"));
    }

    public function testUpdateMultiple()
    {
        $props = $this->getPropertiesHolder();
        $props->set(["foo" => "updated", "foo_2" => "updated_2"]);

        $this->assertEquals("updated", $props->get("foo", "default"));
        $this->assertEquals("updated_2", $props->get("foo_2", "default"));
    }

    public function testRemoveSingle()
    {
        $props = $this->getPropertiesHolder();
        $props->remove("foo");
        $this->assertFalse($props->has("foo"));
    }

    public function testRemoveMultiple()
    {
        $props = $this->getPropertiesHolder();
        $props->remove(["foo", "foo_2"]);
        $this->assertFalse($props->has("foo"));
        $this->assertFalse($props->has("foo_2"));
    }

    public function testReturnForSet()
    {
        $props = $this->getPropertiesHolder();
        $rv = $props->set("foo", "updated");
        $this->assertInstanceOf(PropertiesHolderInterface::class, $rv);
    }

    public function testReturnForRemove()
    {
        $props = $this->getPropertiesHolder();
        $rv = $props->remove("foo");

        $this->assertInstanceOf(PropertiesHolderInterface::class, $rv);
    }

}
