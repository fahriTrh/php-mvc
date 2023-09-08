<?php 
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'http://localhost:8080/phpmvc/public/mahasiswa/getubah');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$output = curl_exec($ch);

curl_close($ch);

echo json_encode($output);