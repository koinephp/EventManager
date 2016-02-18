<?php

namespace Koine\EventManager;

interface EventManagerInterface
{
    /**
     * @param string   $eventType
     * @param callable $callback
     *
     * @return self
     */
    public function attach($eventType, callable $callback);

    /**
     * @param EventInterface $event
     *
     * @return self
     */
    public function trigger(EventInterface $event);
}
