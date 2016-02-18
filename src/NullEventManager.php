<?php

namespace Koine\EventManager;

class NullEventManager
{
    public function attach($eventType, callable $callback)
    {
        return $this;
    }

    public function trigger(EventInterface $event)
    {
        return $this;
    }
}
