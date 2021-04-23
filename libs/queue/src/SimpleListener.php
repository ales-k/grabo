<?php


namespace Grabo\Queue;


use Grabo\Grabber\AdInterface;
use Grabo\Grabber\AdParameter;

class SimpleListener implements QueueListenerInterface {

    /**
     * @param string $event
     * @param QueueItemInterface $item
     */
    public function notify(string $event, QueueItemInterface $item) {
        if( ! $item instanceof AdInterface) {
            return;
        }
        /** @var AdInterface $item */
        $link = $item->getLink();
        $title = $item->getParameter(AdParameter::PARAM_TITLE)->getValue();

        echo '**************************************************************';
        echo PHP_EOL;
        echo 'Hi, there is a new car "' . $title . '". Check it out here ' . $link;
        echo PHP_EOL;
        echo '**************************************************************';
        echo PHP_EOL;
    }


}