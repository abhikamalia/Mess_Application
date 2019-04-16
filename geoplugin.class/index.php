<?php

require_once('geoplugin.class.php');

$geoplugin = new geoPlugin();




//locate the IP
$geoplugin->locate();
$geoplugin->city;
$geoplugin->countryName;
echo $geoplugin->latitude;
echo $geoplugin->longitude;


?>