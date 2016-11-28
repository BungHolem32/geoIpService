<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 28/11/16
 * Time: 22:03
 */
require 'vendor/autoload.php';

use GeoIp2\Database\Reader;

class geoIpService
{

    /**
     * geoIpService constructor.
     */
    public function __construct()
    {
        $this->reader = new Reader(__DIR__ . '/GeoLite2-City.mmdb');
    }

    /**
     * @param $ip
     * @return stdClass
     */
    public function getCountyByIp($ip)
    {
        $record = $this->reader->city($ip);
        $country = new stdClass();

        $country->isoCode = $record->country->isoCode;
        $country->name = $record->country->name;
        $country->specificName = $record->mostSpecificSubdivision->name;
        $country->isoCode2 = $record->mostSpecificSubdivision->isoCode;
        $country->cityName = $record->city->name;
        $country->postalCode = $record->postal->code;
        $country->latitude = $record->location->latitude;
        $country->longitude = $record->location->longitude;

        return $country;
    }


    /**
     * @return \GeoIP Service
     */
    public function getGeoIpService()
    {
        return new GeoIP();
    }
}

return new geoIpService();