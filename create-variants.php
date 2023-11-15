<?php

const PRODUCT_ID = '';
const STORE_HASH = '';
const AUTH_TOKEN = '';


$payload = '{
  "product_id": '.PRODUCT_ID.',
  "display_name": "Size",
  "type": "rectangles",
  "sort_order": 1,
"option_values": [
    {"label": "20ML"},
    {"label": "40ML"},
    {"label": "60ML"},
    {"label": "100ML"},
    {"label": "300ML"}
  ]
}
';

$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => "https://api.bigcommerce.com/stores/".STORE_HASH."/v3/catalog/products/".PRODUCT_ID."/options",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => $payload,
    CURLOPT_HTTPHEADER => [
        "Accept: application/json",
        "Content-Type: application/json",
        "X-Auth-Token: ".AUTH_TOKEN
    ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    echo $response;
}