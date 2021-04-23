<?php

namespace Grabo\Queue;


class Queue implements QueueInterface {

    /** @var QueueItemInterface[] */
    protected $items = [];

    /**
     * @param QueueItemInterface[] $items
     */
    public function addMultiple(array $items): void {
        foreach($items as $item) {
            $this->addItem($item);
        }
    }

    /**
     * @return QueueItemInterface[]
     */
    public function getItems(): array {
        return $this->items;
    }

    public function addItem(QueueItemInterface $item) {
        $this->items[] = $item;
    }

}