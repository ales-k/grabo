<?php

namespace Grabo\Queue;



interface QueueInterface {

    /**
     * @param QueueItemInterface[] $items
     * @return mixed
     */
    public function addMultiple(array $items);

    /**
     * @return QueueItemInterface[]
     */
    public function getItems(): array;

}