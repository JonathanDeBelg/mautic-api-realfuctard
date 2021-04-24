<?php
include __DIR__ . '/vendor/autoload.php';
include 'auth.php';
require_once './vendor/mautic/api-library/lib/MauticApi.php';

use Mautic\Auth\ApiAuth;
use Mautic\MauticApi;

// GET CONTACT
$apiUrl     = "https://realfutcard.dionant-solutions.nl";
$api        = new MauticApi();
$contactApi = $api->newApi('contacts', $auth, $apiUrl);

$response = $contactApi->get('12145');
$contact  = $response[$contactApi->itemName()];

echo '<pre>';
var_dump($response);
echo '</pre>';


// UPSERT CONTACT
$fields = $contactApi->getFieldList();

$data = array();

foreach ($fields as $field) {
    $data[$field['alias']] = $_POST[$field['alias']];
}

// Set the IP address the contact originated from if it is different than that of the server making the request
$data['email'] = 'j.dionant@gmail.com';
$data['firstname'] = 'Jonathan';

// Create the contact
$response = $contactApi->create($data);
$contact  = $response[$contactApi->itemName()];
