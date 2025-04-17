<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = "localhost";
$username = "root";
$password = "";
$dbname = "epicshelf";

$conn = new mysqli($host, $username, $password, $dbname);
$page ="";
?>