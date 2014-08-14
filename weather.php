<?php

$url = "http://weather.yahooapis.com/forecastrss?u=c&w=1591691";

$rss = file_get_contents($url);

$document = new DOMDocument();
$document->loadXML($rss);

$namespace = "http://xml.weather.yahoo.com/ns/rss/1.0";
$elements  = $document->getElementsByTagNameNS($namespace, "forecast");

$data = [];

foreach ($elements as $element) {
  $data[] = [
    "date"       => $element->getAttribute("date"),
    "low"        => (integer) $element->getAttribute("low"),
    "high"       => (integer) $element->getAttribute("high"),
    "conditions" => $element->getAttribute("text")
  ];
}

require("vendor/autoload.php");

use Cartalyst\DataGrid\DataHandlers\CollectionHandler;
use Cartalyst\DataGrid\Environment;

$grid = new Environment(null, [
  CollectionHandler::class => function ($data) {
    return is_array($data);
  }
]);

print $grid->make(
  $data,
  ["date", "low", "high", "conditions"],
  ["sort" => "date", "direction" => "asc"]
);
