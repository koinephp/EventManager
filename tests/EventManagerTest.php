<?php

namespace KoineTest\EventManager;

use Koine\EventManager\EventInterface;
use Koine\EventManager\EventManager;
use PHPUnit_Framework_TestCase;

class EventManagerTest extends PHPUnit_Framework_TestCase
{
    /** @var EventManager */
    protected $fixture;

    public function setUp()
    {
        $this->fixture = new EventManager();
    }

    /**
     * @test
     */
    public function implementsTheCorrectInterface()
    {
        $this->assertInstanceOf('Koine\EventManager\EventManagerInterface', $this->fixture);
    }

    /**
     * @test
     */
    public function canTriggerRegisteredEvents()
    {
        $object = new \StdClass();
        $object->number = 0;
        $object->foo = null;
        $object->bar = null;
        $event = new DummyEvent($object);
        $class = get_class($event);

        $this->fixture->attach($class, function ($event) {
            $object = $event->getObject();
            $object->number = $object->number + 1;
            $object->foo = 'bar' . $object->number;
        });

        $this->fixture->attach($class, function ($event) {
            $object = $event->getObject();
            $object->number = $object->number + 1;
            $object->bar = 'baz' . $object->number;
        });

        $this->fixture->trigger($event);

        $this->assertEquals('bar1', $object->foo);
        $this->assertEquals('baz2', $object->bar);
    }
}

class DummyEvent implements EventInterface
{
    private $object;

    public function __construct($object)
    {
        $this->object = $object;
    }

    public function getObject()
    {
        return $this->object;
    }
}
