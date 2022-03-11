<?php

require_once('autoload.php');

$conroller = new controller\Controller;

// echo '<pre>'; var_dump($conroller);echo "</pre>";
$conroller->handleRequest();