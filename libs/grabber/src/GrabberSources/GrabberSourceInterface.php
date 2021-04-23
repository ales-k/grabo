<?php


namespace Grabo\Grabber\GrabberSources;


use Grabo\Grabber\AdListInterface;

interface GrabberSourceInterface {

    public function getSourceName(): string;

    public function getList(array $config): AdListInterface;

}