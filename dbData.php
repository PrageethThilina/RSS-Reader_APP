<?php
//get the q parameter from URL
$q=@$_GET["q"];


require 'vendor/autoload.php';
$con = new MongoDB\Client("mongodb://localhost:27017");
$db = $con -> Rss_App;
$collection = $db->news_data;

$cursor = $collection->find();
foreach ($cursor as $item) {
    echo $item["itemTitle"] . "<br>";
    echo $item["itemLink"] . "<br>";
    echo $item["itemDescription"] . "<br><br><br>";
 };


?>