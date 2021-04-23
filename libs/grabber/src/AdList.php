<?php


namespace Grabo\Grabber;


class AdList implements AdListInterface {

    /** @var AdInterface[] */
    protected $ads = [];

    /**
     * AdList constructor.
     * @param AdInterface[] $ads
     */
    public function __construct(array $ads) {
        $this->ads = $ads;
    }

    /**
     * @return AdInterface[]
     */
    public function getAds(): array {
        return $this->ads;
    }

}