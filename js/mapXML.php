<?php

require("../config.php");

// Start XML file, create parent node

$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);



// Select all the rows in the markers table

$query = "SELECT * FROM store";
$result = $conn->query($query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}

header("Content-type: text/xml");
 

// Iterate through the rows, adding XML nodes for each

while ($row = $result->fetch_assoc()){
  // Add to XML document node
  $node = $dom->createElement("marker");
  $newnode = $parnode->appendChild($node);
  $newnode->setAttribute("id",$row['store_id']);
  $newnode->setAttribute("name",$row['store_name']);
  $newnode->setAttribute("address", $row['store_address']);
  $newnode->setAttribute("lat", $row['latitude']);
  $newnode->setAttribute("lng", $row['longitude']);


}

echo $dom->saveXML();
 
?>