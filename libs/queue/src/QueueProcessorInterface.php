<?php


namespace Grabo\Queue;


interface QueueProcessorInterface {

    /**
     * Processes queue items, emits events.
     */
    public function processQueue();

    /**
     * Registers Listener to specific event.
     * @param string $event
     * @param QueueListenerInterface $listener
     * @return mixed
     */
    public function listenTo(string $event, QueueListenerInterface $listener);

}