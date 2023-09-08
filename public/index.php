<?php 
// header('Access-Control-Allow-Origin: *');
// header('Access-Control-Allow-Headers: *');
if (!session_id()) session_start();

require_once '../app/init.php';

$app = new App;