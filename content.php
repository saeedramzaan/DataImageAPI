<?php

function get_data($name)
{

$factURL = 'https://dog-facts-api.herokuapp.com/api/v1/resources/dogs/all';
$imgURL = 'https://dog.ceo/api/breeds/image/random';

//read json file from url in php
$readFact = file_get_contents($factURL);
$readImage = file_get_contents($imgURL);

//convert json to array in php
$factArray = json_decode($readFact,true);
$imageArray = json_decode($readImage,true);

$key = array_rand($factArray);

$fact = end($factArray[$key]);

$imgMsg = $imageArray['message'];

$img = get_headers($imgMsg, 1);

 if ($img["Content-Length"]<"300000"){
    $image = $imageArray['message'].PHP_EOL;
 }else{
     $randomImage = array_rand($imageArray);
     $image = $imageArray[$randomImage].PHP_EOL;
 }

$array_load = array();

$array_load [] = array(
    'Fact' => $fact,
    'Image' => $image
);

 return $array_load;

}
?>
