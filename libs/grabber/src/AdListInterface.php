<?php


namespace Grabo\Grabber;

interface AdListInterface {

    /**
     * @return AdInterface[]
     */
    public function getAds(): array;

}