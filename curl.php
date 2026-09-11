<?php

$url = "https://api-v1.aspfiy.com/reserve-paga/";

// The data required by the API
$data = [
    "email"      => "techoe5961@gmail.com",
    "reference"  => "UNIQUE_REF_" . time(), // Your internal unique ID
    "firstName"  => "Alabi",
    "lastName"   => "Friday",
    "webhookUrl" => "https://yourdomain.com/webhook/palmpay",
    "phone"      => "09013350351"
];

$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => $url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode($data), // Send the data as JSON
  CURLOPT_HTTPHEADER => [
    "Authorization: Bearer Aspfiy-SEC-KEY-7f459da5da5d68b0ef0369f04f414cb6", // Replace with your key
    "Content-Type: application/json",
    "accept: application/json"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  // Decode the response to use the account details
  $result = json_decode($response, true);
  print_r($result);
}
