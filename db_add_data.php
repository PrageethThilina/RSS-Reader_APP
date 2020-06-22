<?php
//get the q parameter from URL
$title=$_GET["title"];
$description=$_GET["description"];
$link=$_GET["link"];
$imglink=$_GET["imglink"];


$formattedText = "<p><a href=\"$link\"><img src=\"$imglink\" width=\"130\" height=\"86\" alt=\"$title\" align=\"left\" title=\"$title\" border=\"0\" ></a>$description<p><br clear=\"all\">";


require 'vendor/autoload.php';
$con = new MongoDB\Client("mongodb://localhost:27017");
$db = $con -> Rss_App;
$collection = $db->news_data;


$insertOneResult = $collection->insertOne([
    'itemTitle' => $title,
    'itemLink' => $link,
    'itemDescription' => $formattedText,
]);

echo ("Data Inserted");

?>