<?php

set_time_limit(3000);
if ($file = fopen("geo.txt", "r")) {
    while(!feof($file)) {
        $line = fgets($file);
		$arrLine = explode("\t", $line);
        $response = file_get_contents("http://geocoding.webmaps.com.mx/nominatim/reverse?format=jsonv2&lat=".trim($arrLine[1])."&lon=".trim($arrLine[0]));

        $arrResponse = json_decode($response, true);
        $direccion = $arrResponse["display_name"];
        echo $direccion."<br/>";
    }
    fclose($file);
}