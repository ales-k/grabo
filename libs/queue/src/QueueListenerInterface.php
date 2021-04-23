<?php


namespace Grabo\Queue;


interface QueueListenerInterface {

    public function notify(string $event, QueueItemInterface $item);

}