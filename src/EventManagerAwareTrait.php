<?php

namespace Koine\EventManager;

trait EventManagerAwareTrait
{
    /** @var EventManagerInterface */
    private $eventManager;

    public function setEventManager(EventManagerInterface $eventManager)
    {
        $this->eventManager = $eventManager;

        return $this;
    }

    public function getEventManager()
    {
        if ($this->eventManager === null) {
            $this->eventManager = new NullEventManager();
        }

        return $this->eventManager;
    }
}
