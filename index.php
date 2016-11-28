<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 28/11/16
 * Time: 22:03
 */

/** @var geoIpService $geoIpClass */
$geoIpClass = include "geoIpService.php";

if (!empty($_REQUEST['ip'])) {
    echo json_encode($geoIpClass->getCountyByIp($_REQUEST['ip']));
}
