<?php
include("credentials.php");
global $link;
try {
 $link = new PDO("mysql:host=$hostname;dbname=$dbname; charset=$charset", $username, $password);
 $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
  die("Unable to connect: " . $e->getMessage());
}
?>
