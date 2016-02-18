<?php

namespace Koine\EventManager;

interface EventManagerAwareInterface
{
    /**
     * @param EventManagerInterface $eventManager
     *
     * @return self
     */
    public function setEventManager(EventManagerInterface $eventManager);

    /**
     * @return EventManagerInterface
     */
    public function getEventManager();
}
