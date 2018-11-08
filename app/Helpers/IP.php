<?php

namespace App\Helpers;

class IP
{
    public static function getCountryByIp($ip)
    {
        $json = file_get_contents('http://getcitydetails.geobytes.com/GetCityDetails?fqcn=' . $ip);
        $json = json_decode($json);

        return $json->geobytesinternet . "#" . $json->geobytescountry . "#" . $json->geobytesregion;
    }
}