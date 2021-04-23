<?php


namespace Grabo\Queue;


class QueueProcessor implements QueueProcessorInterface {

    const EVENT_NEW_AD = 'newAd';
    const EVENT_PRICE_CHANGED = 'priceChanged';

    /** @var QueueInterface */
    protected $queue;

    /** @var array */
    protected $listeners = [
        self::EVENT_NEW_AD => [],
        self::EVENT_PRICE_CHANGED => []
    ];

    /**
     * QueueProcessor constructor.
     * @param QueueInterface $queue
     * @param array|array[] $listeners
     */
    public function __construct(QueueInterface $queue, array $listeners) {
        $this->queue = $queue;
        $this->listeners = $listeners;
    }

    public function processQueue() {
        foreach($this->queue->getItems() as $item) {
            /**
             * Here the processor is supposed to process data - save them into database,
             * check for changes in ads and notify listeners as a reaction to those events.
             */
            $this->emitEvent(self::EVENT_NEW_AD, $item); //Just for testing, not for meaningful reason now.
        }
    }

    public function listenTo(string $event, QueueListenerInterface $listener) {
        $this->listeners[$event][] = $listener;
    }

    /**
     * Notifies all registered listeners for this given event.
     *
     * @param string $event
     * @param QueueItemInterface $item
     */
    protected function emitEvent(string $event, QueueItemInterface $item) {
        /** @var QueueListenerInterface[] $listeners */
        $listeners = $this->listeners[$event];
        foreach($listeners as $subscriber) {
            $subscriber->notify($event, $item);
        }
    }

}