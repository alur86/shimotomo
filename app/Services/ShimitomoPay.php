<?php

namespace App\Services;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;  


class ShimotomoPay
{
  

 public function doPayment() {

//create new instance GuzzleHttp\Client
$client = new \GuzzleHttp\Client();

//list of parameters of request to API
$params="authentication.memberId=11344" .
        "&authentication.checksum=3d1079465e8f3ffef07c086605289df1" .
        "&authentication.terminalId=1106" .
        "&merchantTransactionId=Rest Transaction 01" .
        "&amount=50.00" .
        "&currency=USD" .
        "&orderDescriptor=Test Transaction" .
        "&shipping.country=IN" .
        "&shipping.city=Malad" .
        "&shipping.state=MH" .
        "&shipping.postcode=400064" .
        "&shipping.street1=Malad" .
        "&customer.telnocc=091" .
        "&customer.phone=9854789658" .
        "&customer.email=john.doe@xyz.com" .
        "&customer.givenName=John" .
        "&customer.surname=Doe" .
        "&customer.ip=192.168.0.1" .
        "&customer.birthDate=19890202" .
        "&card.number= 4000000000000051" .
        "&card.expiryMonth=07" .
        "&card.expiryYear=2022" .
        "&card.cvv=745" .
        "&paymentBrand=VISA" .
        "&paymentMode=CC" .
        "&paymentType=DB" .
        "&merchantRedirectUrl=https://www.merchantRedirectUrl.com" .
        "&notificationUrl=www.merchantNotificationUrl.com" .
        "&tmpl_amount=50.00" .
        "&tmpl_currency=USD" .
        "&recurringType=INITIAL" .
        "&createRegistration=true" .
        "&customer.customerId=12345";

//make the json encoding of parameters
$data = json_encode($params);

//create the request object to make the call of GuzzleHttp\Client instanse 
//it uses the URL and encoded data
$request = $client->post('https://preprod.shimotomo.com/transactionServices/REST/v1/payments', null, json_encode($data));

//add auth token to the new request
$request->addHeader('X-Authorization', 'AuthToken :eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJjb25tZXJjaGFudDEiLCJyb2xlIjoibWVyY2hhbnQiLCJpc3MiOiJQWiIsImV4cCI6MTUwMTE0NjY0MX0.TFmGGKDUgkktmZQvrUTeox1buH1J6lgBVE3Mcy8OVjA');

//get the response 
$response = $request->send();

//get the content type of response
$content_type = $response->getHeader('content-type');

//get the status code of response
$response_code=$response->getStatusCode();

//get the data of response
$data=$response->getBody();

  }


}