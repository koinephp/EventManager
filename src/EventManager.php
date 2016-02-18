<?php

namespace Koine\EventManager;

class EventManager implements EventManagerInterface
{
    /** @var array */
    private $events = [];

    /**
     * @param string $eventType the class name of the event
     * @param callable callback
     */
    public function attach($eventType, callable $callback)
    {
        if (!isset($this->events[$eventType])) {
            $this->events[$eventType] = [];
        }

        $this->events[$eventType][] = $callback;
        return $this;
    }

    public function trigger(EventInterface $event)
    {
        foreach ($this->getEvents(get_class($event)) as $callback) {
            $callback($event);
        }

        return $this;
    }

    /**
     * @param string $eventType
     * @param array
     */
    public function getEvents($eventType)
    {
        if (isset($this->events[$eventType])) {
            return $this->events[$eventType];
        }

        return [];
    }
}
