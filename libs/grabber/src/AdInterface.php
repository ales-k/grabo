<?php


namespace Grabo\Grabber;


interface AdInterface {

    public function getLink(): string;
    public function getId(): string;
    public function getParameter(string $key): ?AdParameterInterface;

}