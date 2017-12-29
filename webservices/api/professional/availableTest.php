<?php

$url1 = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=Ηρακλείτου+113,Χαλάνδρι&destinations=Athens&key=AIzaSyA1FK-ipf2Xe0W74fo7nnyufuA0Yh1JMFE";
$url2 = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=Ηρακλείτου+120,Χαλάνδρι&destinations=Athens&key=AIzaSyA1FK-ipf2Xe0W74fo7nnyufuA0Yh1JMFE";
$url3 = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=Ηρακλείτου+90,Χαλάνδρι&destinations=Athens&key=AIzaSyA1FK-ipf2Xe0W74fo7nnyufuA0Yh1JMFE";
$url4 = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=Ηρακλείτου+5,Χαλάνδρι&destinations=Athens&key=AIzaSyA1FK-ipf2Xe0W74fo7nnyufuA0Yh1JMFE";
$url5 = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=Ηρακλείτου+1,Χαλάνδρι&destinations=Athens&key=AIzaSyA1FK-ipf2Xe0W74fo7nnyufuA0Yh1JMFE";
$url6 = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=Ηρακλείτου+25,Χαλάνδρι&destinations=Athens&key=AIzaSyA1FK-ipf2Xe0W74fo7nnyufuA0Yh1JMFE";
$url7 = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=Ηρακλείτου+55,Χαλάνδρι&destinations=Athens&key=AIzaSyA1FK-ipf2Xe0W74fo7nnyufuA0Yh1JMFE";
$url8 = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=Ηρακλείτου+70,Χαλάνδρι&destinations=Athens&key=AIzaSyA1FK-ipf2Xe0W74fo7nnyufuA0Yh1JMFE";

$nodes = array($url1, $url2, $url3, $url4, $url5, $url6, $url7, $url8);
$node_count = count($nodes);

$curl_arr = array();
$master = curl_multi_init();

for($i = 0; $i < $node_count; $i++)
{
    $url =$nodes[$i];
    $curl_arr[$i] = curl_init($url);
    curl_setopt($curl_arr[$i], CURLOPT_RETURNTRANSFER, true);
    curl_multi_add_handle($master, $curl_arr[$i]);
}

do {
    curl_multi_exec($master,$running);
} while($running > 0);


for($i = 0; $i < $node_count; $i++)
{
    $results[] = curl_multi_getcontent  ( $curl_arr[$i]  );
}
print_r($results);
?>