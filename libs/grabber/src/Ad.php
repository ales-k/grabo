<?php


namespace Grabo\Grabber;


use Grabo\Queue\QueueItemInterface;

class Ad implements AdInterface, QueueItemInterface {

    /** @var string */
    protected $id;
    /** @var string */
    protected $sourceName;
    /** @var string */
    protected $link;

    /**
     * @var AdParameterInterface[]
     */
    protected $parameters = [];

    /**
     * Ad constructor.
     * @param $id
     * @param $sourceName
     * @param $link
     * @param AdParameterInterface[] $parameters
     */
    public function __construct($id, $sourceName, $link, array $parameters) {
        $this->id = $id;
        $this->sourceName = $sourceName;
        $this->link = $link;
        foreach($parameters as $parameter) {
            $this->parameters[$parameter->getKey()] = $parameter;
        }
    }

    /**
     * @return string
     */
    public function getId(): string {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getLink(): string {
        return $this->link;
    }

    /**
     * @return AdParameterInterface[]
     */
    public function getParameters(): array {
        return $this->parameters;
    }

    /**
     * @return string
     */
    public function getSourceName(): string {
        return $this->sourceName;
    }

    public function getParameter(string $key): ?AdParameterInterface {
        if(!isset($this->parameters[$key])) {
            return null;
        }
        return $this->parameters[$key];
    }


}