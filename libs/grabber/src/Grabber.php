<?php


namespace Grabo\Grabber;


use Grabo\Grabber\GrabberSources\GrabberSourceInterface;
use Grabo\Queue\QueueInterface;

class Grabber {

    /** @var GrabberSourceInterface[] */
    protected $sources = [];

    /** @var array */
    protected $config = [];

    /** @var QueueInterface */
    protected $queue;

    /**
     * Grabber constructor.
     * @param GrabberSourceInterface[] $sources
     * @param array $config
     * @param QueueInterface $queue
     */
    public function __construct(array $sources, array $config, QueueInterface $queue) {
        $this->sources = $sources;
        $this->config = $config;
        $this->queue = $queue;
    }

    /**
     * Grabs data from all defined sources.
     */
    public function grab() {
        foreach($this->sources as $source) {
            $adsList =  $source->getList($this->config);
            $this->queue->addMultiple($adsList->getAds());
        }
    }


}