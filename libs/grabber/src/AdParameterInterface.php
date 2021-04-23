<?php


namespace Grabo\Grabber;


interface AdParameterInterface {

    public function getKey(): string;

    public function getValue();

    public function getUnit(): string;

}