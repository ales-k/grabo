<?php


namespace Grabo\Grabber;


class AdFactory {

    /**
     * @param string $id
     * @param string $sourceName
     * @param string $link
     * @param string $title
     * @param float $price
     * @return AdInterface
     */
    public static function createAd(string $id, string $sourceName, string $link, string $title, float $price): AdInterface {
        $parameters = [];
        $parameters[] = self::createParameter(AdParameter::PARAM_TITLE, $title);
        $parameters[] = self::createParameter(AdParameter::PARAM_PRICE, $title);
        return new Ad($id, $sourceName, $link, $parameters);
    }

    /**
     * @param string $key
     * @param $value
     * @param string|null $unit
     * @return AdParameterInterface
     */
    protected static function createParameter(string $key, $value, ?string $unit = ''): AdParameterInterface {
        return new AdParameter($key, $value, $unit);
    }

}