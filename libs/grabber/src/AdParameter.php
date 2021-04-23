<?php


namespace Grabo\Grabber;


class AdParameter implements AdParameterInterface {

    const PARAM_TITLE = 'title';
    const PARAM_PRICE = 'price';

    /** @var string */
    protected $key;
    /** @var mixed */
    protected $value;
    /** @var string */
    protected $unit;

    /**
     * AdParameter constructor.
     * @param string $key
     * @param mixed $value
     * @param string $unit
     */
    public function __construct(string $key, $value, string $unit) {
        $this->key = $key;
        $this->value = $value;
        $this->unit = $unit;
    }

    /**
     * @return string
     */
    public function getKey(): string {
        return $this->key;
    }

    /**
     * @return mixed
     */
    public function getValue() {
        return $this->value;
    }

    /**
     * @return string
     */
    public function getUnit(): string {
        return $this->unit;
    }


}